<!--nom
prénom
email
mot de passe
ville
bouton valider
valider les modifications-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/yakayaller.css">
    <title>YAKAYALLER</title>
</head>
<body>
    <div id="profil">
    <h1 id="title2">YAKAYALLER !</h1>

    <form action="/profil" method="post" id="inscription"> 
        <h2>Formulaire d'inscription</h2>
        <p>
            <label for="name">Nom :</label>
            <input name="name" id="name" type="text" size="30" maxlength="30" />
        </p>
        <p>
            <label for="firstname">Prénom :</label>
            <input name="firstname" id="firstname" type="text" size="30" maxlength="30" />
        </p>
        
        <p>
            <label for="tel">Téléphone :</label>
            <input name="tel" id="tel" type="number"> 
        </p>
        <p>
            <label for="mail">Adresse mail:</label>
            <input name="mail" id="mail" type="email" size="30" maxlength="30"> 
        </p>
        <p id="align">
            <input class="bouton" type="button" value="Envoyer"></input><input class="bouton" type="button" value="reset"></input>
        </p>
        </form>
            
    </div>
    
</body>
</html>
