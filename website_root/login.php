<?php
if (isset($_POST["loginSubmit"])) {
    if (isset($_POST["email"]) && (isset($_POST["password"]))) {

        $Email = htmlspecialchars($_POST["email"]);
        $_SESSION["email"] = $Email;
        $Password = htmlspecialchars($_POST["password"]);

        setcookie("email", $Email, time() + 606024);
        setcookie("loggedin", "true", time() + 606024);
        header("Location: profil.php");
    } else {
        setcookie("loggedin", "false", time() + 606024);
        header("Location: index.php");

    }
} else if (isset($_POST["logoutSubmit"])) {
    setcookie("loggedin", "", time() - 606024);
    session_destroy();
    header("Location: index.php");
}

