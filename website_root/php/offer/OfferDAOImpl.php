<?php

namespace php\offer;

use Exception;
use php\address\AddressDAOImpl;
use php\database\Database;
use php\database\DatabaseController;

/**
 * Class OfferDAOImpl
 */
class OfferDAOImpl implements OfferDAO
{

    /**
     * @var Database Datenbank
     */
    private $database;
    /**
     * @var AddressDAOImpl
     */
    private $addressDAOImpl;

    /**
     * OfferDAOImpl constructor.
     */
    public function __construct()
    {

        $databaseController = new DatabaseController();
        $this->database = $databaseController::getDatabase();
        try {
            $this->database->connect();
        } catch (Exception $e) {
        }

        $this->addressDAOImpl = new AddressDAOImpl($this->database);
    }

    public function create(Offer $offer)
    {
        $this->addressDAOImpl->create($offer->getAddress());
        $addressId = $this->addressDAOImpl->findAddressId($offer->getAddress());
        $command = "insert into offers values (" .
            $offer->getTitle() . "," .
            $offer->getSubTitle() . "," .
            $offer->getDescription() . "," .
            $offer->getLogo() . "," .
            $offer->$addressId . "," .
            $offer->getCreated() . "," .
            $offer->getFree() . "," .
            ")";
        return $this->database->execute($command) !== null;
    }

    public function delete($id)
    {
        $command = "DELETE FROM offers WHERE id = '" . $id . "'";
        return $this->database->execute($command);
    }

    public function update(Offer $offer)
    {
        // TODO: Implement update() method.
    }

    public function getOwnOffers($user)
    {

        if ($user->getId() === null) return null;
        //Standardfilter erstellen
        $command = "SELECT * FROM offers, address WHERE offers.address = address.id AND creator=" . $user->getId();
        //Datenbank abfragen und Ergebnis zurückgeben
        return OfferHelper::getOffersFromSQLResult($this->database->execute($command));
    }

    public function search($what, $where, $type, $duration, $time)
    {
        //Standardfilter erstellen
        $command = "SELECT * FROM offers, address WHERE offers.address = address.id";
        //Wenn nach einem begriff gesucht werden soll
        if ($what !== "") {
            $command .= " AND (title like '%" . $what . "%' OR subtitle like '%" . $what . "%' OR description like '%" . $what . "%')";
        }
        //Wenn nach einem Ort gesucht werden soll
        if ($where !== "") {
            $command .= " AND (plz like '%" . $where . "%' OR town like '%" . $where . "%')";
        }
        //Wenn nach einem bestimmten Arbeitstyp gesucht werden soll
        if ($type !== null) {
            $command .= " AND offerType=" . $type;
        }
        //Wenn nach einer bestimmten Befristung gesucht werden soll
        if ($duration !== null) {
            $command .= " AND duration=" . $duration;
        }
        //wenn nach einem bestimmten Arbeitszeitmodel gesucht werden soll
        if ($time !== null) {
            $command .= " AND workModel=" . $time;
        }

        //Datenbank abfragen und Ergebnis zurückgeben
        return OfferHelper::getOffersFromSQLResult($this->database->execute($command));
    }


}