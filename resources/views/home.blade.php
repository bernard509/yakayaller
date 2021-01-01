<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <title>yakayaller.net - Accueil</title>
        <link rel="stylesheet" href="css/yakayaller.css">
    </head>
    <body>
        <!--<div id="menu-haut">
            <a href="/signin" class="button4" style="background-color:#f14e4e">Signin</a>
            <a href="/signup" class="button4" style="background-color:#f14e4e">Signup</a>
            <a href="something" class="button4" style="background-color:#f1bb4e">Button 2</a><br /><br />
            <a href="something" class="button4" style="background-color:#84f14e">Button 3</a><br /><br />
            <a href="something" class="button4" style="background-color:#4ef18f">Button 4</a><br /><br />
            <a href="something" class="button4" style="background-color:#4e9af1">Button 5</a><br /><br />
            <a href="something" class="button4" style="background-color:#9a4ef1">Button 6</a><br /><br />
            <a href="something" class="button4" style="background-color:#f14ebd">Button 7</a><br /><br />
        </div>-->
        <div id="wrapper">
            <div id="bg">
                <img src="img/ville2.jpg" alt="">
            </div>
            <div id="form">
                <form method="POST" action="/map">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <ul>
                        <li><div id="yakayaller_title" style="padding-bottom:140px;">YAKAYALLER !</div></li>
                        <li><input type="text" id="city" name="city" placeholder="Saisissez votre ville"/></li>
                        <li><a href="javascript:;" onclick="parentNode.parentNode.parentNode.submit();" class="button4" style="background-color:#f14e4e">Valider</a></li>
                    </ul>
                    <!--<label for="ville">Saisir la ville</label>-->
                    <!--<ol id="champ">
                        <li><input type="text" id="city" name="city" placeholder="Saisissez votre ville"/></li>
                        <li><input type="submit" value="valider" id="button"></input></li>
                    </ol>-->

            <!--<div id="padding">
                <i class="fas fa-user-plus"></i>
                
                <button class="button"><a href="/signup" class="text">Inscription</a></button>
                <button class="button"><a href="/signin" class="text">Connexion</a></button>
            </div>-->
                </form>
            </div>
        </div>
    </body>
</html>
