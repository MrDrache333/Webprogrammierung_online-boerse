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
        $values = [];
        foreach ($result as $offer) {
            if ($id === "0") {
                if (strpos($offer->getTitle(), $q) !== false) {
                    $values[] = $offer->getTitle();
                }
                if (strpos($offer->getSubTitle(), $q) !== false) {
                    $values[] = $offer->getSubTitle();
                }
            } else {
                $state = $offer->getAddress()->getState();
                $town = $offer->getAddress()->getTown();
                $street = $offer->getAddress()->getStreet();
                $number = $offer->getAddress()->getNumber();
                $plz = $offer->getAddress()->getPlz();
                if (strpos($state, $q) !== false) {
                    $values[] = $state;
                }
                if (strpos($town, $q) !== false) {
                    $values[] = $town;
                }
                if (strpos($street, $q) !== false) {
                    $values[] = $street;
                }
                if (strpos($number, $q) !== false) {
                    $values[] = $number;
                }
                if (strpos($plz, $q) !== false) {
                    $values[] = $plz;
                }
            }
        }
        $values = array_unique($values);
        foreach ($values as $value) {
            $hint .= "<option value=\"" . $value . "\"/>";
        }
    }
}
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "<option value=\"Keine Ergebnisse\" disabled/>" : $hint;
