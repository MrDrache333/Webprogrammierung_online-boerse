<?php
include("User.php");
include("Database.php");

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
        $this->database = new Database();
        try {
            $this->database->connect();
        } catch (\mysql_xdevapi\Exception $e) {
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
     * @param String $email Die Mail-Adresse des Nutzers
     * @return bool Erfolgreich?
     */
    function findUserByMail($email)
    {
        $command = "select * from user where email like '" . $email . "'";
        return $this->database->execute($command) !== null;
    }

    /**
     * @param User $user Der zuaktualisierende Benutzer
     * @return bool Erfolgreich?
     */
    function update($user)
    {
        return true;
        // TODO: Implement update() method.
    }

    /**
     * @param User $user Der zu löschende Nutzer
     * @return bool Erfolgreich?
     */
    function delete($user)
    {
        $command = "delete from user where email like '" . $user->getEmail() . "'";
        return $this->database->execute($command) !== null;
    }
}