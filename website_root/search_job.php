<?php include "header.php"; ?>
<div class="header">
    <ul class="navi">
        <?php
        if (isset($_COOKIE["loggedin"]) and $_COOKIE["loggedin"] === "true") { ?>
            <li class="navibutton">
                <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
            </li>
            <li class="navibutton"><a href="profil.php" class="naviobjekt"> Mein Profil</a></li>
            <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>
        <?php } else {
        ?>
        <li class="navibutton">
            <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
            <?php }
            ?>
        <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
        <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
    </ul>
</div>
<div class="content">
    <div class="container">
        <div class="jobs-content">
            <div class="jobs-search">
                <form class="searchBox" method="GET">
                    <p class="searchBox_text">Wonach suchen Sie ?</p>
                    <label for="searchBox_what" hidden>Was? (z.B. Beruf oder Stichwort)</label>
                    <input id="searchBox_what" name="what" class="searchBox_input searchBox_item" type="text"
                           placeholder="Was? (z.B. Beruf oder Stichwort)"
                           value="<?php echo $_GET['what'] ?? $_SESSION['ls_what'] ?? "" ?>"
                           onkeyup="showHint(this.value,0)" list="liveSearch_0" autocomplete="off"/>
                    <datalist id="liveSearch_0"></datalist>
                    <label for="searchBox_where" hidden>Wo? (z.B. PLZ oder Ort)</label>
                    <input id="searchBox_where" name="where" class="searchBox_input searchBox_item"
                           type="text"
                           placeholder="Wo? (z.B. PLZ oder Ort)"
                           value="<?php echo $_GET['where'] ?? $_SESSION['ls_where'] ?? "" ?>"
                           onkeyup="showHint(this.value,1)" list="liveSearch_1" autocomplete="off"/>
                    <datalist id="liveSearch_1"></datalist>
                    <button href="search_job.php" class="searchBox_button searchBox_button-text searchBox_item"
                            type="submit"><span
                                class="searchBox_button-gradient"></span>Suchen
                    </button>
                </form>
            </div>
            <hr>
            <div class="jobs-content-dynamic">
                <div class="jobs-filter">
                    <form method="GET">
                        <div class="filter-container">
                            <fieldset class="filter-fieldset">
                                <button type="submit">Filter anwenden</button>
                            </fieldset>
                            <fieldset class="filter-fieldset">
                                <h3 class="filter-h3">Angebotsart</h3>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_type_0" name="type8"
                                               value=8 <?php if (isset($_GET["type8"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Arbeit
                                    </label>
                                </div>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_type_1" name="type4"
                                               value=4 <?php if (isset($_GET["type4"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Ausbildung
                                    </label>
                                </div>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_type_2" name="type2"
                                               value=2 <?php if (isset($_GET["type2"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Praktikum
                                    </label>
                                </div>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_type_3" name="type1"
                                               value=1 <?php if (isset($_GET["type1"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Selbstständigkeit
                                    </label>
                                </div>
                            </fieldset>
                            <fieldset class="filter-fieldset">
                                <h3 class="filter-h3">Befristung</h3>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_duration_0" name="duration4"
                                               value=4 <?php if (isset($_GET["duration4"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Befristet
                                    </label>
                                </div>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_duration_1" name="duration2"
                                               value=2 <?php if (isset($_GET["duration2"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Unbefristet
                                    </label>
                                </div>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_duration_2" name="duration1"
                                               value=1 <?php if (isset($_GET["duration1"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Keine Angabe
                                    </label>
                                </div>
                            </fieldset>
                            <fieldset class="filter-fieldset">
                                <h3 class="filter-h3">Arbeitszeit</h3>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_time_0" name="time16"
                                               value=16 <?php if (isset($_GET["time16"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Vollzeit
                                    </label>
                                </div>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_time_1" name="time8"
                                               value=8 <?php if (isset($_GET["time8"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Teilzeit
                                    </label>
                                </div>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_time_2" name="time4"
                                               value=4 <?php if (isset($_GET["time4"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Schicht
                                    </label>
                                </div>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_time_3" name="time2"
                                               value=2 <?php if (isset($_GET["time2"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Heim- / Telearbeit
                                    </label>
                                </div>
                                <div class="filter-row">
                                    <label class="filter-cb-label filter-radio">
                                        <input type="checkbox" id="f_time_4" name="time1"
                                               value=1 <?php if (isset($_GET["time1"])) {
                                            echo "checked";
                                        } ?>>
                                        <i></i>
                                        Minijob
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
                <div class="jobs-result">
                    <?php include 'search.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="scripts/searchBox.js"></script>
<?php include "footer.php"; ?>

