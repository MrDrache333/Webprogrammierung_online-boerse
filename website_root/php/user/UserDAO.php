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
     * @param User $user
     * @return mixed
     */
    public function update($user);

    /**
     *Deletes the user
     * @param User $user
     */
    public function delete(User $user);

    /**
     *Update the user password
     * @param String $newPassword
     * @param String $email
     * @return mixed
     */
    public function updatePassword($newPassword, $email);
}