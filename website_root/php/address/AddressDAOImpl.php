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
        $command = "insert into address(state, town, street, number, plz)  values (?,?,?,?,?)";
        $values = [$address->getState(), $address->getTown(), $address->getStreet(), $address->getNumber(), $address->getPlz()];
        return $this->database->execute($command, $values) !== null;
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $command = "DELETE FROM address WHERE ID=?";
        return $this->database->execute($command, [$id]);
    }

    /**
     * @inheritDoc
     */
    public function update(Address $address)
    {
        $command = "UPDATE address SET town = ? , street=? , number=? , plz=? where ID=?";
        $values = [$address->getTown(), $address->getStreet(), $address->getNumber(), $address->getPlz(), $address->getId()];
        return $this->database->execute($command, $values) !== null;
    }

    public function findAddressId(Address $address)
    {
        $command = "SELECT * FROM address WHERE state=? AND town=? AND street=? AND number=? AND plz=?";
        $values = [$address->getState(), $address->getTown(), $address->getStreet(), $address->getNumber(), $address->getPlz()];
        return AddressHelper::getAddressFromSQLResult($this->database->execute($command, $values));
    }


}