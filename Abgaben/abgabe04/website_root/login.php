<?php

use php\user\User;
use php\user\UserDAOImpl;

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
    setcookie("email", null, time() + 60 * 60 * 24);
    setcookie("loggedin", "false", time() + 60 * 60 * 24);
    header("Location: index.php");
    session_destroy();

} else if (isset($_POST["registerSubmit"], $_POST["loginPrename"], $_POST["loginLastname"], $_POST["registerEmail"], $_POST["newPassword"])) {
    $prename = htmlspecialchars($_POST["loginPrename"]);
    $lastname = htmlspecialchars($_POST["loginLastname"]);
    $loginEmail = htmlspecialchars($_POST["registerEmail"]);
    $loginPassword = htmlspecialchars($_POST["newPassword"]);

    if (!preg_match('/[a-zA-Z]{3,30}/', $prename)) {
        echo "Vorname ungültig";
    }
    if (!preg_match('/[a-zA-Z]{3,30}/', $lastname)) {
        echo "Nachname ungültig";
    }
    if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Mail ungültig";
    }
    if (!preg_match('/([a-zA-Z0-9]){5,30}/', $loginPassword)) {
        echo "Password ungültig";
    }


    if (preg_match('/[a-zA-Z]{3,30}/', $prename) && preg_match('/[a-zA-Z]{3,30}/', $lastname) &&
        filter_var($loginEmail, FILTER_VALIDATE_EMAIL) && preg_match('/([a-zA-Z0-9]){5,30}/', $loginPassword)) {
        $controller = new UserDAOImpl();
        if ($controller->findUserByMail($loginEmail) === null) {
            $toRegisterUser = new User();
            $toRegisterUser->setPrename($prename);
            $toRegisterUser->setSurname($lastname);
            $toRegisterUser->setEmail($loginEmail);
            $toRegisterUser->setPassword($loginPassword);
            $result = $controller->create($toRegisterUser);
            if (($user = $controller->findUserByMail($loginEmail)) === null) {
                echo "Fehler beim erstellen des Benutzers";
            } else {
                setcookie("email", $toRegisterUser->getEmail(), time() + 60 * 60 * 24);
                setcookie("username", $toRegisterUser->getPrename() . " " . $toRegisterUser->getSurname(), time() + 60 * 60 * 24);
                setcookie("loggedin", "true", time() + 60 * 60 * 24);
                header("Location: profil.php");
            }
        } else {
            echo "Fehler beim Erstellen des Benutzers";
        }
    } else {
        echo "Es wurden keine gültigen Daten eingegeben";
    }
}

//Passwort vergessen ausgeführt und Mail versendet zu Nutzer.
//muss in den Header verstehe aber Fenjas Datei nicht

else if (isset($_POST["pwforget"])) {
    if (isset($_POST["email"]) && "email" != "") {
        $u = new UserDAOImpl();
        $submit = $_POST["pwforget"];
        date_default_timezone_set("Europe/Berlin");
        $timestamp = time();
        $time = date('m/d/Y H:i:s', $timestamp);
        $empfaenger = $_POST["email"];
        $absendermail = "info@kefedo.com";
        $absendername = "kefedo";
        $pw = GeneratePassword();
        $betreff = "Passwort zurücksetzten";
        $text = "Sie " . $empfaenger . " haben um " . $time .
            " ihr Passwort zurückgesetzt. Dafür lassen wir ihnen nun folgendes neues Passwort zukommen. Ihr neues Passwort lautet: " . $pw;
        if (mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>")) {
            echo "Email wurde erfolgreich versendet.";
            echo $text;
            $test = $u->updatePassword($pw, $empfaenger);
        } else {
            echo "Ihre Anfrage konnte nicht gesendet werden!";
        }
    } else {
        header("Location: index.php");
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

?>