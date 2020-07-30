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
            <div class="active"><a href="impressum.php" class="naviobjekt">Impressum</a></div>
        </li>
    </ul>
</div>
<div class="grid-farbe">
    <div class="content impressum">
        <div class="impressumContent">
            <h1>Impressum</h1>
            <div class="impressumContainer">
                <div class="contact-row">
                    <div class="contact-col">
                        <h3>Angaben gem&auml;&szlig; &sect; 5 TMG</h3>
                        <p>KeFeDo GmbH<br/>
                            Ammerl&auml;nder Heerstra&szlig;e 114-118<br/>
                            26129 Oldenburg</p>

                        <p><strong>Vertreten durch:</strong><br/>
                            Fenja Bauer, Keno Oelrichs Garcia und Dominik L&uuml;bben</p>

                        <h3>Kontakt</h3>
                        <p>Telefon: +49441 7984450<br/>
                            E-Mail: info.kefedo@mail.de</p>

                        <h3>EU-Streitschlichtung</h3>
                        <p>Die Europ&auml;ische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit:
                            <a class="aa" href="https://ec.europa.eu/consumers/odr" target="_blank" rel="noopener noreferrer">https://ec.europa.eu/consumers/odr</a>.<br/>
                            Unsere E-Mail-Adresse finden Sie oben im Impressum.</p>

                        <h3>Verbraucher&shy;streit&shy;beilegung/Universal&shy;schlichtungs&shy;stelle</h3>
                        <p>Wir nehmen an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teil.
                            Zuständig ist die Universalschlichtungsstelle des Zentrums für Schlichtung e.V., Straßburger
                            Straße 8, 77694 Kehl am Rhein (<a class="aa" href="https://www.verbraucher-schlichter.de"
                                                              rel="noopener noreferrer" target="_blank">https://www.verbraucher-schlichter.de</a>).
                        </p>

                        <h4>Haftung f&uuml;r Inhalte</h4>
                        <p>Als Diensteanbieter sind wir gem&auml;&szlig; &sect; 7 Abs.1 TMG f&uuml;r eigene Inhalte auf
                            diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach &sect;&sect; 8 bis 10 TMG
                            sind wir als Diensteanbieter jedoch nicht verpflichtet, &uuml;bermittelte oder gespeicherte
                            fremde Informationen zu &uuml;berwachen oder nach Umst&auml;nden zu forschen, die auf eine
                            rechtswidrige T&auml;tigkeit hinweisen.</p>
                        <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den
                            allgemeinen Gesetzen bleiben hiervon unber&uuml;hrt. Eine diesbez&uuml;gliche Haftung ist
                            jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung m&ouml;glich. Bei
                            Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend
                            entfernen.</p> <h4>Haftung f&uuml;r Links</h4>
                        <p>Unser Angebot enth&auml;lt Links zu externen Websites Dritter, auf deren Inhalte wir keinen
                            Einfluss haben. Deshalb k&ouml;nnen wir f&uuml;r diese fremden Inhalte auch keine Gew&auml;hr
                            &uuml;bernehmen. F&uuml;r die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter
                            oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der
                            Verlinkung auf m&ouml;gliche Rechtsverst&ouml;&szlig;e &uuml;berpr&uuml;ft. Rechtswidrige
                            Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.</p>
                        <p>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete
                            Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von
                            Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p> <h4>Urheberrecht</h4>
                        <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem
                            deutschen Urheberrecht. Die Vervielf&auml;ltigung, Bearbeitung, Verbreitung und jede Art der
                            Verwertung au&szlig;erhalb der Grenzen des Urheberrechtes bed&uuml;rfen der schriftlichen
                            Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur
                            f&uuml;r den privaten, nicht kommerziellen Gebrauch gestattet.</p>
                        <p>Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die
                            Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche
                            gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden,
                            bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden
                            wir derartige Inhalte umgehend entfernen.</p>
                        <p>Hier gehts zu den <a class="aa" href="terms_of_use.php">Nutzungsbedingungen</a> und zum <a
                                    class="aa"  href="privacy.php">Datenschutz</a></p>
                        <p>Quelle: <a class="aa" href="https://www.e-recht24.de/impressum-generator.html">https://www.e-recht24.de/impressum-generator.html</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>

