<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <link rel="stylesheet" href="/css/yakayaller.css">
        <title>yakayaller.net - Carte des événements</title>
        @mapstyles
    </head>
    <body>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div id="menu-haut">
            <a href="/signin" class="button4" style="background-color:#9a4ef1;">Se connecter</a>
            <a href="/" class="button4" style="background-color:#f14e4e;">Accueil</a>
        </div>
        <div id="header">
            <ul><li><div id="yakayaller_title">YAKAYALLER !</div></li></ul>
        </div>
        <div id="bg">
            <img src="img/ville2.jpg" alt="">
        </div>
           <!-- @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif-->
        <section>
            <article id="map">
                @map([
                    'lat' => $default_latitude,
                    'lng' => $default_longitude,
                    'zoom' => 12,
                    'markers' => $markers
                ])
            </article>

            <article id="events">
                <form method="POST" action="/map" id="form-map-events">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <ul id="champ">
                        <input type="text" id="city" name="city" value="{{ $city }}" placeholder="Saisissez votre ville"/>&nbsp;entre le&nbsp;<input type="text" id="date" name="start_date" value="{{ $start_date }}" placeholder="YYYY/MM/DD" size="10" maxlenght="10"/>&nbsp;et le&nbsp;<input type="text" id="date" name="end_date" value="{{ $end_date }}" placeholder="YYYY/MM/DD" size="10" maxlenght="10"/>
                        <a href="javascript:;" onclick="parentNode.parentNode.submit();" class="button4" style="background-color:#f14e4e">Valider</a></input>
                    </ul>
                </form>

                <div id="ctn_event_list">            
                    <ul class="event_list">
                        @foreach ($events as $e)
                        <li>
                            <h3>{{ $e->title}} ({{ $e->start_date}} / {{ $e->end_date}})</h3>
                            <p class="txt_event">{{ htmlspecialchars_decode($e->description) }}</p>
                            <h4>{{ $e->space_time_info }}</h4>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </article>
        </section>
        <footer>
            <div id="copyright">
                yakayaller 2020 inc.
                <br />
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </footer>
        @mapscripts
    </body>
</html>
