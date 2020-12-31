<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>yakayaller.net - Accueil</title>
        <link rel="stylesheet" href="css/yakayaller.css">
    </head>
    <body>
        <div id="home">
            <div id="bg">
                <img src="img/ville2.jpg" alt="">
            </div>
            
            <div id="yakayaller_title">YAKAYALLER !</div>
            <div id="form">
                <form method="POST" action="/map">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <!--<label for="ville">Saisir la ville</label>-->
                <ol id="champ">
                <li><input type="text" id="city" name="city" placeholder="saisissez votre ville"/></li>
                <li><input type="submit" value="valider" id="button"></input></li>
                </ol>
            
            <div id="padding">
                <i class="fas fa-user-plus"></i>
                <button class="button"><a href="/signup" class="text">Inscription</a></button>
                <button class="button"><a href="/signin" class="text">Connexion</a></button>
            </div>
                </form>
            </div>
        </div>
    </body>
</html>
