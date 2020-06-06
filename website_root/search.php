<?php
require 'OfferDAOImpl.php';
if (isset($_GET['what']) || isset($_POST['where'])) {
    $what = $_GET['what'] ?? "";
    $where = $_GET['where'] ?? "";

    $_SESSION['ls_what'] = $what;
    $_SESSION['ls_where'] = $where;
    $OfferDAOImpl = new OfferDAOImpl();
    $result = $OfferDAOImpl->search($what, $where, null, null, null);
    displayResults($result);
} elseif (isset($_GET['type']) || isset($_GET['duration']) || isset($_GET['time']) || isset($_SESSION['ls_what']) || isset($_SESSION['ls_where'])) {
    $type = $_GET['type'] ?? null;
    $duration = $_GET['duration'] ?? null;
    $time = $_GET['time'] ?? null;
    if (($type >= 0 && $type <= 3) && ($duration >= 0 && $duration <= 2) && ($time >= 0 && $time <= 4)) {

        $where = $_SESSION['ls_where'] ?? "";
        $what = $_SESSION['ls_what'] ?? "";

        $OfferDAOImpl = new OfferDAOImpl();
        $result = $OfferDAOImpl->search($what, $where, $type, $duration, $time);
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