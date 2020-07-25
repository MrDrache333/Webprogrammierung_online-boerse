<?php include "header.php";
include "profil_loader.php";
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
    <div class="content">
        <div class="profile_content">
            <h1>Mein Profil</h1>
            <div class="profile_form">
                <div class="form_col">
                    <h2>Mein Profilbild</h2>
                    <?php if (isset($_SESSION["error"]) && preg_match('/keinbild/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Das ist kein Bild!</i></h3>';
                    }
                    if (isset($_SESSION["error"]) && preg_match('/bildgross/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Das Bild ist zu groß, nur 10MBit erlaubt!</i></h3>';
                    }
                    if (isset($_SESSION["error"]) && preg_match('/gif/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Nur JPG, JPEG, PNG & GIF Dateiformate sind erlaubt!</i></h3>';
                    }
                    if (isset($_SESSION["error"]) && preg_match('/upload/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Das Bild konnte nicht hochgeladen werden!</i></h3>';
                    }
                    if (isset($_SESSION["error"]) && preg_match('/nobild/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Sie haben kein Bild ausgewählt </i></h3>';
                    } ?>
                    <form enctype="multipart/form-data" method="POST" action="profil.php"
                          id="profile-form">
                        <img class="profile_img" src="<?php echo($user->getProfilePhoto()) ?>" alt="Profilbild-Template"
                             id="pb_image">
                        <div class="form-submit">
                            <input type="submit" value="Bild hochladen" name="pb_submit" class="submit"/>
                            <input type="file" name="fileToUpload" id="fileToUpload"/>
                            <input type="submit" value="Profilbild löschen" class="submit" name="reset_pb"
                                   id="reset_pb"/>
                        </div>
                    </form>
                </div>
                <div class="form_col">
                    <h2>Meine Informationen</h2>
                    <?php
                    if (isset($_SESSION["error"]) && preg_match('/Vorname/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Ihr Vorame ist nicht korrekt!</i></h3>';
                    }
                    if (isset($_SESSION["error"]) && preg_match('/Nachname/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Ihr Nachname ist nicht korrekt!</i></h3>';
                    }
                    if (isset($_SESSION["error"]) && preg_match('/Email/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Ihr Email ist nicht falsch oder nicht verfügbar!</i></h3>';
                    }
                    if (isset($_SESSION["error"]) && preg_match('/altpw/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Ihr altes Passwort ist nicht korrekt!</i></h3>';
                    }
                    if (isset($_SESSION["error"]) && preg_match('/pwerfolgreich/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Ihr Passwort wurde geändert!</i></h3>';
                    }
                    if (isset($_SESSION["error"]) && preg_match('/pwungleich/', $_SESSION["error"])) {
                        echo '<h3><i style="color: #FF0000"> Die Passwörter stimmen nicht überein. Wiederholen sie die Eingabe!</i></h3>';
                    } ?>

                    <form method="POST" id="profile-form-image">
                        <div class="inputs">
                            <div class="inputs_col">
                                <h3>Allgemein</h3>
                                <label for="name">Vorname</label>
                                <input type="text" name="name" id="name" value="<?php echo $user->getPrename(); ?>"
                                       required/>
                                <label for="father_name">Nachname</label>
                                <label hidden for="fahter_name"></label>
                                <input type="text" name="father_name" id="fahter_name"
                                       value="<?php echo $user->getSurname(); ?>" required/>

                                <label for="email">E-Mail Adresse</label>
                                <input class="profilemail" type="email" name="email" id="email"
                                       value="<?php echo $user->getEmail(); ?>"/>
                            </div>
                            <div class="inputs_col">
                                <h3>Passwort ändern</h3>
                                <!-- Möglich für Passwort vergessen1-->
                                <label for="altestpw">altes Passwort</label>
                                <input type="password" name="altespw" id="altestpw">
                                <label for="pwsetzen">neues Passwort</label>
                                <input type="password" name="pwsetzen" id="pwsetzen" onkeyup="pw_check();"/>
                                <label for="pwwiederholen">neues Passwort wiederholen</label>
                                <input type="password" name="pwwiederholen" id="pwwiederholen"
                                       onkeyup="pw_check();"/>

                                <span id="feedback"></span>
                                <script>
                                    function pw_check() {
                                        var pw1 = document.getElementById('pwsetzen').value;
                                        var pw2 = document.getElementById('pwwiederholen').value;
                                        var call = document.getElementById('feedback');

                                        if (pw1.length < 5) {
                                            call.innerHTML = "<strong>Das Passwort ist zu kurz</strong>";
                                            call.style.color = "red";
                                        } else {

                                            if (pw1 === pw2) {
                                                call.innerHTML = "<strong>Die Passwörter sind gleich</strong>";
                                                call.style.color = "#56a40c";

                                            } else {
                                                call.style.color = "red";
                                                call.innerHTML = "<strong>Die Passwörter sind ungleich</strong>";
                                            }
                                        }
                                    }
                                </script>
                            </div>

                        </div>
                        <input type="submit" value="Speichern" class="submit" name="submit_pb" id="submit"/>
                    </form>
                    <noscript>
                        <form action="index.php" method="post">
                    </noscript>
                    <button onclick="document.getElementById('delete-modal').style.display='block'"
                            style="width:auto;" class="delete" name="profildelete_nojs">
                        Profil löschen
                    </button>
                    <noscript> </form> </noscript>
                </div>
            </div>
            <div>
                <div class="deleteModal"
                     id="delete-modal">
                            <span class="loginClose"
                                  onclick="document.getElementById('delete-modal').style.display='none'"
                                  title="Close Modal">&times;</span>

                    <div class="formulare">
                        <!-- Delete Form-->
                        <form class="deleteModal-content delteAnimate" method="post">
                            <h2>Profil und alle Anzeigen wirklich löschen?</h2>
                            <button name="profildelete" class="delete">Profil löschen</button>
                            <button class="abbrechen"
                                    onclick="document.getElementById('delete-modal').style.display='none'"
                                    type="button">Abbrechen
                            </button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

