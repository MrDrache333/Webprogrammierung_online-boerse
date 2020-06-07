<?php

namespace php\user;

/**
 * Class User
 */
class User
{
    private $name;
    private $lastname;
    private $email;
    private $password;

    /**
     * User constructor.
     * @param $name
     * @param $lastName
     * @param $email
     * @param $password
     */
    public function __construct($name, $lastName, $email, $password)
    {
        $this->name = $name;
        $this->lastname = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastname($lastName): void
    {
        $this->lastname = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}