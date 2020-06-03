<?php
include 'Offer.php';
require 'OfferDAO.php';

class OfferController implements OfferDAO
{
    /**
     * @var Database Datenbank
     */
    private $database;
    private AddressController $addressController;

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
        $command = "DELETE FROM offers WHERE id like '" . $id . "'";
        return $this->database->execute($command);
    }

    /**
     * @inheritDoc
     */
    public function update(Offer $offer)
    {
        // TODO: Implement update() method.
    }

    public function search($what, $where)
    {
        // TODO: Implement search() method.
    }
}