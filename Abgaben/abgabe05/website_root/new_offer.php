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
    $_SESSION["error"] = "loggout";
    ?>
    <script language="javascript" type="text/javascript"> document.location = "index.php"; </script><?php
} else {
    $offer = new Offer();
    if (isset($_POST["edit_offer"])) {
        if ($eingelogt == "true") {
            $titel = $_POST["titel"];
            $subtitle = $_POST["subtitel"];
            $companyname = $_POST["companyname"];
            $beschreibung = $_POST["beschreibung"];
            $free = $_POST["free"];
            $art = $_POST["angebotsart"];
            $befristung = $_POST["befristung"];
            $arbeitszeit = $_POST["arbeitszeiten"];


            if (!preg_match('/^[a-zA-Z]{3,50}$/', $titel)) {
                $_SESSION["error"] .= "Ihr Titel ist falsch.";
            }
            if (!preg_match('/^[a-zA-Z]{3,50}$/', $subtitle)) {
                $_SESSION["error"] .= " Ihr Untertitel ist falsch.";
            }
            /*  if (!preg_match('/^[a-zA-Z]{3,50}$/', $straße)) {
                  $_SESSION["error"] .= "Ihr Straße ist falsch.";
              }
              if (!preg_match('/^[a-zA-Z0-9]{1,50}$/', $hsnr)) {
                  $_SESSION["error"] .= " Ihr Hausnummer ist falsch.";
              }
              if (!preg_match('/([a-zA-Z]){2,20}$/', $ort)) {
                  $_SESSION["error"] .= " Ihre Ort ist falsch.";
              }
              if (!preg_match('/([0-9]){5,5}$/', $plz)) {
                  $_SESSION["error"] .= " Ihre Postleitzahl ist falsch.";
              }*/
            if (!preg_match('/^[0-9]{3,50}$/', $free)) {
                $_SESSION["error"] .= " Ihr Verfügbarkeitsdatumfrei ist falsch.";
            }
            if (!preg_match('/^[a-zA-Z0-9]{5,20}$/', $beschreibung)) {
                $_SESSION["error"] .= " Ihre Beschreibung ist falsch. ";
            }
            if (!preg_match('/^[a-zA-Z]{3,50}$/', $companyname)) {
                $_SESSION["error"] .= "Ihr Firmenname ist falsch. ";
            }
            if ($art == null) {
                $_SESSION["error"] .= "Ihr Angebotsart ist nicht gesetzt. ";
            }
            if ($befristung == null) {
                $_SESSION["error"] .= "Ihr Befristung ist nicht gesetzt. ";
            }
            if ($arbeitszeit == null) {
                $_SESSION["error"] .= "Ihr Arbeitszeit ist nicht gesetzt. ";
            }

            if ($_SESSION["error"] == null) {

                $offer->setTitle(htmlspecialchars($titel));
                $offer->setSubTitle(htmlspecialchars($subtitle));
                $offer->setCompanyName(htmlspecialchars($companyname));
                $offer->setDescription(htmlspecialchars($beschreibung));
                $offerid = $_SESSION["offerid"];
                $offer->setId($offerid);
                setcookie("offerid", "false", time() + 60 * 60 * 24);
                /*$offer->setAddress($_POST["titel"]);*/


                $offer->setFree(htmlspecialchars($free));
                $offer->setOfferType($art);
                $offer->setDuration($befristung);
                $offer->setWorkModel($arbeitszeit);
                $OfferDao->update($offer);

                ?>
                <script language="javascript" type="text/javascript"> document.location = "messages.php"; </script><?php


            } else {
                echo $_SESSION["error"];
                unset($_SESSION["error"]);
            }
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
            $ort = $AddressObjekt->getTown();
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

        }
    }
    // To upload the Logo
    if (isset($_POST["uploadLogoSubmit"])) {
        $imageTarget_dir = "images/logos/";
        if (!file_exists($imageTarget_dir) && !mkdir($imageTarget_dir) && !is_dir($imageTarget_dir)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $imageTarget_dir));
        }
        $uploadOk = 1;
        $tmp_ID = "tempOfferImage";
        $imageFileType = strtolower(pathinfo($imageTarget_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        $randomUploadNumber = random_int(1, 100000);
        $imageTarget_file = $imageTarget_dir . $tmp_ID . $randomUploadNumber . "." . $imageFileType;
        while (file_exists($imageTarget_file)) {
            $randomUploadNumber = random_int(1, 100000);
            $imageTarget_file = $imageTarget_dir . $tmp_ID . $randomUploadNumber . "." . $imageFileType;
        }
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Das ist kein Bild.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000000) {
            echo "Das Bild ist zu groß, nur 10MBit erlaubt.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
            && $imageFileType !== "gif") {
            echo "Nur JPG, JPEG, PNG & GIF Dateiformate sind erlaubt.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === 0) {
            echo "Das Bild konnte nicht hochgeladen werden.";
            // if everything is ok, try to upload file
        } else if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imageTarget_file)) {
            echo "Error: Das Bild konnte nicht hochgeladen werden.";
        } else {
            $offer->setLogo($imageTarget_file);
            $_SESSION["tempUpload"] = $tmp_ID . $randomUploadNumber . "." . $imageFileType;

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
                $hsnr = htmlspecialchars($_POST["hausnummer"]);
                $ort = htmlspecialchars($_POST["ort"]);
                $plz = htmlspecialchars($_POST["plz"]);
                $free = htmlspecialchars($_POST["free"]);
                $beschreibung = htmlspecialchars($_POST["beschreibung"]);
                $companyname = htmlspecialchars($_POST["companyname"]);
                $art = $_POST['angebotsart'];
                $befristung = $_POST['befristung'];
                $arbeitszeit = $_POST['arbeitszeiten'];

                if (!preg_match('/^[a-zA-Z-ä-ü-ß]{3,50}$/', $titel)) {
                    $_SESSION["error"] .= "Ihr Titel ist falsch.";
                }
                if (!preg_match('/^[a-zA-Z]{3,50}$/', $subtitle)) {
                    $_SESSION["error"] .= " Ihr Untertitel ist falsch.";
                }
                if (!preg_match('/^[a-zA-Z-ä-ü-ß]{3,50}$/', $straße)) {
                    $_SESSION["error"] .= "Ihr Straße ist falsch.";
                }
                if (!preg_match('/^[a-zA-Z0-9-ä-ü-ß]{1,50}$/', $hsnr)) {
                    $_SESSION["error"] .= " Ihr Hausnummer ist falsch.";
                }
                if (!preg_match('/^[a-zA-Z-ä-ü-ß]{2,20}$/', $ort)) {
                    $_SESSION["error"] .= " Ihre Ort ist falsch.";
                }
                if (!preg_match('/^[\d]{5}$/', $plz)) {
                    $_SESSION["error"] .= " Ihre Postleitzahl ist falsch.";
                }
                if (!preg_match('/[\d]{3,50}/', $free)) {
                    $_SESSION["error"] .= " Ihr Verfügbarkeitsdatumfrei ist falsch.";
                }
                if (!preg_match('/[a-z A-Z 0-9-ä-ü-ß]{5,50}$/', $beschreibung)) {
                    $_SESSION["error"] .= " Ihre Beschreibung ist falsch. ";
                }
                if (!preg_match('/^[a-zA-Z-ä-ü-ß]{3,50}$/', $companyname)) {
                    $_SESSION["error"] .= "Ihr Firmenname ist falsch. ";
                }
                if ($art == null) {
                    $_SESSION["error"] .= "Ihr Angebotsart ist nicht gesetzt. ";
                }
                if ($befristung == null) {
                    $_SESSION["error"] .= "Ihr Befristung ist nicht gesetzt. ";
                }
                if ($arbeitszeit == null) {
                    $_SESSION["error"] .= "Ihr Arbeitszeit ist nicht gesetzt. ";
                }

                if ($_SESSION["error"] == null) {


                    $address = new Address(1, "Deutschland", $ort, $straße, $hsnr, $plz);
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
                    if ($result) {
                        $result = $OfferDao->getLastOwnOffer($user);
                        if ($result != null) {
                            $createdOffer = current($result);
                            if (isset($_SESSION['tempUpload'])) {
                                rename("images/logos/" . $_SESSION['tempUpload'], "images/logos/" . $createdOffer->getId() . substr($_SESSION['tempUpload'], strpos($_SESSION["tempUpload"], ".")));
                                unset($_SESSION['tempUpload']);

                            }
                        }
                    }
                    ?>
                    <script language="javascript"
                            type="text/javascript"> document.location = "messages.php"; </script><?php
                } else {
                    echo $_SESSION["error"];
                    unset($_SESSION["error"]);
                }
            } else {
                echo "Alle Felder bitte ausfüllen";
            }
        }
        unset($_SESSION["error"]);
    }
}

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
    <div class="row">
        <h1> Neue Anzeige</h1>
        <div class="leftcolumn">
            <div class="card">
                <form enctype="multipart/form-data" action="new_offer.php" method="POST" class="new_offer-form"
                      id="new_offer-form">
                    <h2>Mein Produktbild</h2>
                    <img src="<?php echo($offer->getLogo()) ?>" alt="Produktbild-Template" id="pb_image"
                         class="fakeimg">
                    <div class="form-submit">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="uploadLogoSubmit">
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
                           value="<?php echo $ort ?? ""; ?>"
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
                          required><?php echo $beschreibung ?? ""; ?></textarea>

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


<?php include "footer.html"; ?>

