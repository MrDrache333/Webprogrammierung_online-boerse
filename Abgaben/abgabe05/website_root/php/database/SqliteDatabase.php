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
    public function connect(): ?bool
    {
        if ($this->exists()) {
            $this->conn = new PDO('sqlite:../DB.sqlite3') or die("Cannot open the Database");
        } else {
            $this->conn = new PDO('sqlite:../DB.sqlite3') or die("Cannot open the Database");
            return $this->create();
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function exists(): ?bool
    {
        return file_exists('../DB.sqlite3');
    }

    /**
     * @inheritDoc
     */
    public function create(): ?bool
    {
        $commands = [
            "CREATE TABLE IF NOT EXISTS main.address (
                            ID INTEGER NOT NULL PRIMARY KEY autoincrement,
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
            "CREATE TABLE IF NOT EXISTS chatMessage(
                            id INTEGER NOT NULL PRIMARY KEY autoincrement,
                            sender INTEGER NOT NULL,
                            receiver INTEGER NOT NULL,
                            message VARCHAR(160) NOT NULL,
                            time DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            FOREIGN KEY(sender) REFERENCES user (id),
                            FOREIGN KEY(receiver) REFERENCES user (id)
                            
            );",
            "INSERT INTO user VALUES(0,'demo@demo.de','Max','Mustermann','" . password_hash('demo', PASSWORD_DEFAULT) . "')",
            "INSERT INTO user VALUES(1,'demo2@demo.de','Maxime','Musterfrau','" . password_hash('demo', PASSWORD_DEFAULT) . "')",
            "INSERT INTO address VALUES(0,'Deutschland','Musterstadt','Musterstraße',123,12345)",
            "INSERT INTO address VALUES(1,'Deutschland','Musterstadt','Musterstraße',124,12345)",
            "INSERT INTO address VALUES(2,'Deutschland','Musterstadt','Musterstraße',125,12345)",
            "INSERT INTO address VALUES(3,'Deutschland','Musterstadt','Musterstraße',125,12345)",
            "INSERT INTO address VALUES(4,'Deutschland','Musterstadt','Musterstraße',125,12345)",
            "INSERT INTO offers VALUES(0,'Verkäuferin (m/w/d)','Einzelhandel','MusterFirma','Wir suchen in absehbarer Zeit eine neue Aushilfe im Einzelhandel der Musterfirma-Reihe. Ein gepflegtes Aussehen und ein freundlicher Umgangston sind erwünscht.',0,'2020-06-20','2020-07-01',1,2,2,0)",
            "INSERT INTO offers VALUES(1,'Lagerist (m/w/d)','Baumarkt','YourCompany','Wir suchen in absehbarer Zeit eine neue Aushilfe im Lager einer unserer Großbaumärkte der YourCompany-Reihe. Ein gepflegtes Aussehen und ein freundlicher Umgangston sind erwünscht.',0,'2020-06-19','2020-07-15',2,2,3,0)",
            "INSERT INTO offers VALUES(2,'Reinigungsfachkraft (m/w/d)','Hotel','SomeSoft GmbH','Wir suchen in absehbarer Zeit eine neue Aushilfe im Einzelhandel der SomeSoft-Reihe. Ein gepflegtes Aussehen und ein freundlicher Umgangston sind erwünscht.',1,'2020-06-21','2020-08-01',1,1,1,0)",
            "INSERT INTO offers VALUES(3,'Apoteker (m/w/d)','Einzelhandel','Bayer','Wir suchen schnellst möglich einen neuen Apotker. Ein gepflegtes Aussehen und ein freundlicher Umgangston sind erwünscht.',0,'2020-06-20','2020-08-01',2,1,1,0)",
            "INSERT INTO offers VALUES(4,'Raupenzüchter (m/w/d)','Tierhandel','Co&Zoo','Wir sind pleite und suchen ein freundlicher Umgangston mit uns.',0,'2020-06-20','2020-08-01',1,2,1,0)",
            "INSERT INTO offers VALUES(5,'Türstopper (m/w/d)','Einzelhandel','BauschTörse','Wir von der Bauschtörse sind hilflos. Wir suchen neue Mitarbeiter dringend',0,'2020-06-20','2020-08-01',1,0,1,0)"

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
    public function disconnect(): ?bool
    {
        $this->conn = null;
    }

    /**
     * @inheritDoc
     */
    public function execute($command, $values)
    {
        if ($this->conn !== null && is_array($values) && is_string($command)) {
            try {
                $stm = $this->conn->prepare($command);
                $stm->execute($values);
                return $stm->fetchAll();
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