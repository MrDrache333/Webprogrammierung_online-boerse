<?php
include 'Offer.php';
require 'OfferDAO.php';
require 'AddressController.php';
require 'Database.php';

class OfferController implements OfferDAO
{
    /**
     * @var Database Datenbank
     */
    private $database;
    private $addressController;

    /**
     * OfferController constructor.
     */
    public function __construct()
    {

        $this->database = new Database();
        try {
            $this->database->connect();
        } catch (\mysql_xdevapi\Exception $e) {
            print $e->getMessage();
        }
        $this->addressController = new AddressController($this->database);
    }


    /**
     * @inheritDoc
     */
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

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $command = "DELETE FROM offers WHERE id = '" . $id . "'";
        return $this->database->execute($command);
    }

    /**
     * @inheritDoc
     */
    public function update(Offer $offer)
    {
        // TODO: Implement update() method.
    }

    /** @noinspection NotOptimalIfConditionsInspection */
    public function search($what, $where, $type, $duration, $time)
    {
        $command = "SELECT * FROM offers, address WHERE offers.id = address.id";
        if ($what !== "") {
            $command .= " AND (title like '%" . $what . "%' OR subtitle like '%" . $what . "%' OR description like '%" . $what . "%')";
        }
        if ($where !== "") {
            $command .= " AND (plz like '%" . $where . "%' OR town like '%" . $where . "%')";
        }
        if ($type !== null) {
            $command .= " AND offerType=" . $type;
        }
        if ($duration !== null) {
            $command .= " AND duration=" . $duration;
        }
        if ($time !== null) {
            $command .= " AND workModel=" . $time;
        }

        return $this->database->execute($command);
    }


}