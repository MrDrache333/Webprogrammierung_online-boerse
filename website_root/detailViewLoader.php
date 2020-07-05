<?php

use php\mapquest\MapQuest;
use php\offer\OfferDAOImpl;

if (isset($_GET["showId"]) && is_numeric($_GET["showId"])) {
    $id = $_GET["showId"];

    $controller = new OfferDAOImpl();
    $offer = $controller->getOfferByID($id);

    //Wenn vorheriger Error -> entfernen
    if (isset($_SESSION["showId_errorCode"])) {
        unset($_SESSION["showId_errorCode"]);
    }

    //Wenn Eintrag in Datenbank enthalten und erfolgreich ausgelesen
    if ($offer !== null) {
        $adr = $offer->getAddress();
        $location = MapQuest::query($adr->getStreet() . " " . $adr->getNumber() . ", " . $adr->getPlz() . " " . $adr->getTown());

        switch ($offer->getOfferType()) {
            case 0:
            {
                $workType = "Arbeit";
                break;
            }
            case 1:
            {
                $workType = "Ausbildung";
                break;
            }
            case 2:
            {
                $workType = "Praktikum";
                break;
            }
            case 3:
            {
                $workType = "Selbstständigkeit";
                break;
            }
        }
        switch ($offer->getDuration()) {
            case 0:
            {
                $workDuration = "Befristet";
                break;
            }
            case 1:
            {
                $workDuration = "Unbefristet";
                break;
            }
            case 2:
            {
                $workDuration = "Keine Angabe";
                break;
            }
        }
        switch ($offer->getWorkModel()) {
            case 0:
            {
                $workModel = "Vollzeit";
                break;
            }
            case 1:
            {
                $workModel = "Teilzeit";
                break;
            }
            case 2:
            {
                $workModel = "Schicht";
                break;
            }
            case 3:
            {
                $workModel = "Heim-/ Telearbeit";
                break;
            }
            case 4:
            {
                $workModel = "Minijob";
                break;
            }
        }
    } else {
        setErrorCode(404);
    }

}

function setErrorCode($code)
{
    $_SESSION["showId_errorCode"] = $code;
}
