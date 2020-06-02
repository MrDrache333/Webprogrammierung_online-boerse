<?php

/**
 * Class Database
 */
class Database
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
     * Database constructor.
     */
    public function __construct()
    {
    }

    /**
     *  Versucht eine Verbindung zur Datenbank herzustellen
     */
    public function connect()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * @param $command String Der auszuführende Befehl
     * @return mixed Rückgabe des Befehls, oder null beim Fehler
     */
    public function execute($command)
    {
        if ($this->conn !== null) {
            return $this->conn->query($command);
        } else
            return null;
    }
}