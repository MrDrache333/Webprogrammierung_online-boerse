<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/global.css">

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
                <div class="active"><a href="../../website_root/profil.php" class="naviobjekt"> Mein Profil</a></div>
            </li>
            <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
        </ul>

    </nav>
</div>
<div class="grid-farbe">
    <!--Searchbox-->
    <h1> Mein Profil</h1>
    <div class="container">
        <div class="contact-row">

            <div class="contact-col">
                <div>

                    <h2 class="footer-h2">Meine Daten</h2>
                    <ul class="list-unstyled">
                        <li class="footer-li">Vorname: <input type="text" placeholder="Max"></li>
                        <li class="footer-li">Nachname: <input type="text" placeholder="Mustermann"></li>
                        <li class="footer-li">Email: <input type="text" placeholder="max.mustermann@123.de"></li>
                        <li class="footer-li">Straße: <input type="text" placeholder="Musterstraße 12"></li>
                        <li class="footer-li">Postleizahl: <input type="text" placeholder="12345 Musterstadt"></li>
                        <li class="footer-li"><input type="submit" value="Daten sichern"><input type="submit"
                                                                                                value="Konto löschen">
                        </li>
                    </ul>

                </div>
            </div>


            <div class="contact-col">
                <div>
                    <h2 class="footer-h2">Meine Anzeigen</h2>
                    <p>At vero eos et accusam et justo duo dolores et ea rebum.
                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut labore et dolore magna aliquyam erat,
                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                        gubergren,
                        no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

                </div>
            </div>

        </div>
    </div>
    </form>
</div>


</div><?php include "footer.html"; ?>
</body>
</html>
