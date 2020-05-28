<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">

    <title>KEFEDO-Kontakt</title>

</head>
<body>
<!--icludes header -->
<?php include "header.html"; ?>
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
        <h2>Was liegt Ihnen noch auf dem Herzen?</h2>
        <form method="POST" class="contact-form" id="contact-form">
            <div class="contact-row">
                <input type="text" name="Vorname" id="firstname" placeholder="Dein Name" required autofocus>
            </div>
            <div class="contact-row">
                <input type="email" name="email" id="email" placeholder="Deine E-Mail" required autofocus>
            </div>
            <div class="contact-row">
                <input type="text" name="subject" id="subject" placeholder="Betreff" required autofocus>
            </div>
            <div class="contact-row">
                  <textarea name="message" id="messagearea"
                            cols="50" rows="7" placeholder="Was möchtest du uns mitteilen?"></textarea>
            </div>
            <div class="form-submit">
                <input type="submit" value="Senden" class="submit" name="submit" id="submit_contact"/>
            </div>
        </form>
    </div>
</div>
<!--icludes footer -->
<?php include "footer.html"; ?>
</body>
</html>
