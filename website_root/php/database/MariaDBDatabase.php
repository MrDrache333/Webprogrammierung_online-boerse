<?php

namespace php\database;

use MongoDB\Driver\Exception\Exception;
use mysqli;

/**
 * Class MariaDBDatabase
 */
class MariaDBDatabase implements Database
{

    /**
     * @var string Der Servername
     */
    private $servername = "kog-nas.synology.me";
    /**
     * @var string Der Benutzername der Datenbank
     */
    private $username = "WP_admin";
    /**
     * @var string Das Benutzerpassword
     */
    private $password = "Webprogrammierung_2020";
    /**
     * @var string Die zu verwendene Datenbank
     */
    private $dbname = "Webprogrammierung";

    /**
     * @var Die Verbindung zur Datenbank
     */
    private $conn;

    /**
     * MariaDBDatabase constructor.
     */
    public function __construct()
    {
    }

    /**
     *  Versucht eine Verbindung zur Datenbank herzustellen
     */
    public function connect(): ?bool
    {
        // Create connection
        $this->conn = new mysqli();
        $this->conn->connect($this->servername, $this->username, $this->password, $this->dbname, 3307);
        // Check connection
        return (bool)$this->conn;
    }

    /**
     * @param $command String Der auszuführende Befehl
     * @return mixed Rückgabe des Befehls, oder null beim Fehler
     */
    public function execute($command)
    {
        if ($this->conn !== null) {
            try {
                return $this->conn->query($command);
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    public function exists(): ?bool
    {
        // TODO: Implement exists() method.
    }

    public function create(): ?bool
    {
        // TODO: Implement create() method.
    }

    public function disconnect(): ?bool
    {
        // TODO: Implement disconnect() method.
    }
}