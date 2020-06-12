<?php

namespace php\address;

use php\database\Database;

class AddressDAOImpl implements AddressDAO
{
    /**
     * @var Database Datenbank
     */
    private $database;

    /**
     * OfferController constructor.
     * @param Database $database
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
        $command = "insert into address values (" .
            0 . ",'" .
            ($address->getState()) . "','" .
            ($address->getTown()) . "','" .
            ($address->getStreet()) . "'," .
            ($address->getNumber()) . ",'" .
            ($address->getPlz()) .
            "')";
        $command = str_replace(array(",,", "''"), array(",null,", "null"), $command);
        return $this->database->execute($command) !== null;
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $command = "DELETE FROM address WHERE id='" . $id . "'";
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
        $command = "SELECT * FROM address WHERE state='" . $address->getState() . "' AND town='" . $address->getTown() . "' AND street='" . $address->getStreet() . "' AND number='" . $address->getNumber() . "'";
        return AddressHelper::getAddressFromSQLResult($this->database->execute($command));
    }
}