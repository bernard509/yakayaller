<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="css/yakayaller.css">
    <title>yakayaller.net - Modifier mon profil</title>
</head>
<body>
    <div id="user">
            <div id="bg">
                <img src="img/ville5.jpg" alt="">
            </div>
        <div id="yakayaller_title">YAKAYALLER !</div>
        <div id="form">
        <form action="/user" method="post" id="inscription"> 
        <h2>Formulaire d'inscription</h2>
        <ol id="position">
        <li>
            <label for="lastname">Nom :</label>
            <input name="lastname" id="lastname" type="text" size="30" maxlength="30" />
        </li>
        <li>
            <label for="firstname">Prénom :</label>
            <input name="firstname" id="firstname" type="text" size="30" maxlength="30" />
        </li>
        
        <li id="phone">
            <label for="phone">Téléphone :</label>
            <input name="phone" id="phone" type="text" size="30" maxlength="30"/> 
        </li>
        <li>
            <label for="email">Adresse mail:</label>
            <input name="email" id="email" type="email" size="30" maxlength="20"> 
        </li>
        <li id="align">
            <input class="bouton" type="submit" value="Envoyer" />
        </li>
        </form>
        </div>    
        
        
    </div>
</body>
</html>
