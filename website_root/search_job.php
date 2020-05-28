<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <link rel="stylesheet" type="text/css" href="styles/searchBox.css">
    <link rel="stylesheet" type="text/css" href="styles/search_job.css">

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
                <form class="searchBox">
                    <p class="searchBox-text">Wonach suchen Sie ?</p>
                    <input class="searchBox-input searchBox-item" type="text"
                           placeholder="Was? (z.B. Beruf oder Stichwort)"/>
                    <input class="searchBox-input searchBox-item" type="text" placeholder="Wo? (z.B. PLZ oder Ort)"/>
                    <a href="search_job.php" class="searchBox-button searchBox-button-text searchBox-item"><span
                                class="searchBox-button-gradient"></span>Suchen</a>
                </form>
            </div>
            <hr>
            <div class="jobs-content-dynamic">
                <div class="jobs-filter">
                    <form>
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
                                <h3 class="filter-h3">Arbeitszeitmodell</h3>
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
                    <article role="article">
                        <div class="article-content">
                            <h3 class="result-h3" role="heading">Template</h3>
                            <span>(SomeJob)</span>
                        </div>
                    </article>
                    <article role="article">
                        <div class="article-content">
                            <h3 class="result-h3" role="heading">Template</h3>
                            <span>(SomeJob)</span>
                        </div>
                    </article>
                    <article role="article">
                        <div class="article-content">
                            <h3 class="result-h3" role="heading">Template</h3>
                            <span>(SomeJob)</span>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.html"; ?>
</body>

</html>
