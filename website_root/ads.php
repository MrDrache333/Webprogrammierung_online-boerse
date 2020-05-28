<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/ads.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">


    <title>KEFEDO-Profil</title>
</head>
<body>
<!--Header einbinden-->
<?php include "header.html"; ?>
<div class="header">
    <nav>
        <ul class="navi">
            <li class="navibutton"><a href="index.php" class="naviobjekt"> Startseite</a></li>
            <!--active Anzeige nur als TEst wie umsteztbar???-->
            <li class="navibutton">
              <a href="profil.php" class="naviobjekt"> Mein Profil</a>
            </li>
            <div class="active"> <li class="navibutton"> <a href="ads.php" class="naviobjekt"> Meine Anzeigen </a></li></div>
            <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
        </ul>

    </nav>
</div>
    <div class="grid-farbe">

            <div class "nachrichten">
<h3> Meine NAchrichten</h3>


</div>
<div class="anzeigen">
<h3> Meine Anzeigen</h3>

</div>







</div>


<?php include "footer.html"; ?>
</body>
</html>
