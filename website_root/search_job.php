<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">

    <title>KEFEDO-Job-suchen</title>
</head>
<body>
<!--Header einbinden-->

<?php include "header.html"; ?>
<div class="header">

    <ul class="navi">
        <li class="navibutton"><a href="index.php" class="naviobjekt"> Startseite</a></li>
        <!--active Anzeige nur als TEst wie umsteztbar???-->

        <li class="navibutton"><a href="profil.php" class="naviobjekt"> Mein Profil</a></li>
        <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
        <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
    </ul>


</div>
<!--Searchbox-->
<div class="grid-farbe">
    <form>
        <div>
            <div>
                Wonach suchen Sie ? <input type="text" placeholder="z.B. Programmierer"></input>
            </div>
            <div>
                <select>
                    <option disabled selected value="">Kategorie</option>
                    <option value="">Vollzeit</option>
                    <option value="">Teilzeit</option>
                    <option value="">Freiberufler</option>
                    <option value="">Praktikum</option>
                    <option value="">Befristet</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Suchen">
            </div>
        </div>

    </form>

</div>
<?php include "footer.html"; ?>
</body>

</html>
