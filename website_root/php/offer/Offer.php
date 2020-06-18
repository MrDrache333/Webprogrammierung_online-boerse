<?php

namespace php\offer;

use php\address\Address;

class Offer
{

    private $id;
    private $title;
    private $subTitle;
    private $description;
    private $logo;
    private $address;
    private $created;
    private $free;
    private $companyName;
    private $offerType;
    private $duration;
    private $workModel;
    private $creator;


    /**
     * Offer constructor
     */
    public function __construct()
    {
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
        if (file_exists('images/logos/' . $this->getId() . '.png')) {
            $this->setLogo('images/logos/' . $this->getId() . '.png');
        } elseif (file_exists('images/logos/' . $this->getId() . '.jpg')) {
            $this->setLogo('images/logos/' . $this->getId() . '.jpg');
        } elseif (file_exists('images/logos/' . $this->getId() . '.jpeg')) {
            $this->setLogo('images/logos/' . $this->getId() . '.jpeg');
        } else {
            $this->setLogo('images/company_placeholder.png');
        }
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

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return mixed
     */
    public function getOfferType()
    {
        return $this->offerType;
    }

    /**
     * @param mixed $offerType
     */
    public function setOfferType($offerType): void
    {
        $this->offerType = $offerType;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getWorkModel()
    {
        return $this->workModel;
    }

    /**
     * @param mixed $workModel
     */
    public function setWorkModel($workModel): void
    {
        $this->workModel = $workModel;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param mixed $creator
     */
    public function setCreator($creator): void
    {
        $this->creator = $creator;
    }


}
