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
<!--Searchbox-->
<div class="content">
    <div class="container">
        <div class="jobs-content">
            <div class="jobs-search">
                <form class="searchBox" method="GET">
                    <p class="searchBox-text">Wonach suchen Sie ?</p>
                    <label for="searchBox-what" hidden>Was? (z.B. Beruf oder Stichwort)</label>
                    <input id="searchBox-what" name="what" class="searchBox-input searchBox-item" type="text"
                           placeholder="Was? (z.B. Beruf oder Stichwort)"
                           value="<?php echo $_GET['what'] ?? $_SESSION['ls_what'] ?? "" ?>"
                           onkeyup="showHint(this.value,0)" list="liveSearch_0" autocomplete="off"/>
                    <datalist id="liveSearch_0"></datalist>
                    <label for="searchBox-where" hidden>Wo? (z.B. PLZ oder Ort)</label>
                    <input id="searchBox-where" name="where" class="searchBox-input searchBox-item"
                           type="text"
                           placeholder="Wo? (z.B. PLZ oder Ort)"
                           value="<?php echo $_GET['where'] ?? $_SESSION['ls_where'] ?? "" ?>"
                           onkeyup="showHint(this.value,1)" list="liveSearch_1" autocomplete="off"/>
                    <datalist id="liveSearch_1"></datalist>
                    <button href="search_job.php" class="searchBox-button searchBox-button-text searchBox-item"
                            type="submit"><span
                                class="searchBox-button-gradient"></span>Suchen
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
                                    <input type="radio" id="f_type_0" name="type"
                                           value=0 <?php echo ($_GET['type'] ?? "") === "0" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_type_0">Arbeit</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f_type_1" name="type"
                                           value=1 <?php echo ($_GET['type'] ?? "") === "1" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_type_1">Ausbildung</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f_type_2" name="type"
                                           value=2 <?php echo ($_GET['type'] ?? "") === "2" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_type_2">Praktikum</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f_type_3" name="type"
                                           value=3 <?php echo ($_GET['type'] ?? "") === "3" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_type_3">Selbstständigkeit</label>
                                </div>
                            </fieldset>
                            <fieldset class="filter-fieldset">
                                <h3 class="filter-h3">Befristung</h3>
                                <div class="filter-row">
                                    <input type="radio" id="f_duration_0" name="duration"
                                           value=0 <?php echo ($_GET['duration'] ?? "") === "0" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_duration_0">Befristet</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f_duration_1" name="duration"
                                           value=1 <?php echo ($_GET['duration'] ?? "") === "1" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_duration_1">Unbefristet</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f_duration_2" name="duration"
                                           value=2 <?php echo ($_GET['duration'] ?? "") === "2" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_duration_2">Keine Angabe</label>
                                </div>
                            </fieldset>
                            <fieldset class="filter-fieldset">
                                <h3 class="filter-h3">Arbeitszeit</h3>
                                <div class="filter-row">
                                    <input type="radio" id="f_time_0" name="time"
                                           value=0 <?php echo ($_GET['time'] ?? "") === "0" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_time_0">Vollzeit</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f_time_1" name="time"
                                           value=1 <?php echo ($_GET['time'] ?? "") === "1" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_time_1">Teilzeit</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f_time_2" name="time"
                                           value=2 <?php echo ($_GET['time'] ?? "") === "2" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_time_2">Schicht</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f_time_3" name="time"
                                           value=3 <?php echo ($_GET['time'] ?? "") === "3" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_time_3">Heim- / Telearbeit</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f_time_4" name="time"
                                           value=4 <?php echo ($_GET['time'] ?? "") === "4" ? "checked" : "" ?>>
                                    <label class="filter-cb-label" for="f_time_4">Minijob</label>
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
<?php include "footer.html"; ?>

