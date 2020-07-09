<?php


namespace php\mapquest;


class Location
{

    private $long;
    private $lat;

    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param mixed $long
     */
    public function setLong($long): void
    {
        $this->long = $long;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat): void
    {
        $this->lat = $lat;
    }


}