<?php

namespace php\user;

/**
 * Class User
 */
class User
{
    private $id;
    private $prename;
    private $surname;
    private $email;
    private $newmail;
    private $password;
    private $link;

    /**
     * User constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getPrename()
    {
        return $this->prename;
    }

    /**
     * @param mixed $prename
     */
    public function setPrename($prename): void
    {
        $this->prename = $prename;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $lastName
     */
    public function setSurname($lastName): void
    {
        $this->surname = $lastName;
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
    public function getNewmail()
    {
        return $this->newmail;
    }

    /**
     * @param mixed $newmail
     */

    public function setNewmail($newmail): void
    {
        $this->newmail = $newmail;
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

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link): void
    {
        $this->link = $link;
    }

    public function getProfilePhoto()
    {
        if ($this->getId() === null) {
            return ('images/profile_template.png');
        }
        if (file_exists('images/profileImages/' . $this->getId() . '.png')) {
            return ('images/profileImages/' . $this->getId() . '.png');
        }

        if (file_exists('images/profileImages/' . $this->getId() . '.jpg')) {
            return ('images/profileImages/' . $this->getId() . '.jpg');
        }

        if (file_exists('images/profileImages/' . $this->getId() . '.jpeg')) {
            return ('images/profileImages/' . $this->getId() . '.jpeg');
        } else return ('images/profile_template.png');

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}