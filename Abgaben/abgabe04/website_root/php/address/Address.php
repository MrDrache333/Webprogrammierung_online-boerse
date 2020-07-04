<?php

namespace php\address;

class Address
{

    private $id;
    private $state;
    private $town;
    private $street;
    private $number;
    private $plz;

    /**
     * Address constructor.
     * @param $id
     * @param $state
     * @param $town
     * @param $street
     * @param $number
     * @param $plz
     */
    public function __construct($id, $state, $town, $street, $number, $plz)
    {
        $this->id = $id;
        $this->state = $state;
        $this->town = $town;
        $this->street = $street;
        $this->number = $number;
        $this->plz = $plz;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town): void
    {
        $this->town = $town;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street): void
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * @param mixed $plz
     */
    public function setPlz($plz): void
    {
        $this->plz = $plz;
    }


}