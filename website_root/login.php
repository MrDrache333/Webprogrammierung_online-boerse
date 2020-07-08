<?php

use php\user\User;
use php\user\UserDAOImpl;

include_once 'php/classes.php';
if (isset($_POST["js_no"])) {
    $header = 'noJSLogin.php?error=';
} else {
    $header = 'index.php?reloadModal=true&error=';
}
if (isset($_POST["loginSubmit"])) {
    if (isset($_POST["email"]) && (isset($_POST["password"]))) {

        $email = htmlspecialchars($_POST["email"]);
        $_SESSION["email"] = $email;
        $password = htmlspecialchars($_POST["password"]);

        $controller = new UserDAOImpl();
        $user = $controller->findUserByMail($email);


        if ($user !== null && password_verify($password, $user->getPassword())) {
            setcookie("email", $email, time() + 60 * 60 * 24);
            setcookie("username", $user->getPrename() . " " . $user->getSurname(), time() + 60 * 60 * 24);
            setcookie("loggedin", "true", time() + 60 * 60 * 24);
            header("Location: profil.php");
        } else {
            setcookie("loggedin", "false", time() + 60 * 60 * 24);
            header("Location:" . $header . "login_error");
        }
    } else {
        setcookie("loggedin", "false", time() + 60 * 60 * 24);
        header("Location:" . $header . "login_error");

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
    $AGB = htmlspecialchars($_POST["register_agb"]);
    $errorRegister = "register";



    if (!preg_match('/^[a-zA-Z-_üöäß\s]{3,30}$/', $prename)) {
        $errorRegister = $errorRegister . "+vorname";
    } else {
        $FILL_vorname = $prename;
    }
    if (!preg_match('/^[a-zA-Z-_üöäß\s]{3,30}$/', $lastname)) {
        $errorRegister = $errorRegister . "+nachname";
    } else {
        $FILL_nachname = $lastname;
    }
    if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
        $errorRegister = $errorRegister . "+email";
    } else {
        $FILL_email = $loginEmail;
    }
    if (!preg_match('/^[0-9a-zA-Z-_üöäß\s]{5,30}$/', $loginPassword)) {
        $errorRegister = $errorRegister . "+password";
    }
    if (!isset($AGB)) {
        $errorRegister = $errorRegister . "+AGB";
    }

    if ($errorRegister == "register") {
        $controller = new UserDAOImpl();
        if ($controller->findUserByMail($loginEmail) === null) {
            $toRegisterUser = new User();
            $toRegisterUser->setPrename($prename);
            $toRegisterUser->setSurname($lastname);
            $toRegisterUser->setEmail($loginEmail);
            $toRegisterUser->setPassword(password_hash($loginPassword, PASSWORD_DEFAULT));
            $result = $controller->create($toRegisterUser);


            if ($result != 1) {
                $filename = "wichtige_infos.txt";
                $data = "Ihre Registrierung bei KEFEDO war nicht erfolgreich. Bitte versuchen Sie es erneut";
                file_put_contents($filename, $data);
                $errorRegister = $errorRegister . "+datei";
                header('Location:' . $header . $errorRegister);

            } else {
                $user = $controller->findUserByMail($loginEmail);
                $id = $user->getId();
                $filename = $prename . "_" . $lastname . "_" . $id . ".txt";
                $data = "Sie haben sich bei KEFEDO registriert. Dies war erfolgreich. Loggen Sie sich mit Ihrem Benutzernamen: " . $loginEmail . " und Ihrem Passwort ein. Die Datei wird nach dem einloggen gelöscht!";
                file_put_contents($filename, $data);
                $errorRegister = $errorRegister . "+datei";
                header('Location:' . $header . $errorRegister);
            }
        } else {
            $filename = "wichtige_infos.txt";
            $data = "Ihre Registrierung bei KEFEDO war nicht erfolgreich. Bitte versuchen Sie es erneut";
            file_put_contents($filename, $data);
            $errorRegister = $errorRegister . "+datei";
            header('Location:' . $header . $errorRegister);
        }
    } else {

        header('Location:' . $header . $errorRegister . '&fill_vorname=' . $FILL_vorname . '&fill_nachname=' . $FILL_nachname . '&fill_email=' . $FILL_email);
    }
} //Passwort vergessen ausgeführt und Mail versendet zu Nutzer.


else if (isset($_POST["pwforget"])) {
    if (isset($_POST["js_no"])) {
        $header = 'noJSLogin.php?error=';
    } else {
        $header = 'index.php?reloadModal=true&error=';
    }
    if (isset($_POST["email"]) && $_POST["email"] !== "") {
        $u = new UserDAOImpl();
        $submit = $_POST["pwforget"];
        date_default_timezone_set("Europe/Berlin");
        $timestamp = time();
        $time = date('m/d/Y H:i:s', $timestamp);
        $empfaenger = $_POST["email"];
        $absendermail = "info@kefedo.com";
        $absendername = "kefedo";
        $pw = GeneratePassword(12);
        $betreff = "Passwort zurücksetzten";
        $text = "Sie " . $empfaenger . " haben um " . $time .
            " ihr Passwort zurückgesetzt. Dafür lassen wir ihnen nun folgendes neues Passwort zukommen. Ihr neues Passwort lautet: " . $pw;
        $user = $u->findUserByMail($empfaenger);
        if ($user != null) {
            $prename = $user->getPrename();
            $lastname = $user->getSurname();
            $id = $user->getId();
            $filename = $prename . "_" . $lastname . "_" . $id . ".txt";
            if (mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>")) {
                $data =
                    "Sie haben sich bei KEFEDO ihr Passwort geändert. Dies war erfolgreich.
            Loggen Sie sich mit Ihrem Benutzernamen: " . $empfaenger . "und Ihrem neuen Passwort: " . $pw . " ein. 
            Die Datei wird nach dem einloggen gelöscht!";
                file_put_contents($filename, $data);
                header('Location:' . $header . 'pw_forget');
                $u->updatePassword(password_hash($pw, PASSWORD_DEFAULT), $empfaenger);
            }
        } else {
            $filename = "wichtige_infos.txt";
            $data =
                "Sie haben sich bei KEFEDO ihr Passwort vergessen und zurückgesetzt. Dies war nicht erfolgreich.
                Veruschen sie es erneut.
                Die Datei wird nach dem einloggen gelöscht!";
            file_put_contents($filename, $data);
            header('Location:' . $header . 'pw_forget');
        }
    } else {
        header('Location:' . $header . 'email');
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