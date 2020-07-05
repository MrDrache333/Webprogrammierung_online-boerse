<?php


namespace php\mapquest;


use JsonException;

/**
 * Class MapQuest
 * @package php\mapquest
 */
class MapQuest
{

    /**
     * @var string
     */
    private static $API_KEY = "RI48jOUIknB81sRtwlNpHGMCWQBGZDur";

    /**
     * @param $q
     */
    public static function query($q): ?Location
    {
        $jsonurl = "http://open.mapquestapi.com/nominatim/v1/search.php?key=" . self::$API_KEY . "&format=json&q=" . urlencode($q) . "&addressdetails=0&limit=1&countrycodes=DE&osm_type=N";
        $reporting = error_reporting();
        error_reporting(null);
        $json = file_get_contents($jsonurl);
        error_reporting($reporting);
        try {
            $json = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            return null;
        }
        return self::getLocationFromJson($json);
    }

    /**
     * @param $json
     * @return Location|null
     */
    private static function getLocationFromJson($json): ?Location
    {
        if (is_array($json)) {
            $first = current($json);
            if (isset($first["lat"], $first["lon"])) {
                $location = new Location();
                $location->setLat($first["lat"]);
                $location->setLong($first["lon"]);
                return $location;
            }
        }
        return null;
    }

}