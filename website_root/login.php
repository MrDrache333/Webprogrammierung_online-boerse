<?php


use php\user\UserDAOImpl;
use php\user\User;

include_once 'php/classes.php';
if (isset($_POST["loginSubmit"])) {
    if (isset($_POST["email"]) && (isset($_POST["password"]))) {

        $email = htmlspecialchars($_POST["email"]);
        $_SESSION["email"] = $email;
        $password = htmlspecialchars($_POST["password"]);

        $controller = new UserDAOImpl();
        $user = $controller->login($email, $password);
        if ($user !== null) {
            setcookie("email", $email, time() + 60 * 60 * 24);
            setcookie("username", $user->getPrename() . " " . $user->getSurname(), time() + 60 * 60 * 24);
            setcookie("loggedin", "true", time() + 60 * 60 * 24);
            header("Location: profil.php");
        } else {
            setcookie("loggedin", "false", time() + 60 * 60 * 24);
            header("Location: index.php");
        }
    } else {
        setcookie("loggedin", "false", time() + 60 * 60 * 24);
        header("Location: index.php");

    }
} else if (isset($_POST["logoutSubmit"])) {
    setcookie("loggedin", "false", time() - 60 * 60 * 24);
    header("Location: index.php");
    session_destroy();

} else if (isset($_POST["registerSubmit"])) {
    if (isset($_POST["loginPrename"], $_POST["loginLastname"], $_POST["registerEmail"], $_POST["newPassword"])) {
        $prename = htmlspecialchars($_POST["loginPrename"]);
        $lastname = htmlspecialchars($_POST["loginLastname"]);
        $loginEmail = htmlspecialchars($_POST["registerEmail"]);
        $loginPassword = htmlspecialchars($_POST["newPassword"]);

        echo "test4";

        if ((preg_match("/[a-zA-Z]{3,30}/", $prename)) && (preg_match("/[a-zA-Z]{3,30}/", $lastname)) &&
            (filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) && (preg_match("/([A-Z]|[a-z]|[0-9])*/", $loginPassword))) {

            $controller = new UserDAOImpl();
            if ($controller->findUserByMail($loginEmail)) {

            } else {
                $toRegisterUser = new User();
                $toRegisterUser->setEmail($loginEmail);
                $toRegisterUser->setPrename($prename);
                $toRegisterUser->setSurname($lastname);
                $toRegisterUser->setPassword($loginPassword);
                $result = $controller->create($toRegisterUser);
                $controller->login($loginEmail, $loginPassword);
                if ($toRegisterUser !== null) {
                    setcookie("registerEmail", $loginEmail, time() + 60 * 60 * 24);
                    setcookie("username", $toRegisterUser->getPrename() . " " . $toRegisterUser->getSurname(), time() + 60 * 60 * 24);
                    setcookie("loggedin", "true", time() + 60 * 60 * 24);
                    header("Location: profil.php");
                }
            }
        }
    }
} else if (isset($_POST["pwforget"])) {


    $submit = $_POST["pwforget"];
    date_default_timezone_set("Europe/Berlin");
    $timestamp = time();
    $time = date('m/d/Y H:i:s', $timestamp);
    $empfaenger = $_POST["email"];
    $absendermail = "info@kefedo.com";
    $pw = GeneratePassword();
    $betreff = "Passwort zurücksetzten";
    $text = "Sie " . $empfaenger . " haben um " . $time .
        " ihr Passwort zurückgesetzt. Dafür lassen wir ihnen nun folgendes neues Passwort zukommen. Ihr neues Passwort lautet: " . $pw;

//Passwrot vergessen ausgeführt und Mail versendet zu Nutzer.
//muss in den Header verstehe aber Fenjas Datei nicht

    $u = new UserDAOImpl();
    if (isset($_POST["pwforget"])) {
        if (mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>")) {
            echo "Email wurde erfolgreich versendet.";
            echo $text;


            $email = $_COOKIE["email"];
            $test = $u->updatePassword($pw, $email);
        } else {
            echo "Ihre Anfrage konnte nicht gesendet werden!";
        }
    }
    function GeneratePassword($length = 12)
    {
        //Funktion zur Generierung eines zufälligen Passworts

        $char_control = "";
        $chars_for_pw = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $chars_for_pw .= "0123456789";

        $chars_for_pw .= "abcdefghijklmnopqrstuvwxyz";
        mt_srand((double)microtime() * 1000000);
        for ($i = 0; $i < $length; $i++) {
            $number = random_int(0, strlen($chars_for_pw));
            $char_control .= $chars_for_pw[$number];
        }

        return $char_control;

    }
}
?>