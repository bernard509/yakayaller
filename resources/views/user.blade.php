<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/yakayaller.css">
    <title>yakayaller.net - modifier mon profil</title>
</head>
<body>
    <div id="user">
    <h1 id="title2">YAKAYALLER !</h1>

    <form action="/user" method="post" id="inscription"> 
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
            <label for="phone">Téléphone :</label>
            <input name="phone" id="phone" type="number"> 
        </p>
        <p>
            <label for="email">Adresse mail:</label>
            <input name="email" id="email" type="email" size="30" maxlength="30"> 
        </p>
        <p id="align">
            <input class="bouton" type="submit" value="Envoyer">
        </form>
            
    </div>
    
</body>
</html>
