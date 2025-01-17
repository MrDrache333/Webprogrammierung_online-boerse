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
                            newemail VARCHAR(50) DEFAULT NULL,
                            prename VARCHAR(30) DEFAULT NULL,
                            surname VARCHAR(50) DEFAULT NULL,
                            link VARCHAR(50) DEFAULT NULL,
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

            "INSERT INTO user VALUES(0,'demo@demo.de',null,'Max','Mustermann',null,'" . password_hash('demo', PASSWORD_DEFAULT) . "')",
            "INSERT INTO user VALUES(1,'demo2@demo.de',null,'Maxime','Musterfrau',null,'" . password_hash('demo', PASSWORD_DEFAULT) . "')",
            "INSERT INTO user VALUES(2,'test@test.de',null,'Tim','Fellon',null,'" . password_hash('test', PASSWORD_DEFAULT) . "')",
            "INSERT INTO user VALUES(3,'test2@test.de',null,'Rosa','Fellon',null,'" . password_hash('test', PASSWORD_DEFAULT) . "')",
            "INSERT INTO user VALUES(4,'hans-wurst@wurst.de',null,'Hans','Wurst',null,'" . password_hash('wurst', PASSWORD_DEFAULT) . "')",

            "INSERT INTO address VALUES(0,'Deutschland','Wilhelmshaven','Helgolandstraße',48,26384)",
            "INSERT INTO address VALUES(1,'Deutschland','Schortens','Karl-Harms-Str',14,26419)",
            "INSERT INTO address VALUES(2,'Deutschland','Varel','Möörte',18,26316)",
            "INSERT INTO address VALUES(3,'Deutschland','Oldenburg','Posthalterweg',10,26129)",
            "INSERT INTO address VALUES(4,'Deutschland','Oldenburg','Carl-von-Ossietzy-Straße',11,26129)",
            "INSERT INTO address VALUES(5,'Deutschland','Oldenburg','Ammerländer Heerstraße',114,26129)",
            "INSERT INTO address VALUES(6,'Deutschland','Hannover','Adenauerallee',1,30175)",
            "INSERT INTO address VALUES(7,'Deutschland','Rheda-Wiedenbrück','In der Mark',2,33378)",
            "INSERT INTO offers VALUES(0,'Verkäuferin (m/w/d)','Einzelhandel','MusterFirma','Wir suchen in absehbarer Zeit eine neue Aushilfe im Einzelhandel der Musterfirma-Reihe. Ein gepflegtes Aussehen und ein freundlicher Umgangston sind erwünscht.',0,'2020-06-20','2020-07-01',1,2,2,0)",
            "INSERT INTO offers VALUES(1,'Lagerist (m/w/d)','Baumarkt','YourCompany','Wir suchen in absehbarer Zeit eine neue Aushilfe im Lager einer unserer Großbaumärkte der YourCompany-Reihe. Ein gepflegtes Aussehen und ein freundlicher Umgangston sind erwünscht.',0,'2020-06-19','2020-07-15',2,2,3,0)",
            "INSERT INTO offers VALUES(2,'Reinigungsfachkraft (m/w/d)','Hotel','SomeSoft GmbH','Wir suchen in absehbarer Zeit eine neue Aushilfe im Einzelhandel der SomeSoft-Reihe. Ein gepflegtes Aussehen und ein freundlicher Umgangston sind erwünscht.',1,'2020-06-21','2020-08-01',1,1,1,0)",
            "INSERT INTO offers VALUES(3,'Apotheker (m/w/d)','Einzelhandel','Bayer','Wir suchen schnellst möglich einen neuen Apotker. Ein gepflegtes Aussehen und ein freundlicher Umgangston sind erwünscht.',0,'2020-06-20','2020-08-01',2,1,1,0)",
            "INSERT INTO offers VALUES(4,'Raupenzüchter (m/w/d)','Tierhandel','Co&Zoo','Wir sind pleite und suchen ein freundlicher Umgangston mit uns.',0,'2020-06-20','2020-08-01',1,2,1,0)",
            "INSERT INTO offers VALUES(5,'Türstopper (m/w/d)','Einzelhandel','BauschTörse','Wir von der Bauschtörse sind hilflos. Wir suchen neue Mitarbeiter dringend',0,'2020-06-20','2020-08-01',1,0,1,0)",
            "INSERT INTO offers VALUES(6,'Schnabeltierpfleger (m/w/d)','Tierpfleger','PlattyPurse','In den Sommerferien langweilen sich Phineas Flynn und sein Stiefbruder Ferb Fletcher, die in Danville in den USA leben. Also erfinden sie jeden Tag etwas, das in der Regel von Phineas ausgeheckt wird. Ihre Schwester Candace Flynn setzt alles daran, die beiden bei ihrer Mutter zu verpetzen, was ihr aber nie gelingt, da sie keine Beweise vorlegen kann. Oft ist für das Verschwinden möglicher Beweise das Haustier Perry verantwortlich, denn dieses ist ein Geheimagent und durchkreuzt als „Agent P.“ oder „Perry, das Schnabeltier“ die gemeinen Pläne des Bösewichts Dr. Heinz Doofenshmirtz und verwischt dabei durch Zufall die Spuren von Phineas’ und Ferbs Aktionen. Man bemerkt oft, dass zwischen Phineas’ und Ferbs Leben und dem von Doofenshmirtz viele Parallelen bestehen und Perry immer wieder zwischen Erzfeind und Herrchen steht.',5,'2007-08-17','2007-08-17',0,1,0,1)",
            "INSERT INTO offers VALUES(7,'Elefantenpfleger (m/w/d)','Tierpfleger','ZOO GmbH','Wir suchen einen liebevollen Wärter für unseren Elefanten. Der Elefant nennt sich Benjamin Blümchen und liebt Kinder über alles.',6,'2020-07-03','2020-08-01',1,0,1,2)",
            "INSERT INTO offers VALUES(8,'Metzger (m/w/d)','Schlachter','Tönnies','Wir suchen einen liebevollen Schlachter für unsere Schweine',7,'2020-07-03','2020-08-01',1,0,1,4)"


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

    /**
     * Starts a Transaction
     */
    public function begin(): void
    {
        if (!$this->conn->inTransaction()) {
            $this->conn->beginTransaction();
        }
    }

    /**
     * Ends a Transaction and commits
     */
    public function end(): void
    {
        if ($this->conn->inTransaction()) {
            $this->conn->commit();
        }
    }

    /**
     * Stops a Transaction and rolls back
     */
    public function stop(): void
    {
        if ($this->conn->inTransaction()) {
            $this->conn->rollBack();
        }
    }
}