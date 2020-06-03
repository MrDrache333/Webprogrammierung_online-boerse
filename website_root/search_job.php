<!--Header einbinden-->
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
            </li>
            <li class="navibutton"><a href="index.php" class="naviobjekt"> Mein Profil</a></li>


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
                    <input id="searchBox-what" name="searchBox-what" class="searchBox-input searchBox-item" type="text"
                           placeholder="Was? (z.B. Beruf oder Stichwort)"/>
                    <label for="searchBox-where" hidden>Wo? (z.B. PLZ oder Ort)</label>
                    <input id="searchBox-where" name="searchBox-where" class="searchBox-input searchBox-item"
                           type="text"
                           placeholder="Wo? (z.B. PLZ oder Ort)"/>
                    <button href="search_job.php" class="searchBox-button searchBox-button-text searchBox-item"
                            type="sumbit" name="searchjob-searchBox"><span
                                class="searchBox-button-gradient"></span>Suchen
                    </button>
                </form>
            </div>
            <hr>
            <div class="jobs-content-dynamic">
                <div class="jobs-filter">
                    <form method="post" name="searchjob-filter">
                        <div class="filter-container">
                            <fieldset class="filter-fieldset">
                                <h3 class="filter-h3">Angebotsart</h3>
                                <div class="filter-row">
                                    <input type="radio" id="f-type-1" name="type">
                                    <label class="filter-cb-label" for="f-type-1">Arbeit</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f-type-2" name="type">
                                    <label class="filter-cb-label" for="f-type-2">Ausbildung</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f-type-3" name="type">
                                    <label class="filter-cb-label" for="f-type-3">Praktikum</label>
                                </div>
                                <div class="filter-row">
                                    <input type="radio" id="f-type-4" name="type">
                                    <label class="filter-cb-label" for="f-type-4">Selbstständigkeit</label>
                                </div>
                            </fieldset>
                            <fieldset class="filter-fieldset">
                                <h3 class="filter-h3">Befristung</h3>
                                <div class="filter-row">
                                    <input type="checkbox" id="f-duration-1">
                                    <label class="filter-cb-label" for="f-duration-1">Befristet</label>
                                </div>
                                <div class="filter-row">
                                    <input type="checkbox" id="f-duration-2">
                                    <label class="filter-cb-label" for="f-duration-2">Unbefristet</label>
                                </div>
                                <div class="filter-row">
                                    <input type="checkbox" id="f-duration-3">
                                    <label class="filter-cb-label" for="f-duration-3">Keine Angabe</label>
                                </div>
                            </fieldset>
                            <fieldset class="filter-fieldset">
                                <h3 class="filter-h3">Arbeitszeit</h3>
                                <div class="filter-row">
                                    <input type="checkbox" id="f-time-1">
                                    <label class="filter-cb-label" for="f-time-1">Vollzeit</label>
                                </div>
                                <div class="filter-row">
                                    <input type="checkbox" id="f-time-2">
                                    <label class="filter-cb-label" for="f-time-2">Teilzeit</label>
                                </div>
                                <div class="filter-row">
                                    <input type="checkbox" id="f-time-3">
                                    <label class="filter-cb-label" for="f-time-3">Schicht</label>
                                </div>
                                <div class="filter-row">
                                    <input type="checkbox" id="f-time-4">
                                    <label class="filter-cb-label" for="f-time-4">Heim- / Telearbeit</label>
                                </div>
                                <div class="filter-row">
                                    <input type="checkbox" id="f-time-5">
                                    <label class="filter-cb-label" for="f-time-5">Minijob</label>
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

