<?php include "header.php"; ?>
<?php

use php\user\UserDAOImpl;

include_once 'php/classes.php'; ?>

<?php
$eingelogt = $_COOKIE['loggedin'] ?? "";
if ($eingelogt !== "true") {
    $_SESSION["error"] = "loggout";
}

if (isset($_SESSION["error"])) {
    header("Location: index.php");
} else {
    $u = new UserDAOImpl();
    $email = $_COOKIE["email"];
    $user = $u->findUserByMail($email);
    $pwaktuell = $user->getPassword();
}

if (isset($_POST["submit_pb"])) {
    $name = htmlspecialchars($_POST["name"]);
    $name2 = htmlspecialchars($_POST["father_name"]);
    $email = htmlspecialchars($_POST["email"]);
    if (!preg_match('/^[0-9a-zA-Zöäß\s]{3,50}$/u', $name)) {
        $_SESSION["error"] .= "Ihr Name ist falsch.";
    }
    if (!preg_match('/^[0-9a-zA-Zöäß\s]{3,50}$/u', $name2)) {
        $_SESSION["error"] .= " Ihr Nachname ist falsch.";
    }
    if (!preg_match('/^[0-9a-zA-Zöäß+_\s]{3,50}$/u', $email)) {
        $_SESSION["error"] .= " Ihr Nachname ist falsch.";
    }

    if ($email !== $_COOKIE["email"]) {
        if ($u->findUserByMail($email) === null) {
            $user->setEmail($email);
//TODO Set Email repariren
        } else {
            $_SESSION["error"] = "Die Email gibt es bereits.";
        }

    }
    if ($_SESSION["error"] === null) {

        $user->setPrename($name);
        $user->setSurname($name2);
        $user->setPassword($pwaktuell);
        $test = $u->update($user);
        $pw = $_POST["pwsetzen"];
        $pwneu = $_POST["pwwiederholen"];
        $pwalt = $_POST["altespw"];
        if ($pwalt !== null && $pwneu !== null) {
            if ($pwneu === $pw) {
                if (password_verify($pwalt, $pwaktuell)) {


                    $u->updatePassword(password_hash($pwneu, PASSWORD_DEFAULT), $email);
                    echo "Ihr Passwort wurde erfolgreich geändert";

                } else {
                    echo "Ihr altes Passwort ist nicht korrekt";
                }

            } else {
                echo "Die Passwörter stimmen nicht überein. Wiederholen sie die Eingabe";

            }


        }
    } else {

        echo $_SESSION["error"];
        unset($_SESSION["error"]);

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

    $imageTarget_dir = "images/profileImages/";
    if (!file_exists($imageTarget_dir) && !mkdir($imageTarget_dir) && !is_dir($imageTarget_dir)) {
        throw new RuntimeException(sprintf('Directory "%s" was not created', $imageTarget_dir));
    }
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imageTarget_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
    $imageTarget_file = $imageTarget_dir . $user->getId() . "." . $imageFileType;
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Das ist kein Bild.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 10000000000) {
        echo "Das Bild ist zu groß, nur 10MBit erlaubt.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
        && $imageFileType !== "gif") {
        echo "Nur JPG, JPEG, PNG & GIF Dateiformate sind erlaubt.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk === 0) {
        echo "Das Bild konnte nicht hochgeladen werden.";
// if everything is ok, try to upload file
        var_dump($imageTarget_file);
    } else if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imageTarget_file)) {
        echo "Error: Das Bild konnte nicht hochgeladen werden.";
    }


}
if (isset($_POST['reset_pb'])) {
    $imageTarget_file = $user->getProfilePhoto();
    if ($imageTarget_file === "images/profile_template.png") {
        //Do nothing
    } else {
        if (file_exists($imageTarget_file)) {
            unlink($imageTarget_file);
        } else {
            echo 'Konnte nicht gelöscht werden:  ' . $imageTarget_file . ',das Bild existiert nicht.';
        }
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
                                    <label hidden for="fahter_name"></label>
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
                                    <input type="password" name="pwsetzen" id="pwsetzen" onkeyup="pw_check();"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="street">neues Passwort wiederholen</label>
                                    <input type="password" name="pwwiederholen" id="pwwiederholen"
                                           onkeyup="pw_check();"/>
                                </div>
                                <span id="feedback"></span>

                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">E-Mail Adresse :</label>
                                    <input class="profilemail" type="email" name="email" id="email"
                                           value="<?php echo $user->getEmail(); ?>"/>
                                </div>

                            </div>
                            <script>
                                function pw_check() {
                                    var pw1 = document.getElementById('pwsetzen').value;
                                    var pw2 = document.getElementById('pwwiederholen').value;
                                    var call = document.getElementById('feedback');

                                    if (pw1.length < 5) {
                                        call.innerHTML = "<strong>Das Passwort ist zu kurz</strong>";
                                        call.style.color = "red";
                                    } else {

                                        if (pw1 == pw2) {
                                            call.innerHTML = "<strong>Die Passwörter sind gleich</strong>";
                                            call.style.color = "#56a40c";

                                        } else {
                                            call.style.color = "red";
                                            call.innerHTML = "<strong>Die Passwörter sind ungleich</strong>";
                                        }
                                    }
                                }

                            </script>

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
</div>

</html>

<?php include "footer.html"; ?>

