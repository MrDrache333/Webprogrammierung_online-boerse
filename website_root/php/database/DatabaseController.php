<?php

namespace php\database;

class DatabaseController
{
    private static $database;

    /**
     * DatabaseController constructor.
     */
    public function __construct()
    {
        self::$database = new SqliteDatabase();
    }

    /**
     * @return SqliteDatabase
     */
    public static function getDatabase(): SqliteDatabase
    {
        return self::$database;
    }

}

