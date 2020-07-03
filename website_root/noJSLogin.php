<?php include "header.php"; ?>
    <div>
        <div class="header">
            <ul class="navi">
                <?php
                if (isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"] === "true") { ?>
                    <li class="navibutton">
                        <div class="navibutton"><a href="index.php" class="naviobjekt"> Startseite</a></div>
                    </li>
                    <li class="navibutton"><a href="profil.php" class="naviobjekt"> Mein Profil</a></li>
                    <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>
                <?php } else {
                    ?>
                    <li class="navibutton">
                        <a href="index.php" class="naviobjekt"> Startseite</a>
                    </li>
                <?php }
                ?>
                <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
                <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
            </ul>
        </div>
        <div class="loginContent">
            <div class="formulare">
                <!-- Login form-->
                <form action="login.php" class="loginModal-content loginAnimate" method="post">
                    <h2>Login</h2>
                    <div class="loginImgcontainer">
                        <img alt="Avatar" class="loginAvatar" src="images/profile_template.png">
                    </div>

                    <div class="loginContainer">
                        <p><label for="email"><b>Email</b></label>
                            <?php if (isset($_GET["error"]) && $_GET["error"] == "login_error") {
                                echo '<br /><br /><label for="email"><i style="color: #FF0000">Email und/oder Passwort ist falsch!</i></label>';
                            } ?>
                            <input autocomplete="off" class="loginInput" id="email" name="email"
                                <?php if (isset($_GET["error"]) && $_GET["error"] == "login_error") {
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

                <?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                    && preg_match('/vorname/', $_GET["error"])) {
                    echo "";
                } ?>
                <div class="loginContainer">
                    <p>
                        <label for="name"><b>Vorname <?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                    && preg_match('/vorname/', $_GET["error"])) {
                                    echo " falsch!";
                                } ?></b></label>
                        <input class="loginInput" id="name" name="loginPrename"
                               placeholder="Vorname eingeben"
                               value="<?php if (isset($_GET["fill_vorname"])) {
                                   echo $_GET["fill_vorname"];
                               } ?>"
                               required
                               type="text"></p>

                    <p>
                        <label for="lastname"><b>Nachname<?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                    && preg_match('/nachname/', $_GET["error"])) {
                                    echo " falsch!";
                                } ?></b></label>
                        <input class="loginInput" id="lastname" name="loginLastname"
                               placeholder="Nachname eingeben"
                               value="<?php if (isset($_GET["fill_nachname"])) {
                                   echo $_GET["fill_nachname"];
                               } ?>"
                               required
                               type="text">
                    </p>
                    <p>
                        <label for="registerEmail"><b>Email-Adresse<?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                    && preg_match('/exist/', $_GET["error"])) {
                                    echo " falsch!";
                                } ?></b></label>
                        <input class="loginInput" id="registerEmail" name="registerEmail"
                               placeholder="Email eingeben"
                               value="<?php if (isset($_GET["fill_email"])) {
                                   echo $_GET["fill_email"];
                               } ?>"
                               required
                               type="email">
                    </p>
                    <p>
                        <label for="newPassword"><b>Passwort <?php if (isset($_GET["error"]) && preg_match('/register/', $_GET["error"])
                                    && preg_match('/password/', $_GET["error"])) {
                                    echo " ungültig! ";
                                } ?><span id="feedback"></span></b></label>
                        <input class="loginInput" id="newPassword" name="newPassword"
                               placeholder="Passwort eingeben"
                               required
                               type="password" onkeyup="char_count();">

                        <script type="text/javascript" src="passwd_check.js">
                        </script>

                    </p>
                    <button name="registerSubmit" type="submit">Registrieren</button>
            </form>
            <form action="index.php">
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

<?php include "footer.html"; ?>