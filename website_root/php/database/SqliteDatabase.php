<?php


namespace php\database;

use PDO;
use PDOException;

class SqliteDatabase implements Database
{
    /**
     * @var PDO Verbindung zur Datenbank
     */
    private $conn;

    /**
     * SqliteDatabase constructor.
     */
    public function __construct()
    {
    }


    /**
     * @inheritDoc
     */
    public function exists(): ?bool
    {
        // TODO: Implement exists() method.
    }

    /**
     * @inheritDoc
     */
    public function create(): ?bool
    {
        $commands = [
            "CREATE TABLE IF NOT EXISTS main.address (
                            id INTEGER NOT NULL PRIMARY KEY autoincrement,
                            state VARCHAR(30) NOT NULL,
                            town VARCHAR(30) NOT NULL,
                            street VARCHAR(50) NOT NULL,
                            number INTEGER(10) NOT NULL,
                            plz INTEGER(10) NOT NULL
                            );",
            "CREATE TABLE IF NOT EXISTS main.offers (
                            id INTEGER NOT NULL PRIMARY KEY autoincrement,
                            title VARCHAR(50) NOT NULL,
                            subtitle VARCHAR(50) NOT NULL,
                            companyName VARCHAR(50) DEFAULT NULL,
                            description VARCHAR(2000) DEFAULT NULL,
                            logo VARCHAR(2000) DEFAULT NULL,
                            address INTEGER NOT NULL,
                            created DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            free DATE DEFAULT NULL,
                            offerType INTEGER(1) NOT NULL,
                            duration INTEGER(1) DEFAULT NULL,
                            workModel INTEGER(1) DEFAULT NULL,
                            creator INTEGER NOT NULL,
                            FOREIGN KEY(address) REFERENCES address (id),
                            FOREIGN KEY(creator) REFERENCES user (id)
                            
                            );",
            "CREATE TABLE IF NOT EXISTS main.user (
                            id INTEGER NOT NULL PRIMARY KEY autoincrement,
                            email VARCHAR(50) NOT NULL UNIQUE,
                            prename VARCHAR(30) DEFAULT NULL,
                            surname VARCHAR(50) DEFAULT NULL,
                            password VARCHAR(30) DEFAULT NULL
                            );",
        ];

        foreach ($commands as $command) {
            try {
                $result = $this->conn->exec($command);
                if ($result === false) {
                    $errors = $this->conn->errorInfo();
                    foreach ($errors as $error) {
                        print $error;
                    }
                }
            } catch (PDOException $e) {
                print $e;
                return false;
            }

        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function connect(): ?bool
    {
        $this->conn = new PDO('sqlite:DB.sqlite3') or die("Cannot open the Database");
        return $this->create();
    }

    /**
     * @inheritDoc
     */
    public function disconnect(): ?bool
    {
        $this->conn = null;
    }

    /**
     * @inheritDoc
     */
    public function execute($command)
    {
        if ($this->conn !== null) {
            try {
                $stm = $this->conn->prepare($command);
                $this->conn->beginTransaction();
                $result = $stm->execute();
                $this->conn->commit();
                return $result;
            } catch (PDOException $e) {
                print $e;
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function query($command)
    {
        if ($this->conn !== null) {
            try {
                return $this->conn->query($command);
            } catch (PDOException $e) {
                print $e;
                return false;
            }
        } else {
            return false;
        }
    }
}