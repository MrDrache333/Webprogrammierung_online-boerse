<?php
require 'OfferController.php';
if (isset($_GET['searchjob-searchBox']) || isset($_POST['index-searchBox'])) {
    $what = "";
    $where = "";
    if (isset($_GET['searchBox-what'])) {
        $what = $_GET['searchBox-what'];
    }
    if (isset($_GET['searchBox-where'])) {
        $where = $_GET['searchBox-where'];
    }

    if (isset($_POST['searchBox-what'])) {
        $what = $_POST['searchBox-what'];
    }
    if (isset($_POST['searchBox-where'])) {
        $where = $_POST['searchBox-where'];
    }
    $offerController = new OfferController();
    $result = $offerController->search($what, $where, null, null, null);
    displayResults($result);
} elseif (isset($_GET['searchjob-filter'])) {
    $type = $_GET['type'];
    $duration = $_GET['duration'];
    $time = $_GET['time'];
    if (($type >= 0 && $type <= 3) && ($duration >= 0 && $duration <= 2) && ($type >= 0 && $type <= 4)) {

        $where = "";
        $what = "";
        /*
        if (isset($_COOKIE['lastSearch_what'],$_COOKIE['lastSearch_where'])){
            $where=$_COOKIE['lastSearch_where'];
            $what=$_COOKIE['lastSearch_what'];
        }
        */
        $offerController = new OfferController();
        $result = $offerController->search($what, $where, $type, $duration, $time);
        displayResults($result);
    }
}

function displayResults($result)
{
    if ($result !== null) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
    }
}