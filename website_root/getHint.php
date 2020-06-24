<?php

use php\offer\OfferDAOImpl;

include_once 'php/classes.php';
$q = $_REQUEST["q"];
$id = $_REQUEST["i"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    //In Datenbank nach Einträgen suchen
    $OfferDAOImpl = new OfferDAOImpl();
    $result = $OfferDAOImpl->search($id === "0" ? $q : "", $id === "1" ? $q : "", null, null, null);
    //Einträge anzeigen
    if ($result !== null) {
        foreach ($result as $offer) {
            if ($id === "0") {
                if (strpos($offer->getTitle(), $q) !== false) {
                    $hint .= "<option value=\"" . $offer->getTitle() . "\"/>";
                }
                if (strpos($offer->getSubTitle(), $q) !== false) {
                    $hint .= "<option value=\"" . $offer->getSubTitle() . "\"/>";
                }
            } else {
                $state = $offer->getAddress()->getState();
                $town = $offer->getAddress()->getTown();
                $street = $offer->getAddress()->getStreet();
                $number = $offer->getAddress()->getNumber();
                $plz = $offer->getAddress()->getPlz();
                if (strpos($state, $q) !== false) {
                    $hint .= "<option value=\"" . $state . "\"/>";
                }
                if (strpos($town, $q) !== false) {
                    $hint .= "<option value=\"" . $town . "\"/>";
                }
                if (strpos($street, $q) !== false) {
                    $hint .= "<option value=\"" . $street . "\"/>";
                }
                if (strpos($number, $q) !== false) {
                    $hint .= "<option value=\"" . $number . "\"/>";
                }
                if (strpos($plz, $q) !== false) {
                    $hint .= "<option value=\"" . $plz . "\"/>";
                }
            }
        }
    }
}
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "Keine Ergebnisse" : $hint;
