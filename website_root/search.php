<?php

use php\offer\OfferDAOImpl;

include_once 'php/classes.php';
//Normale Suche (Startseite oder searchJob)
if (isset($_GET['what']) || isset($_GET['where'])) {
    //Suchbegriffe übernehmen oder leer setzen
    $what = $_GET['what'] ?? "";
    $where = $_GET['where'] ?? "";

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

        //In Datenbank nach Einträgen suchen
        $OfferDAOImpl = new OfferDAOImpl();
        $result = $OfferDAOImpl->search($what, $where, $type, $duration, $time);
        //Ergebnisse anzeigen
        displayResults($result);
    }
}

/**
 * @param mysqli_result $result Ergebnisse der Datenbankabfrage
 */
function displayResults($result)
{

    if ($result !== null && !is_bool($result)) {
        $count = 0;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $count++;
            $html = "<article role=\"article\" id=\"" . $row['id'] . "\">
                        <div class=\"article-content\">
                            <div class=\"article-left\">
                                <div class=\"article-head\">
                                    <h3 class=\"result-h3\" role=\"heading\" id=\"article_head\">" . $row['title'] . "</h3>
                                    <span class=\"result-h3-sub\" id=\"article_sub\">" . $row['subtitle'] . "</span>
                                </div>
                                <div class=\"article-company\">
                                    <img class=\"article-company-logo\" id=\"article-logo\"
                                         src=\"images/company_placeholder.png\"
                                         alt=\"Firmenlogo\">
                                    <span class=\"article-company-name\">" . $row['companyName'] . "</span>
                                </div>
                            </div>
                            <div class=\"article-right\">
                                <div class=\"article-info-row\">
                                    <div class=\"article-info-type\">Veröffentlichung:</div>
                                    <span class=\"article-info-value\" id=\"article_releaseDate\">" . $row['created'] . "</span>
                                </div>
                                <div class=\"article-info-row\">
                                    <div class=\"article-info-type\">Frei ab:</div>
                                    <span class=\"article-info-value\" id=\"article_freeAt\">" . $row['free'] . "</span>
                                </div>
                                <div class=\"article-info-row\">
                                    <div class=\"article-info-type\">Standort:</div>
                                    <div class=\"article-info-group\">
                                        <span class=\"article-info-value\"
                                              id=\"article_address_street\">" . $row['street'] . " " . $row['number'] . "</span>
                                        <span class=\"article-info-value\"
                                              id=\"article_address_plz\">" . $row['plz'] . " " . $row['town'] . "</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class=\"article-link\" id=\"article_link\" href=\"#\">Mehr Informationen</a>
                    </article>";
            echo $html . "\n";
        }
        if ($count === 0) {
            echo "<div style=\"background: radial-gradient(circle at center, white 0,rgba(255,255,255,0.9) 60%, rgba(255,255,255,0.5) 70%,transparent 90%); text-align: center; border-radius: 20px\">
                        <img style=\"display: inline-block; max-width: 60%\" src=\"images/no_result.png\" alt=\"Keine Ergebnisse\">
                    </div>";
        }
    } else {
        echo "<div style=\"background: radial-gradient(circle at center, white 0,rgba(255,255,255,0.9) 60%,
                         rgba(255,255,255,0.5) 70%,transparent 90%); text-align: center; border-radius: 20px\">
                        <h1 style=\"padding-top: 10%\">Fehler beim Abrufen der Daten</h1>
                        <img style=\"max-width: 60%; margin-top: -10%\" src=\"images/error.png\" alt=\"Fehler beim Abrufen der Daten\">
                    </div>";
    }
}