<?php include "header.php"; ?>
    <noscript>Sie Haben Javascript aus. Einige Funktionen stehen deshalb nihct zur Verfügung</noscript>

<?php
if (isset($_SESSION["error"])) {
    echo $_SESSION["error"];
    unset($_SESSION["error"]);
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
            <div class="searchBox_grid">
                <p class="searchBox_text">Wonach suchen Sie ?</p>
                <label for="searchBox_what" hidden>Was? (z.B. Beruf oder Stichwort)</label>
                <input id="searchBox_what" name="what" class="searchBox_input searchBox_item" type="text"
                       placeholder="Was? (z.B. Beruf oder Stichwort)"
                       list="liveSearch_0"
                       autocomplete="off"/>
                <datalist id="liveSearch_0"></datalist>
                <label for="searchBox_where" hidden>Wo? (z.B. PLZ oder Ort)</label>
                <input id="searchBox_where" name="where" class="searchBox_input searchBox_item" type="text"
                       placeholder="Wo? (z.B. PLZ oder Ort)" list="liveSearch_1"
                       autocomplete="off"/>
                <datalist id="liveSearch_1"></datalist>
            </div>
            <button href="search_job.php" class="searchBox_button searchBox_button-text searchBox_item"
                    type="sumbit"><span
                        class="searchBox_button-gradient"></span>Suchen
            </button>
        </form>
    </div>
    <script src="scripts/searchBox.js"></script>
<?php include "footer.html"; ?>