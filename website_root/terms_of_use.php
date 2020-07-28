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
                        <p>Kefedo<br/>
                            Ammerl&auml;nder Heerstra&szlig;e 114-118<br/>
                            26219 Oldenburg</p>

                        <p><strong>Vertreten durch:</strong><br/>
                            Keno Oelrichs Garcia<br/>
                            Fenja Bauer<br/>
                            Dominik L&uuml;bben</p>

                        <h3>Kontakt</h3>
                        <p>Telefon: +012 3456789<br/>
                            E-Mail: info.kefedo@mail.de</p>

                        <h3>EU-Streitschlichtung</h3>
                        <p>Die Europ&auml;ische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit:
                            <a href="https://ec.europa.eu/consumers/odr" target="_blank" rel="noopener noreferrer">https://ec.europa.eu/consumers/odr</a>.<br/>
                            Unsere E-Mail-Adresse finden Sie oben im Impressum.</p>

                        <h3>Verbraucher&shy;streit&shy;beilegung/Universal&shy;schlichtungs&shy;stelle</h3>
                        <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer
                            Verbraucherschlichtungsstelle teilzunehmen.</p>

                        <h3>Haftung f&uuml;r Inhalte</h3>
                        <p>Als Diensteanbieter sind wir gem&auml;&szlig; &sect; 7 Abs.1 TMG f&uuml;r eigene Inhalte auf
                            diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach &sect;&sect; 8 bis 10 TMG
                            sind wir als Diensteanbieter jedoch nicht verpflichtet, &uuml;bermittelte oder gespeicherte
                            fremde Informationen zu &uuml;berwachen oder nach Umst&auml;nden zu forschen, die auf eine
                            rechtswidrige T&auml;tigkeit hinweisen.</p>
                        <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den
                            allgemeinen Gesetzen bleiben hiervon unber&uuml;hrt. Eine diesbez&uuml;gliche Haftung ist
                            jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung m&ouml;glich. Bei
                            Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend
                            entfernen.</p>
                        <h3>Haftung f&uuml;r Links</h3>
                        <p>Unser Angebot enth&auml;lt Links zu externen Websites Dritter, auf deren Inhalte wir keinen
                            Einfluss haben. Deshalb k&ouml;nnen wir f&uuml;r diese fremden Inhalte auch keine Gew&auml;hr
                            &uuml;bernehmen. F&uuml;r die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter
                            oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der
                            Verlinkung auf m&ouml;gliche Rechtsverst&ouml;&szlig;e &uuml;berpr&uuml;ft. Rechtswidrige
                            Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.</p>
                        <p>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete
                            Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von
                            Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p>
                        <h3>Urheberrecht</h3>
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
                        <h3>Nutzungsbedingungen</h3>

                        Datum: 06.07.2020
                        <h4>Willkommen bei Kefedo</h4>
                        <h5>Einführung</h5>
                        <p>
                            Vielen Dank, dass Sie Kefedo und die angebotenen Funktionen nutzen, die wir Ihnen im Rahmem
                            dieser Plattform zur Verfügung stellen.
                        </p>
                        <h5>Unser Dienst</h5>
                        <p> Der Dienst bietet die Möglichkeit, Jobs anzubieten und anzusehen. Dabei muss man für das
                            anbieten angemeldet sein. Man kann von überall auf der Welt anzeigen erstellen und sich
                            diese
                            anschauen.</p>
                        <h5>Dienstanbieter</h5>
                        <p>Die Gesellschaft, die den Dienst anbietet ist die Kefedo GmbH Freierfunden für ein Modul der
                            Universität Oldenburg. Hierfür stehen die Gruppenmitglieder Fenja Bauer, Keno Oelrichs
                            Garcia
                            und Dominik Lübben gerade.</p>
                        <h5>Anwendbare Nutzungsbedingungen</h5>
                        <p> Ihre Nutzung des Dienstes unterliegt den allgemeinen Nutzungsbedingungen der Kefedo GmbH.
                            Unsere
                            Vereinbarung beinhaltet außerdem die Information zur Anzeigenrichtlinien für Werbetreibende,
                            wenn Sie Werbung oder Sponsoring auf dem Dienst betreiben oder bezahlte Werbung für Ihre
                            Inhalte
                            integrieren.
                        </p>
                        <p>Bitte lesen Sie diese Vereinbarung sorgfältig durch und machen Sie sich mit den Regelungen
                            vertraut. Die Nutzung des Dienstes setzt voraus, dass Sie der Vereinbarung zustimmen.
                        </p><h4>Wer darf den Dienst verwenden?</h4>
                        <h5>Mindestalter</h5>
                        <p>Sie können in jedem Alter den Dienst nutzen. Sie sollten nur beachten, dass in Deutschland
                            das
                            Verbot der Kinderarbeit gilt, sodass diese sich zwar die Anzeigen durchlesen können, aber
                            sich
                            nicht bewerben können.</p>
                        <h5>Unternehmen</h5>
                        <p>
                            Wenn Sie den Dienst im Namen eines Unternehmens oder einer Organisation nutzen, bestätigen
                            Sie
                            uns gegenüber, dass Sie befugt sind, stellvertretend für diese Rechtspersönlichkeit zu
                            handeln,
                            und erklären sich für diese rechtsverbindlich mit der Geltung dieser Vereinbarung
                            einverstanden.
                        </p> <h4>Ihre Nutzung im Dienst</h4>
                        <h5>Inhalte im Dienst</h5>
                        <p> Die Inhalte im Dienst umfassen Anzeigen, sowie die jeweilige Adresse zu der Anzeige. Nutzer
                            können Anzeigen erstellen, um nach Interessenten zu suchen, welche sich auf die Jobs
                            bewerben
                            können. Kefedo ist für diese Inhalte ein Anbieter von Hosting-Diensten. Die Inhalte
                            unterliegen
                            der Verantwortung der Person oder des Unternehmens, die diese im Rahmen des Dienstes
                            einstellt
                            und zugänglich macht. Wenn Sie Inhalte sehen, die dieser Vereinbarung Ihrer Meinung nach
                            nicht
                            entsprechen, da sie beispielsweise gegen die Richtlinien oder gegen das Gesetz verstoßen,
                            können
                            Sie uns dies melden.</p>
                        <h5>Ihre Daten</h5>
                        <p> In unserer Datenschutzerklärung wird erläutert, wie wir mit Ihren personenbezogenen Daten
                            umgehen und Ihre Daten schützen, wenn Sie den Dienst nutzen.
                        </p>
                        <p> Wir halten uns bei der Verarbeitung der durch Sie hochgeladenen Anzeigen an die Kefedo-
                            Auftragsdatenverarbeitungsbedingungen.
                        </p>
                        <h5>Berechtigungen und Einschränkungen</h5>
                        <p> Unter Einhaltung dieser Vereinbarung und der geltenden Gesetze können Sie auf den Dienst in
                            der
                            Ihnen zur Verfügung gestellten Form zugreifen und ihn verwenden. Sie können alle Inhalte
                            ansehen. Außerdem können Sie alle Anzeigen über die Mehr Information- Auswahl groß anzeigen
                            lassen
                            und den Standort hierfür ermitteln.
                        </p>
                        <p>
                            Die Nutzung des Dienstes unterliegt jedoch bestimmten Einschränkungen. Folgendes ist nicht
                            zulässig:
                        </p>
                        <p>
                            1. Auf jegliche Teile des Dienstes oder der Inhalte zuzugreifen sowie diese zu
                            vervielfältigen,
                            herunterzuladen, zu verbreiten, zu übersenden, zu übertragen, anzuzeigen, zu verkaufen, zu
                            lizenzieren, zu ändern, anzupassen oder anderweitig zu verwenden, ausgenommen (a) in der Art
                            und
                            Weise, wie sie im Dienst genehmigt wurde; oder (b) nach vorheriger Genehmigung durch KEFEDO
                            in
                            Textform und, sofern relevant, durch die jeweiligen Rechteinhaber oder (c) soweit durch
                            anwendbares Recht gestattet.</p>
                        <p>
                            2. Den Dienst oder die sicherheitsbezogenen Funktionen des Dienstes zu umgehen, zu
                            deaktivieren,
                            betrügerisch zu verwenden oder anderweitig zu beeinträchtigen (dies betrifft auch dahin
                            gehende
                            Versuche). Es ist außerdem nicht gestattet, sonstige Funktionen des Dienstes zu umgehen, zu
                            deaktivieren, betrügerisch zu verwenden oder anderweitig zu beeinträchtigen (dies betrifft
                            auch
                            dahin gehende Versuche), die (a) das Kopieren bzw. die anderweitige Nutzung der Inhalte
                            verhindern bzw. beschränken oder (b) die Nutzung des Dienstes bzw. der Inhalte einschränken.
                        </p>
                        <p>3. Mit automatisierten Verfahren (z. B. Robotern, Botnets oder Scrapern) auf den Dienst
                            zuzugreifen, ausgenommen (a) über öffentliche Suchmaschinen gemäß der Robots.txt-Datei von
                            KEFEDO, (b) nach vorheriger Genehmigung durch KEFEDO in Textform oder (c) soweit durch
                            anwendbares Recht gestattet.
                        </p>
                        <p>4. Informationen zu erfassen oder zu verwenden, die eine Person identifizieren könnten (z. B.
                            das
                            Sammeln von Nutzernamen), sofern diese Person dies nicht zulässt oder dies gemäß obigem 3.
                            Abschnitt gestattet ist.</p>
                        <p>5. Den Dienst zu verwenden, um unverlangte Werbe- oder kommerzielle Inhalte oder andere
                            unerwünschte oder unzumutbare Belästigungen (Spam) zu verbreiten.
                            Fehlerhafte Messwerte von tatsächlichen Nutzer-Interaktionen mit dem Dienst hervorzurufen
                            oder
                            dazu zu ermutigen. </p>
                        <p>6. Das Melde-, Beschwerde-, Streit- oder Einspruchsverfahren zu missbrauchen, beispielsweise
                            durch
                            haltlose, mutwillige oder leichtfertige Angaben.</p>
                        <p>7. Im Rahmen oder mithilfe des Dienstes Wettbewerbe durchzuführen, die den
                            Wettbewerbsrichtlinien
                            von Kefedo nicht entsprechen.</p>
                        <p>
                            8. Den Dienst dazu zu benutzen, um (a) Werbung oder Sponsoring zu verkaufen, das in, um oder
                            um
                            den
                            Dienst oder dessen Inhalte herum platziert wird, außer, es entspricht den Richtlinien zu
                            Werbung
                            auf KEFEDO (beispielsweise die Richtlinien erfüllende Produktplatzierungen); oder (b)
                            Werbung
                            oder Sponsoring auf irgendeiner Seite einer Website oder Anwendung zu verkaufen, die
                            ausschließlich vom Dienst stammende Inhalte enthält oder deren vom Dienst stammende Inhalte
                            die
                            vorrangige Grundlage für derartige Verkäufe bildet (beispielsweise Verkauf von Anzeigen auf
                            einer Webseite, auf der KEFEDO-Videos die einzigen Inhalte mit einem Mehrwert sind).
                        </p>

                        <p>Quelle: <a href="https://www.e-recht24.de">eRecht24</a> <a
                                href="https://www.Youtube.com/static?gl=DE&template=terms&hl=de">Ähnlich zu
                                KEFEDO</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>

