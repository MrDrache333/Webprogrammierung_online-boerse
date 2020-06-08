<?php

use php\user\UserController;

include_once 'php/classes.php';
if (isset($_POST["loginSubmit"])) {
    if (isset($_POST["email"]) && (isset($_POST["password"]))) {

        $email = htmlspecialchars($_POST["email"]);
        $_SESSION["email"] = $email;
        $password = htmlspecialchars($_POST["password"]);

        $controller = new UserController();
        $result = $controller->login($email, $password);
        $user = $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user !== null) {
            setcookie("email", $email, time() + 60 * 60 * 24);
            setcookie("username", $user['prename'] . " " . $user['surname'], time() + 60 * 60 * 24);
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

} else if(isset($_POST["registerSubmit"])){
    $prename = htmlspecialchars($_POST["loginPrename"]);
    $lastname = htmlspecialchars($_POST["loginLastname"]);
    $loginEmail = htmlspecialchars($_POST["registerEmail"]);
    $loginPassword = htmlspecialchars($_POST["newPassword"]);
$toRegisterUser = new User(loginPrename,loginLastname,registerEmail,newPassword);
$controller = new UserController();
$result =$controller-> create($toRegisterUser);



}


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
//Passwort muss in Datenbank angepasst werden
if (isset($_POST["pwforget"])) {
    if (mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>")) {
        echo "Email wurde erfolgreich versendet.";
        echo $text;
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
    srand((double)microtime() * 1000000);
    for ($i = 0; $i < $length; $i++) {
        $number = rand(0, strlen($chars_for_pw));
        $char_control .= $chars_for_pw[$number];
    }

    return $char_control;

}


?>