<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/global.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>KEFEDO-Startseite</title>
</head>
<body>
<?php include "header.html"; ?>
<div class="header">
    <ul class="navi">
        <li class="navibutton">
            <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
        </li>  <!--active Anzeige nur als TEst wie umsteztbar???-->

        <li class="navibutton"><a href="profil.php" class="naviobjekt"> Mein Profil</a></li>
        <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
        <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
    </ul>
</div>
<div class="content">
    <form class="searchBox">
        Wonach suchen Sie ? <input class="searchBox-input" type="text" placeholder="z.B. Programmierer"></input>
        <select class="searchBox-select">
            <option disabled selected value="">Kategorie</option>
            <option value="">Vollzeit</option>
            <option value="">Teilzeit</option>
            <option value="">Freiberufler</option>
            <option value="">Praktikum</option>
            <option value="">Befristet</option>
        </select>
        </label>
        <input class="searchBox-button" type="submit" value="Suchen">
    </form>
</div>
<?php include "footer.html"; ?>
</body>
</html>
