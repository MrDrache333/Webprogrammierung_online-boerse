<?php
include "header.php";
include "messages_loader.php";
?>
<div class="header">
    <nav>
        <ul class="navi">
            <li class="navibutton"><a href="index.php" class="naviobjekt"> Startseite</a></li>
            <!--active Anzeige nur als TEst wie umsteztbar???-->
            <li class="navibutton">
                <a href="profil.php" class="naviobjekt"> Mein Profil</a>
            </li>
            <li class="navibutton">
                <div class="active"><a href="messages.php" class="naviobjekt"> Meine Anzeigen </a></div>
            </li>
            <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt">Impressum </a></li>
        </ul>

    </nav>
</div>
<div class="grid-farbe">
    <div class="content">
        <div class="button_field">
            <a href="new_offer.php" name="button_new_offer" class="button_new_offer" id="button_new_offer">Neue Anzeige
                erstellen</a>
        </div>
        <div class="offers_content">
            <?php
            //Einträge anzeigen1
            displayResults($result);
            ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>

