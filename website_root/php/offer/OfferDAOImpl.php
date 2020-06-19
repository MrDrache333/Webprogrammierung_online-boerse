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
            $command = "insert into offers(title, subtitle, companyName, description, address, created, free, offerType, duration, workModel, creator) values (?,?,?,?,?,?,?,?,?,?,?)";
            $values = [$offer->getTitle(), $offer->getSubTitle(), $offer->getCompanyName(), $offer->getDescription(), $offer->getAddress()->getId(), $offer->getCreated(), $offer->getFree(), $offer->getOfferType(), $offer->getDuration(), $offer->getWorkModel(), $offer->getCreator()];
            return ($this->database->execute($command, $values) !== null) ? true : 3;
        }
        return 2;
    }

    public function delete($id)
    {
        $command = "DELETE FROM offers WHERE id =?";
        $values = [$id];
        return $this->database->execute($command, $values);
    }

    public function update($offer)
    {

        $command = "UPDATE offers SET title=?, subtitle=?, companyname=?, description=?,free=?,offerType=?,duration=?,workModel=? WHERE id=?";
        $values = [$offer->getTitle(), $offer->getSubTitle(), $offer->getCompanyName(), $offer->getDescription(), $offer->getFree(), $offer->getOfferType(), $offer->getDuration(), $offer->getWorkModel(), $offer->getId()];
        return $this->database->execute($command, $values);
    }

    public function getOwnOffers($user)
    {

        if ($user->getId() === null) return null;
        //Standardfilter erstellen
        $command = "SELECT * FROM offers, address WHERE offers.address = address.id AND creator=?";
        $values = [$user->getId()];
        //Datenbank abfragen und Ergebnis zurückgeben
        return OfferHelper::getOffersFromSQLResult($this->database->execute($command, $values));
    }

    public function search($what, $where, $type, $duration, $time)
    {
        //Standardfilter erstellen
        $command = "SELECT * FROM offers, address WHERE offers.address = address.ID";
        $values = [];
        //Wenn nach einem begriff gesucht werden soll
        if ($what !== "") {
            $command .= " AND (title like ? OR subtitle like ? OR description like ?)";
            $what = '%' . $what . '%';
            array_push($values, $what, $what, $what);
        }
        //Wenn nach einem Ort gesucht werden soll
        if ($where !== "") {
            $command .= " AND (plz like ? OR town like ?)";
            $where = '%' . $where . '%';
            array_push($values, $where, $where);
        }
        //Wenn nach einem bestimmten Arbeitstyp gesucht werden soll
        if ($type !== null) {
            $command .= " AND offerType=?";
            $values[] = $type;
        }
        //Wenn nach einer bestimmten Befristung gesucht werden soll
        if ($duration !== null) {
            $command .= " AND duration=?";
            $values[] = $duration;
        }
        //wenn nach einem bestimmten Arbeitszeitmodel gesucht werden soll
        if ($time !== null) {
            $command .= " AND workModel=?";
            $values[] = $time;
        }
        //Datenbank abfragen und Ergebnis zurückgeben
        return OfferHelper::getOffersFromSQLResult($this->database->execute($command, $values));
    }

    /**
     * @return AddressDAOImpl
     */
    public function getAddressDAOImpl(): AddressDAOImpl
    {
        return $this->addressDAOImpl;
    }

    /**
     * Gibt die Anzeige zurück, die unter der übergebenen ID übergeben wurde
     * @param $id
     * @return Offer|null
     */
    public function getOfferByID($id): ?Offer
    {
        $command = "SELECT * FROM offers, address WHERE offers.id=? AND offers.address = address.ID";
        $values = [$id];
        $offers = OfferHelper::getOffersFromSQLResult($this->database->execute($command, $values));
        if (is_array($offers)) {
            return current($offers);
        }
        return $offers;
    }
}