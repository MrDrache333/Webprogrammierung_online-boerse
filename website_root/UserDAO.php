<?php


interface UserDAO
{
/**
 * Store the new user and assign a unique auto-generated ID
 */
function create($user);
/**
* Finds the User by its mail
*/
function findUserByMail($email);
/**
 *Update the user details
 */
function update($user);

/**
*Deletes the user
*/
function delete($user);
}