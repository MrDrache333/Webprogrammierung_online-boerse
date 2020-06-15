<?php

namespace php\database;

class DatabaseController
{
    //Zu nutzende Datenbank (SQLITE oder MARIADB)
    private static $USED_TYPE = "SQLITE";

    private static $database;

    /**
     * DatabaseController constructor.
     */
    public function __construct()
    {

        if (self::$USED_TYPE === "MARIADB") {
            self::$database = new MariaDBDatabase();
        } elseif (self::$USED_TYPE === "SQLITE") {
            self::$database = new SqliteDatabase();
        }
    }

    /**
     * @return MariaDBDatabase|SqliteDatabase
     */
    public static function getDatabase()
    {
        return self::$database;
    }

}

