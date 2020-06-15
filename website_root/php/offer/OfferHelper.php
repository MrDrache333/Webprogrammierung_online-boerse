<?php


namespace php\offer;

use PDORow;
use php\address\Address;

/**
 * Helpermethods to Convert between Formats etc.
 * @package php\offer
 */
class OfferHelper
{

    /**
     * Converts an entire SQL-Result-Set to a Offer-Array
     * @param $result PDORow The SQL-Result
     * @return Offer|array|null
     */
    public static function getOffersFromSQLResult($result): ?array
    {
        $offers = [];
        if ($result !== null) {
            foreach ($result as $row) {
                $offer = self::getOfferFromSQLResultRow($row);
                if ($offer !== null) {
                    $offers[] = $offer;
                }
            }
            if (sizeof($offers) === 0) {
                return $offers;
            }
            return $offers;
        }
        return null;
    }

    /**
     * Converts one SQL-Result-Row to a Offer-Object
     * @param $result array The SQL-Result Row-Array
     * @return Offer|null
     */
    private static function getOfferFromSQLResultRow($result): ?Offer
    {
        $offer = new Offer();
        $offer->setId($result['id'] ?? null);
        if ($offer->getId() === null) return null;
        $offer->setTitle($result['title'] ?? null);
        $offer->setSubTitle($result['subtitle'] ?? null);
        $offer->setCompanyName($result['companyName'] ?? null);
        $offer->setDescription($result['description'] ?? null);
        $offer->setLogo($result['logo'] ?? null);
        $offer->setAddress(new Address(
            $result['address.id'] ?? null,
            $result['state'] ?? null,
            $result['town'] ?? null,
            $result['street'] ?? null,
            $result['number'] ?? null,
            $result['plz'] ?? null
        ));
        $offer->setCreated($result['created'] ?? null);
        $offer->setFree($result['free'] ?? null);
        $offer->setOfferType($result['offerType'] ?? null);
        $offer->setDuration($result['duration'] ?? null);
        $offer->setWorkModel($result['workModel'] ?? null);
        $offer->setCreator($result['creator'] ?? null);
        return $offer;
    }

}