<?php include "header.php"; ?>
<div class="navileiste">


    <ul class="navi">
        <li class="navibutton">
            <a href="index.php" class="naviobjekt"> Startseite</a>
        </li>

        <?php
        if (isset($_COOKIE["loggedin"]) and $_COOKIE["loggedin"] === "true") { ?>

            <li class="navibutton">
                <a href="profil.php" class="naviobjekt"> Mein Profil</a>
            </li>
            <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>

        <?php } ?>
        <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
        <li class="navibutton">
            <div class="navibutton"><a href="impressum.php" class="naviobjekt">Impressum</a></div>
        </li>
    </ul>
</div>
<div class="grid-farbe">
    <div class="content impressum">
        <div class="impressumContent">
            <h1>Datenschutz</h1>
            <div class="impressumContainer">
                <div class="contact-row">
                    <div class="contact-col">
                    <h3>Datenschutz und Verwendung von Cookies</h3>
                        <p>Diese Datenschutzerklärung informiert über Art, Umfang und Zweck der Verarbeitung personenbezogener Daten durch die verantworltiche Anbieter KeFeDo GmbH, vertreten durch den Vorstand, Ammerländer Heerstraße 114-118, 26129 Oldenburg, auf dieser Website.</p>
                        <h4>1. Webangebot: Verwendung von Logfiles und Cookies</h4>


                        <p>Quelle: <a href="https://www.arbeitsagentur.de/datei/Datenschutzerklaerung_ba018190.pdf">Agentur für Arbeit</a>  Ähnlich zu
                                KEFEDO</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>

