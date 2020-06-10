<?php include "header.php"; ?>

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




            <?php

            use php\user\UserController;

            include_once 'php/classes.php';
            $u = new UserController();
            $email = $_COOKIE["email"];
            $result = $u->findUserByMail($email);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $prename = $row['prename'];
            $email = $row['email'];
            $surname = $row['surname'];
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
                        <form method="POST" class="profile-form" id="profile-form">
                            <h2>Mein Profilbild</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <img src="images/profile_template.png" alt="Profilbild-Template" id="pb_image">
                                </div>
                            </div>
                            <div class="form-submit">
                                <input type="submit" value="Profilbild löschen" class="submit" name="reset_pb"
                                       id="reset_pb"/>
                                <input type="file" name="fileToUpload" id="fileToUpload"/>
                                <input type="submit" value="Bild hochladen" name="submit" class="submit"/>

                            </div>
                        </form>
                    </div>
                    <div class="form-col">
                        <form method="POST" class="profile-form" id="profile-form-image">
                            <h2>Meine Informationen</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Vorname :</label>

                                    <input type="text" name="name" id="name" value="<?php echo $prename; ?>" required/>


                                </div>
                                <div class="form-group">
                                    <label for="father_name">Nachname :</label>
                                    <input type="text" name="father_name" id="father_name"
                                           value="<?php echo $surname; ?>" required/>
                                </div>
                            </div>
                            <div class="form-radio">
                                <label for="gender" class="radio-label">Geschlecht :</label>
                                <div class="form-radio-item-group">
                                    <div class="form-radio-item">
                                        <input type="radio" name="gender" id="male" checked>
                                        <label for="male">Männlich</label>
                                        <span class="check"></span>
                                    </div>
                                <div class="form-radio-item">
                                    <input type="radio" name="gender" id="female">
                                    <label for="female">Weiblich</label>
                                    <span class="check"></span>
                                </div>
                                    <div class="form-radio-item">
                                        <input type="radio" name="gender" id="divers">
                                        <label for="divers">Divers</label>
                                        <span class="check"></span>
                                    </div>
                                </div>

                            </div>
                            <!-- Möglich für Passwort vergessen-->
                            <!--   <div class="form-row">
                                   <div class="form-group">
                                       <label for="state">altes Passwort:</label>
                                       <input type="text" name="state" id="state">
                                   </div>
                                   <div class="form-group">
                                       <label for="city">neues Passwort:</label>
                                       <input type="text" name="city" id="city">
                                   </div>
                               </div>
                                   <div class="form-row">
                                       <div class="form-group">
                                           <label for="street">neus Passwort wiederholen</label>
                                           <input type="text" name="street" id="street">
                                       </div>
                                   </div>-->
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">E-Mail Adresse :</label>
                                    <input class="profilemail" type="email" name="email" id="email"
                                           value="<?php echo $email; ?>"/>
                                </div>

                            </div>
                            <div class="form-submit">
                                <input type="reset" value="Zurücksetzen" class="submit" name="reset" id="reset"/>
                                <input type="submit" value="Speichern" class="submit" name="submit" id="submit"/>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div><?php include "footer.html"; ?>

