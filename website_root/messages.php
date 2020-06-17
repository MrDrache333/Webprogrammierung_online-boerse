<?php
include "header.php";
include_once 'php/classes.php';

use php\offer\Offer;
use php\offer\OfferDAOImpl;
use php\user\UserDAOImpl;

?>
<div class="header">
    <nav>
        <ul class="navi">
            <li class="navibutton"><a href="index.php" class="naviobjekt"> Startseite</a></li>
            <!--active Anzeige nur als TEst wie umsteztbar???-->
            <li class="navibutton">
                <a href="profil.php" class="naviobjekt"> Mein Profil</a>
            </li>
            <li class="navibutton">
                <div class="active"><a href="messages.php" class="naviobjekt"> Meine Anzeigen </a></div>
            </li>
            <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt">Impressum </a></li>
        </ul>

    </nav>
</div>
<div class="grid-farbe">
    <div class="button_field">
        <a href="new_offer.php" class="button_new_offer">Neue Anzeige erstellen</a>
    </div>
    <div class="row">
        <div class="leftcolumn">
            <?php

            $email = $_COOKIE['email'] ?? null;
            if ($email !== null) {

                //User abfragen
                $user = new UserDAOImpl();
                $user = $user->findUserByMail($email);
                if ($user !== null) {
                    //In Datenbank nach Einträgen suchen
                    $OfferDAOImpl = new OfferDAOImpl();
                    $result = $OfferDAOImpl->getOwnOffers($user);
                } else {
                    $result = null;
                }


            }
            if (isset($_POST['anzeigeloeschen'])) {
                $versuch = $_POST['anzeigeloeschen'];
                echo $versuch;

                if ($_POST['anzeigeloeschen'] = 15) ;
                $id = 1;
                $OfferDAOImpl->delete($id);
            }
            //Einträge anzeigen
            displayResults($result);
            /**
             * @param Offer[] $result Ergebnisse der Datenbankabfrage
             */
            function displayResults($result)
            {
                if ($result !== null) {

                    $count = 0;
                    foreach ($result as $offer) {

                        $test = $offer->getId();
                        echo $test;
                        echo $offer->getTitle();
                        $count++;
                        $html = "<div class=\"card\">
                                    <div class=\"anzeigen-inhalt\">
                                        <h2>" . $offer->getTitle() . "<br>" . $offer->getSubTitle() . "</h2>
                                        <img class=\"fakeimg\" src=\"images/company_placeholder.png\" alt=\"Firmenlogo\">
                                        <div class=\"beschreibung\">
                                            " . $offer->getDescription() . "
                                        </div>
                                    </div>
                                    <form method=\"POST\"  class=\"profile-form\" id=\"profile-form\">
                                    <div class=\"infos\">
                                        <div class=\"erstellt\"><h5>erstellt am:<br>" . $offer->getCreated() . "</div>
                                        <div class=\"frei\"><h5> Frei ab:<br>" . $offer->getFree() . "</h5></div>
                                      
                                        <div class=\"frei\"><a href=\"\" class=\"ads_button\" ><h5>bearbeiten</h5></a></div>
                                        <div class=\"frei\">
                                        <input type=\"submit\" value=\"Profil löschen\"id='$test' class=\"submit\" name=\"anzeigeloeschen\"
                                   id=\"submit\"/>
                                    </div>
                                 </form>
                                </div>";


                        echo $html . "\n";


                    }
                    if ($count === 0) {
                        echo "<div style=\"background: radial-gradient(circle at center, white 0,rgba(255,255,255,0.9) 60%, rgba(255,255,255,0.5) 70%,transparent 90%); text-align: center; border-radius: 20px\">
                        <img style=\"display: inline-block; max-width: 60%\" src=\"images/no_result.png\" alt=\"Keine eigenen Anzeigen<br>Erstelle welche mit einem Klick auf &quot;Anzeige Erstellen&quot;\">
                    </div>";
                    }
                } else {
                    echo "<div style=\"background: radial-gradient(circle at center, white 0,rgba(255,255,255,0.9) 60%,
                         rgba(255,255,255,0.5) 70%,transparent 90%); text-align: center; border-radius: 20px\">
                        <h1 style=\"padding-top: 10%\">Fehler beim Abrufen der Daten</h1>
                        <img style=\"max-width: 60%; margin-top: -10%\" src=\"images/error.png\" alt=\"Fehler beim Abrufen der Daten\">
                    </div>";
                }
            }

            ?>
        </div>
        <div class="rightcolumn">
            <div class="card">
                <h2>Nachrichten</h2>
                <div class="card">
                    <div class=" nachricht">
                        <img class="fakeimg" src="images/company_placeholder.png" alt="Firmenlogo">
                        <div class="nachrichtenbes">
                            <h5>Verkäufer/-in (m/w/d)</h5>
                            Ich möchte mich auf die Stelle bewerben. Anbei finden sie meine Unterlagen.
                            Geben sie mir bitte Rückmelduung, wenn sie weiter Fragen haben. Vielen Dank.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include "footer.html"; ?>

