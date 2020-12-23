<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/yakayaller.css">

        <title>YAKAYALLER</title>

        <!-- Fonts -->
       <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        
        <style>
            body {
                font-family: 'Nunito';
                
            }
            
        </style>
  

        @mapstyles
    </head>
    <body>
        
        <div id="wrapper">
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
            
            
            <h1>YAKAYALLER !</h1>
            <section>
            <article id="taille">
                    <ol>
                        @foreach ($events as $e)
                        <li>
                            <h2>{{ $e->title }}</h2>
                            <p>{{ $e->description }}</p>
                        </li>
                        @endforeach
                    </ol>
                </article>

                <article id="carte">
                    @map([
                        'lat' => 47.473861,
                        'lng' => -0.559159,
                        'zoom' => 9,
                        'markers' => $markers
                    ])
                </article>
           
            
                
                   
                
                    
                
            
                        
            </section>
            <footer>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut doloremque temporibus incidunt? Repellendus eaque temporibus sit porro at! Repudiandae veritatis reprehenderit est consequatur odit commodi fuga unde recusandae reiciendis? Deleniti!
            </footer>
                                    
           </div>
           
        @mapscripts
    </body>
</html>