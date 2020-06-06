<?php
include 'Address.php';
require 'AddressDAO.php';

class AddressDAOImpl implements AddressDAO
{
    /**
     * @var Database Datenbank
     */
    private $database;

    /**
     * OfferController constructor.
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * @inheritDoc
     */
    public function create(Address $address)
    {
        $command = "insert into address values (null," .
            $address->getState() . "," .
            $address->getTown() . "," .
            $address->getStreet() . "," .
            $address->getNumber() . "," .
            $address->getPlz() .
            ")";
        return $this->database->execute($command) !== null;
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $command = "DELETE FROM address WHERE id like '" . $id . "'";
        return $this->database->execute($command);
    }

    /**
     * @inheritDoc
     */
    public function update(Address $address)
    {
        // TODO: Implement update() method.
    }

    public function findAddressId(Address $address)
    {
        // TODO: Implement findAddressId() method.
    }
}