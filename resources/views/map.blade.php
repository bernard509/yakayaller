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
                        <input type="text" id="city" name="city" placeholder="saisissez votre ville"/>&nbsp;&nbsp;<input type="text" id="date" name="date" placeholder="Date de début" size="10" maxlenght="10"/>&nbsp;&nbsp;<input type="text" id="date" name="date" placeholder="Date de fin" size="10" maxlenght="10"/>
                        <a href="javascript:;" onclick="parentNode.parentNode.submit();" class="button4" style="background-color:#f14e4e">Valider</a></input>
                    </ul>
                </form>
            
                <ul>
                    @foreach ($events as $e)
                    <li>
                        <h2>{{ $e->title }}</h2>
                        <p>{{ $e->description }}</p>
                    </li>
                    @endforeach
                </ul>
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
