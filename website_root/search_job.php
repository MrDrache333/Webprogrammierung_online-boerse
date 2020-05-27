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
<div class="content">
    <div class="container">
        <div class="jobs-content">
            <div class="jobs-search">
                <form>

                </form>
            </div>
            <div class="jobs-filter">
                <form>

                </form>
            </div>
            <div class="jobs-result">

            </div>
        </div>
    </div>
</div>
<?php include "footer.html"; ?>
</body>

</html>
