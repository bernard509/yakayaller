<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/yakayaller.css">
    <title>yakayaller.net - Inscription</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
    <div id="signup">
    <div id="bg">
        <img src="img/ville.jpg" alt="">
    </div>
    <div id="yakayaller_title">YAKAYALLER !</div>
    <form action="/signup" method="post" id="inscription">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h2>Formulaire d'inscription</h2>
        <p>
            <label for="lastname">Nom :</label>
            <input name="lastname" id="lastname" type="text" size="30" maxlength="30" />
        </p>
        <p>
            <label for="firstname">Prénom :</label>
            <input name="firstname" id="firstname" type="text" size="30" maxlength="30" />
        </p>
        <p>
            <label for="email">Adresse mail:</label>
            <input name="email" id="email" type="email" size="30" maxlength="30" />
        </p>
        <p>
            <label for="password">Mot de passe:</label>
            <input name="password" id="password" type="password" size="30" maxlength="30" />
        </p>
        <p id="align">
            <input class="button" type="submit" value="Envoyer"></input>
            
        </p>
        </form>
            
    </div>
    
</body>
</html>
