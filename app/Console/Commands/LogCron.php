<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class LogCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cli_memory_limit = config('app.cli_memory_limit');
        if (php_sapi_name() === 'cli' && !empty($cli_memory_limit)) {
            ini_set('memory_limit', $cli_memory_limit);
            \Log::info("cli_memory_limit: $cli_memory_limit");
        }
        ini_set('max_execution_time', 0);
        //ini_set('memory_limit', '-1');

        \Log::info("Cron get event is launched !");
        return true;
        // Url de l'api en mode download
        $url = 'http://public.opendatasoft.com/api/records/1.0/download/?dataset=evenements-publics-cibul&q=&sort=date_start&lang=fr&format=json&facet=tags&facet=placename&facet=department&facet=region&facet=city&facet=date_start&facet=date_end&facet=pricing_info&facet=updated_at&facet=city_district';

        // $response->body() : string;
        // $response->json() : array|mixed;
        // $response->status() : int;
        // $response->ok() : bool;
        // $response->successful() : bool;
        // $response->failed() : bool;
        // $response->serverError() : bool;
        // $response->clientError() : bool;
        // $response->header($header) : string;
        // $response->headers() : array;

        // compteur total des événements traités
        $cpt_events = 0;
        // compteur total des événements déjà traités depuis le dernier import
        $cpt_event_already_inserted = 0;
        // Initialisation du tableau des événements remontés sur un appel
        $events = [];

        $last_inserted_event = \App\Models\Event::lastEvent();
        if(isset($last_inserted_event) && isset($last_inserted_event->start_date)){
            // Année courante demandée
            $current_year = substr($last_inserted_event->start_date, 0, 4);
            // Mois courant
            $current_month = substr($last_inserted_event->start_date, 5, 2);
        }
        else{
            // Année courante demandée
            $current_year = 2019;
            // Mois courant
            $current_month = 1;
        }
        // \Log::info("$current_year-$current_month");
        // return true;

        // Nombre d'iteration maximmum (nb mois demandé)
        $max_iteration = 36;
        // Itération courante
        $current_iteration = 0;
        try {
            while($cpt_events==0 or ($current_iteration < $max_iteration and !empty($events))) {

                $current_date = $current_year."-".(str_pad($current_month, 2, 0, STR_PAD_LEFT));
                \Log::info("Lancement de la requête sur $current_date");
                $url_with_date = $url."&refine.date_start=$current_date";
                \Log::info($url_with_date);
                $response = Http::get($url_with_date);
                if($response->successful()){
                    //\Log::info("success response");
                    $events = $response->json();
                    //\Log::info("There is events");
                    //\Log::info(var_export($events[0]['fields']['city'], true));
                    if(!empty($events)){
                        \Log::info(count($events) ." will be processed !");

                        // pour chaque événement remonté dans la réponse de l'api
                        foreach($events as $e) {
                            //\Log::info("$cpt_events processed !");
                            $event = $e['fields'];

                            // Si l'événement possède bien une adresse
                            if(isset($event['address'])) {

                                // Extraction via une expression régulière du code postal dans l'adresse renvoyée par l'api
                                $zipcode = null;
                                preg_match("/\d{4,5}/", $event['address'], $matches);
                                if(count($matches)>0){
                                    $zipcode = $matches[count($matches) - 1];
                                }
                    
                                // Insertion de l'adresse' en bdd si son adresse+complement n'existe pas déjà
                                $address = \App\Models\Address::firstOrCreate(
                                    ['address' => mb_strtolower($event['address']), 'complement' => isset($event['placename']) ? mb_strtolower($event['placename']) : null],
                                    [
                                        'country_id' => 76,
                                        'zipcode' => $zipcode,
                                        'city' => isset($event['city']) ? $event['city'] : null,
                                        'city_district' => isset($event['city_district']) ? $event['city_district'] : null,
                                        'department' => isset($event['department']) ? $event['department'] : null,
                                        'region' => isset($event['region']) ? $event['region'] : null,
                                        'longitude' => $event['latlon'][1],
                                        'latitude' => $event['latlon'][0]
                                    ]
                                );
                    
                                // Affectation de la catégorie principale à l'événement
                                $category = null;
                                if(isset($event['tags'])) {
                                    $categories = explode ( ",", $event['tags']);
                                    // pour chaque tag
                                    foreach($categories as $c) {
                                        // insertion de la catégorie en bdd si son label n'existe pas déjà
                                        $category = \App\Models\Category::firstOrCreate(
                                            ['label' =>  mb_strtolower($c)],
                                            ['category_id'=> null]
                                        );
                                    }
                                }

                                try {
                                    $db_event = \App\Models\Event::create(
                                        ['uid'=> mb_strtolower($event['uid']),
                                        'title'=> isset($event['title']) ? $event['title'] : $event['space_time_info'],
                                        'start_date' => $event['date_start'],
                                        'end_date' => isset($event['date_end']) ? $event['date_end'] : null,
                                        'address_id'=> $address->id,
                                        'category_id'=> !empty($category) ? $category->id : null,
                                        'tags'=> isset($event['tags']) ? $event['tags'] : null,
                                        'description'=> isset($event['free_text']) ? $event['free_text'] : null,
                                        'space_time_info'=> isset($event['space_time_info']) ? $event['space_time_info'] : null,
                                        'link' => isset($event['link']) ? $event['link'] : null,
                                        'image' => isset($event['image']) ? $event['image'] : null,
                                        'image_thumb' => isset($event['image_thumb']) ? $event['image_thumb'] : null
                                        ]
                                    );

                                    $cpt_events++;
                                } catch(\PDOException $pdoe){
                                    if(str_contains($pdoe->getMessage(), "pour la clef 'event.uid'")){
                                        $cpt_event_already_inserted++;
                                        if($cpt_event_already_inserted%1000 == 0) {
                                            \Log::info("$cpt_event_already_inserted already processed !");
                                        }
                                    }
                                    else throw $pdoe;
                                }
                            }
                            if($cpt_events!= 0 && $cpt_events%1000 == 0) {
                                \Log::info("$cpt_events processed !");
                            }
                        }
                    }
                    else {
                        \Log::info(var_export($response, true));
                    }
                }
                else {
                    \Log::info(var_export($response, true));
                }
                $current_iteration++;
                if($current_month == 12) {
                    $current_year++;
                    $current_month = 1;
                }
                else {
                    $current_month++;
                }
                \Log::info("$cpt_events processed !");
                \Log::info("$cpt_event_already_inserted already processed !");
            }
            \Log::info("SUCCESS : $cpt_events added !");
        } catch (Error $e){
            \Log::info($e->getMessage());
            return false;
        } catch (Exception $e) {
            \Log::info($e->getMessage());
            return false;
        }
    }
}
