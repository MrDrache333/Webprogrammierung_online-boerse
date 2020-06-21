<?php include "header.php"; ?>
<?php if ($_SESSION["error"] == "loggout") {

    echo "Sie wurden zwischenzeitlich ausgeloggt. Bitte Loggen Sie sich wieder ein um weiter zu verfahren.";
    unset($_SESSION["error"]);
} else {
}
?>
<div class="header">
    <ul class="navi">

        <?php
        if (isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"] === "true") { ?>

            <li class="navibutton">
                <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
            </li>
            <li class="navibutton"><a href="profil.php" class="naviobjekt"> Mein Profil</a></li>
            <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>
        <?php } else {
            ?>
            <li class="navibutton">
                <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
            </li>
        <?php }
        ?>
        <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
        <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
    </ul>
</div>

<div class="content">
    <form class="searchBox" method="GET" action="search_job.php">
        <div class="searchBox-grid">
            <p class="searchBox-text">Wonach suchen Sie ?</p>
            <label for="searchBox-what" hidden>Was? (z.B. Beruf oder Stichwort)</label>
            <input id="searchBox-what" name="what" class="searchBox-input searchBox-item" type="text"
                   placeholder="Was? (z.B. Beruf oder Stichwort)"/>
            <label for="searchBox-where" hidden>Wo? (z.B. PLZ oder Ort)</label>
            <input id="searchBox-where" name="where" class="searchBox-input searchBox-item" type="text"
                   placeholder="Wo? (z.B. PLZ oder Ort)"/>
        </div>
        <button href="search_job.php" class="searchBox-button searchBox-button-text searchBox-item"
                type="sumbit"><span
                    class="searchBox-button-gradient"></span>Suchen
        </button>
    </form>
</div>
<?php include "footer.html"; ?>

