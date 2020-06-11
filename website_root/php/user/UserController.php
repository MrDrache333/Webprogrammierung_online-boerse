<?php

namespace php\user;

use Exception;
use php\database\Database;
use php\database\DatabaseController;

/**
 * Class UserController
 */
class UserController implements UserDAO
{
    /**
     * @var Database Datenbank
     */
    private $database;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $databaseController = new DatabaseController();
        $this->database = $databaseController::getDatabase();
        try {
            $this->database->connect();
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    /**
     * @param User $user Der neue Nutzer
     * @return bool Erfolgreich?
     */
    function create(User $user)
    {
        $command = "insert into user values (" .
            $user->getEmail() . "," .
            $user->getName() . "," .
            $user->getLastname() . "," .
            $user->getPassword() .
            ")";
        return $this->database->execute($command) !== null;
    }

    /**
     * @param $email String Mailadresse des Benutzers
     * @param $password String Password des Benutzers
     * @return bool
     */
    function login($email, $password)
    {
        $command = "select * from user where email like '" . $email . "' and password like '" . $password . "'";
        return $this->database->execute($command);
    }

    /**
     * @param String $email Die Mail-Adresse des Nutzers
     * @return bool Erfolgreich?
     */
    public function findUserByMail($email)
    {
        $command = "select * from user where email like '" . $email . "'";
        return $this->database->execute($command);
    }

    /**
     * @param User $user Der zuaktualisierende Benutzer
     * @return bool Erfolgreich?
     */
    public function update($prename, $surname, $email)
    {
        /* $command = "UPDATE user Set email '" . $email . "'prename'" . $prename . "'surname'" . $surname . "'";
         return $this->database->execute($command);*/
        $command = "UPDATE user SET prename='" . $prename . "', surname='" . $surname . "' WHERE email='" . $email . "'";
        return $this->database->execute($command);
        // TODO: Implement update() method.
    }

    /**
     * @param User $user Der zu löschende Nutzer
     * @return bool Erfolgreich?
     */
    public function delete($user)
    {
        $command = "delete from user where email='" . $user . "'";
        return $this->database->execute($command) !== null;
    }


    public function passwort($pw, $email)
    {
        /* $command = "UPDATE user Set email '" . $email . "'prename'" . $prename . "'surname'" . $surname . "'";
         return $this->database->execute($command);*/
        $command = "UPDATE user SET password='" . $pw . "' WHERE email='" . $email . "'";
        return $this->database->execute($command);
        // TODO: Implement update() method.
    }
}