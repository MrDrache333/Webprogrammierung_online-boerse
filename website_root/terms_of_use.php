<?php include "header.php"; ?>
<div class="navileiste">


    <ul class="navi">
        <li class="navibutton">
            <a href="index.php" class="naviobjekt"> Startseite</a>
        </li>

        <?php
        if (isset($_COOKIE["loggedin"]) and $_COOKIE["loggedin"] === "true") { ?>

            <li class="navibutton">
                <a href="profil.php" class="naviobjekt"> Mein Profil</a>
            </li>
            <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>

        <?php } ?>
        <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
        <li class="navibutton">
            <div class="navibutton"><a href="impressum.php" class="naviobjekt">Impressum</a></div>
        </li>
    </ul>
</div>
<div class="grid-farbe">
    <div class="content impressum">
        <div class="impressumContent">
            <h1>Nutzungsbedingungen</h1>
            <div class="impressumContainer">
                <div class="contact-row">
                    <div class="contact-col">
                        <h3>Einleitung</h3>
                        <p>
                            Das Portal www.kefedo.de ermöglicht es Ihnen, Informationen zu dem gesamten
                            Dienstleistungsangebot einzusehen und eServices zu nutzen. Einen Überblick über die
                            angebotenen eServices können Sie der Datenschutzerklärung entnehmen. Aus Gründen
                            derVereinfachung und besseren Verständlichkeit erfolgen Personenbezeichnungen nachfolgend
                            nur in der männlichen Form. Für die Inanspruchnahme des Portals gelten die folgenden
                            Regelungen.
                        </p>
                        <h3>Übergreifende Regelungen</h3>
                        <h4>$1 Nutzung des Portals unter www.kefedo.de</h4>
                        <p>(1) Zur Nutzung des Portals ist jede natürliche oder juristische Person berechtigt. Dies
                            umfasst auch Minderjährige ab Vollendung des 15. Lebensjahrs (vgl. §36 SGB I). Die Nutzung
                            des Portals ist unentgeltlich.</p>
                        <p> (2) Änderungen dieser Nutzungsbedingungen, z.B. aufgrund gesetzlicher Neuregelungen, bleiben
                            vorbehalten.</p>
                        <p>(3) Aktivitäten, die nicht dem vorgesehenen Nutzen des Portals dienen und zu einer hohen
                            Belastung der Infrastruktur führen können, sind zu unterlassen. Es ist nicht zulässig:•
                            Robots, Webspider oder ähnliche Technologien einzusetzen und so Inhalte des Portals zum
                            Zweck der Datensammlung und -auswertung auszulesen oder darüber Inhalte/Daten in das Portal
                            einzuspielen sowie• zu versuchen, die Sicherheitsmaßnahmen zu umgehen oder zu durchbrechen,
                            zum Beispiel durch Scans oder Tests zu Passwörtern von Benutzerkonten.</p>
                        <h4>§2 Registrierung als Nutzer</h4>
                        <p>1) Die Nutzung von bestimmten Angeboten erfordert eine vorherige Registrierung als Nutzer. In
                            der Datenschutzerklärung ist aufgelistet, welche Angebote mit den Registrierungsdaten
                            genutzt werden können.</p>
                        <p>(2) Der Nutzer ist verpflichtet, ein geeignetes und sicheres Passwort zu verwenden. Er hat
                            für die Geheimhaltung seines Passwortes und aller anderen Authentifizierungsdaten zu
                            sorgen.</p>
                        <p></p>

                        <p>Quelle: <a href="https://www.arbeitsagentur.de/datei/Nutzungsbedingungen_ba042566.pdf">Agentur
                                für Arbeit Nutzungsbedingugen</a>
                            Ähnlich zu
                            KEFEDO</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>

