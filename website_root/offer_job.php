<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/global.css">

    <title>KEFEDO-Anzeige-erstellen</title>
</head>
<body>
<div>
    <?php include "header.html"; ?>
    <div class="header">

        <ul class="navi">
            <li class="navibutton"><a href="index.php" class="naviobjekt"> Startseite</a></li>
            <!--active Anzeige nur als TEst wie umsteztbar???-->
            <li class="navibutton"><a href="search_job.php" class="naviobjekt"> Job suchen </a></li>
            <li class="navibutton">
                <div class="active"><a href="offer_job.php" class="naviobjekt"> Anzeige erstellen</a></div>
            </li>
            <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
        </ul>
    </div>
    <div class="grid-farbe">
        <div>
            Anzeigen Name: <label>
                <input type="text" placeholder=""/>
            </label>
        </div>
        <div>
            Beschreibung: <label>
                <input type="text" placeholder=""/>
            </label>
        </div>
        <div>
            Hier Bild einfügen <a href="offer_job.php"> <input type="button" value="Bild hochladen"></a></input>
        </div>
        <div>
            <input type="submit" value="Anzeige freischalten"/>
        </div>
        <div>
            <input type="reset" value="Zurücksetzen"/>
        </div>
    </div>
    <?php include "footer.html"; ?>
</div>

</body>
</html>
