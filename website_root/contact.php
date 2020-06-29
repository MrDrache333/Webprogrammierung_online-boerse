<?php include "header.php"; ?>
<div class="header">
    <nav>
        <ul class="navi">
            <li class="navibutton"><a href="index.php" class="naviobjekt"> Startseite</a></li>
            <!--active Anzeige nur als TEst wie umsteztbar???-->


            <?php
            if (isset($_COOKIE["loggedin"]) and $_COOKIE["loggedin"] === "true") { ?>

                <li class="navibutton"><a href="profil.php" class="naviobjekt">Mein Profil</a></li>
                <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>
            <?php } ?>
            <li class="navibutton">
                <div class="active"><a href="contact.php" class="naviobjekt">Kontakt </a></div>
            </li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
        </ul>
</div>


<!--Kontaktformular-->
<div class="content">
    <div class="container contact-container">
        <h3>Was liegt Ihnen noch auf dem Herzen?</h3>
        <div class="contact-form">
            <form method="POST" id="contact-form">

                Dein Name:<br>
                <div class="contact-row">
                    <label for="firstname" hidden>Vorname</label>
                    <input type="text" name="name" id="firstname" placeholder="Max Mustermann" required autofocus>
                </div>
                Deine E-Mail:
                <div class="contact-row">
                    <label for="email" hidden>Nachname</label>
                    <input class="emailfeld" type="email" name="email" id="email" placeholder="Max.mustermann@web.de"
                           required autofocus>
                </div>
                Betreff:
                <div class="contact-row">

                    <label for="subject" hidden>Betreff</label>
                    <input id="subject" type="text" name="subject" placeholder="Tolle Seite" required autofocus>

                </div>
                Was möchtest du uns mitteilen:<br>
                <div class="contact-row">

                    <label for="messagearea" hidden>Deine Nachricht an uns</label>
                    <textarea name="message" id="messagearea"
                              cols="50" rows="7" placeholder="Ihr habt ne tolle Seite"></textarea>
                </div>
                <div class="form-submit">
                    <input type="submit" value="Senden" class="submit" name="submit" id="submit_contact"/>
                    <input type="reset" value="Löschen" class="submit delete" name="delete" id="submit_contact"/>
                </div>

                <?php
                if (isset($_POST["submit"])) {

                    $submit = $_POST["submit"];
                    date_default_timezone_set("Europe/Berlin");
                    $timestamp = time();
                    $absendermail = $_POST["email"];
                    $empfaenger = "dominik.luebben@uni-oldenburg.de";
                    $absendername = $_POST["name"];
                    $betreff = $_POST["subject"];
                    $text = "Die Person" . $absendername . "schireb um" . $timestamp . "folgendes:" . $_POST["message"];

                    if (mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>")) {

                        echo "Email wurde erfolgreich versendet.";

                    } else {

                        echo "Ihre Anfrage konnte nicht gesendet werden!";

                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>


<!--icludes footer -->
<?php include "footer.html"; ?>

