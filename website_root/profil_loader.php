<?php


use php\user\UserDAOImpl;

include_once 'php/classes.php';

$u = new UserDAOImpl();


if (isset($_COOKIE["email"])) {

    $email = $_COOKIE["email"];
    $user = $u->findUserByMail($email);
}
if ($user != null) {
    $pwaktuell = $user->getPassword();
    $prename = $user->getPrename();
    $surname = $user->getSurname();
    $id = $user->getId();
    $Regfile = $prename . "_" . $surname . "_" . $id . ".txt";
}
if (file_exists($Regfile)) {
    unlink($Regfile);
}
if (file_exists("wichtige_infos.txt")) {
    unlink("wichtige_infos.txt");
}
if (isset($_POST["submit_pb"])) {
    $name = htmlspecialchars($_POST["name"]);
    $name2 = htmlspecialchars($_POST["father_name"]);
    $email = htmlspecialchars($_POST["email"]);
    if (!isset($name)) {
        Fehlerbehandlung("Ihr Vorname ist falsch.");
    }
    if (!isset($name2)) {
        Fehlerbehandlung("Ihr Nachname ist falsch.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        Fehlerbehandlung("Ihre Email ist falsch.");
    }
    if (isset($email) && isset($_COOKIE["email"])) {

        if ($email != $_COOKIE["email"]) {
            $randomid = randomid(12);
            if ($u->findUserByMail($email) == null) {
                $user->setNewmail($email);
                $user->setLink($randomid);
                $u->update($user);
                $loginemail = $user->getEmail();

                $filename = $prename . "_" . $surname . "_" . $id . ".txt";
                $data = "Sie haben sich bei KEFEDO eine Email ändeurng angefordert. Um dies fortzfahren  kicken sie auf den Link und loggen Sie sich mit Ihrem Benutzernamen: " . $loginemail . " und Ihrem Passwort ein. Die Datei wird nach dem einloggen gelöscht!
                http://localhost:8080/noJSLogin.php?randomid=" . $randomid . "&email=" . $loginemail . "&newemail=" . $email;
                file_put_contents($filename, $data);
                Fehlerbehandlung("Datei");
            } else {
                Fehlerbehandlung("Email");
            }
        }
    }
    if (!isset($_SESSION["error"])) {

        $user->setPrename($name);
        $user->setSurname($name2);
        $user->setPassword($pwaktuell);
        $test = $u->update($user);
        $pw = $_POST["pwsetzen"];
        $pwneu = $_POST["pwwiederholen"];
        $pwalt = $_POST["altespw"];
        if ($pwalt != null && $pwneu != null) {
            if ($pwneu === $pw) {
                if (password_verify($pwalt, $pwaktuell)) {


                    $u->updatePassword(password_hash($pwneu, PASSWORD_DEFAULT), $email);
                    Fehlerbehandlung("pwerfolgreich.");
                } else {
                    Fehlerbehandlung("altpw.");
                }

            } else {
                Fehlerbehandlung("pwungleich");
            }
        }
    }
}

//Change profile picture
if (isset($_POST["pb_submit"])) {

    $imageTarget_dir = "images/profileImages/";
    if (!file_exists($imageTarget_dir) && !mkdir($imageTarget_dir) && !is_dir($imageTarget_dir)) {
        throw new RuntimeException(sprintf('Directory "%s" was not created', $imageTarget_dir));
    }
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imageTarget_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
    $imageTarget_file = $imageTarget_dir . $user->getId() . "." . $imageFileType;
    // Check if image file is a actual image or fake image
    if ($_FILES["fileToUpload"]["tmp_name"] != null) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            Fehlerbehandlung("keinbild");
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000000) {
            Fehlerbehandlung("bildgross");
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
            && $imageFileType !== "gif") {
            Fehlerbehandlung("gif");
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk === 0) {
            Fehlerbehandlung("upload");

// if everything is ok, try to upload file
            var_dump($imageTarget_file);
        } else if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imageTarget_file)) {
            Fehlerbehandlung("uploaad");

        }
    } else {
        Fehlerbehandlung("nobild");
    }


}
if (isset($_POST['reset_pb'])) {
    $imageTarget_file = $user->getProfilePhoto();
    if ($imageTarget_file == "images/profile_template.png") {
        //Do nothing
    } else {
        if (file_exists($imageTarget_file)) {
            unlink($imageTarget_file);
        } else {
            echo 'Konnte nicht gelöscht werden:  ' . $imageTarget_file . ',das Bild existiert nicht.';
        }
    }
}
function randomid($length)
{
    //Funktion zur Generierung einer zufälligen ID

    $char_control = "";
    $chars_for_pw = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $chars_for_pw .= "0123456789";

    $chars_for_pw .= "abcdefghijklmnopqrstuvwxyz";
    mt_srand((double)microtime() * 1000000);
    for ($i = 0; $i < $length; $i++) {
        $number = random_int(0, strlen($chars_for_pw) - 1);
        $char_control .= $chars_for_pw[$number];
    }

    return $char_control;

}


