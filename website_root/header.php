<?php
ini_set("session.use_cookies", 1); // 1 using cookies
ini_set("session.use_only_cookies", 0);
ini_set("session.use_trans_sid", 1); // 1 using GET and when cookies are disabled
error_reporting(E_ALL);

use php\offer\OfferDAOImpl;
use php\user\UserDAOImpl;

include_once 'php/classes.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["kik"]) && $_SESSION["kik"] === true) {
    header("Location:messages.php");
    unset($_SESSION["kik"]);
}

if (preg_match("/profil\.php/i", $_SERVER['REQUEST_URI']) && !isset($_COOKIE["loggedin"])) {
    logout("Sie sind nicht eingeloggt. Loggen sie sich wieder ein um fortzufahren.");
    header("Location: noJSLogin.php");
} elseif (preg_match("/profil\.php/i", $_SERVER['REQUEST_URI']) && $_COOKIE["loggedin"] != "true") {
    logout("Sie sind nicht eingeloggt. Loggen sie sich wieder ein um fortzufahren.");
    header("Location: noJSLogin.php");
}
if (preg_match("/messages\.php/i", $_SERVER['REQUEST_URI']) && !isset($_COOKIE["loggedin"])) {
    logout("Sie sind nicht eingeloggt. Loggen sie sich wieder ein um fortzufahren.");
    header("Location: noJSLogin.php");
} elseif (preg_match("/messages\.php/i", $_SERVER['REQUEST_URI']) && $_COOKIE["loggedin"] != "true") {
    logout("Sie sind nicht eingeloggt. Loggen sie sich wieder ein um fortzufahren.");
    header("Location: noJSLogin.php");
}
if (preg_match("/new_offer\.php/i", $_SERVER['REQUEST_URI']) && !isset($_COOKIE["loggedin"])) {
    logout("Sie sind nicht eingeloggt. Loggen sie sich wieder ein um fortzufahren.");
    header("Location: noJSLogin.php");
} else if (preg_match("/new_offer\.php/i", $_SERVER['REQUEST_URI']) && $_COOKIE["loggedin"] != "true") {
    logout("Sie sind nicht eingeloggt. Loggen sie sich wieder ein um fortzufahren.");
    header("Location: noJSLogin.php");
}

if (preg_match("/noJSLogin\.php/i", $_SERVER['REQUEST_URI']) && isset($_COOKIE["loggedin"])) {
    if ($_COOKIE["loggedin"] === "true") {
        header("Location: profil.php");
    }
}

if (!preg_match("/new_offer\.php/i", $_SERVER['REQUEST_URI'])) {
    unset($_SESSION["bearbeiten"]);
    if (isset($_SESSION["tempUpload"]) && $_SESSION["tempUpload"] != false) {
        $logo = "images/logos/";
        $logo .= $_SESSION["tempUpload"];
        unlink($logo);
        $_SESSION['tempUpload'] = false;
    }
}
if (isset($_GET["randomid"]) && isset($_GET["email"])) {
    if (strlen($_GET["randomid"]) === 12) {
        setcookie("email", null, time() + 60 * 60 * 24);
        setcookie("loggedin", "false", time() + 60 * 60 * 24);
        header("Location: index.php");
        $randomid = $_GET["randomid"];
        $email = $_GET["email"];
        $newemail = $_GET["newemail"];
        $UserDAOImpl = new UserDAOImpl();
        $user = $UserDAOImpl->findUserByMail($email);
        if ($email == $user->getEmail() && $randomid == $user->getLink() && $newemail == $user->getNewmail()) {
            if ($UserDAOImpl->findUserByMail($newemail) === null) {
                $user->setEmail($newemail);
                $user->setNewmail(null);
                $user->setLink(null);
                $UserDAOImpl->emailaenderung($user);
                header("Location: noJSLogin.php");
            }
        }
    }
}

function Fehlerbehandlung($texterror)
{
    if (isset($_SESSION['error'])) {
        $_SESSION['error'] .= $texterror;

    } else {
        $_SESSION['error'] = $texterror;
    }

}

function logout($texterror)
{
    if (isset($_SESSION['loggout'])) {
        $_SESSION['loggout'] .= $texterror;

    } else {
        $_SESSION['loggout'] = $texterror;
    }

}

if (isset($_POST["profildelete"]) || isset($_POST["profildelete_nojs"])) {


    setcookie("loggedin", "false", time() + 60 * 60 * 24);
    $UserDao = new UserDAOImpl();
    $OfferDao = new OfferDAOImpl();
    $email = $_COOKIE["email"];
    $user = $UserDao->findUserByMail($email);
    $ownoffer = $OfferDao->getOwnOffers($user);


    if ($ownoffer != null) {
        foreach ($ownoffer as $offer) {
            $id = $offer->getId();
            $imageTarget_file = $offer->getLogo();
            if ($imageTarget_file == "images/company_placeholder.png") {
                //Do nothing
            } else {
                if (file_exists($imageTarget_file)) {
                    unlink($imageTarget_file);
                } else {
                    logout('Konnte nicht gelöscht werden:  ' . $imageTarget_file . ',das Bild existiert nicht.');
                }
            }

            $OfferDao->delete($id);
        }
    }
    $imageTarget_file = $user->getProfilePhoto();
    if ($imageTarget_file == "images/profile_template.png") {
        //Do nothing
    } else {
        if (file_exists($imageTarget_file)) {
            unlink($imageTarget_file);
        } else {
            logout('Konnte nicht gelöscht werden:  ' . $imageTarget_file . ',das Bild existiert nicht.');
        }
    }
    $delete = $UserDao->delete($email);
    if ($delete == true) {
        logout("Ihr Profil wurde erfolgreich gelöscht!");
        logout("Sie wurden ausgeloggt.");
        header("Location: index.php");
    }
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
        <title>KEFEDO-Startseite</title>
        <link rel="stylesheet" type="text/css" href="styles/searchBox.css">
    <?php } ?>
    <?php if (preg_match("/profil\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <title>KEFEDO-Profil</title>
        <link rel="stylesheet" type="text/css" href="styles/profile.css">
    <?php } ?>
    <?php if (preg_match("/search_job\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <title>KEFEDO-Job-suchen</title>
        <link rel="stylesheet" type="text/css" href="styles/searchBox.css">
        <link rel="stylesheet" type="text/css" href="styles/search_job.css">
    <?php } ?>
    <?php if (preg_match("/contact\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <title>KEFEDO-Kontakt</title>
        <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <?php } ?>
    <?php if (preg_match("/messages\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <title>KEFEDO-Anzeigen</title>
        <link rel="stylesheet" type="text/css" href="styles/messages.css">
    <?php } ?>
    <?php if (preg_match("/new_offer\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <title>KEFEDO-Neue-Anzeige</title>
        <link rel="stylesheet" type="text/css" href="styles/new_offer.css">
    <?php } ?>
    <?php if (preg_match("/detailView\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <title>KEFEDO-Detailansicht</title>
        <link rel="stylesheet" type="text/css" href="styles/detailView.css">
        <link rel="stylesheet" href="leaflet/leaflet.css"/>
        <script src="leaflet/leaflet.js"></script>
        <link rel="stylesheet" href="leaflet/leaflet-routing-machine.css"/>
        <script src="leaflet/leaflet-routing-machine.js"></script>

    <?php } ?>
    <?php if (preg_match("/impressum\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <title>KEFEDO-Impressum</title>
        <link rel="stylesheet" type="text/css" href="styles/impressum.css">
    <?php } ?>
    <?php if (preg_match("/terms_of_use\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <title>KEFEDO-Nutzungsbedingungen</title>
        <link rel="stylesheet" type="text/css" href="styles/impressum.css">
    <?php } ?>
    <?php if (preg_match("/privacy\.php/i", $_SERVER['REQUEST_URI'])) { ?>
        <title>KEFEDO-Datenschutz und Cookies</title>
        <link rel="stylesheet" type="text/css" href="styles/impressum.css">
    <?php } ?>

    <link rel="stylesheet" type="text/css" href="styles/icons.css"/>
    <link rel="stylesheet" type="text/css" href="styles/cookieBanner.css"/>
</head>
<body <?php if (isset($_GET["reloadModal"]) && $_GET["reloadModal"] === "true") { ?>
    onload="document.getElementById('login-modal').style.display='block'"
<?php } ?>>
<?php
if (!isset($_COOKIE["wpcc"])) {
    ?>
    <div id="cookie_banner">
        <div class="wpcc-container wpcc-banner wpcc-corners-round wpcc-corners-normal wpcc-transparency-15 wpcc-fontsize-large wpcc-border-normal wpcc-bottom wpcc-color-custom--1705717418 "
             style=""><span class="wpcc-message">Unsere Webseite verwendet Cookies, um Ihnen ein bestmögliches Nutzungserlebnis zu ermöglichen <a
                        class="wpcc-privacy" href="privacy.php" rel="noopener" target="_blank" tabindex="1">Weitere Informationen</a></span>
            <div class="wpcc-compliance"><a class="wpcc-btn" id="accept_cookie" tabindex="2">Ich stimme zu</a></div>
        </div>
    </div>
    <script>
        document.getElementById("accept_cookie").onclick = function () {
            var d = new Date();
            d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = "wpcc" + "=" + "dismiss" + ";" + expires + ";path=/";
            document.getElementById("cookie_banner").innerHTML = "";
        }
    </script>
    <?php
}
?>
<div class="grid-container">
    <div class="headerrahmen">
        <div class="logo">
            <a href="index.php"><img alt="Logo" class="kefedologo" src="images/logo.png"></a>
        </div>
        <div class="fehlermeldung">
            <?php if (isset($_SESSION["loggout"])) {

                echo '<br /><br /><label for="error"><i style="color: #FF0000">' . $_SESSION["loggout"] . '</i></label>';

            }
            ?>
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
                    <form action="login.php"
                          class="loginModal-content loginAnimate" method="post">
                        <!-- Login form-->
                        <h2>Login</h2>
                        <div class="loginImgcontainer">
                            <img alt="Avatar" class="loginAvatar" src="images/profile_template.png">
                        </div>

                        <div class="loginContainer">
                            <?php if (isset($_GET["error"]) && $_GET["error"] == "pw_forget") {
                                echo '<br /><br /><label for="email"><i style="color: #FF0000">Schauen Sie in die Datei für ihr neues Passwort!</i></label>';
                            } ?>

                            <p><label for="email"><b>Email</b></label>
                                <?php if (isset($_GET["error"]) && $_GET["error"] == "login_error") {
                                    echo '<br /><br /><label for="email"><i style="color: #FF0000">Email und/oder Passwort ist falsch!</i></label>';
                                }
                                if (isset($_GET["error"]) && $_GET["error"] == "reg_error") {
                                    echo '<br /><br /><label for="email"><i style="color: #FF0000">Ihr Email ist nicht bestätigt. Validieren sie die über den Link in der Datei!</i></label>';
                                }
                                if (isset($_GET["error"]) && $_GET["error"] == "email") {
                                    echo '<br /><br /><label for="email"><i style="color: #FF0000">Email muss gesetzt sein!</i></label>';
                                } ?>
                                <input autocomplete="off" class="loginInput" id="email" name="email"
                                    <?php if ((isset($_GET["error"]) && $_GET["error"] == "login_error") || isset($_GET["error"]) && $_GET["error"] == "email") {
                                        echo 'style="border: 2px solid red;"';
                                    } ?>
                                       placeholder="Email eingeben"
                                       required
                                       type="email">
                            </p>
                            <p><label for="password"><b>Passwort</b></label>
                                <input class="loginInput" id="password" name="password"
                                    <?php if (isset($_GET["error"]) && $_GET["error"] == "login_error") {
                                        echo 'style="border: 2px solid red;"';
                                    } ?>
                                       placeholder="Passwort eingeben"
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
                        </div>
                    </form>
                    <!-- Register form-->
                    <form action="login.php" class="loginModal-content loginAnimate" method="post">
                        <h2>Registrieren</h2>
                        <div class="loginImgcontainer">
                            <img alt="Avatar" class="loginAvatar" src="images/profile_template.png">
                        </div>
                        <div class="loginContainer">
                            <?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                && preg_match('/datei/', $_GET["error"])) {
                                echo '<i style="color: #FF0000"> Schauen sie in die Datei um sich einzuloggen!</i>';
                            } ?>
                            <?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                && preg_match('/AGB/', $_GET["error"])) {
                                echo '<i style="color: #FF0000"> Sie müssen die Nutzungsbedingungen akzeptieren!</i>';
                            } ?>
                            <p>
                                <label for="name"><b><?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                            && preg_match('/vorname/', $_GET["error"])) {
                                            echo '<i style="color: #FF0000"> Vorname falsch!</i>';
                                        } else { ?>Vorname: <?php } ?></b></label>
                                <input class="loginInput" id="name" name="loginPrename"
                                       placeholder="Vorname eingeben"
                                       value="<?php if (isset($_GET["fill_vorname"])) {
                                           echo $_GET["fill_vorname"];
                                       } ?>"
                                       required
                                       type="text"></p>
                            <p>
                                <label for="lastname"><b><?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                            && preg_match('/nachname/', $_GET["error"])) {
                                            echo '<i style="color: #FF0000"> Nachname falsch!</i>';
                                        } else { ?>Nachname: <?php } ?></b></label>
                                <input class="loginInput" id="lastname" name="loginLastname"
                                       placeholder="Nachname eingeben"
                                       value="<?php if (isset($_GET["fill_nachname"])) {
                                           echo $_GET["fill_nachname"];
                                       } ?>"
                                       required
                                       type="text">
                            </p>
                            <p>
                                <label for="registerEmail"><b><?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                            && preg_match('/email/', $_GET["error"])) {
                                            echo '<i style="color: #FF0000"> Email-Adresse falsch!</i>';
                                        } else { ?>Email-Adresse: <?php } ?></b></label>
                                <input class="loginInput" id="registerEmail" name="registerEmail"
                                       placeholder="Email eingeben"
                                       value="<?php if (isset($_GET["fill_email"])) {
                                           echo $_GET["fill_email"];
                                       } ?>"
                                       required
                                       type="email">
                            </p>
                            <p>
                                <label for="newPassword"><b> <?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                            && preg_match('/password/', $_GET["error"])) {
                                            echo '<i style="color: #FF0000"> Passwort ungültig!</i>';
                                        } else { ?>Passwort: <?php } ?><span id="feedback"></span></b></label>
                                <input class="loginInput" id="newPassword" name="newPassword"
                                       placeholder="Passwort eingeben"
                                       required
                                       type="password" onkeyup="char_count();">

                                <script type="text/javascript" src="passwd_check.js">
                                </script>
                            </p>
                            <p><span> <input value="1" type="checkbox" name="register_agb" id="register_agb"
                                             required/> </span>
                                <label for="accept_agb">Ich habe die <a target="_blank" id="agb"
                                                                        href="terms_of_use.php">Nutzungsbedingungen</a>
                                    und die <a target="_blank" id="privacy" href="privacy.php">Datenschutzerklärung</a>
                                    gelesen,sie zur Kenntnis genommen und akzeptiere sie.</label></p>
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
    </div>
    <?php
    }
    ?>
</div>

<?php
if (isset($_GET["email"])) {
    $email = $_GET["email"];
    $UserDAOImpl = new UserDAOImpl();
    $user = $UserDAOImpl->findUserByMail($email);
    $link = $user->getLink();
    if (strlen($link) == 8) {
        if (isset($_GET["randomid"]) && preg_match(".$link.", $_GET["randomid"])) {
            $user->setLink(null);
            $result = $UserDAOImpl->update($user);
//TODO Fehlerbehandulung bei falschen daten und Bestätigung das man registriert wurde per Text
            // logout("Ihre Regestrierung war erfolgreich");
        }
    }
}


?>

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
