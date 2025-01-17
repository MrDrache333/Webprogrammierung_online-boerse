<?php

use php\address\Address;
use php\offer\Offer;
use php\offer\OfferDAOImpl;
use php\user\UserDAOImpl;


include_once 'php/classes.php';
$OfferDao = new OfferDAOImpl();
$UserDAO = new UserDAOImpl();


$eingelogt = $_COOKIE['loggedin'] ?? null;


$offer = new Offer();

if (isset($_POST["titel"])) {
    $titel = htmlspecialchars($_POST["titel"]);
}
if (isset($_POST["subtitel"])) {
    $subtitle = htmlspecialchars($_POST["subtitel"]);
}
if (isset($_POST["straße"])) {
    $straße = htmlspecialchars($_POST["straße"]);
}
if (isset($_POST["hausnummer"])) {
    $hsnr = htmlspecialchars($_POST["hausnummer"]);
}
if (isset($_POST["ort"])) {
    $ort = htmlspecialchars($_POST["ort"]);
}
if (isset($_POST["plz"])) {
    $plz = htmlspecialchars($_POST["plz"]);
}
if (isset($_POST["free"])) {
    $free = htmlspecialchars($_POST["free"]);
}

if (isset($_POST["beschreibung"])) {
    $beschreibung = htmlspecialchars($_POST["beschreibung"]);
}
if (isset($_POST["companyname"])) {
    $companyname = htmlspecialchars($_POST["companyname"]);
}
if (isset($_POST["angebotsart"])) {
    $art = htmlspecialchars($_POST["angebotsart"]);
    if ($art == 0) {
        $angebotsart0 = "checked";
    } elseif ($art == 1) {
        $angebotsart1 = "checked";
    } elseif ($art == 2) {
        $angebotsart2 = "checked";
    } elseif ($art == 3) {
        $angebotsart3 = "checked";
    } else {
        $angebotsart4 = "checked";
    }
}
if (isset($_POST["befristung"])) {
    $befristung = htmlspecialchars($_POST["befristung"]);
    if ($befristung == 0) {
        $befristung0 = "checked";
    } elseif ($befristung == 1) {
        $befristung1 = "checked";
    } elseif ($befristung == 2) {
        $befristung2 = "checked";
    } else {
        $befristung3 = "checked";
    }
}
if (isset($_POST["arbeitszeiten"])) {
    $arbeitszeit = htmlspecialchars($_POST["arbeitszeiten"]);
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


if (isset($_POST["edit_offer"])) {
    if (isset($_SESSION["token"]) && isset($_POST["token"]) && $_SESSION["token"] == $_POST["token"]) {
        if ($eingelogt == "true") {


            if ($titel == null || strlen($titel) > 50) {
                $errornachricht = Fehlerbehandlung("Ihr Titel ist falsch.");
            }
            if ($subtitle == null || strlen($subtitle) > 50) {
                $errornachricht = Fehlerbehandlung("Ihr Untertitel ist falsch.");
            }
            if ($straße == null || strlen($straße) > 50) {
                $errornachricht = Fehlerbehandlung("Ihre Straße ist falsch.");
            }
            if (!isset($hsnr)) {
                $errornachricht = Fehlerbehandlung("Ihre Hausnummer ist falsch.");
            }
            if ($ort == null || strlen($ort) > 50) {
                $errornachricht = Fehlerbehandlung("Ihr Ort ist falsch.");
            }
            if (!preg_match('/([0-9]){5,5}$/', $plz)) {
                $errornachricht = Fehlerbehandlung("Ihre Postleitzahl ist falsch.");
            }
            if (!preg_match('/^[0-9-_]{3,50}$/', $free)) {
                $errornachricht = Fehlerbehandlung("Ihr Verfügbarkeitsdatumfrei ist falsch.");
            }
            if ($beschreibung == null || strlen($beschreibung) > 1999) {
                $errornachricht = Fehlerbehandlung("Ihre Beschreibung ist falsch.");
            }
            if ($companyname == null || strlen($companyname) > 50) {
                $errornachricht = Fehlerbehandlung("Ihr Firmenname ist falsch.");
            }
            if ($art == null) {
                $errornachricht = Fehlerbehandlung("Ihre Angebotsart ist nicht gesetzt.");
            }
            if ($befristung == null) {
                $errornachricht = Fehlerbehandlung("Ihre Befrsitung ist nicht gesetzt.");
            }
            if ($arbeitszeit == null) {
                $errornachricht = Fehlerbehandlung("Ihre Arbeitszeit ist nicht gesetzt.");
            }

            if (!isset($_SESSION["error"])) {
                ?>
                <script language="javascript" type="text/javascript"> document.location = "index.php"; </script><?php
                $_SESSION["kik"] = true;
            }

            $offer->setTitle(htmlspecialchars($titel));
            $offer->setSubTitle(htmlspecialchars($subtitle));
            $offer->setCompanyName(htmlspecialchars($companyname));
            $offer->setDescription(htmlspecialchars($beschreibung));
            $offerid = $_SESSION["offerid"];
            $offer->setId($offerid);
            $address = new Address(null, "Deutschland", $ort, $straße, $hsnr, $plz);
            $offer->setAddress($address);
            $offer->setFree(htmlspecialchars($free));
            $offer->setOfferType($art);
            $offer->setDuration($befristung);
            $offer->setWorkModel($arbeitszeit);
            $OfferDao->update($offer);

            if (isset($_SESSION['tempUpload'])) {
                rename("images/logos/" . $_SESSION['tempUpload'], "images/logos/" . $offer->getId() . substr($_SESSION['tempUpload'], strpos($_SESSION["tempUpload"], ".")));
                unset($_SESSION['tempUpload']);

            }
        }


    }
}

if (isset($_POST["bearbeiten_offer"])) {

    if ($eingelogt == "true") {
        $id = $_POST["id_offer"];
        $offer = $OfferDao->getOfferByID($id);
        $_SESSION["offerid"] = $id;

        if ($offer !== null) {
            $errornachricht = Fehlerbehandlung("Es ist ein Fehler aufgetreten.");
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
        $logo = $offer->getLogo();
        $befristung = $offer->getDuration();
        $angebotsart = $offer->getOfferType();
        $arbeitszeit = $offer->getWorkModel();
        $beschreibung = $offer->getDescription();
        $_SESSION["bearbeiten"] = $_POST["bearbeiten_offer"];

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
if (isset($_POST['bild-delete'])) {
    $id = $_SESSION["offerid"];
    $offer = $OfferDao->getOfferByID($id);
    $imageTarget_file = $offer->getLogo();
    if ($imageTarget_file == "images/company_placeholder.png") {
        //Do nothing
    } else {

        if (file_exists($imageTarget_file)) {
            unlink($imageTarget_file);
        } else {
            echo 'Konnte nicht gelöscht werden:  ' . $imageTarget_file . ',das Bild existiert nicht.';
        }
    }
}


// To upload the Logo
if (isset($_POST["uploadLogoSubmit"])) {

    $imageTarget_dir = "images/logos/";
    if (!file_exists($imageTarget_dir) && !mkdir($imageTarget_dir) && !is_dir($imageTarget_dir)) {
        throw new RuntimeException(sprintf('Directory "%s" was not created', $imageTarget_dir));
    }
    if (isset($_SESSION["tempUpload"]) && $_SESSION["tempUpload"] != false) {

        $logo = "images/logos/";
        $logo .= $_SESSION["tempUpload"];
        unlink($logo);
        $_SESSION['tempUpload'] = false;
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

    if ($_FILES["fileToUpload"]["tmp_name"] != null) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $fehler = "Bildhochladen";
            Fehlerbehandlung($fehler);
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000000) {
            $fehler = "zugross";
            Fehlerbehandlung($fehler);
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
            && $imageFileType !== "gif") {
            $fehler = "gif";
            Fehlerbehandlung($fehler);
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === 0) {
            $fehler = "Bildhochladen";
            Fehlerbehandlung($fehler);
            // if everything is ok, try to upload file
        } else if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imageTarget_file)) {
            $fehler = "Bildhochladen";
            Fehlerbehandlung($fehler);
        } else {
            $offer->setLogo($imageTarget_file);
            $_SESSION["tempUpload"] = $tmp_ID . $randomUploadNumber . "." . $imageFileType;
        }
    } else {
        $fehler = "Bilder";
        Fehlerbehandlung($fehler);
    }

}

if (isset($_POST["submit_offer"])) {
    if ($eingelogt == "true") {
        if (isset($_SESSION["token"]) && isset($_POST["token"]) && $_SESSION["token"] == $_POST["token"]) {


            if (isset($_POST["titel"], $_POST["subtitel"], $_POST["straße"], $_POST["hausnummer"], $_POST["ort"], $_POST["plz"], $_POST["free"], $_POST["beschreibung"], $_POST["companyname"])) {
                $AddressDAO = $OfferDao->getAddressDAOImpl();
                $email = $_COOKIE["email"];
                $user = $UserDAO->findUserByMail($email);
                $idaktuelle = $user->getId();


                if ($titel == null || strlen($titel) > 50) {
                    $errornachricht = Fehlerbehandlung("Ihr Titel ist falsch.");
                }
                if ($subtitle == null || strlen($subtitle) > 50) {
                    $errornachricht = Fehlerbehandlung("Ihr Untertitel ist falsch.");
                }
                if ($straße == null || strlen($straße) > 50) {
                    $errornachricht = Fehlerbehandlung("Ihre Straße ist falsch.");
                }
                if (!preg_match('/^[0-9a-zA-Z]{1,50}$/', $hsnr)) {
                    $errornachricht = Fehlerbehandlung("Ihre Hausnummer ist falsch.");
                }
                if ($ort == null || strlen($ort) > 50) {
                    $errornachricht = Fehlerbehandlung("Ihr Ort ist falsch.");
                }
                if (!preg_match('/^[\d]{5}$/', $plz)) {
                    $errornachricht = Fehlerbehandlung("Ihre Postleitzahl ist falsch.");
                }

                if ($beschreibung == null || strlen($beschreibung) > 1999) {
                    $errornachricht = Fehlerbehandlung("Ihre Beschreibung ist falsch.");
                }
                if ($companyname == null || strlen($companyname) > 50) {
                    $errornachricht = Fehlerbehandlung("Ihr Firmenname ist falsch.");
                }
                if (!isset ($art)) {
                    $errornachricht = Fehlerbehandlung("Ihre Angebotsart ist nicht gesetzt.");
                }
                if (!preg_match('/^[0-9-_]{3,50}$/', $free)) {
                    $errornachricht = Fehlerbehandlung("Ihr Verfügbarkeitsdatumfrei ist falsch.");
                }
                if (!isset($befristung)) {
                    $errornachricht = Fehlerbehandlung("Ihre Befristung ist nicht gesetzt.");
                }
                if (!isset($arbeitszeit)) {
                    $errornachricht = Fehlerbehandlung("Ihre Arbeitszeit ist nicht gesetzt.");
                }

                if (!isset($_SESSION["error"])) {


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
                                $_SESSION['tempUpload'] = false;

                            }
                            ?>
                            <script language="javascript"
                                    type="text/javascript"> document.location = "index.php"; </script><?php
                            $_SESSION["kik"] = true;

                        }
                    }
                } else {
                    $errornachricht = Fehlerbehandlung("Es ist ein Fehler aufgetreten.");

                }
            } else {
                $errornachricht = Fehlerbehandlung("Es ist ein Fehler aufgetreten.");
            }
        }
    }

}


if (isset($_SESSION["tempUpload"]) && $_SESSION["tempUpload"] != false) {
    $logo = "images/logos/";
    $logo .= $_SESSION["tempUpload"];
} else {
    $OfferDao = new OfferDAOImpl();

    if (isset($_SESSION["offerid"]) && $_SESSION["offerid"] != null) {
        $offer = $OfferDao->getOfferByID($_SESSION["offerid"]);
        $logo = $offer->getLogo();
    } else {
        $logo = "images/company_placeholder.png";
    }
}
?>