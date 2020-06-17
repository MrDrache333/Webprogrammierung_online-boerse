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
            echo $e;
        }

        $this->addressDAOImpl = new AddressDAOImpl($this->database);
    }

    public function create(Offer $offer)
    {
        /*
         * ERRORCODES
         * 1 = Fehler beim Eintragen der Addresse in die Datenbank
         * 2 = Fehler beim Finden der Addresse in der Datenbank
         * 3 = Fehler beim EIntragen der Anzeige in die Datenbank
         */
        $address = $this->addressDAOImpl->findAddressId($offer->getAddress());
        if ($address === null || sizeof($address) === 0) {
            $address = $this->addressDAOImpl->create($offer->getAddress());
            if ($address !== null) {
                $address = $this->addressDAOImpl->findAddressId($offer->getAddress());
            } else {
                return 1;
            }
        }
        $address = $address[0];
        if ($address !== null) {
            $offer->getAddress()->setId($address->getId());
            $command = "insert into offers(title, subtitle, companyName, description, logo, address, created, free, offerType, duration, workModel, creator) values (" .
                "'" .
                ($offer->getTitle()) . "','" .
                ($offer->getSubTitle()) . "','" .
                ($offer->getCompanyName()) . "','" .
                ($offer->getDescription()) . "','" .
                ($offer->getLogo()) . "'," .
                ($offer->getAddress()->getId()) . ",'" .
                ($offer->getCreated()) . "','" .
                ($offer->getFree()) . "'," .
                ($offer->getOfferType()) . "," .
                ($offer->getDuration()) . "," .
                ($offer->getWorkModel()) . "," .
                ($offer->getCreator()) .
                ")";
            $command = str_replace(array(",,", "''"), array(",null,", "null"), $command);
            return ($this->database->execute($command) !== null) ? true : 3;
        }
        return 2;
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
        return OfferHelper::getOffersFromSQLResult($this->database->query($command));
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
        return OfferHelper::getOffersFromSQLResult($this->database->query($command));
    }

    /**
     * @return AddressDAOImpl
     */
    public function getAddressDAOImpl(): AddressDAOImpl
    {
        return $this->addressDAOImpl;
    }

    /**
     * @param $id
     * @return array|mixed|Offer|null
     */
    public function getOfferByID($id)
    {
        $command = "select * from offer where id='" . $id . "'";
        return OfferHelper::getOffersFromSQLResult($this->database->query($command));
    }
}