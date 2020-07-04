<?php
include "header.php";
include "messages_loader.php";
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
    <div class="content">
        <div class="button_field">
            <a href="new_offer.php" name="button_new_offer" class="button_new_offer" id="button_new_offer">Neue Anzeige
                erstellen</a>
        </div>
        <div class="offers_content">
            <?php
            //Einträge anzeigen1
            displayResults($result);
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
        </div>
    </div>
</div>
<?php include "footer.html"; ?>

