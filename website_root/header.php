<?php
ini_set("session.use_cookies", 1); // 1 using cookies
ini_set("session.use_only_cookies", 0);
ini_set("session.use_trans_sid", 1); // 1 using GET and when cookies are disabled
error_reporting(E_ALL);

use php\user\UserDAOImpl;

include_once 'php/classes.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["profildelete"])) {
    $_SESSION["error"] = "Ihr Profil wurde erfolgreich gelöscht!";

    setcookie("loggedin", "false", time() + 60 * 60 * 24);
    $u = new UserDAOImpl();
    $email = $_COOKIE["email"];
    $delete = $u->delete($email);
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="icons/android-icon-192x192.png">
    <link rel="image_src" href="icons/apple-icon.png">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <link rel="manifest" href="icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css" href="styles/global.css">
    <?php if ((substr($_SERVER['REQUEST_URI'], -1) === '/') || preg_match("/index\.php/i", $_SERVER['REQUEST_URI'])) { ?>
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

    <link rel="stylesheet" type="text/css" href="styles/cookieBanner.css"/>
    <script>window.addEventListener("load", function () {
            window.wpcc.init({
                "border": "normal",
                "corners": "normal",
                "colors": {
                    "popup": {"background": "#1c1f4b", "text": "#ffffff", "border": "#afb3e4"},
                    "button": {"background": "#afb3e4", "text": "#000000"}
                },
                "position": "bottom",
                "transparency": "15",
                "fontsize": "large",
                "content": {
                    "href": "/impressum.php",
                    "button": "Ich stimme zu",
                    "link": "Weitere Informationen",
                    "message": "Unsere Webseite verwendet Cookies, um Ihnen ein bestmögliches Nutzungserlebnis zu ermöglichen"
                }
            })
        });</script>

    <title>KEFEDO-Startseite</title>
</head>
<body>
<div class="grid-container">
    <div class="headerrahmen">
        <div class="logo">
            <a href="index.php"><img alt="Logo" class="kefedologo" src="images/logo.png"></a>
        </div>

        <?php if (isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"] === "true") {
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
            <noscript>
                <form action="noJSLogin.php">
            </noscript>
            <button onclick="document.getElementById('login-modal').style.display='block'" style="width:auto;">
                Einloggen
                oder Registrieren
            </button>
            <noscript> </form> </noscript>
        </div>
        <div>
            <div class="loginModal"
                 id="login-modal">
            <span class="loginClose" onclick="document.getElementById('login-modal').style.display='none'"
                  title="Close Modal">&times;</span>

                <div class="formulare">
                    <!-- Login form-->
                    <form onload="setCookie('currentModelIsOpen','true',0)" action="login.php"
                          class="loginModal-content loginAnimate" method="post">
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
                                    type="button">Abbrechen
                            </button>

                            <span class="psw">
                                    <button name="pwforget" type="submit">Passwort vergessen</button>
                                     </span>
                    </form>

                </div>


                <!-- Register form-->
                <form action="login.php" class="loginModal-content loginAnimate" method="post">
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
                                   placeholder="Email eingeben" required
                                   type="email">
                        </p>
                        <p><label for="newPassword"><b>Passwort <span id="feedback"></span></b></label>
                            <input class="loginInput" id="newPassword" name="newPassword"
                                   placeholder="Passwort eingeben"
                                   required
                                   type="password" onkeyup="char_count();">

                            <script type="text/javascript" src="passwd_check.js">
                            </script>

</body>
</p>
<button name="registerSubmit" type="submit">Registrieren</button>
</div>

<div class="loginContainer">
    <button class="cancelbtn"
            onclick="document.getElementById('login-modal').style.display='none'">
        Abbrechen
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

<!-- Script with the click, which kills the Modal-->
<script>
    // Get the modal
    var modal = document.getElementById('login-modal');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>