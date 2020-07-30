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
        $command = "insert into user(email,newemail, prename, surname, password,link) values (?,?,?,?,?,?)";
        $values = [$user->getEmail(), $user->getNewmail(), $user->getPrename(), $user->getSurname(), $user->getPassword(), $user->getLink()];
        return UserHelper::getUsersFromSQLResult($this->database->execute($command, $values)) === null;
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

        $command = "UPDATE user SET newemail=?, link=?,prename=?, surname=? WHERE email=?";
        $values = [$user->getNewmail(), $user->getLink(), $user->getPrename(), $user->getSurname(), $user->getEmail()];
        return $this->database->execute($command, $values);
    }

    /**
     * @param User $user Die zuaktualisiernde Email
     * @return bool Erfolgreich?
     */
    public function emailaenderung($user)
    {

        $command = "UPDATE user SET email=?, newemail=?, link=?,prename=?, surname=? WHERE id=?";
        $values = [$user->getEmail(), $user->getNewmail(), $user->getLink(), $user->getPrename(), $user->getSurname(), $user->getId()];
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