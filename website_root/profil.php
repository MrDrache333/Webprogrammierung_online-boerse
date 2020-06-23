<?php include "header.php"; ?>
<?php

use php\user\User;
use php\user\UserDAOImpl;

include_once 'php/classes.php';

$eingelogt = $_COOKIE['loggedin'];
if ($eingelogt != "true") {
    $_SESSION["error"] = "loggout"
    ?>
    <script language="javascript" type="text/javascript"> document.location = "index.php"; </script><?php

} else {
    $u = new UserDAOImpl();
    $email = $_COOKIE["email"];
    $user = $u->findUserByMail($email);
    $pwaktuell = $user->getPassword();
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $name2 = $_POST["father_name"];

    $user = new User();
    $user->setEmail($email);
    $user->setPrename($name);
    $user->setSurname($name2);
    $user->setPassword($pwaktuell);
    $test = $u->update($user);
    $pw = $_POST["pwsetzen"];
    $pwneu = $_POST["pwwiederholen"];
    $pwalt = $_POST["altespw"];
    if ($pwalt != null && $pwneu != null) {
        if ($pwneu == $pw) {
            if (md5($pwalt) === $pwaktuell) {


                $u->updatePassword($pwneu, $email);
                echo "Ihr Passwort wurde erfolgreich geändert";

            } else {
                echo "Ihr altes Passwort ist nicht korrekt";
            }

        } else {
            echo "Die Passwörter stimmen nicht überein. Wiederholen sie die Eingabe";

        }


    }
}
if (isset($_POST["profilloeschen"])) {
    $delete = $u->delete($email);
    setcookie("loggedin", "false", time() - 60 * 60 * 24);
    session_destroy();
    header("Location: index.php");
    exit;
}
//Change profile picture
if (isset($_POST["pb_submit"])) {

    $imageTarget_dir = "images/profilImages/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imageTarget_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
    $imageTarget_file = $imageTarget_dir . $user->getId() . "." . $imageFileType;
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 10000000000) {
        echo "Sorry, your image is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imageTarget_file)) {

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}
if (isset($_POST['reset_pb'])) {
    echo "Bild löschen";
    $imageTarget_file = $user->getProfilePhoto();
    if (file_exists($imageTarget_file)) {
        unlink($imageTarget_file);
    } else {
        echo 'Could not delete ' . $imageTarget_file . ', file does not exist';
    }
}


?>
<div class="header">
    <nav>
        <ul class="navi">
            <li class="navibutton">
                <a href="index.php" class="naviobjekt"> Startseite</a>
            </li>
            <li class="navibutton">
                <div class="active"><a href="profil.php" class="naviobjekt"> Mein Profil</a></div>
            </li>
            <?php

            if (isset($_COOKIE["loggedin"]) and $_COOKIE["loggedin"] === "true") { ?>
                <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>
            <?php } else {
                ?>
            <?php }
            ?>
            <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
        </ul>
    </nav>
</div>
<div class="grid-farbe">
    <div class="container">

        <h1> Mein Profil</h1>
        <div class="profile-container">
            <div class="profile-content">
                <div class="profile-form">
                    <div class="form-col">
                        <form enctype="multipart/form-data" method="POST" action="profil.php" class="profile-form"
                              id="profile-form">
                            <h2>Mein Profilbild</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <img src="<?php echo($user->getProfilePhoto()) ?>" alt="Profilbild-Template"
                                         id="pb_image">
                                </div>
                            </div>
                            <div class="form-submit">
                                <input type="submit" value="Profilbild löschen" class="submit" name="reset_pb"
                                       id="reset_pb"/>
                                <input type="file" name="fileToUpload" id="fileToUpload"/>
                                <input type="submit" value="Bild hochladen" name="pb_submit" class="submit"/>
                            </div>
                        </form>
                    </div>
                    <div class="form-col">
                        <form method="POST" class="profile-form" id="profile-form-image">
                            <h2>Meine Informationen</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Vorname :</label>
                                    <input type="text" name="name" id="name" value="<?php echo $user->getPrename(); ?>"
                                           required/>
                                </div>
                                <div class="form-group">
                                    <label for="father_name">Nachname :</label>
                                    <input type="text" name="father_name" id="fahter_name"
                                           value="<?php echo $user->getSurname(); ?>" required/>
                                </div>
                            </div>

                            <!-- Möglich für Passwort vergessen1-->
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="state">altes Passwort:</label>
                                    <input type="password" name="altespw" id="altestpw">
                                </div>
                                <div class="form-group">
                                    <label for="city">neues Passwort:</label>
                                    <input type="password" name="pwsetzen" id="pwsetzen"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="street">neues Passwort wiederholen</label>
                                    <input type="password" name="pwwiederholen" id="pwwiederholen"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">E-Mail Adresse :</label>
                                    <input class="profilemail" type="email" name="email" id="email"
                                           value="<?php echo $user->getEmail(); ?>"/>
                                </div>

                            </div>


                            <input type="submit" value="Speichern" class="submit" name="submit_pb" id="submit"/>
                            <input type="submit" value="Profil löschen" class="delete " name="profilloeschen"
                                   id="submit"/>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div><?php include "footer.html"; ?>

