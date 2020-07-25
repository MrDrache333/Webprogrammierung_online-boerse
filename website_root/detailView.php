<?php
include "header.php";
include "detailViewLoader.php"
?>
<div class="header">
    <ul class="navi">
        <?php
        if (isset($_COOKIE["loggedin"]) and $_COOKIE["loggedin"] === "true") { ?>
            <li class="navibutton">
                <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
            </li>
            <li class="navibutton"><a href="profil.php" class="naviobjekt"> Mein Profil</a></li>
            <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>
        <?php } else {
        ?>
        <li class="navibutton">
            <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
            <?php }
            ?>
        <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
        <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
    </ul>
</div>
<div class="content">
    <div class="offerContainer">
        <?php if (isset($_SESSION["showId_errorCode"])) {
            ?>
            <div class="errorContainer">
                <h1 class="headLine">ERROR <?php echo $_SESSION["showId_errorCode"]; ?></h1>
                <h2 class="headLine">Die Anzeige konnte nicht gefunden werden.</h2>
                <p><span class="material-icons">arrow_back_ios</span><a href="index.php">Zurück zur Startseite</a></p>
            </div>
            <?php
            unset($_SESSION["showId_errorCode"]);
        } else { ?>
        <div class="offerHeader">
            <h1 class="headLine">Mehr Informationen</h1>
        </div>
        <div class="offerDetails">
            <div class="column edgeColumn offerCompanyContainer">
                <div class="offerImageContainer">
                    <img src="<?php echo $offer->getLogo(); ?>" alt="Anzeigen-Logo"
                         class="offerLogo">
                </div>
                <div class="offerCompanyDetails">
                    <h2 class="headLine"><span class="material-icons">work</span> Arbeitgeber</h2>
                    <p><strong><?php echo $offer->getCompanyName(); ?></strong></p>
                    <h3 class="headLine"><span class="material-icons">location_on</span>Firmenadresse</h3>
                    <p><?php echo $offer->getAddress()->getStreet() . " " . $offer->getAddress()->getNumber() . "<br>";
                        echo $offer->getAddress()->getPlz() . " " . $offer->getAddress()->getTown();
                        $id = $offer->getId();
                        ?></p>
                </div>
                <h2 class="headLine"><span class="material-icons">share</span> Teilen</h2>
                <hr>
                <a class="twitter-share-button"
                   href="https://twitter.com/intent/tweet?text=Dieser%20Job%20ist%20sehr%20interesannt.%20Schaut%20selbst:%20https://kefedo.kog-nas.synology.me:5443/detailView.php?showId=<?php echo $id; ?> "
                   target="_blank"
                   data-size="large">
                    <img src="icons/twitter.png" width="50" height="50"/></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://kefedo.kog-nas.synology.me:5443/detailView.php?showId=<?php echo $id; ?> "
                   target="_blank">
                    <img src="icons/facbook.png" width="50" height="50"/></a>
                <script async src="https://telegram.org/js/telegram-widget.js?10"
                        data-telegram-share-url="https://kefedo.kog-nas.synology.me:5443/detailView.php?showId=<?php echo $id; ?>"
                        data-comment="Hier den Job will ich dir Zeigen:" data-size="large" data-text="notext"></script>

            </div>

            <div class="column offerMainContent">
                <div class="offerName">
                    <h1 class="headLine"><?php echo $offer->getTitle(); ?></h1>
                    <h2 class="headLine"><?php echo $offer->getSubTitle(); ?></h2>
                    <div class="offerNameTime">
                        <p class="headLine"><span
                                    class="material-icons">today</span>Veröffentlicht:<br><?php echo $offer->getCreated() ?>
                        </p>
                        <p class="headLine"><span class="material-icons">event</span>Frei
                            Ab:<br><?php echo $offer->getFree() ?></p>
                    </div>
                </div>
                <hr>
                <div class="offerDescription">
                    <h2 class="headLine">Beschreibung</h2>
                    <p><?php echo $offer->getDescription(); ?></p>
                </div>
                <?php if (isset($location) && $location !== null) { ?>
                    <div class="map">
                        <div id="mapView">
                        </div>
                        <script>
                            const mymap = L.map('mapView').setView([<?php echo $location->getLat() . ", " . $location->getLong(); ?>], 13);
                            const marker = L.marker([<?php echo $location->getLat() . ", " . $location->getLong(); ?>]).addTo(mymap);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(mymap);
                            marker.bindPopup("<b><?php echo $offer->getCompanyName() ?></b>").openPopup();

                            mymap.on('locationfound', onLocationFound);

                            function onLocationError(e) {
                                L.marker(<?php echo $location->getLat() . ", " . $location->getLong(); ?>).addTo(mymap)
                                    .bindPopup("<b><?php echo $offer->getCompanyName() ?></b>").openPopup();
                            }

                            map.on('locationerror', onLocationError);
                        </script>
                    </div>
                <?php } ?>
            </div>
            <div class="column edgeColumn offerAttributes">
                <h2 class="headLine"><span class="material-icons">info</span> Details</h2>
                <div class="detailRow">

                <h3 class="headLine">Angebotsart</h3>
                    <p><?php echo $workType ?? "Unbekannt"; ?></p>
                </div>
                <div class="detailRow">
                    <h3 class="headLine">Befristung</h3>
                    <p><?php echo $workDuration ?? "Unbekannt"; ?></p>
                </div>
                <div class="detailRow">
                    <h3 class="headLine">Arbeitszeitmodell</h3>
                    <p><?php echo $workModel ?? "Unbekannt"; ?></p>
                </div>
            </div>
        </div>

    </div>
    <?php } ?>
</div>
<?php include "footer.php"; ?>

