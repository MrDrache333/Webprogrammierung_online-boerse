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

            <li class="navibutton"><a href="profil.php" class="naviobjekt">Mein Profil</a></li>
            <li class="navibutton">
                <div class="active"><a href="contact.php" class="naviobjekt">Kontakt </a></div>
            </li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
        </ul>
</div>

<!--Kontaktformular-->
<div class="grid-farbe">
    <h1>Kontaktinformationen</h1>
    <div class="container">
        <div class="contact-row">

            <div class="contact-col">
                <div>

                    <h2 class="contact-h2">Adresse:</h2>
                    <p>Ammerländer Heerstraße 114-118, 26129 Oldenburg</p>
                    <ul class="list-unstyled">
                        <li class="contact-li"><input type="text" placeholder="Dein Name"></li>
                        <li class="contact-li"><input type="email" placeholder="Deine E-Mail"></li>
                        <li class="focontactoter-li"><input type="text" placeholder="Betreff"><a href="#" class="footer-link">
                        </li>
                        <li class="contact-li"><textarea name="Was möchtest du uns noch sagen" id="massagefield"
                                                        cols="20" rows="7" placeholder="Nachricht"></textarea></li>

                        <li class="contact-li"><a href="#"><span><input type="submit" value="absenden"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="contact-col">
                <div>

                    <h2 class="contact-h2">Telefon: </h2>
                    <p><a href="tel://1234567920"> +012-3456789</a></p>
                    <ul class="list-unstyled">
                        <li class="contact-li"></li>
                        <li class="contact-li"></li>
                        <li class="contact-li"></li>
                        <li class="contact-li"></li>
                    </ul>
                </div>
            </div>

            <div class="contact-col">
                <div>
                    <h2 class="contact-h2">Email:</h2>
                    <p><a href="mailto:info@kefedo.de">info@kefedo.de</a></p>
                    <ul class="list-unstyled">
                        <li class="contact-li"></li>
                        <li class="contact-li"></li>

                        <li class="contact-li"></li>
                        <li class="contact-li"></li>
                    </ul>
                </div>
            </div>
            <div class="contact-col">
                <div>
                    <h2 class="contact-h2">Website:</h2>
                    <p><a href="#">kefedo.de</a></p>
                    <div>
                        <ul class="list-unstyled">

                            <li class="contact-li"></li>
                            <li class="contact-li"></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<!--icludes footer -->
<?php include "footer.html"; ?>
</body>
</html>
