<?php

namespace php\user;

interface UserDAO
{
    /**
     * Store the new user and assign a unique auto-generated ID
     * @param User $user
     */
    public function create(User $user);

    /**
     * Finds the User by its mail
     * @param String $email
     */
    public function findUserByMail($email);

    /**
     *Update the user details
     * @param String $prename
     * @param String $surname
     * @param String $email
     * @return mixed
     */
    public function update($prename, $surname, $email);

    /**
     *Deletes the user
     * @param User $user
     */
    public function delete(User $user);

    /**
     *Update the user passwort
     * @param String $pw
     * @param String $email
     * @return mixed
     */
    public function passwort($pw, $email);
}