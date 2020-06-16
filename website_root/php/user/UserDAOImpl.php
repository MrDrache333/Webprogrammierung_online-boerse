<?php

namespace php\user;

use Exception;
use php\database\Database;
use php\database\DatabaseController;

/**
 * Class UserDAOImpl
 */
class UserDAOImpl implements UserDAO
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
        $command = "insert into user(email, prename, surname, password) values (" .
            "'" .
            ($user->getEmail()) . "','" .
            ($user->getPrename()) . "','" .
            ($user->getSurname()) . "','" .
            ($user->getPassword()) .
            "')";
        $command = str_replace("''", "null", $command);
        var_dump($command);
        return UserHelper::getUsersFromSQLResult($this->database->execute($command)) === null;
    }

    /**
     * @param $email String Mailadresse des Benutzers
     * @param $password String Password des Benutzers
     * @return User|null
     */
    public function login($email, $password)
    {
        $command = "select * from user where email like '" . $email . "' and password like '" . $password . "'";
        return UserHelper::getUsersFromSQLResult($this->database->query($command));
    }

    /**
     * @param String $email Die Mail-Adresse des Nutzers
     * @return User|null
     */
    public function findUserByMail($email)
    {
        $command = "select * from user where email='" . $email . "'";
        return UserHelper::getUsersFromSQLResult($this->database->query($command));
    }

    /**
     * @param User $user Der zuaktualisierende Benutzer
     * @return bool Erfolgreich?
     */
    public function update($user)
    {
        /* $command = "UPDATE user Set email '" . $email . "'prename'" . $prename . "'surname'" . $surname . "'";
         return $this->database->execute($command);*/
        $command = "UPDATE user SET prename='" . $user->getPrename() . "', surname='" . $user->getSurname() . "' WHERE email='" . $user->getEmail() . "'";
        return $this->database->execute($command);
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


    public function updatePassword($newPassword, $email)
    {
        /* $command = "UPDATE user Set email '" . $email . "'prename'" . $prename . "'surname'" . $surname . "'";
         return $this->database->execute($command);*/
        $command = "UPDATE user SET password='" . $newPassword . "' WHERE email='" . $email . "'";
        return $this->database->execute($command);
    }
}