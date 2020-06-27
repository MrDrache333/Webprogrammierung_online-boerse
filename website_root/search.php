<?php

use php\offer\Offer;
use php\offer\OfferDAOImpl;

include_once 'php/classes.php';
//Normale Suche (Startseite oder searchJob)
if (isset($_GET['what']) || isset($_GET['where'])) {
    //Suchbegriffe übernehmen oder leer setzen
    $what = htmlspecialchars($_GET['what']) ?? "";
    $where = htmlspecialchars($_GET['where']) ?? "";

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
    $result = $OfferDAOImpl->search($what, $where, null, null, null);
    //Einträge anzeigen
    displayResults($result);
    //Wenn gefiltert wurde, oder die Seite neugeladen wurde
} elseif (isset($_GET['type']) || isset($_GET['duration']) || isset($_GET['time']) || isset($_SESSION['ls_what']) || isset($_SESSION['ls_where'])) {
    //Filter laden, oder leeren
    $type = $_GET['type'] ?? null;
    $duration = $_GET['duration'] ?? null;
    $time = $_GET['time'] ?? null;
    //Prüfen, ob gültige Filterwerte übergeben wurden
    if (($type >= 0 && $type <= 3) && ($duration >= 0 && $duration <= 2) && ($time >= 0 && $time <= 4)) {

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

        //In Datenbank nach Einträgen suchen
        $OfferDAOImpl = new OfferDAOImpl();
        $result = $OfferDAOImpl->search($what, $where, $type, $duration, $time);

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
            foreach ($result as $offer) {
                $test = $offer->getId();
                $html = "<article role=\"article\" id=\"" . $offer->getId() . "\"> 
                        <div class=\"article-content\">
                            <div class=\"article-left\">
                                <div class=\"article-head\">
                                    <h3 class=\"result-h3\" role=\"heading\" id=\"article_head\">" . $offer->getTitle() . "</h3>
                                    <span class=\"result-h3-sub\" id=\"article_sub\">" . $offer->getSubTitle() . "</span>
                                </div>
                                <div class=\"article-company\">
                                    <img class=\"article-company-logo\" id=\"article-logo\"
                                         src=\"" . $offer->getLogo() . "\"
                                         alt=\"Firmenlogo\">
                                    <span class=\"article-company-name\">" . $offer->getCompanyName() . "</span>
                                </div>
                            </div>
                            <div class=\"article-right\">
                                <div class=\"article-info-row\">
                                    <div class=\"article-info-type\">Veröffentlichung:</div>
                                    <span class=\"article-info-value\" id=\"article_releaseDate\">" . $offer->getCreated() . "</span>
                                </div>
                                <div class=\"article-info-row\">
                                    <div class=\"article-info-type\">Frei ab:</div>
                                    <span class=\"article-info-value\" id=\"article_freeAt\">" . $offer->getFree() . "</span>
                                </div>
                         
                                <div class=\"article-info-row\">
                                    <div class=\"article-info-type\">Standort:</div>
                                    <div class=\"article-info-group\">
                                        <span class=\"article-info-value\"
                                              id=\"article_address_street\">" . $offer->getAddress()->getStreet() . " " . $offer->getAddress()->getNumber() . "</span>
                                        <span class=\"article-info-value\"
                                              id=\"article_address_plz\">" . $offer->getAddress()->getPlz() . " " . $offer->getAddress()->getTown() . "</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <a class=\"article-link\" id=\"article_link\" href=\"#\">Mehr Informationen</a> 
           
    
                    </article>";
                echo $html . "\n";
            }
        } else { ?>
            <div style="background: radial-gradient(circle at center, white 0,rgba(255,255,255,0.9) 60%,
                 rgba(255,255,255,0.5) 70%,transparent 90%); text-align: center; border-radius: 20px">
                <img style="display: inline-block; max-width: 60%" src="images/no_result.png" alt="Keine Ergebnisse">
            </div>;
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
