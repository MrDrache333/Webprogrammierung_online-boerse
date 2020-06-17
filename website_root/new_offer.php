<?php include "header.php"; ?>

<?php

use php\address\Address;
use php\offer\Offer;
use php\offer\OfferDAOImpl;
use php\user\UserDAOImpl;

include_once 'php/classes.php';
$OfferDao = new OfferDAOImpl();
$UserDAO = new UserDAOImpl();


if (isset($_POST["bearbeiten_offer"])) {
    $id = $_POST["id_offer"];
    $offer = $OfferDao->getOfferByID($id);

    $companyname = $offer->getTitle();
}


if (isset($_POST["submit_offer"])) {

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

        $arbeit = $_GET["arbeit"];
        $ausbildung = $_GET["ausbildung"];
        $art = $_POST['angebotsart'];
        $befristung = $_POST['befristung'];
        $arbeitszeit = $_POST['arbeitszeiten'];
        if ($art == "arbeit") {
            $art = 0;
        } elseif ($art == "ausbildung") {
            $art = 1;
        } elseif ($art == "praktikum") {
            $art = 2;
        } else {
            $art = 3;
        }

        if ($befristung == "befristet") {
            $befristung = 0;
        } elseif ($befristung == "unbefrsitet") {
            $befristung = 1;
        } else {
            $befristung = 2;
        }

        if ($arbeitszeit == "vollzeit") {
            $arbeitszeit = 0;
        } elseif ($arbeitszeit == "teilzeit") {
            $arbeitszeit = 1;
        } elseif ($arbeitszeit == "schicht") {
            $arbeitszeit = 2;
        } elseif ($arbeitszeit == "heimarbeit") {
            $arbeitszeit = 3;
        } else {
            $arbeitszeit = 4;
        }


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
            <div class="rightcolumn">
                <div class="card">
                    <h2>Meine Informationen</h2>
                    <form method="POST" class="new_offer-form" id="new_offer-form">
                        <label for="titel">Titel :</label>
                        <input type="text" name="titel" id="titel" placeholder="Verkäufer/in"
                               value="<?php echo $companyname; ?>"
                               required/>
                        <label for="subtitetl">Untertitel :</label>
                        <input type="text" name="subtitel" id="subtitel" placeholder="Einzelhandel" required/>
                        <label for="subtitetl">Firmenname :</label>
                        <input type="text" name="companyname" id="companyname" placeholder="Firmenname" required/>
                        <label for="position">Straße:</label>
                        <input type="text" name="straße" id="straße" placeholder="Musterstraße" required/>
                        <label for="position">Hausnummer :</label>
                        <input type="text" name="hausnummer" id="hausnummer" placeholder="1234" required/>
                        <label for="position">Ort:</label>
                        <input type="text" name="ort" id="ort" placeholder="Musterhausen" required/>
                        <label for="position">Postleitzahl:</label>
                        <input type="text" name="plz" id="plz" placeholder="12345" required/>
                        <label for="position">Standort:</label>
                        <label for="free">Frei ab :</label>
                        <input type="text" name="free" id="free" placeholder="2021-01-01" required/>
                        <div class="form-radio-item-group">
                            <div class="form-radio-item">
                                <input type="radio" name="angebotsart" value="0" checked>
                                <label for="male">Arbeit</label>
                                <span class="check"></span>
                                <input type="radio" name="angebotsart" value="1">
                                <label for="female">Ausbildung</label>
                                <span class="check"></span>
                                <input type="radio" name="angebotsart" value="2">
                                <label for="divers">Praktikum</label>
                                <span class="check"></span>
                                <input type="radio" name="angebotsart" value="3">
                                <label for="divers">Selbstständigkeit</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="befristung" value="0" checked>
                                <label for="male">Befristet</label>
                                <span class="check"></span>
                                <input type="radio" name="befristung" value="1">
                                <label for="female">Unbefristet</label>
                                <span class="check"></span>
                                <input type="radio" name="befristung" value="2">
                                <label for="divers">Keine Angaben</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="arbeitszeiten" value="0" checked>
                                <label for="male">Vollzeit</label>
                                <span class="check"></span>
                                <input type="radio" name="arbeitszeiten" value="1">
                                <label for="female">Teilzeit</label>
                                <span class="check"></span>
                                <input type="radio" name="arbeitszeiten" value="2">
                                <label for="divers">Schicht</label>
                                <span class="check"></span>
                                <input type="radio" name="arbeitszeiten" value="3">
                                <label for="divers">Heim-/Telearbeit</label>
                                <span class="check"></span>
                                <input type="radio" name="arbeitszeiten" value="4">
                                <label for="divers">Minijob</label>
                                <span class="check"></span>
                            </div>

                        </div>

                        <label for="street">Beschreibung :<br></label>
                        <textarea name="beschreibung" id="beschreibung" cols="50" rows="7"
                                  placeholder="Was über den Beruf zu sagen ist." required></textarea>

                        <div class="form-submit">
                            <input type="submit" value="Anzeige veröffentlichen" class="button_offer"
                                   name="submit_offer"
                                   id="submit_offer"/>
                            <input type="reset" value="Zurücksetzen" class="button_offer" name="submit_pb"
                                   id="reset_offer"/>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</form>


<?php include "footer.html"; ?>

