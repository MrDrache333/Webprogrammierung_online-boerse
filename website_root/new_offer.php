<?php include "header.php";
include "h.php";
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
                        <img src="<?php echo($logo) ?>" alt="Produktbild-Template" id="pb_image"
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
                            <label for="titel">Titel</label>
                            <input type="text" name="titel" id="titel" placeholder="Verkäufer/in"
                                   value="<?php echo $titel ?? ""; ?>"
                            />
                            <label for="subtitel">Untertitel</label>
                            <input type="text" name="subtitel" id="subtitel" placeholder="Einzelhandel"
                                   value="<?php echo $subtitle ?? ""; ?>"/>
                            <label for="companyname">Firmenname</label>
                            <input type="text" name="companyname" id="companyname" placeholder="Firmenname"
                                   value="<?php echo $companyname ?? ""; ?>"/>
                            <label for="straße">Straße</label>
                            <input type="text" name="straße" id="straße" placeholder="Musterstraße"
                                   value="<?php echo $straße ?? ""; ?>"/>
                            <label for="hausnummer">Hausnummer</label>
                            <input type="text" name="hausnummer" id="hausnummer" placeholder="1234"
                                   value="<?php echo $hsnr ?? ""; ?>"/>
                            <label for="ort">Ort</label>
                            <input type="text" name="ort" id="ort" placeholder="Musterhausen"
                                   value="<?php echo $ort ?? ""; ?>"
                            />
                            <label for="plz">Postleitzahl</label>
                            <input type="text" name="plz" id="plz" placeholder="12345" value="<?php echo $plz ?? ""; ?>"
                            />
                            <label for="free">Frei ab</label>
                            <input type="date" name="free" id="free" placeholder="2021-01-01" class="date_free"
                                   value="<?php echo $free ?? ""; ?>"

                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <h2>Weitere Informationen</h2>
                        <div class="types">
                            <div class="typeGroup">
                                <h3>Angebotsart</h3>
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
                                <h3>Befristung</h3>
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
                                <h3>Arbeitszeit</h3>
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

                        <label for="beschreibung" hidden>Beschreibung</label>
                        <h3>Beschreibung</h3>
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


<?php include "footer.html"; ?>

