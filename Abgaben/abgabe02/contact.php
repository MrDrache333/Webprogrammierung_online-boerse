<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/global.css">
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

            <li class="navibutton"><a href="../../website_root/profil.php" class="naviobjekt">Mein Profil</a></li>
            <li class="navibutton">
                <div class="active"><a href="contact.php" class="naviobjekt">Kontakt </a></div>
            </li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
        </ul>
</div>

<!--Kontaktformular-->
<div class="content">
    <div class="footer-li"> Kontaktieren Sie uns!</div>
    <div class="container">
        <div class="contact-row">
            <div>
                <ul class="list-unstyled">
                    <li class="contact-li"><input type="text" placeholder="Dein Name"></li>
                    <li class="contact-li"><input type="email" placeholder="Deine E-Mail"></li>
                    <li class="contact-li"><input type="text" placeholder="Betreff"><a href="#" class="footer-link">
                    </li>
                    <li class="contact-li"><textarea name="Nachricht" id="massagefield"
                                                     cols="20" rows="7"
                                                     placeholder="Was möchtest du uns noch sagen?"></textarea></li>

                    <li class="contact-li"><a href="#"><span><input type="submit" value="Absenden"></span></a></li>
                </ul>
            </div>
        </div>
        <div class="contact-row">

            <div class="contact-col">
                <div>
                    <h2 class="contact-h2">Adresse:</h2>
                    <p>Ammerländer Heerstraße 114-118, 26129 Oldenburg</p>
                </div>
            </div>
            <div class="contact-col">
                <div>
                    <h2 class="contact-h2">Telefon: </h2>
                    <p><a href="tel://1234567920"> +012-3456789</a></p>
                    <ul class="list-unstyled">
                    </ul>
                </div>
            </div>
            <div class="contact-col">
                <div>
                    <h2 class="contact-h2">Email:</h2>
                    <p><a href="mailto:info@kefedo.de">info@kefedo.de</a></p>
                    <ul class="list-unstyled">
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!--icludes footer -->
<?php include "footer.html"; ?>
</body>
</html>
