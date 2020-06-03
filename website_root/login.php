<?php
require 'UserController.php';
if (isset($_POST["loginSubmit"])) {
    if (isset($_POST["email"]) && (isset($_POST["password"]))) {

        $email = htmlspecialchars($_POST["email"]);
        $_SESSION["email"] = $email;
        $password = htmlspecialchars($_POST["password"]);

        $controller = new UserController();
        $result = $controller->login($email, $password);
        $user = $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user !== null) {
            setcookie("email", $email, time() + 606024);
            setcookie("loggedin", "true", time() + 606024);
            header("Location: profil.php");
        } else {
            setcookie("loggedin", "false", time() + 606024);
            header("Location: index.php");
        }
    } else {
        setcookie("loggedin", "false", time() + 606024);
        header("Location: index.php");

    }
} else if (isset($_POST["logoutSubmit"])) {
    setcookie("loggedin", "", time() - 606024);
    header("Location: index.php");
    session_destroy();
}
