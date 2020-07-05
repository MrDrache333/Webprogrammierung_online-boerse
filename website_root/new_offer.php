<?php include "header.php";
include "new_offer_loader.php";
?>


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
    <div class="content">
        <div class="offer_content"><?php
            if (isset($_SESSION["bearbeiten"])) { ?>
                <h1>Anzeige bearbeiten</h1>
            <?php } else { ?>
                <h1>Anzeige erstellen</h1>
            <?php } ?>
            <div class="content_input">
                <div class="column">
                    <div class="card">
                        <h2>Produktbild</h2>
                        <label for="error">
                            <?php if (isset($_SESSION["error"]) && preg_match('/Bilder/', $_SESSION["error"])) {
                                echo '<i style="color: #FF0000"> Es wurde kein Bild ausgewählt :-)</i>';
                            } ?></label>
                        <label for="error">
                            <?php if (isset($_SESSION["error"]) && preg_match('/gif/', $_SESSION["error"])) {
                                echo '<i style="color: #FF0000"> Nur JPG, JPEG, PNG & GIF Dateiformate sind erlaubt.</i>';
                            } ?></label>
                        <label for="error">
                            <?php if (isset($_SESSION["error"]) && preg_match('/zugross/', $_SESSION["error"])) {
                                echo '<i style="color: #FF0000"> Das Bild darf maximal 10MB groß sein!</i>';
                            } ?></label>
                        <label for="error">
                            <?php if (isset($_SESSION["error"]) && preg_match('/Bildhochladen/', $_SESSION["error"])) {
                                echo '<i style="color: #FF0000"> Das Bild konnte nicht hochgeladen werden!</i>';
                            } ?></label>

                        <img src="<?php echo $logo ?? ""; ?>" alt="Produktbild-Template" id="pb_image"
                             class="fakeimg">
                        <input type="hidden" value="<?php echo($logo) ?>" id="image" name="image"/>
                        <form enctype="multipart/form-data" action="new_offer.php" method="POST" class="new_offer-form"
                              id="new_offer-form">
                            <div class="form-submit">
                                <input type="submit" value="Bild hochlanden" name="uploadLogoSubmit" id="submit_bild">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <?php if (isset($_SESSION["bearbeiten"])) { ?>
                                    <input type="submit" value="Bild löschen" class="bild-delete"
                                           name="bild-delete" id="bild-delete"/>
                                <?php } ?>
                            </div>

                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <h2>Basisinformationen</h2>
                        <form method="POST" class="new_offer-form" id="new_offer-form">
                            <label for="titel"><?php if (isset($_SESSION["error"]) && preg_match('/Titel/', $_SESSION["error"])) {
                                    echo '<i style="color: #FF0000"> Ihr Titel ist falsch!</i>';
                                } else {
                                    echo "Titel:";
                                } ?></label>
                            <input type="text" name="titel" id="titel" placeholder="Verkäufer/in"
                                   value="<?php echo $titel ?? ""; ?>"
                            />
                            <label for="untertitel"><?php if (isset($_SESSION["error"]) && preg_match('/Untertitel/', $_SESSION["error"])) {
                                    echo '<i style="color: #FF0000"> Ihr Untertitel ist falsch!</i>';
                                } else {
                                    echo "Untertitel:";
                                } ?></label>
                            <input type="text" name="subtitel" id="subtitel" placeholder="Einzelhandel"
                                   value="<?php echo $subtitle ?? ""; ?>"/>
                            <label for="firmenname"><?php if (isset($_SESSION["error"]) && preg_match('/Firmenname/', $_SESSION["error"])) {
                                    echo '<i style="color: #FF0000"> Ihr Firmenname ist falsch!</i>';
                                } else {
                                    echo "Firmenname:";
                                } ?></label>
                            <input type="text" name="companyname" id="companyname" placeholder="Firmenname"
                                   value="<?php echo $companyname ?? ""; ?>"/>
                            <label for="straße"><?php if (isset($_SESSION["error"]) && preg_match('/Straße/', $_SESSION["error"])) {
                                    echo '<i style="color: #FF0000"> Ihr Straße ist falsch!</i>';
                                } else {
                                    echo "Straße:";
                                } ?></label>
                            <input type="text" name="straße" id="straße" placeholder="Musterstraße"
                                   value="<?php echo $straße ?? ""; ?>"/>
                            <label for="hausnummer"><?php if (isset($_SESSION["error"]) && preg_match('/Hausnummer/', $_SESSION["error"])) {
                                    echo '<i style="color: #FF0000"> Ihr Hausnummer ist falsch!</i>';
                                } else {
                                    echo "Hausnummer:";
                                } ?></label>
                            <input type="text" name="hausnummer" id="hausnummer" placeholder="1234"
                                   value="<?php echo $hsnr ?? ""; ?>"/>
                            <label for="Ort"><?php if (isset($_SESSION["error"]) && preg_match('/Ort/', $_SESSION["error"])) {
                                    echo '<i style="color: #FF0000"> Ihr Ort ist falsch!</i>';
                                } else {
                                    echo "Titel:";
                                } ?></label>
                            <input type="text" name="ort" id="ort" placeholder="Musterhausen"
                                   value="<?php echo $ort ?? ""; ?>"
                            />
                            <label for="postleitzahl"><?php if (isset($_SESSION["error"]) && preg_match('/Postleitzahl/', $_SESSION["error"])) {
                                    echo '<i style="color: #FF0000"> Ihr Postleitzahl ist falsch!</i>';
                                } else {
                                    echo "Postleitzahl:";
                                } ?></label>
                            <input type="text" name="plz" id="plz" placeholder="12345" value="<?php echo $plz ?? ""; ?>"
                            />
                            <label for="verfügbarkeitsdatum"><?php if (isset($_SESSION["error"]) && preg_match('/Verfügbarkeitsdatum/', $_SESSION["error"])) {
                                    echo '<i style="color: #FF0000"> Ihr Verfügbarkeitsdatum ist falsch!</i>';
                                } else {
                                    echo "Frei ab:";
                                } ?></label>
                            <input type="date" name="free" id="free" placeholder="2021-01-01" class="date_free"
                                   value="<?php echo $free ?? ""; ?>"

                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <h2>Weitere Informationen</h2>
                        <div class="types">
                            <div class="typeGroup">
                                <label for="angebotsart"><?php if (isset($_SESSION["error"]) && preg_match('/Angebotsart/', $_SESSION["error"])) {
                                        echo '<h3><i style="color: #FF0000"> Angebotsart</i></h3>';
                                    } else {
                                        echo '<h3>Angebotsart:</h3>';
                                    } ?></label>
                                <div class="radiobutton">
                                    <label class="filter-radio">
                                        <input type="radio" name="angebotsart"
                                               value="0" <?php echo $angebotsart0 ?? ""; ?>>
                                        <i></i>
                                        Arbeit
                                    </label>
                                    <label class="filter-radio">
                                        <input type="radio" name="angebotsart"
                                               value="1"<?php echo $angebotsart1 ?? ""; ?>>
                                        <i></i>
                                        Ausbildung
                                    </label>
                                    <label class="filter-radio">
                                        <input type="radio" name="angebotsart"
                                               value="2"<?php echo $angebotsart2 ?? ""; ?>>
                                        <i></i>
                                        Praktikum
                                    </label>
                                    <label class="filter-radio">
                                        <input type="radio" name="angebotsart"
                                               value="3"<?php echo $angebotsart3 ?? ""; ?>>
                                        <i></i>
                                        Selbstständigkeit
                                    </label>
                                </div>
                            </div>
                            <div class="typeGroup">
                                <label for="befristung"><?php if (isset($_SESSION["error"]) && preg_match('/Befristung/', $_SESSION["error"])) {
                                        echo '<h3><i style="color: #FF0000"> Befristung</i></h3>';
                                    } else {
                                        echo '<h3>Befristung</h3>';
                                    } ?></label>
                                <div class="radiobutton">
                                    <label class="filter-radio">
                                        <input type="radio" name="befristung"
                                               value="0" <?php echo $befristung0 ?? ""; ?>>
                                        <i></i>
                                        Befristet
                                    </label>
                                    <label class="filter-radio">
                                        <input type="radio" name="befristung"
                                               value="1"<?php echo $befristung1 ?? ""; ?>>
                                        <i></i>
                                        Unbefristet
                                    </label>
                                    <label class="filter-radio">
                                        <input type="radio" name="befristung"
                                               value="2"<?php echo $befristung2 ?? ""; ?>>
                                        <i></i>
                                        Keine Angabe
                                    </label>
                                </div>
                            </div>

                            <div class="typeGroup">
                                <label for="Arbeitszeit"><?php if (isset($_SESSION["error"]) && preg_match('/Arbeitszeit/', $_SESSION["error"])) {
                                        echo '<h3><i style="color: #FF0000"> Arbeitszeit</i></h3>';
                                    } else {
                                        echo '<h3>Arbeitszeit</h3>';
                                    } ?></label>
                                <div class="radiobutton">
                                    <label class="filter-radio">
                                        <input type="radio" name="arbeitszeiten"
                                               value="0" <?php echo $arbeitszeit0 ?? ""; ?>>
                                        <i></i>
                                        Vollzeit
                                    </label>
                                    <label class="filter-radio">
                                        <input type="radio" name="arbeitszeiten"
                                               value="1"<?php echo $arbeitszeit1 ?? ""; ?>>
                                        <i></i>
                                        Teilzeit
                                    </label>
                                    <label class="filter-radio">
                                        <input type="radio" name="arbeitszeiten"
                                               value="2"<?php echo $arbeitszeit2 ?? ""; ?>>
                                        <i></i>
                                        Schicht
                                    </label>
                                    <label class="filter-radio">
                                        <input type="radio" name="arbeitszeiten"
                                               value="3"<?php echo $arbeitszeit3 ?? ""; ?>>
                                        <i></i>
                                        Heim-/Teilzeit
                                    </label>
                                    <label class="filter-radio">
                                        <input type="radio" name="arbeitszeiten"
                                               value="4"<?php echo $arbeitszeit4 ?? ""; ?>>
                                        <i></i>
                                        Minijob
                                    </label>
                                </div>
                            </div>
                        </div>

                        <label for="beschreibung"><?php if (isset($_SESSION["error"]) && preg_match('/Beschreibung/', $_SESSION["error"])) {
                                echo '<i style="color: #FF0000"> Ihre Beschreibung ist falsch!</i>';
                            } else {
                                echo '<h3>Beschreibung:</h3>';
                            } ?></label>

                        <textarea name="beschreibung" id="beschreibung" cols="50" rows="14"
                                  placeholder="Was über den Beruf zu sagen ist."><?php echo $beschreibung ?? ""; ?></textarea>

                        <div style="height: 20px"></div>
                        <div class="form-submit">
                            <?php

                            if (isset($_SESSION["bearbeiten"])) { ?>
                                <input type="submit" value="Bearbeitete Anzeige veröffentlichen" class="button_offer"
                                       name="edit_offer"
                                       id="submit_offer"/>
                            <?php } else {
                                ?>
                                <input type="submit" value="Anzeige erstellen" class="button_offer"
                                       name="submit_offer"
                                       id="submit_offer"/>
                            <?php } ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include "footer.php"; ?>

