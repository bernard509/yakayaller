
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="css/yakayaller.css">
    <title>yakayaller.net - connexion</title>
</head>
<body>
    <div id="wrapper">
        <div id="menu-haut">
            <a href="/map" class="button4" style="background-color:#f14e4e;">Evénements</a>
        </div>
        <div id="bg">
            <img src="img/ville4.jpg" alt="">
        </div>
        <div id="form">
            <form action="/signup" method="post" id="connexion">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <ul>
                    <li><div id="yakayaller_title" style="padding-bottom:120px;">YAKAYALLER !</div></li>
                    <li>
                        <label for="email">Adresse mail:</label>
                        <input name="email" id="email" type="email" size="30" maxlength="255" />
                    </li>
                    <li>
                        <label for="password">Mot de passe:</label>
                        <input name="password" id="mdp" type="password" size="30" maxlength="255" />
                    </li>
                    <li><a href="javascript:;" onclick="parentNode.parentNode.parentNode.submit();" class="button4" style="background-color:#f14e4e">Se connecter</a></li>
                    <!--<li><input id="submit" type="submit" value="Envoyer"></input></li>-->
                    <li style="padding-left:110px;text-align:center">Pas encore de compte ? <a href="/signup" id="lien">Cliquez ici</a></li>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>