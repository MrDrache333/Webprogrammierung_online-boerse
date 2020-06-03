<!--Header einbinden-->
<?php include "header.php"; ?>
<div class="header">
    <nav>
        <ul class="navi">
            <li class="navibutton">
                <a href="index.php" class="naviobjekt"> Startseite</a>
            </li>
            <li class="navibutton">
                <a href="profil.php" class="naviobjekt"> Mein Profil</a>
            </li>
            <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>


            <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
        </ul>

    </nav>
</div>
<div class="grid-farbe">
    <div class="container">

        <h1> Neue Anzeige</h1>
        <div class="profile-container">
            <div class="profile-content">
                <div class="profile-form">
                    <div class="form-col">
                        <form method="POST" class="profile-form" id="profile-form">
                            <h2>Mein Produktbild</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <img src="images/company_placeholder.png" alt="Profilbild-Template" id="pb_image">
                                </div>
                            </div>
                            <div class="form-submit">
                                <input type="submit" value="Produktbild löschen" class="submit" name="reset_pb"
                                       id="reset_pb"/>
                                <input type="submit" value="Hochladen" class="submit" name="submit_pb" id="submit_pb"/>
                            </div>
                        </form>
                    </div>
                    <div class="form-col">
                        <form method="POST" class="profile-form" id="profile-form-image">
                            <h2>Meine Informationen</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Titel :</label>
                                    <input type="text" name="name" id="name" placeholder="Verkäufer/in" required/>
                                </div>
                                <div class="form-group">
                                    <label for="father_name">Untertitel :</label>
                                    <input type="text" name="father_name" id="father_name" placeholder="Einzelhandel"
                                           required/>
                                </div>
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="state">Standort:</label>
                            <input type="text" name="state" id="state" placeholder="Ort PLZ">

                            <input type="text" name="state" id="state" placeholder="Straße Hsnr.">
                        </div>
                        <div class="form-group">
                            <label for="city">Frei ab :</label>
                            <input type="text" name="city" id="city" placeholder="15.01.2021">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="street">Beschreibung :</label>
                            <textarea name="beschreibung" id="beschreibung"
                                      cols="50" rows="7" placeholder="Was über den Beruf zu sagen ist."></textarea>

                        </div>
                    </div>
                    <div class="form-row">

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

