
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/yakayaller.css">
    <title>yakayaller.net - connexion</title>
</head>
<body>
<div id="profil">
    <h1 id="title2">YAKAYALLER !</h1>

    <form action="/signup" method="post" id="inscription">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h2>Connexion</h2>
        <p>
            <label for="mdp">Mot de passe:</label>
            <input name="mdp" id="mdp" type="text" size="30" maxlength="30" />
        </p>
        
        <p>
            <label for="email">Adresse mail:</label>
            <input name="email" id="email" type="email" size="30" maxlength="30" />
        </p>
        <p id="align">
            <input class="button" type="submit" value="Envoyer"></input>
            <!--<input class="bouton" type="button" value="reset"></input>-->
        </p>
        <p>Pas encore de compte?</p>
        
        </form>
            
    </div>
    
    
</body>
</html>