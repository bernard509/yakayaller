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
        \Log::info("Cron get event is launched !");

        // Test sur angers
        //$response = Http::get('http://public.opendatasoft.com/api/records/1.0/search/?dataset=evenements-publics-cibul&q=&rows=100&sort=date_start&lang=fr&facet=tags&facet=placename&facet=department&facet=region&facet=city&facet=date_start&facet=date_end&facet=pricing_info&facet=updated_at&facet=city_district&refine.city=Angers&refine.department=Maine-et-Loire');
        // all
        $url = 'http://public.opendatasoft.com/api/records/1.0/search/?dataset=evenements-publics-cibul&q=&sort=date_start&lang=fr&facet=tags&facet=placename&facet=department&facet=region&facet=city&facet=date_start&facet=date_end&facet=pricing_info&facet=updated_at&facet=city_district';
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
        $rows = 2000;
        $offset = 0;
        $start_offset = 0;
        $cpt_events = 0;
        $arrayData = [];
        $current_year = 2020;
        $oldest_year = $current_year;
        $max_iteration = 30;
        while($offset == $start_offset or (
                $offset < ($max_iteration*$rows) and 
                isset($arrayData['records']) and 
                count($arrayData['records']) == $rows and 
                $current_year >= $oldest_year)) {

            \Log::info("Lancement de la requête sur $rows enregistrements à l'offset $offset. start_year=$current_year");
            $url_with_offset = $url."&rows=$rows&start=$offset";
            \Log::info($url_with_offset);
            $response = Http::get($url_with_offset);
            $arrayData = $response->json();
            //\Log::info(var_export($arrayData['records'][0]['fields']['city'], true));
            if(isset($arrayData['records'])) {

                $events = $arrayData['records'];
            
                foreach($events as $e) {
                    //\Log::info(var_export($e, true));
                    //\Log::info("$cpt_events processed !");
                    $event = $e['fields'];
    
                    if(isset($event['address'])) {
    
                        $zipcode = null;
                        preg_match("/\d{4,5}/", $event['address'], $matches);
                        //\Log::info(var_export($matches, true));
                        if(count($matches)>0){
                            $zipcode = $matches[count($matches) - 1];
                        }
            
                        // firstOrCreate save de manière implicite avec l'id de retourné (mieux que de faire un new + save)
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
            
                        // Affectation de la catégorie principale
                        $category = null;
                        if(isset($event['tags'])) {
                            $categories = explode ( ",", $event['tags']);
                            foreach($categories as $c) {
                                $category = \App\Models\Category::firstOrCreate(
                                    ['label' =>  mb_strtolower($c)],
                                    ['category_id'=> null]
                                );
                            }
                        }
        
                        preg_match("/\d{4}/", $event['date_start'], $matches);
                        //\Log::info(var_export($matches, true));
                        if(count($matches)>0){
                            $current_year = intval($matches[count($matches) - 1]);
                        }
                        $db_event = \App\Models\Event::firstOrCreate(
                            ['uid'=> mb_strtolower($event['uid'])],
                            [
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
                                /*
                                Autres champs non traités
                                'updated_at' => '2020-11-04T15:09:40+00:00',
                                'timetable' => '2020-11-14T20:00:00 2020-11-14T20:30:00;2020-11-14T21:30:00 2020-11-14T22:00:00',
                                'lang' => 'fr',
                                */
                            ]
                        );
                        //\Log::info($db_event->uid);
                        $cpt_events++;
                    }
                }
            }
            $offset += $rows;
            //time_nanosleep(0, 50000000);
            \Log::info("$cpt_events processed !");
            //sleep(1);
        }

        \Log::info("SUCCESS : $cpt_events added !");
    }
}
