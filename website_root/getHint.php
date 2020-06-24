<?php

use php\offer\OfferDAOImpl;

$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    //In Datenbank nach Einträgen suchen
    $OfferDAOImpl = new OfferDAOImpl();
    $result = $OfferDAOImpl->search($q, "", null, null, null);
    //Einträge anzeigen
    if ($result !== null) {
        $count = 0;
        foreach ($result as $offer) {
            $hint .= "<a href=\"#\" onclick=\"fillTextField(\"searchBox-what\"," . $offer->getTitle() . ");\">" . $offer->getTitle() . "</a>";
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "Keine Ergebnisse" : $hint;
