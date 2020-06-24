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
                $hint .= "<option value=\"" . $offer->getTitle() . "\"/>";
            } else {
                $value = "";
                $state = $offer->getAddress()->getState();
                $town = $offer->getAddress()->getTown();
                $street = $offer->getAddress()->getStreet();
                $number = $offer->getAddress()->getNumber();
                $plz = $offer->getAddress()->getPlz();
                if (strpos($state, $q) !== false) {
                    $value = $state;
                } elseif (strpos($town, $q) !== false) {
                    $value = $town;
                } elseif (strpos($street, $q) !== false) {
                    $value = $street;
                } elseif (strpos($number, $q) !== false) {
                    $value = $number;
                } elseif (strpos($plz, $q) !== false) {
                    $value = $plz;
                }
                $hint .= "<option value=\"" . $value . "\"/>";
            }
        }
    }
}
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "Keine Ergebnisse" : $hint;
