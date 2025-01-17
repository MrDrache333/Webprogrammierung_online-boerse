<?php
ini_set("session.use_cookies", 1); // 1 using cookies
ini_set("session.use_only_cookies", 0);
ini_set("session.use_trans_sid", 1); // 1 using GET and when cookies are disabled
//error_reporting(E_ERROR | E_PARSE);
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/global.css">
    <?php if (($_SERVER['REQUEST_URI'] === '/') || preg_match("/index\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <link rel="stylesheet" type="text/css" href="styles/searchBox.css">
    <?php } ?>
    <?php if (preg_match("/profil\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <link rel="stylesheet" type="text/css" href="styles/profile.css">
    <?php } ?>
    <?php if (preg_match("/search_job\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <link rel="stylesheet" type="text/css" href="styles/searchBox.css">
        <link rel="stylesheet" type="text/css" href="styles/search_job.css">
    <?php } ?>
    <?php if (preg_match("/contact\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <?php } ?>
    <?php if (preg_match("/messages\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <link rel="stylesheet" type="text/css" href="styles/messages.css">
    <?php } ?>
    <?php if (preg_match("/new_offer\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <link rel="stylesheet" type="text/css" href="styles/new_offer.css">
    <?php } ?>

    <title>KEFEDO-Startseite</title>
</head>
<body>
<div class="grid-container">
    <div class="headerrahmen">
        <div class="logo">
            <a href="index.php"><img alt="Logo" class="kefedologo" src="images/logo.png"></a>
        </div>

        <?php if (isset($_COOKIE["loggedin"]) and $_COOKIE["loggedin"] === "true") {
            ?>
            <div class="loginbutton">
                <form action="login.php" method="post">

                    <button type="submit" name="logoutSubmit" style="width:auto;">
                        Ausloggen
                    </button>
                </form>
            </div>
            <?php
        } else {
        ?>
        <div class="loginbutton">
            <button onclick="document.getElementById('login-modal').style.display='block'" style="width:auto;">
                Einloggen
                oder Registrieren
            </button>
        </div>
        <div>
            <div class="loginModal" id="login-modal">
            <span class="loginClose" onclick="document.getElementById('login-modal').style.display='none'"
                  title="Close Modal">&times;</span>

                <div class="formulare">
                    <!-- Login form-->
                    <form action="login.php" class="loginModal-content loginAnimate" method="post">
                        <h2>Login</h2>
                        <div class="loginImgcontainer">
                            <img alt="Avatar" class="loginAvatar" src="images/profile_template.png">
                        </div>

                        <div class="loginContainer">
                            <p><label for="email"><b>Email</b></label>
                                <input class="loginInput" id="email" name="email" placeholder="Email eingeben"
                                       required
                                       type="email">
                            </p>
                            <p><label for="password"><b>Passwort</b></label>
                                <input class="loginInput" id="password" name="password"
                                       placeholder="Passwort eingeben"
                                       required
                                       type="password">
                            </p>
                            <button href="profil.php" name="loginSubmit" type="submit">Login</button>
                        </div>

                        <div class="loginContainer">
                            <button class="cancelbtn"
                                    onclick="document.getElementById('login-modal').style.display='none'"
                                    type="button">Cancel
                            </button>

                            <span class="psw">
                                    <button name="pwforget" type="submit">Passwort vergessen</button>
                                     </span>
                    </form>

                </div>


                <!-- Register form-->
                <form action="/login.php" class="loginModal-content loginAnimate" method="post">
                    <h2>Registrieren</h2>
                    <div class="loginImgcontainer">
                        <img alt="Avatar" class="loginAvatar" src="images/profile_template.png">
                    </div>

                    <div class="loginContainer">
                        <p><label for="name"><b>Vorname</b></label>
                            <input class="loginInput" id="name" name="loginPrename"
                                   placeholder="Vorname eingeben"
                                   required
                                   type="text"></p>

                        <p><label for="lastname"><b>Nachname</b></label>
                            <input class="loginInput" id="lastname" name="loginLastname"
                                   placeholder="Nachname eingeben" required
                                   type="text">
                        </p>
                        <p><label for="registerEmail"><b>Email-Adresse</b></label>
                            <input class="loginInput" id="registerEmail" name="registerEmail"
                                   placeholder="Nachname eingeben" required
                                   type="email">
                        </p>
                        <p><label for="newPassword"><b>Passwort</b></label>
                            <input class="loginInput" id="newPassword" name="newPassword"
                                   placeholder="Passwort eingeben"
                                   required
                                   type="password">
                        </p>
                        <button name="registerSubmit" type="submit">Registrieren</button>
                    </div>

                    <div class="loginContainer">
                        <button class="cancelbtn"
                                onclick="document.getElementById('login-modal').style.display='none'">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

</div>

<!-- Script with the click, which kills the Modal<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>-->
