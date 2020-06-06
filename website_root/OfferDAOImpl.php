<?php
require 'Offer.php';
require 'OfferDAO.php';
require 'AddressDAOImpl.php';
require 'Database.php';

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

        $this->database = new Database();
        try {
            $this->database->connect();
        } catch (Exception $e) {
        }

        $this->addressDAOImpl = new AddressDAOImpl($this->database);
    }

    public function create(Offer $offer)
    {
        $this->addressController->create($offer->getAddress());
        $addressId = $this->addressController->findAddressId($offer->getAddress());
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

    public function search($what, $where, $type, $duration, $time)
    {
        //Standardfilter erstellen
        $command = "SELECT * FROM offers, address WHERE offers.id = address.id";
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
        return $this->database->execute($command);
    }


}