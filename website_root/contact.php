<!--includes header -->
<?php include "header.php"; ?>
<div class="header">
    <nav>
        <ul class="navi">
            <li class="navibutton"><a href="index.php" class="naviobjekt"> Startseite</a></li>
            <!--active Anzeige nur als TEst wie umsteztbar???-->

            <li class="navibutton"><a href="profil.php" class="naviobjekt">Mein Profil</a></li>
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
        <form method="POST" class="contact-form" id="contact-form">

            Dein Name:<br>
            <div class="contact-row">

                <input type="text" name="Vorname" id="firstname" placeholder="Max Mustermann" required autofocus>
            </div>
            Deine E-Mail:
            <div class="contact-row">
                <input class"emailfeld" type="email" name="email" id="email" placeholder="Max.mustermann@web.de"
                required autofocus>
            </div>
            Betreff:
            <div class="contact-row">

                <input type="text" name="subject" id="subject" placeholder="Tolle Seite" required autofocus>
            </div>
            Was möchtest du uns mitteilen:<br>
            <div class="contact-row">

                  <textarea name="message" id="messagearea"
                            cols="50" rows="7" placeholder="Ihr habt ne tolle Seite"></textarea>
            </div>
            <div class="form-submit">
                <input type="submit" value="Senden" class="submit" name="submit" id="submit_contact"/>
            </div>
        </form>
    </div>
</div>
<!--icludes footer -->
<?php include "footer.html"; ?>

