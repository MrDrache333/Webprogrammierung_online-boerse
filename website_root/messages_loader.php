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
function Fehlerbehandlung($texterror)
{
    if (isset($_SESSION['error'])) {
        $_SESSION['error'] .= $texterror;

    } else {
        $_SESSION['error'] = $texterror;
    }

}

?>