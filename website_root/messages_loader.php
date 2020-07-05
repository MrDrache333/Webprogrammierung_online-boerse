<?php
include_once 'php/classes.php';

use php\offer\OfferDAOImpl;
use php\user\UserDAOImpl;


$email = $_COOKIE['email'] ?? null;


if ($email !== null) {


    //User abfragen
    $user = new UserDAOImpl();
    $user = $user->findUserByMail($email);
    if ($user !== null) {
        //In Datenbank nach Einträgen suchen
        $OfferDAOImpl = new OfferDAOImpl();
        if (isset($_POST['anzeigeloeschen'])) {
            $id = $_POST["id_offer"];
            $ownoffer = $OfferDAOImpl->getOwnOffers($user);
            if ($ownoffer != null) {

                $found = false;
                foreach ($ownoffer as $offer) {
                    if ($offer->getId() == $id) {
                        $found = true;
                        break;
                    }
                }
                if ($found === true) {
                    $OfferDAOImpl->delete($id);
                } else {
                    echo "Sie löschen eine Anzeige die nicht Ihnen gehört. Dies ist nicht möglich.";
                }
            } else {
                echo "Sie besitzen keine Anzeigens.";
            }


        }
        $result = $OfferDAOImpl->getOwnOffers($user);
    } else {
        $result = null;
    }


}

/**
 * @param Offer[] $result Ergebnisse der Datenbankabfrage
 */
function displayResults($result)
{
    if ($result !== null) {

        $count = 0;
        foreach ($result as $offer) {

            $offer_id = $offer->getId();
            $count++;
            ?>
            <div class="card">
                <div class="anzeige">
                    <div class="anzeige_head">
                        <h2><?php echo $offer->getTitle(); ?></h2>
                        <h4><?php echo $offer->getSubTitle(); ?></h4>
                    </div>
                    <div class="anzeige_content">
                        <div class="image">
                            <img class="fakeimg" src="<?php echo $offer->getLogo(); ?>" alt="Firmenlogo">
                        </div>
                        <div class="anzeige_info">
                            <div class="beschreibung">
                                <?php echo $offer->getDescription(); ?>
                            </div>
                            <div class="anzeige_footer">
                                <div class="erstellt rowItem">
                                    <h5>erstellt am:<br><?php echo $offer->getCreated(); ?>
                                </div>
                                <div class="frei rowItem">
                                    <h5> Frei ab:<br><?php echo $offer->getFree(); ?></h5>
                                </div>
                                <div class="rowItem">
                                    <div class="buttons">
                                        <form method="post" action="new_offer.php">
                                            <input type="hidden" name="id_offer"
                                                   value="<?php echo $offer_id; ?>">
                                            <input type="submit" value="Bearbeiten" class="submit btn"
                                                   name="bearbeiten_offer"
                                                   id="submit"/>
                                        </form>
                                        <form method="post" action="messages.php">
                                            <input type="hidden" name="id_offer"
                                                   value="<?php echo $offer_id; ?>">
                                            <input type="submit" value="Anzeige löschen"
                                                   class="submit btn delete"
                                                   name="anzeigeloeschen"
                                                   id="submit"/>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
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