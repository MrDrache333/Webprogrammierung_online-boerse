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
            <h1>Datenschutz</h1>
            <div class="impressumContainer">
                <div class="contact-row">
                    <div class="contact-col">
                        <h3 class="title_light">Datenschutz und Verwendung von Cookies</h3>
                        <p>Diese Datenschutzerklärung informiert über Art, Umfang und Zweck der Verarbeitung
                            personenbezogener Daten durch die verantworltiche Anbieter KeFeDo GmbH, vertreten durch den
                            Vorstand, Ammerländer Heerstraße 114-118, 26129 Oldenburg, auf dieser Website.</p>

                        <h1>Datenschutzerkl&auml;rung</h1>
                        <h2 class="title_light">1. Datenschutz auf einen Blick</h2>
                        <h3 class="title_light">Allgemeine Hinweise</h3>
                        <p>Die folgenden Hinweise geben einen einfachen &Uuml;berblick dar&uuml;ber, was mit Ihren
                            personenbezogenen Daten passiert, wenn Sie diese Website besuchen. Personenbezogene Daten
                            sind alle Daten, mit denen Sie pers&ouml;nlich identifiziert werden k&ouml;nnen. Ausf&uuml;hrliche
                            Informationen zum Thema Datenschutz entnehmen Sie unserer unter diesem Text aufgef&uuml;hrten
                            Datenschutzerkl&auml;rung.</p>
                        <h3 class="title_light">Datenerfassung auf dieser Website</h3>
                        <p><strong>Wer ist verantwortlich f&uuml;r die Datenerfassung auf dieser Website?</strong></p>
                        <p>Die Datenverarbeitung auf dieser Website erfolgt durch den Websitebetreiber. Dessen
                            Kontaktdaten k&ouml;nnen Sie dem Impressum dieser Website entnehmen.</p>
                        <p><strong>Wie erfassen wir Ihre Daten?</strong></p>
                        <p>Ihre Daten werden zum einen dadurch erhoben, dass Sie uns diese mitteilen. Hierbei kann es
                            sich z.&nbsp;B. um Daten handeln, die Sie in ein Kontaktformular eingeben.</p>
                        <p>Andere Daten werden automatisch oder nach Ihrer Einwilligung beim Besuch der Website durch
                            unsere IT-Systeme erfasst. Das sind vor allem technische Daten (z.&nbsp;B. Internetbrowser,
                            Betriebssystem oder Uhrzeit des Seitenaufrufs). Die Erfassung dieser Daten erfolgt
                            automatisch, sobald Sie diese Website betreten.</p>
                        <p><strong>Wof&uuml;r nutzen wir Ihre Daten?</strong></p>
                        <p>Ein Teil der Daten wird erhoben, um eine fehlerfreie Bereitstellung der Website zu gew&auml;hrleisten.
                            Andere Daten k&ouml;nnen zur Analyse Ihres Nutzerverhaltens verwendet werden.</p>
                        <p><strong>Welche Rechte haben Sie bez&uuml;glich Ihrer Daten?</strong></p>
                        <p>Sie haben jederzeit das Recht, unentgeltlich Auskunft &uuml;ber Herkunft, Empf&auml;nger und
                            Zweck Ihrer gespeicherten personenbezogenen Daten zu erhalten. Sie haben au&szlig;erdem ein
                            Recht, die Berichtigung oder L&ouml;schung dieser Daten zu verlangen. Wenn Sie eine
                            Einwilligung zur Datenverarbeitung erteilt haben, k&ouml;nnen Sie diese Einwilligung
                            jederzeit f&uuml;r die Zukunft widerrufen. Au&szlig;erdem haben Sie das Recht, unter
                            bestimmten Umst&auml;nden die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen
                            Daten zu verlangen. Des Weiteren steht Ihnen ein Beschwerderecht bei der zust&auml;ndigen
                            Aufsichtsbeh&ouml;rde zu.</p>
                        <p>Hierzu sowie zu weiteren Fragen zum Thema Datenschutz k&ouml;nnen Sie sich jederzeit unter
                            der im Impressum angegebenen Adresse an uns wenden.</p>
                        <h3 class="title_light">Analyse-Tools und Tools von Dritt&shy;anbietern</h3>
                        <p>Beim Besuch dieser Website kann Ihr Surf-Verhalten statistisch ausgewertet werden. Das
                            geschieht vor allem mit sogenannten Analyseprogrammen.</p>
                        <p>Detaillierte Informationen zu diesen Analyseprogrammen finden Sie in der folgenden
                            Datenschutzerkl&auml;rung.</p>
                        <h2 class="title_light">2. Allgemeine Hinweise und Pflicht&shy;informationen</h2>
                        <h3 class="title_light">Datenschutz</h3>
                        <p>Die Betreiber dieser Seiten nehmen den Schutz Ihrer pers&ouml;nlichen Daten sehr ernst. Wir
                            behandeln Ihre personenbezogenen Daten vertraulich und entsprechend der gesetzlichen
                            Datenschutzvorschriften sowie dieser Datenschutzerkl&auml;rung.</p>
                        <p>Wenn Sie diese Website benutzen, werden verschiedene personenbezogene Daten erhoben.
                            Personenbezogene Daten sind Daten, mit denen Sie pers&ouml;nlich identifiziert werden k&ouml;nnen.
                            Die vorliegende Datenschutzerkl&auml;rung erl&auml;utert, welche Daten wir erheben und wof&uuml;r
                            wir sie nutzen. Sie erl&auml;utert auch, wie und zu welchem Zweck das geschieht.</p>
                        <p>Wir weisen darauf hin, dass die Daten&uuml;bertragung im Internet (z.&nbsp;B. bei der
                            Kommunikation per E-Mail) Sicherheitsl&uuml;cken aufweisen kann. Ein l&uuml;ckenloser Schutz
                            der Daten vor dem Zugriff durch Dritte ist nicht m&ouml;glich.</p>
                        <h3 class="title_light">Hinweis zur verantwortlichen Stelle</h3>
                        <p>Die verantwortliche Stelle f&uuml;r die Datenverarbeitung auf dieser Website ist:</p>
                        <p>KeFeDo GmbH <br/>
                            Ammerl&auml;nder Heerstra&szlig;e 114-118<br/>
                            26219 Oldenburg</p>

                        <p>Telefon: +49-(0)441-798-0<br/>
                            E-Mail: info.kefedo@mail.de</p>
                        <p>Verantwortliche Stelle ist die nat&uuml;rliche oder juristische Person, die allein oder
                            gemeinsam mit anderen &uuml;ber die Zwecke und Mittel der Verarbeitung von personenbezogenen
                            Daten (z.&nbsp;B. Namen, E-Mail-Adressen o. &Auml;.) entscheidet.</p>
                        <h3 class="title_light">Hinweis zur Datenweitergabe in die USA</h3>
                        <p>Auf unserer Webseite sind unter anderem Tools von Unternehmen mit Sitz in den USA
                            eingebunden. Wenn diese Tools aktiv sind, k&ouml;nnen Ihre personenbezogenen Daten an die
                            US-Server der jeweiligen Unternehmen weitergegeben werden. Wir weisen darauf hin, dass die
                            USA kein sicherer Drittstaat im Sinne des EU-Datenschutzrechts sind. US-Unternehmen sind
                            dazu verpflichtet, personenbezogene Daten an Sicherheitsbeh&ouml;rden herauszugeben, ohne
                            dass Sie als Betroffener hiergegen gerichtlich vorgehen k&ouml;nnten. Es kann daher nicht
                            ausgeschlossen werden, dass US-Beh&ouml;rden (z.B. Geheimdienste) Ihre auf US-Servern
                            befindlichen Daten zu &Uuml;berwachungszwecken verarbeiten, auswerten und dauerhaft
                            speichern. Wir haben auf diese Verarbeitungst&auml;tigkeiten keinen Einfluss.</p>
                        <h3 class="title_light">Widerruf Ihrer Einwilligung zur Datenverarbeitung</h3>
                        <p>Viele Datenverarbeitungsvorg&auml;nge sind nur mit Ihrer ausdr&uuml;cklichen Einwilligung m&ouml;glich.
                            Sie k&ouml;nnen eine bereits erteilte Einwilligung jederzeit widerrufen. Die Rechtm&auml;&szlig;igkeit
                            der bis zum Widerruf erfolgten Datenverarbeitung bleibt vom Widerruf unber&uuml;hrt.</p>
                        <h3 class="title_light">Widerspruchsrecht gegen die Datenerhebung in besonderen F&auml;llen
                            sowie gegen Direktwerbung (Art. 21 DSGVO)</h3>
                        <p>WENN DIE DATENVERARBEITUNG AUF GRUNDLAGE VON ART. 6 ABS. 1 LIT. E ODER F DSGVO ERFOLGT, HABEN
                            SIE JEDERZEIT DAS RECHT, AUS GR&Uuml;NDEN, DIE SICH AUS IHRER BESONDEREN SITUATION ERGEBEN,
                            GEGEN DIE VERARBEITUNG IHRER PERSONENBEZOGENEN DATEN WIDERSPRUCH EINZULEGEN; DIES GILT AUCH
                            F&Uuml;R EIN AUF DIESE BESTIMMUNGEN GEST&Uuml;TZTES PROFILING. DIE JEWEILIGE
                            RECHTSGRUNDLAGE, AUF DENEN EINE VERARBEITUNG BERUHT, ENTNEHMEN SIE DIESER DATENSCHUTZERKL&Auml;RUNG.
                            WENN SIE WIDERSPRUCH EINLEGEN, WERDEN WIR IHRE BETROFFENEN PERSONENBEZOGENEN DATEN NICHT
                            MEHR VERARBEITEN, ES SEI DENN, WIR K&Ouml;NNEN ZWINGENDE SCHUTZW&Uuml;RDIGE GR&Uuml;NDE F&Uuml;R
                            DIE VERARBEITUNG NACHWEISEN, DIE IHRE INTERESSEN, RECHTE UND FREIHEITEN &Uuml;BERWIEGEN ODER
                            DIE VERARBEITUNG DIENT DER GELTENDMACHUNG, AUS&Uuml;BUNG ODER VERTEIDIGUNG VON RECHTSANSPR&Uuml;CHEN
                            (WIDERSPRUCH NACH ART. 21 ABS. 1 DSGVO).</p>
                        <p>WERDEN IHRE PERSONENBEZOGENEN DATEN VERARBEITET, UM DIREKTWERBUNG ZU BETREIBEN, SO HABEN SIE
                            DAS RECHT, JEDERZEIT WIDERSPRUCH GEGEN DIE VERARBEITUNG SIE BETREFFENDER PERSONENBEZOGENER
                            DATEN ZUM ZWECKE DERARTIGER WERBUNG EINZULEGEN; DIES GILT AUCH F&Uuml;R DAS PROFILING,
                            SOWEIT ES MIT SOLCHER DIREKTWERBUNG IN VERBINDUNG STEHT. WENN SIE WIDERSPRECHEN, WERDEN IHRE
                            PERSONENBEZOGENEN DATEN ANSCHLIESSEND NICHT MEHR ZUM ZWECKE DER DIREKTWERBUNG VERWENDET
                            (WIDERSPRUCH NACH ART. 21 ABS. 2 DSGVO).</p>
                        <h3 class="title_light">Beschwerde&shy;recht bei der zust&auml;ndigen
                            Aufsichts&shy;beh&ouml;rde</h3>
                        <p>Im Falle von Verst&ouml;&szlig;en gegen die DSGVO steht den Betroffenen ein Beschwerderecht
                            bei einer Aufsichtsbeh&ouml;rde, insbesondere in dem Mitgliedstaat ihres gew&ouml;hnlichen
                            Aufenthalts, ihres Arbeitsplatzes oder des Orts des mutma&szlig;lichen Versto&szlig;es zu.
                            Das Beschwerderecht besteht unbeschadet anderweitiger verwaltungsrechtlicher oder
                            gerichtlicher Rechtsbehelfe.</p>
                        <h3 class="title_light">Recht auf Daten&shy;&uuml;bertrag&shy;barkeit</h3>
                        <p>Sie haben das Recht, Daten, die wir auf Grundlage Ihrer Einwilligung oder in Erf&uuml;llung
                            eines Vertrags automatisiert verarbeiten, an sich oder an einen Dritten in einem g&auml;ngigen,
                            maschinenlesbaren Format aush&auml;ndigen zu lassen. Sofern Sie die direkte &Uuml;bertragung
                            der Daten an einen anderen Verantwortlichen verlangen, erfolgt dies nur, soweit es technisch
                            machbar ist.</p>
                        <h3 class="title_light">SSL- bzw. TLS-Verschl&uuml;sselung</h3>
                        <p>Diese Seite nutzt aus Sicherheitsgr&uuml;nden und zum Schutz der &Uuml;bertragung
                            vertraulicher Inhalte, wie zum Beispiel Bestellungen oder Anfragen, die Sie an uns als
                            Seitenbetreiber senden, eine SSL- bzw. TLS-Verschl&uuml;sselung. Eine verschl&uuml;sselte
                            Verbindung erkennen Sie daran, dass die Adresszeile des Browsers von &bdquo;http://&ldquo;
                            auf &bdquo;https://&ldquo; wechselt und an dem Schloss-Symbol in Ihrer Browserzeile.</p>
                        <p>Wenn die SSL- bzw. TLS-Verschl&uuml;sselung aktiviert ist, k&ouml;nnen die Daten, die Sie an
                            uns &uuml;bermitteln, nicht von Dritten mitgelesen werden.</p>
                        <h3 class="title_light">Auskunft, L&ouml;schung und Berichtigung</h3>
                        <p>Sie haben im Rahmen der geltenden gesetzlichen Bestimmungen jederzeit das Recht auf
                            unentgeltliche Auskunft &uuml;ber Ihre gespeicherten personenbezogenen Daten, deren Herkunft
                            und Empf&auml;nger und den Zweck der Datenverarbeitung und ggf. ein Recht auf Berichtigung
                            oder L&ouml;schung dieser Daten. Hierzu sowie zu weiteren Fragen zum Thema personenbezogene
                            Daten k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns
                            wenden.</p>
                        <h3 class="title_light">Recht auf Einschr&auml;nkung der Verarbeitung</h3>
                        <p>Sie haben das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu
                            verlangen. Hierzu k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse
                            an uns wenden. Das Recht auf Einschr&auml;nkung der Verarbeitung besteht in folgenden F&auml;llen:</p>
                        <ul>
                            <li>Wenn Sie die Richtigkeit Ihrer bei uns gespeicherten personenbezogenen Daten bestreiten,
                                ben&ouml;tigen wir in der Regel Zeit, um dies zu &uuml;berpr&uuml;fen. F&uuml;r die
                                Dauer der Pr&uuml;fung haben Sie das Recht, die Einschr&auml;nkung der Verarbeitung
                                Ihrer personenbezogenen Daten zu verlangen.
                            </li>
                            <li>Wenn die Verarbeitung Ihrer personenbezogenen Daten unrechtm&auml;&szlig;ig
                                geschah/geschieht, k&ouml;nnen Sie statt der L&ouml;schung die Einschr&auml;nkung der
                                Datenverarbeitung verlangen.
                            </li>
                            <li>Wenn wir Ihre personenbezogenen Daten nicht mehr ben&ouml;tigen, Sie sie jedoch zur Aus&uuml;bung,
                                Verteidigung oder Geltendmachung von Rechtsanspr&uuml;chen ben&ouml;tigen, haben Sie das
                                Recht, statt der L&ouml;schung die Einschr&auml;nkung der Verarbeitung Ihrer
                                personenbezogenen Daten zu verlangen.
                            </li>
                            <li>Wenn Sie einen Widerspruch nach Art. 21 Abs. 1 DSGVO eingelegt haben, muss eine Abw&auml;gung
                                zwischen Ihren und unseren Interessen vorgenommen werden. Solange noch nicht feststeht,
                                wessen Interessen &uuml;berwiegen, haben Sie das Recht, die Einschr&auml;nkung der
                                Verarbeitung Ihrer personenbezogenen Daten zu verlangen.
                            </li>
                        </ul>
                        <p>Wenn Sie die Verarbeitung Ihrer personenbezogenen Daten eingeschr&auml;nkt haben, d&uuml;rfen
                            diese Daten &ndash; von ihrer Speicherung abgesehen &ndash; nur mit Ihrer Einwilligung oder
                            zur Geltendmachung, Aus&uuml;bung oder Verteidigung von Rechtsanspr&uuml;chen oder zum
                            Schutz der Rechte einer anderen nat&uuml;rlichen oder juristischen Person oder aus Gr&uuml;nden
                            eines wichtigen &ouml;ffentlichen Interesses der Europ&auml;ischen Union oder eines
                            Mitgliedstaats verarbeitet werden.</p>
                        <h3 class="title_light">Widerspruch gegen Werbe-E-Mails</h3>
                        <p>Der Nutzung von im Rahmen der Impressumspflicht ver&ouml;ffentlichten Kontaktdaten zur &Uuml;bersendung
                            von nicht ausdr&uuml;cklich angeforderter Werbung und Informationsmaterialien wird hiermit
                            widersprochen. Die Betreiber der Seiten behalten sich ausdr&uuml;cklich rechtliche Schritte
                            im Falle der unverlangten Zusendung von Werbeinformationen, etwa durch Spam-E-Mails,
                            vor.</p>
                        <h2 class="title_light">3. Datenerfassung auf dieser Website</h2>
                        <h3 class="title_light">Cookies</h3>
                        <p>Unsere Internetseiten verwenden so genannte &bdquo;Cookies&ldquo;. Cookies sind kleine
                            Textdateien und richten auf Ihrem Endger&auml;t keinen Schaden an. Sie werden entweder vor&uuml;bergehend
                            f&uuml;r die Dauer einer Sitzung (Session-Cookies) oder dauerhaft (permanente Cookies) auf
                            Ihrem Endger&auml;t gespeichert. Session-Cookies werden nach Ende Ihres Besuchs automatisch
                            gel&ouml;scht. Permanente Cookies bleiben auf Ihrem Endger&auml;t gespeichert, bis Sie diese
                            selbst l&ouml;schen&nbsp;oder eine automatische L&ouml;schung durch Ihren Webbrowser
                            erfolgt.</p>
                        <p>Teilweise k&ouml;nnen auch Cookies von Drittunternehmen auf Ihrem Endger&auml;t gespeichert
                            werden, wenn Sie unsere Seite betreten (Third-Party-Cookies). Diese erm&ouml;glichen uns
                            oder Ihnen die Nutzung bestimmter Dienstleistungen des Drittunternehmens (z.B. Cookies zur
                            Abwicklung von Zahlungsdienstleistungen).</p>
                        <p>Cookies haben verschiedene Funktionen. Zahlreiche Cookies sind technisch notwendig, da
                            bestimmte Websitefunktionen ohne diese nicht funktionieren w&uuml;rden (z.B. die
                            Warenkorbfunktion oder die Anzeige von Videos). Andere Cookies dienen dazu, das
                            Nutzerverhalten auszuwerten&nbsp;oder Werbung anzuzeigen.</p>
                        <p>Cookies, die zur Durchf&uuml;hrung des elektronischen Kommunikationsvorgangs (notwendige
                            Cookies) oder zur Bereitstellung bestimmter, von Ihnen erw&uuml;nschter Funktionen
                            (funktionale Cookies, z. B. f&uuml;r die Warenkorbfunktion) oder zur Optimierung der Website
                            (z.B. Cookies zur Messung des Webpublikums) erforderlich sind, werden auf Grundlage von Art.
                            6 Abs. 1 lit. f DSGVO gespeichert, sofern keine andere Rechtsgrundlage angegeben wird. Der
                            Websitebetreiber hat ein berechtigtes Interesse an der Speicherung von Cookies zur technisch
                            fehlerfreien und optimierten Bereitstellung seiner Dienste. Sofern eine Einwilligung zur
                            Speicherung von Cookies abgefragt wurde, erfolgt die Speicherung der betreffenden Cookies
                            ausschlie&szlig;lich auf Grundlage dieser Einwilligung (Art. 6 Abs. 1 lit. a DSGVO); die
                            Einwilligung ist jederzeit widerrufbar.</p>
                        <p>Sie k&ouml;nnen Ihren Browser so einstellen, dass Sie &uuml;ber das Setzen von Cookies
                            informiert werden und Cookies nur im Einzelfall erlauben, die Annahme von Cookies f&uuml;r
                            bestimmte F&auml;lle oder generell ausschlie&szlig;en sowie das automatische L&ouml;schen
                            der Cookies beim Schlie&szlig;en des Browsers aktivieren. Bei der Deaktivierung von Cookies
                            kann die Funktionalit&auml;t dieser Website eingeschr&auml;nkt sein.</p>
                        <p>Soweit Cookies von Drittunternehmen oder zu Analysezwecken eingesetzt werden, werden wir Sie
                            hier&uuml;ber im Rahmen dieser Datenschutzerkl&auml;rung gesondert informieren und ggf. eine
                            Einwilligung abfragen.</p>
                        <h3 class="title_light">Kontaktformular</h3>
                        <p>Wenn Sie uns per Kontaktformular Anfragen zukommen lassen, werden Ihre Angaben aus dem
                            Anfrageformular inklusive der von Ihnen dort angegebenen Kontaktdaten zwecks Bearbeitung der
                            Anfrage und f&uuml;r den Fall von Anschlussfragen bei uns gespeichert. Diese Daten geben wir
                            nicht ohne Ihre Einwilligung weiter.</p>
                        <p>Die Verarbeitung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. b DSGVO, sofern
                            Ihre Anfrage mit der Erf&uuml;llung eines Vertrags zusammenh&auml;ngt oder zur Durchf&uuml;hrung
                            vorvertraglicher Ma&szlig;nahmen erforderlich ist. In allen &uuml;brigen F&auml;llen beruht
                            die Verarbeitung auf unserem berechtigten Interesse an der effektiven Bearbeitung der an uns
                            gerichteten Anfragen (Art. 6 Abs. 1 lit. f DSGVO) oder auf Ihrer Einwilligung (Art. 6 Abs. 1
                            lit. a DSGVO) sofern diese abgefragt wurde.</p>
                        <p>Die von Ihnen im Kontaktformular eingegebenen Daten verbleiben bei uns, bis Sie uns zur L&ouml;schung
                            auffordern, Ihre Einwilligung zur Speicherung widerrufen oder der Zweck f&uuml;r die
                            Datenspeicherung entf&auml;llt (z.&nbsp;B. nach abgeschlossener Bearbeitung Ihrer Anfrage).
                            Zwingende gesetzliche Bestimmungen &ndash; insbesondere Aufbewahrungsfristen &ndash; bleiben
                            unber&uuml;hrt.</p>
                        <h3 class="title_light">Anfrage per E-Mail, Telefon oder Telefax</h3>
                        <p>Wenn Sie uns per E-Mail, Telefon oder Telefax kontaktieren, wird Ihre Anfrage inklusive aller
                            daraus hervorgehenden personenbezogenen Daten (Name, Anfrage) zum Zwecke der Bearbeitung
                            Ihres Anliegens bei uns gespeichert und verarbeitet. Diese Daten geben wir nicht ohne Ihre
                            Einwilligung weiter.</p>
                        <p>Die Verarbeitung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. b DSGVO, sofern
                            Ihre Anfrage mit der Erf&uuml;llung eines Vertrags zusammenh&auml;ngt oder zur Durchf&uuml;hrung
                            vorvertraglicher Ma&szlig;nahmen erforderlich ist. In allen &uuml;brigen F&auml;llen beruht
                            die Verarbeitung auf unserem berechtigten Interesse an der effektiven Bearbeitung der an uns
                            gerichteten Anfragen (Art. 6 Abs. 1 lit. f DSGVO) oder auf Ihrer Einwilligung (Art. 6 Abs. 1
                            lit. a DSGVO) sofern diese abgefragt wurde.</p>
                        <p>Die von Ihnen an uns per Kontaktanfragen &uuml;bersandten Daten verbleiben bei uns, bis Sie
                            uns zur L&ouml;schung auffordern, Ihre Einwilligung zur Speicherung widerrufen oder der
                            Zweck f&uuml;r die Datenspeicherung entf&auml;llt (z.&nbsp;B. nach abgeschlossener
                            Bearbeitung Ihres Anliegens). Zwingende gesetzliche Bestimmungen &ndash; insbesondere
                            gesetzliche Aufbewahrungsfristen &ndash; bleiben unber&uuml;hrt.</p>
                        <h2 class="title_light">4. Soziale Medien</h2>
                        <h3 class="title_light">Social-Media-Plugins mit Shariff</h3>
                        <p>Auf dieser Website werden Plugins von sozialen Medien verwendet (z.&nbsp;B. Facebook,
                            Twitter, Instagram, Pinterest, XING, LinkedIn, Tumblr).</p>
                        <p>Die Plugins k&ouml;nnen Sie in der Regel anhand der jeweiligen Social-Media-Logos erkennen.
                            Um den Datenschutz auf dieser Website zu gew&auml;hrleisten, verwenden wir diese Plugins nur
                            zusammen mit der sogenannten &bdquo;Shariff&ldquo;-L&ouml;sung. Diese Anwendung verhindert,
                            dass die auf dieser Website integrierten Plugins Daten schon beim ersten Betreten der Seite
                            an den jeweiligen Anbieter &uuml;bertragen.</p>
                        <p>Erst wenn Sie das jeweilige Plugin durch Anklicken der zugeh&ouml;rigen Schaltfl&auml;che
                            aktivieren, wird eine direkte Verbindung zum Server des Anbieters hergestellt
                            (Einwilligung). Sobald Sie das Plugin aktivieren, erh&auml;lt der jeweilige Anbieter die
                            Information, dass Sie mit Ihrer IP-Adresse dieser Website besucht haben. Wenn Sie
                            gleichzeitig in Ihrem jeweiligen Social-Media-Account (z.&nbsp;B. Facebook) eingeloggt sind,
                            kann der jeweilige Anbieter den Besuch dieser Website Ihrem Benutzerkonto zuordnen.</p>
                        <p>Das Aktivieren des Plugins stellt eine Einwilligung im Sinne des Art. 6 Abs. 1 lit. a DSGVO
                            dar. Diese Einwilligung k&ouml;nnen Sie jederzeit mit Wirkung f&uuml;r die Zukunft
                            widerrufen.</p>
                        <h3 class="title_light">Twitter Plugin</h3>
                        <p>Auf dieser Website sind Funktionen des Dienstes Twitter eingebunden. Diese Funktionen werden
                            angeboten durch die Twitter Inc., 1355 Market Street, Suite 900, San Francisco, CA 94103,
                            USA. Durch das Benutzen von Twitter und der Funktion &bdquo;Re-Tweet&ldquo; werden die von
                            Ihnen besuchten Websites mit Ihrem Twitter-Account verkn&uuml;pft und anderen Nutzern
                            bekannt gegeben. Dabei werden auch Daten an Twitter &uuml;bertragen. Wir weisen darauf hin,
                            dass wir als Anbieter der Seiten keine Kenntnis vom Inhalt der &uuml;bermittelten Daten
                            sowie deren Nutzung durch Twitter erhalten. Weitere Informationen hierzu finden Sie in der
                            Datenschutzerkl&auml;rung von Twitter unter: <a class="aa"
                                                                            href="https://twitter.com/de/privacy"
                                                                            target="_blank" rel="noopener noreferrer">https://twitter.com/de/privacy</a>.
                        </p>
                        <p>Die Verwendung des Twitter-Plugins erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Der
                            Websitebetreiber hat ein berechtigtes Interesse an einer m&ouml;glichst umfangreichen
                            Sichtbarkeit in den Sozialen Medien. Sofern eine entsprechende Einwilligung abgefragt wurde,
                            erfolgt die Verarbeitung ausschlie&szlig;lich auf Grundlage von Art. 6 Abs. 1 lit. a DSGVO;
                            die Einwilligung ist jederzeit widerrufbar.</p>
                        <p>Ihre Datenschutzeinstellungen bei Twitter k&ouml;nnen Sie in den Konto-Einstellungen unter <a
                                  class="aa"  href="https://twitter.com/account/settings" target="_blank"
                                    rel="noopener noreferrer">https://twitter.com/account/settings</a> &auml;ndern.</p>
                        <p>Quelle: <a class="aa" href="https://www.e-recht24.de">eRecht24</a></p>

                        <h2 class="contact-h2">Cookie Richtlinie für KeFeDo</h2>
                        <p>Dies sind die Cookie Richtlinien für KeFeDo.</p>
                        <p><strong>Was sind Cookies</strong></p>
                        <p>Wie bei allen professionellen Websites verwendet diese Seite
                            Cookies. Cookies sind kleine Dateien, welche von Ihrem Computer heruntergeladen werden, um
                            Ihre Erfahrung zu verbessern. Diese Seite beschreibt, welche Informationen diese speichern,
                            wie sie verwendet werden und wieso Cookies manchmal gespeichert werden müssen. Wir werden
                            auch mitteilen, wie man sich vor der Speicherung der Cookies schützen kann, auch wenn dies
                            die Website herabstufen wird und manche Elemente ihre Funktionaltiät verlieren können.
                        </p>
                        <p>Für mehr allgemeine Informationen zu Cookies, lesen Sie
                            <a class="aa"
                               href="https://www.cookieconsent.com/what-are-cookies/">"What Are Cookies"</a>.</p>
                        <p><strong>Wie wir Cookies verwenden</strong></p>
                        <p>Cookies werden wegen einer Vielzahl an Ursachen verwendet. Diese werden detailiert unten
                            beschrieben.
                            Leider gibt es in den meisten Fällen keinen industriellen Standard für das Deaktivieren von
                            Cookies
                            , ohne bestimmte Funktionalitäten und Features zu deaktivieren. Es wird empfohlen alle
                            Cookies
                            zu akzeptieren, wenn man sich nicht sicher ist, ob diese bei den verwendeten Anwendungen
                            benötigt werden oder nicht.
                        </p>
                        <p><strong>Deaktivieren von Cookies</strong></p>
                        <p>Man kann das Setzen von Cookies verhindern, indem man die Cookie-Einstellugen vom eigenen
                            Browser anpasst. Das Deaktivieren von Cookies wird die Funktionalität dieser und vieler
                            anderer Seiten
                            verändern. Das Deaktivieren führt oftmals zum Deaktivieren von bestimmten Funktionalitäten
                            und Eigenschaften von dieser Seite. Deswegen wird es empfohlen, dass man Cookies nichtt
                            deaktiviert.
                        </p>
                        <p><strong>Unsere gesetzen Cookies</strong></p>
                        <ul>
                            <li>
                                <p>Cookies für den Login</p>
                                <p>Wir verwenden Cookies, wenn Sie sich einloggen, sodass wir wissen, dass Sie
                                    eingeloggt sind. Diese sind dafür da, damit man sich nicht immer neu Einloggen muss,
                                    beim Besuchen anderer Seiten.
                                    Diese Cookies werden typischerweise wieder beim Ausloggen gelöscht, um gewährleisten
                                    zu können, dass nur bestimmte Bereiche erreicht werden können, wenn man eingeloggt
                                    ist.</p>
                            </li>
                            <li><p>Cookies für den Cookie-Banner</p>
                                <p>Dieser Cookie dient dazu sich zu merken, dass die Cookies akzeptiert wurden. Dieser
                                    Cookie wird typischerweise nach einer gewissen Zeit gelöscht. Der Browser speichert
                                    den Cookie, damit man nicht jedes Mal beim Aufrufen der Website die Cookies
                                    akzeptieren muss.</p></li>
                        </ul>

                    </div>

                    <p>Quelle: <a class="aa"
                                  href="https://www.arbeitsagentur.de/datei/Datenschutzerklaerung_ba018190.pdf">Agentur
                            für Arbeit</a> und <a class="aa" href="https://www.cookiepolicygenerator.com/">Cookie Policy
                            Generator</a> Ähnlich zu
                        KEFEDO</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "footer.php"; ?>

