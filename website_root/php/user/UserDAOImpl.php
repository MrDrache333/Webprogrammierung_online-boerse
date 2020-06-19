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
        $command = "insert into user(email, prename, surname, password) values (?,?,?,?)";
        $values = [$user->getEmail(), $user->getPrename(), $user->getSurname(), $user->getPassword()];
        return UserHelper::getUsersFromSQLResult($this->database->execute($command, $values)) === null;
    }

    /**
     * @param $email String Mailadresse des Benutzers
     * @param $password String Password des Benutzers
     * @return User|null
     */
    public function login($email, $password)
    {
        $command = "select * from user where email=? and password =?";
        return UserHelper::getUsersFromSQLResult($this->database->execute($command, [$email, $password]));
    }

    /**
     * @param String $email Die Mail-Adresse des Nutzers
     * @return User|null
     */
    public function findUserByMail($email)
    {
        $command = "select * from user where email=?";
        return UserHelper::getUsersFromSQLResult($this->database->execute($command, [$email]));
    }

    /**
     * @param User $user Der zuaktualisierende Benutzer
     * @return bool Erfolgreich?
     */
    public function update($user)
    {
        /* $command = "UPDATE user Set email '" . $email . "'prename'" . $prename . "'surname'" . $surname . "'";
         return $this->database->execute($command);*/
        $command = "UPDATE user SET prename=?, surname=? WHERE email=?";
        $values = [$user->getPrename(), $user->getSurname(), $user->getEmail()];
        return $this->database->execute($command, $values);
    }

    /**
     * @param $email String Mailadresse des Nutzers
     * @return bool Erfolgreich?
     */
    public function delete($email)
    {
        $command = "delete from user where email=?";
        return $this->database->execute($command, [$email]) !== null;
    }


    public function updatePassword($newPassword, $email)
    {
        $command = "UPDATE user SET password=? WHERE email=?";
        return $this->database->execute($command, [$newPassword, $email]);
    }
}