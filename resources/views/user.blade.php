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
    <div id="wrapper">
    <div id="menu-haut">
            <a href="/map" class="button4" style="background-color:#f14e4e;">Evénements</a>
        </div>
        <div id="bg">
            <img src="img/ville5.jpg" alt="">
        </div>
        <div id="form">
            <form action="/user" method="post" id="inscription">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <ul id="position">
                    <li><div id="yakayaller_title" style="padding-bottom:40px;">YAKAYALLER !</div></li>
                    <li><h2>Modifier mon profil</h2></li>
                    <li>
                        <label for="civility">Civilité :</label>
                        <select name="civility" id="civility">
                            <option value="Mr">Mr</option>
                            <option value="Mme">Mme</option>
                            <option value="Mlle">Mlle</option>
                        </select>
                    </li>
                    <li>
                        <label for="lastname">Nom :</label>
                        <input name="lastname" id="lastname" value="{{ $lastname }}" type="text" size="30" maxlength="255" />
                    </li>
                    <li>
                        <label for="firstname">Prénom :</label>
                        <input name="firstname" id="firstname" value="{{ $firstname }}" type="text" size="30" maxlength="255" />
                    </li>
                    <li>
                        <label for="phone">Téléphone :</label>
                        <input name="phone" id="phone" value="{{ $phone }}" type="text" size="30" maxlength="30"/>
                    </li>
                    <li>
                        <label for="email">Adresse mail:</label>
                        <input name="email" id="email" type="email" value="{{ $email }}" size="30" maxlength="255">
                    </li>
                    <li><a href="javascript:;" onclick="parentNode.parentNode.parentNode.submit();" class="button4" style="background-color:#f14e4e">Mettre à jour</a></li>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>