<?php

class Offer
{

    private $id;
    private $title;
    private $subTitle;
    private $description;
    private $logo;
    private Address $address;
    private $created;
    private $free;

    /**
     * Offer constructor.
     * @param $id
     * @param $title
     * @param $subTitle
     * @param $description
     * @param $logo
     * @param Address $address
     * @param $created
     * @param $free
     */
    public function __construct($id, $title, $subTitle, $description, $logo, Address $address, $created, $free)
    {
        $this->id = $id;
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->description = $description;
        $this->logo = $logo;
        $this->address = $address;
        $this->created = $created;
        $this->free = $free;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * @param mixed $subTitle
     */
    public function setSubTitle($subTitle): void
    {
        $this->subTitle = $subTitle;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getFree()
    {
        return $this->free;
    }

    /**
     * @param mixed $free
     */
    public function setFree($free): void
    {
        $this->free = $free;
    }
}
