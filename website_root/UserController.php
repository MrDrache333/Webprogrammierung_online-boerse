<?php
include ("User.php");
$user1 = new User("fenja", "bauer", "fenja.bauer@uni-oldenburg");


class UserController implements UserDAO
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {

        //connect to database
    }

    function create($user)
    {
        return true;
    }

    function findUserByMail($email)
    {
        if($email = "123@web.de"){
            return new User("Sören","Rempel","123@web.de","123");
        }
    }

    function update($user)
    {
        return true;
        // TODO: Implement update() method.
    }

    function delete($user)
    {
        return true;
        // TODO: Implement delete() method.
    }
}