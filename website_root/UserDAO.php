<?php
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
    public function findUserByMail(string $email);

    /**
     *Update the user details
     * @param User $user
     */
    public function update(User $user);

    /**
     *Deletes the user
     * @param User $user
     */
    public function delete(User $user);
}