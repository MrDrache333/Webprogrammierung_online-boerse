<?php include "header.php"; ?>

<?php

use php\address\Address;
use php\offer\Offer;
use php\offer\OfferDAOImpl;
use php\user\UserDAOImpl;


include_once 'php/classes.php';
$OfferDao = new OfferDAOImpl();
$UserDAO = new UserDAOImpl();

$eingelogt = $_COOKIE['loggedin'];
if ($eingelogt != "true") {
    ?>
    <script language="javascript" type="text/javascript"> document.location = "index.php"; </script><?php
} else {

    if (isset($_POST["edit_offer"])) {
        if ($eingelogt == "true") {
            $offer = new Offer();
            $offer->setTitle($_POST["titel"]);
            $offer->setSubTitle($_POST["subtitel"]);
            $offer->setCompanyName($_POST["companyname"]);
            $offer->setDescription($_POST["beschreibung"]);
            $offerid = $_SESSION["offerid"];
            $offer->setId($offerid);
            setcookie("offerid", "false", time() + 60 * 60 * 24);
            /*$offer->setAddress($_POST["titel"]);*/


            $offer->setFree($_POST["free"]);
            $offer->setOfferType($_POST["angebotsart"]);
            $offer->setDuration($_POST["befristung"]);
            $offer->setWorkModel($_POST["arbeitszeiten"]);
            $OfferDao->update($offer);


        } else {
            echo "Sie wurden zwischenzeitlich ausgeloogt";
}
}

    if (isset($_POST["bearbeiten_offer"])) {

        if ($eingelogt == "true") {
            $id = $_POST["id_offer"];
            $offer = $OfferDao->getOfferByID($id);
            $_SESSION["offerid"] = $id;

            if ($offer !== null) {
                //TODO Was passiert, wenn kein Ergebnis zurückgegeben wurde?
            }
            $titel = $offer->getTitle();
            $subtitle = $offer->getSubTitle();
            $AddressObjekt = $offer->getAddress();
            $companyname = $offer->getCompanyName();
            $straße = $AddressObjekt->getStreet();
            $hsnr = $AddressObjekt->getNumber();
            $plz = $AddressObjekt->getPlz();
            $country = $AddressObjekt->getState();
            $town = $AddressObjekt->getTown();
            $free = $offer->getFree();
            $befristung = $offer->getDuration();
            $angebotsart = $offer->getOfferType();
            $arbeitszeit = $offer->getWorkModel();
            $beschreibung = $offer->getDescription();


            if ($angebotsart == 0) {
                $angebotsart0 = "checked";
            } elseif ($angebotsart == 1) {
                $angebotsart1 = "checked";
            } elseif ($angebotsart == 2) {
                $angebotsart2 = "checked";
            } elseif ($angebotsart == 3) {
                $angebotsart3 = "checked";
            } else {
                $angebotsart4 = "checked";
            }

            if ($befristung == 0) {
                $befristung0 = "checked";
            } elseif ($befristung == 1) {
                $befristung1 = "checked";
            } elseif ($befristung == 2) {
                $befristung2 = "checked";
            } else {
                $befristung3 = "checked";
            }


            if ($arbeitszeit == 0) {
                $arbeitszeit0 = "checked";
            } elseif ($arbeitszeit == 1) {
                $arbeitszeit1 = "checked";
            } elseif ($arbeitszeit == 2) {
                $arbeitszeit2 = "checked";
            } elseif ($arbeitszeit == 3) {
                $arbeitszeit3 = "checked";
            } else {
                $arbeitszeit4 = "checked";
            }

        } else {
            echo "Sie wurden zwischenzeitlich ausgeloogt";
        }
}


    if (isset($_POST["submit_offer"])) {
        if ($eingelogt == "true") {

            if (isset($_POST["titel"], $_POST["subtitel"], $_POST["straße"], $_POST["hausnummer"], $_POST["ort"], $_POST["plz"], $_POST["free"], $_POST["beschreibung"], $_POST["companyname"])) {
                $AddressDAO = $OfferDao->getAddressDAOImpl();
                $email = $_COOKIE["email"];
                $user = $UserDAO->findUserByMail($email);
                $idaktuelle = $user->getId();

                $titel = htmlspecialchars($_POST["titel"]);
                $subtitle = htmlspecialchars($_POST["subtitel"]);
                $straße = htmlspecialchars($_POST["straße"]);
                $hausnummer = htmlspecialchars($_POST["hausnummer"]);
                $ort = htmlspecialchars($_POST["ort"]);
                $plz = htmlspecialchars($_POST["plz"]);
                $free = htmlspecialchars($_POST["free"]);
                $beschreibung = htmlspecialchars($_POST["beschreibung"]);
                $companyname = htmlspecialchars($_POST["companyname"]);

                $art = $_POST['angebotsart'];
                $befristung = $_POST['befristung'];
                $arbeitszeit = $_POST['arbeitszeiten'];


                $address = new Address(1, "Deutschland", $ort, $straße, $hausnummer, $plz);
                $offer = new Offer();
                $offer->setAddress($address);
                $offer->setTitle($titel);
                $offer->setSubTitle($subtitle);
                $offer->setFree(date($free));
                $offer->setCompanyName($companyname);
                $offer->setDescription($beschreibung);
                $offer->setCreated(date("Y-m-d"));
                $offer->setDuration($befristung);
                $offer->setOfferType($art);
                $offer->setCreator($idaktuelle);
                $offer->setWorkModel($arbeitszeit);
                $result = $OfferDao->create($offer);

            } else {
                echo "Alle Felder bitte ausfüllen";
            }
        } else {
            echo "Sie wurden zwischenzeitlich ausgeloggt";


        }
    }
}

?>
<form action="massages.php" method="post" enctype="multipart/form-data">
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
        <div class="row">
            <h1> Neue Anzeige</h1>
            <div class="leftcolumn">
                <div class="card">
                    <form method="POST" class="new_offer-form" id="new_offer-form">
                        <h2>Mein Produktbild</h2>


                        <img src="images/company_placeholder.png" alt="Produktbild-Template" id="pb_image">

                        <div class="form-submit">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                        </div>
                    </form>
                    <form method="POST" class="new_offer-form" id="new_offer-form" action="messages.php"></form>
                </div>
            </div>
            <div class="middlecolumn">
                <div class="card">
                    <h2>Meine Informationen</h2>
                    <form method="POST" class="new_offer-form" id="new_offer-form">
                        <label for="titel">Titel :</label>
                        <input type="text" name="titel" id="titel" placeholder="Verkäufer/in"
                               value="<?php echo $titel ?? ""; ?>"
                               required/>
                        <label for="subtitetl">Untertitel :</label>
                        <input type="text" name="subtitel" id="subtitel" placeholder="Einzelhandel"
                               value="<?php echo $subtitle ?? ""; ?>" required/>
                        <label for="subtitetl">Firmenname :</label>
                        <input type="text" name="companyname" id="companyname" placeholder="Firmenname"
                               value="<?php echo $companyname ?? ""; ?>" required/>
                        <label for="position">Straße:</label>
                        <input type="text" name="straße" id="straße" placeholder="Musterstraße"
                               value="<?php echo $straße ?? ""; ?>" required/>
                        <label for="position">Hausnummer :</label>
                        <input type="text" name="hausnummer" id="hausnummer" placeholder="1234"
                               value="<?php echo $hsnr ?? ""; ?>" required/>
                        <label for="position">Ort:</label>
                        <input type="text" name="ort" id="ort" placeholder="Musterhausen"
                               value="<?php echo $town ?? ""; ?>"
                               required/>
                        <label for="position">Postleitzahl:</label>
                        <input type="text" name="plz" id="plz" placeholder="12345" value="<?php echo $plz ?? ""; ?>"
                               required/>
                        <label for="position">Standort:</label>
                        <label for="free">Frei ab :</label>
                        <input type="date" name="free" id="free" placeholder="2021-01-01" class="date_free"
                               value="<?php echo $free ?? ""; ?>"
                               required/>
                        <br>
                </div>
            </div>
            <div class="rightcolumne">
                <div class="card">
                    Angebotsart:
                    <div class="radiobutton">
                        <input type="radio" name="angebotsart" value="0" <?php echo $angebotsart0 ?? ""; ?>>
                            <label for="male">Arbeit</label>
                            <span class="check"></span>
                            <input type="radio" name="angebotsart" value="1"<?php echo $angebotsart1 ?? ""; ?>>
                            <label for="female">Ausbildung</label>
                            <span class="check"></span>
                            <input type="radio" name="angebotsart" value="2"<?php echo $angebotsart2 ?? ""; ?>>
                            <label for="divers">Praktikum</label>
                            <span class="check"></span>
                            <input type="radio" name="angebotsart" value="3"<?php echo $angebotsart3 ?? ""; ?>>
                        <label for="divers">Selbstständigkeit</label>
                        <span class="check"></span>
                    </div>
                    <br>
                    Befristung:
                    <div class="radiobutton">
                        <input type="radio" name="befristung" value="0" <?php echo $befristung0 ?? ""; ?>>
                            <label for="male">Befristet</label>
                            <span class="check"></span>
                            <input type="radio" name="befristung" value="1"<?php echo $befristung1 ?? ""; ?>>
                            <label for="female">Unbefristet</label>
                            <span class="check"></span>
                            <input type="radio" name="befristung" value="2"<?php echo $befristung2 ?? ""; ?>>
                        <label for="divers">Keine Angaben</label>
                        <span class="check"></span>
                    </div>
                    <br>
                    Arbeitszeit:

                    <div class="radiobutton">
                        <input type="radio" name="arbeitszeiten" value="0" <?php echo $arbeitszeit0 ?? ""; ?>>
                            <label for="male">Vollzeit</label>
                            <span class="check"></span>
                            <input type="radio" name="arbeitszeiten" value="1"<?php echo $arbeitszeit1 ?? ""; ?>>
                            <label for="female">Teilzeit</label>
                            <span class="check"></span>
                            <input type="radio" name="arbeitszeiten" value="2"<?php echo $arbeitszeit2 ?? ""; ?>>
                            <label for="divers">Schicht</label>
                            <span class="check"></span>
                            <input type="radio" name="arbeitszeiten" value="3"<?php echo $arbeitszeit3 ?? ""; ?>>
                            <label for="divers">Heim-/Telearbeit</label>
                            <span class="check"></span>
                            <input type="radio" name="arbeitszeiten" value="4"<?php echo $arbeitszeit4 ?? ""; ?>>
                            <label for="divers">Minijob</label>
                            <span class="check"></span>
                        </div>

                        <br>

                        <label for="street">Beschreibung :<br></label>
                        <textarea name="beschreibung" id="beschreibung" cols="50" rows="7"
                                  placeholder="Was über den Beruf zu sagen ist."
                                  required><?php echo $beschreibung ?? ""; ?> </textarea>

                        <div class="form-submit">
                            <?php if (isset($_POST["bearbeiten_offer"])) { ?>
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
</form>


<?php include "footer.html"; ?>

