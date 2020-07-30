<?php

use php\offer\Offer;
use php\offer\OfferDAOImpl;

include_once 'php/classes.php';

if (!isset($_SESSION["searchStartWith"])) {
    $_SESSION["searchStartWith"] = 0;
}
if (isset($_GET["startWith"])) {
    $start = (int)htmlspecialchars($_GET["startWith"]);
    if ($start >= 0) {
        //Vorherige Suchbegriffe laden
        $where = $_SESSION['ls_where'] ?? "";
        $what = $_SESSION['ls_what'] ?? "";
        $type = $_SESSION['searchType'] ?? 0;
        $duration = $_SESSION['searchDuration'] ?? 0;
        $time = $_SESSION['searchTime'] ?? 0;

        //In Datenbank nach Einträgen suchen
        $OfferDAOImpl = new OfferDAOImpl();
        $result = $OfferDAOImpl->search($what, $where, $type, $duration, $time, $start);
        $_SESSION["searchStartWith"] = $start;
        //Ergebnisse anzeigen
        displayResults($result);
    } else {
        //Ergebnisse anzeigen
        displayResults(null);
    }
} //Normale Suche (Startseite oder searchJob)
elseif (isset($_GET['what']) || isset($_GET['where'])) {
    $_SESSION["searchStartWith"] = 0;
    //Suchbegriffe übernehmen oder leer setzen
    $what = htmlspecialchars($_GET['what']) ?? "";
    $where = htmlspecialchars($_GET['where']) ?? "";

    $_SESSION["searchType"] = 0;
    $_SESSION["searchDuration"] = 0;
    $_SESSION["searchTime"] = 0;


    if (!isValidInput($what) || !isValidInput($where)) {
        $where = "";
        $what = "";
        unset($_GET['what'], $_GET['where']);
        echo '<script>
                document.getElementById("searchBox_where").value = "";
                document.getElementById("searchBox_what").value = "";
                alert("Deine Suche ist ungültig.\nBitte verwende nur: Großbuchstaben, Kleinbuchstaben, Nummern, Umlaute bis zu einer Länge von max. 50 Zeichen")
              </script>';
        displayResults([]);
        exit();
    }

    //Suchbegriffe für evtl. spätere Filterung speichern
    $_SESSION['ls_what'] = $what;
    $_SESSION['ls_where'] = $where;
    //In Datenbank nach Einträgen suchen
    $OfferDAOImpl = new OfferDAOImpl();
    $result = $OfferDAOImpl->search($what, $where, null, null, null, $_SESSION["searchStartWith"]);
    //Einträge anzeigen
    displayResults($result);
    //Wenn gefiltert wurde, oder die Seite neugeladen wurde
} elseif (isset($_GET['type1']) || isset($_GET['type2']) || isset($_GET['type4']) || isset($_GET['type8']) || isset($_GET['duration1']) || isset($_GET['duration2']) || isset($_GET['duration4']) || isset($_GET['time1']) || isset($_GET['time2']) || isset($_GET['time4']) || isset($_GET['time8']) || isset($_GET['time16']) || isset($_SESSION['ls_what']) || isset($_SESSION['ls_where'])) {
    $_SESSION["searchStartWith"] = 0;
    //Filter laden, oder leeren
    $type = ($_GET['type1'] ?? 0) + ($_GET['type2'] ?? 0) + ($_GET['type4'] ?? 0) + ($_GET['type8'] ?? 0);
    $duration = ($_GET['duration1'] ?? 0) + ($_GET['duration2'] ?? 0) + ($_GET['duration4'] ?? 0);
    $time = ($_GET['time1'] ?? 0) + ($_GET['time2'] ?? 0) + ($_GET['time4'] ?? 0) + ($_GET['time8'] ?? 0) + ($_GET['time16'] ?? 0);
    //Prüfen, ob gültige Filterwerte übergeben wurden
    if (($type >= 0 && $type <= 15) && ($duration >= 0 && $duration <= 8) && ($time >= 0 && $time <= 31)) {

        //Vorherige Suchbegriffe laden
        $where = $_SESSION['ls_where'] ?? "";
        $what = $_SESSION['ls_what'] ?? "";

        if (!isValidInput($what) || !isValidInput($where)) {
            $where = "";
            $what = "";
            unset($_GET['what'], $_GET['where']);
            echo '<script>
                document.getElementById("searchBox_where").value = "";
                document.getElementById("searchBox_what").value = "";
                alert("Deine Suche ist ungültig.\nBitte verwende nur: Großbuchstaben, Kleinbuchstaben, Nummern, Umlaute bis zu einer Länge von max. 50 Zeichen")
              </script>';
            displayResults([]);
            exit();
        }

        $_SESSION["searchType"] = $type;
        $_SESSION["searchDuration"] = $duration;
        $_SESSION["searchTime"] = $time;

        //In Datenbank nach Einträgen suchen
        $OfferDAOImpl = new OfferDAOImpl();
        $result = $OfferDAOImpl->search($what, $where, $type, $duration, $time, $_SESSION["searchStartWith"]);

        //Ergebnisse anzeigen
        displayResults($result);
    }
}

function isValidInput($input)
{
    return preg_match('/^([\w\x{C4}\x{E4}\x{D6}\x{F6}\x{DC}\x{FC}\x{DF}\x{2F}\x{29}\x{28}\s]){0,50}$/u', $input);
}

/**
 * @param Offer[] $result Ergebnisse der Datenbankabfrage
 */
function displayResults($result)
{

    if ($result !== null) {
        if (sizeof($result) > 0) {
            if (isset($_SESSION["maxResults"])) {
                if ($_SESSION["maxResults"] < $result[0]->getId()) {
                    $_SESSION["maxResults"] = $result[0]->getId();
                }
            } else {
                $_SESSION["maxResults"] = $result[0]->getId();
            }
            foreach ($result as $offer) {
                ?>
                <article role="article" id="<?php echo $offer->getId(); ?>">
                    <div class="article-content">
                        <div class="article-left">
                            <div class="article-head">
                                <h3 class="result-h3" role="heading"
                                    id="article_head"><?php echo $offer->getTitle(); ?></h3>
                                <span class="result-h3-sub" id="article_sub"><?php echo $offer->getSubTitle(); ?></span>
                            </div>
                            <div class="article-company">
                                <img class="article-company-logo" id="article-logo"
                                     src="<?php echo $offer->getLogo(); ?>"
                                     alt="Firmenlogo">
                                <span class="article-company-name"><?php echo $offer->getCompanyName(); ?></span>
                            </div>
                        </div>
                        <div class="article-right">
                            <div class="article-info-row">
                                <div class="article-info-type">
                                    <span class="material-icons">today</span> Veröffentlichung:
                                </div>
                                <span class="article-info-value"
                                      id="article_releaseDate"><?php echo $offer->getCreated(); ?></span>
                            </div>
                            <div class="article-info-row">
                                <div class="article-info-type"><span class="material-icons">event</span> Frei ab:</div>
                                <span class="article-info-value"
                                      id="article_freeAt"><?php echo $offer->getFree(); ?></span>
                            </div>
                            <div class="article-info-row">
                                <div class="article-info-type"><span class="material-icons">location_on</span> Standort:
                                </div>
                                <div class="article-info-group">
                                        <span class="article-info-value"
                                              id="article_address_street"><?php echo $offer->getAddress()->getStreet() . " "; ?><?php echo $offer->getAddress()->getNumber(); ?></span>
                                    <span class="article-info-value"
                                          id="article_address_plz"><?php echo $offer->getAddress()->getPlz() . " "; ?><?php echo $offer->getAddress()->getTown(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="article-link" href="detailView.php?showId=<?php echo $offer->getId(); ?>">Mehr
                        Informationen<br><span class="material-icons">expand_more</span> </a>
                </article>
                <?php
            }
            ?>
            <div class="nextSideButtons">
                <?php
                if ($_SESSION["searchStartWith"] !== 0 && $result[0]->getId() < $_SESSION["maxResults"]) {
                    ?>
                    <form method="GET">
                        <label for="previousSite" hidden>Vorherige Seite</label>
                        <input type="hidden" value="<?php echo($result[0]->getId() + 6) ?>" name="startWith">
                        <button class="nextSideButton" id="previousSite" type="submit"><span class="center"><span
                                        class="material-icons">arrow_back</span> Vorherige Seite</span></button>
                    </form>
                    <?php
                }
                if (sizeof($result) === 5) {
                    ?>
                    <form method="GET">
                        <label for="nextSite" hidden>Nächste Seite</label>
                        <input type="hidden" value="<?php echo($result[sizeof($result) - 1]->getId() - 1) ?>"
                               name="startWith">
                        <button class="nextSideButton" id="nextSite" type="submit"><span
                                    class="center">Nächste Seite <span
                                        class="material-icons">arrow_forward</span></span></button>
                    </form>
                    <?php
                }
                ?>
            </div>
            <?php
        } else { ?>
            <div style="background: radial-gradient(circle at center, white 0,rgba(255,255,255,0.9) 60%,
                 rgba(255,255,255,0.5) 70%,transparent 90%); text-align: center; border-radius: 20px">
                <img style="display: inline-block; max-width: 60%" src="images/no_result.png" alt="Keine Ergebnisse">
            </div>
            <?php
        }
    } else { ?>

        <div style="background: radial-gradient(circle at center, white 0,rgba(255,255,255,0.9) 60%,
        rgba(255,255,255,0.5) 70%,transparent 90%); text-align: center; border-radius: 20px">
            <h1 style="padding-top: 10%">Fehler beim Abrufen der Daten</h1>
            <img style="max-width: 60%; margin-top: -10%" src="images/error.png" alt="Fehler beim Abrufen der Daten">
        </div>
        <?php
    }

}
