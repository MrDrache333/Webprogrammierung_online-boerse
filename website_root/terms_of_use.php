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
                        <h4>§1 Nutzung des Portals unter www.kefedo.de</h4>
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
                        <p>(1) Die Nutzung von bestimmten Angeboten erfordert eine vorherige Registrierung als Nutzer.
                            In
                            der Datenschutzerklärung ist aufgelistet, welche Angebote mit den Registrierungsdaten
                            genutzt werden können.</p>
                        <p>(2) Der Nutzer ist verpflichtet, ein geeignetes und sicheres Passwort zu verwenden. Er hat
                            für die Geheimhaltung seines Passwortes und aller anderen Authentifizierungsdaten zu
                            sorgen.</p>
                        <p>(4) Eine Registrierung kann erst erfolgen und ist nur dann zulässig, wenn der Nutzer die
                            Nutzungsbedingungen gelesen und akzeptiert hat.</p>
                        <p>(5) Wenn Sie den Dienst im Namen eines Unternehmens oder einer Organisation nutzen,
                            bestätigen Sie uns gegenüber, dass Sie befugt sind, stellvertretend für diese
                            Rechtspersönlichkeit zu handeln, und erklären sich für diese rechtsverbindlich mit der
                            Geltung dieser Vereinbarung einverstanden.</p>
                        <h4>§3 Urheberrecht</h4>
                        <p>(1) Das Urheberrecht an dem Portal und an der Datenbank liegt in seiner Gesamtheit bei der
                            KeFeDo GmbH. Die KeFeDo GmbH untersagt hiermit
                        <li>die teilweise oder vollständige Verwertung oder Vervielfältigung der Datenbank</li>
                        <li>die Nutzung der in die Datenbank eingestellten Daten zu anderen Zwecken als den
                            Angelegenheiten, die den gesetzlichen Auftrag der KeFeDo GmbH betreffen,
                        </li>
                        <li>die Nutzung und Vervielfältigung der in die Datenbank eingestellten Daten sowie deren
                            Inhalte durch Dritte für eigene Zwecke, ohne dass hierfür eine Zustimmung des Nutzers
                            vorliegt,
                        </li>
                        <li>im Sinne des §14 Markengesetz grundsätzlich jegliche Verwendung des Logos der Bundesagentur
                            für Arbeit oder des Logos des Portals, insbesondere für Werbezwecke.
                        </li>
                        </p>
                        <p>(2)Die Geltendmachung von urheberrechtlichen Ansprüchen behält sich die KeFeDo GmbH
                            ausdrücklich vor. Zuwiderhandlungen gegen die urheberrechtlichen und
                            markenrechtlichen Bestimmungen können zivilrechtlich oder ggf. auch strafrechtlich verfolgt
                            werden. </p>
                        <h4>§4 Maßnahmen und Schadensersatz</h4>
                        <p>Die KeFeDo GmbH stellt das Portal als Service zur Verfügung. Bei einer
                            festgestellten oder offensichtlichen missbräuchlichen Nutzung und Verstößen gegen die
                            Nutzungsbedingungen ist die KeFeDo GmbH berechtigt, das Benutzerkonto ohne
                            Benachrichtigung des Nutzers sofort zu löschen, den Zugang zum Portal vorübergehend oder
                            dauerhaft zu sperren und die aktive Sitzung zu unterbrechen.</p>
                        <p>Liegen Anhaltspunkte für einen Verstoß gegen die Nutzungsbedingungen vor, ist die KeFeDo GmbH
                            ebenfalls berechtigt, das Benutzerkonto für die Dauer der Überprüfung des Sachverhalts ohne
                            Benachrichtigung des Nutzers zu sperren.</p>
                        <p>Zur Überprüfung dieser Verdachtsfälle kann die KeFeDo GmbH von dem Nutzer die Vorlage von
                            Nachweisen
                            verlangen, die geeignet sind, den Verdacht zu entkräften. Ein geeigneter Nachweis kann auch
                            darin bestehen, dass der Nutzer Dokumente vorlegt, aus denen eindeutig hervorgeht, dass ein
                            von ihm veröffentlichtes Angebot auf ein tatsächlich existierendes Angebot und auf einen
                            konkreten Auftraggeber zurückzuführen ist.</p>
                        <p>Werden die verlangten Nachweise nicht vorgelegt oder sind die vorgelegten Nachweise nicht
                            geeignet, den Verdacht zu entkräften, ist die KeFeDo GmbH berechtigt, das Benutzerkonto
                            dauerhaft zu
                            sperren.</p>
                        <p>Die KeFeDo GmbH behält sich vor, bei missbräuchlicher Nutung des Portals
                            Schadensersatzansprüche gegen den Verursacher geltend zu machen.</p>
                        <h4>§5 Haftung</h4>
                        <p> (1) Für die vom Nutzer in das Portal eingestellten Inhalte trägt derjenige Nutzer die
                            ausschließliche Verantwortung, der sie eingestellt hat bzw. in dessen Auftrag sie
                            eingestellt wurden. Bei minderjährigen Nutzern liegt die Verantwortung bei den Eltern oder
                            sonstigen Erziehungsberechtigten.</p>
                        <p>(2)Durch das Einverständnis mit den Nutzungsbedingungen erklärt der Nutzer, dass die von ihm
                            eingestellten Inhalte nicht gegen diese Nutzungsbedingungen oder gegen geltendes Recht
                            verstoßen oder sittenwidrig oder diskriminierend sind. Ferner erklärt der Nutzer, dass er
                            das Recht hat, die in den Angeboten verwendeten Inhalte (z.B. Fotos) in online Portalen zu
                            verwenden und dass die Angebote keine Rechte Dritter verletzen. </p>
                        <p>(3) Die KeFeDo GmbH haftet nicht für die Richtigkeit, Vollständigkeit, Rechtmäßigkeit oder
                            Zuverlässigkeit von Angaben, die durch registrierte Nutzer in das Portal eingestellt
                            werden.</p>
                        <p>(4) Die KeFeDo GmbH haftet nicht für Inhalte anderer Websites, die mit KeFeDo verlinkt sind.
                            KeFeDo macht sich die Inhalte dieser fremden und verlinkten Seiten nicht zu Eigen und
                            übernimmt keine Verantwortung. </p>
                        <p>(5) KeFeDo haftet nicht für Schäden, die den Nutzern des Portals durch Computerviren oder
                            sonstige schädigende Mechanismen entstehen, die ihren Ursprng nicht bei KeFeDo haben.</p>
                        <h3>Spezifische Regelungen im Falle der Nutzung der Jobangebote</h3>
                        <h4>§6 Spezifika zur Registrierung und Nutzung</h4>
                        <p>Der Zugriff auf ihre Daten ist durch ein Kennwort geschützt. Mit ihrer Einwilligung erklären
                            Sie sich einverstanden, dass die von Ihnen eingestellten Daten zum Bewerber bzw.
                            Stellenprofil und ggf. Ihr Lichtbild, sofern Sie es veröffentlichen, auch von Dritten
                            eingesehen werden können. Es gilt §5 Abs. 2 der Nutzungsbedingunen. Sie tragen selbst die
                            Verantwortung für die Inhalte, die Sie veröffentlichen bzw. zugänglich machen.</p>
                        <h4>§7 Unzulässige Angebote und Inhalte - Arbeitgeber/Veranstaltungsanbieter/private
                            Arbeitsvermittler</h4>
                        <p>(1) Im Hinblick auf die mit der Errichtung und dem Betrieb des Portals verbundenen
                            Zielsetzung
                            einer Beschleunigung und Entbürokratisierung der Arbeitsvermittlung dürfen von den Nutzern
                            keine Inhalte eingestellt werden, die keinen Bezug zur Arbeitsvermittlung haben und nicht
                            auf die Begründung von Ausbildungs- oder Beschäftigungsverhältnissen gerichtet sind.</p>
                        <p>(2) KeFeDo überprüft die von den Nutzern eingestellten Inhalte
                            stichprobenartig . Sie führt eine systematische Suche nach Verstößen gegen die
                            Nutzungsbedingungen durch und geht entsprechenden Hinweisen nach. Hinweise können über die
                            Hotline des Portals gegeben werden. Bei Verstößen und Verdachtsfällen gilt § 4.</p>
                        <p>(3) Folgende Angebote dürfen nicht in das Portal eingestellt werden:
                        <ol>
                            <li> Angebote, die gegen geltende Rechtsvorschrifte oder die guten Sotten bzw. behördliche
                                Verbote verstoßen oder Rechter Dritter beeinträchtigen (z.B. Mindestarbeitsbedingungen,
                                Mindestlöhne, Lohnuntergrenzen, sittenwidrige Lohnangebote, Diskriminierungsverbote,
                                Vorschriften des Gesetzes über den unlauterern Wettbewerb, des Urheberrechtsgesetzes,
                                des Alggemeinen Gleichbehandlungsgesetzes oder des Glückspielstaatsvertrages),
                            </li>
                            <li> Angebote, die erotische Dienstleistungen bewerben, Mitarbeiter für Stellen im
                                erotischen/erotiknahen/pornografischen/Prostitutions- und prostitutionsnahem Gewerbe
                                suchen, gegen die guten Sitten oder die Menschenwürde verstoßen (z.B. Angebote für
                                Telefonerotik, ...),
                            </li>
                            <li>Angebote, die ganz oder teilweise bloßen Werbe- oder Geschäftszwecken dienen bzw.
                                Produkte oder Dienstleistungen anpreisen (Anpreisung von Kursen, Büchern, Versicherungs-
                                oder Finanzdienstleistungen o.ä.),
                            </li>
                            <li>Kostenpflichtige Angebote jeder Art (hierzu zählen z. B. auch Angebote, die nur über die
                                Anwahl kostenintensiver 0900-Rufnummern oder über eine kostenpflichtige Registrierung
                                auf Internetseiten erreicht werden können) – es sei denn, die Kostenpflicht ist
                                gesetzlich geregelt. Kostenpflichtige Angebote sind auch solche, die zwar nach außen hin
                                als unentgeltlich firmieren, bestimmte Vorteile oder Vergünstigungen aber nur gegen
                                Zahlung gewähren (zum Beispiel Angebote, die den Kauf von Listen mit Adressen von
                                Arbeitgebern beinhalten),
                            </li>
                            <li>Angebote, die unrichtige, ungenaue oder irreführende Tatsachen beinhalten oder über die
                                Identität des Anbieters täuschen,
                            </li>
                            <li>Angebote, die ein in Wahrheit nichtexistierendes oder ein nicht den Tatsachen
                                entsprechendes Scheinangebot darstellen, z.B. weil sie entweder nur zum Aufbau eines
                                Bewerberpools dienen oder zur Partnergewinnung im Rahmen von "Schneeballsystemen"
                                eingestellt werden,
                            </li>
                            <li>Stellenangebote dürfen nicht gelöscht und gleich wieder neu eingestellt werden. Sofern
                                sich inhaltliche Änderungen ergeben, sind diese im bestehenden Angebot zu aktualisieren.
                                Eine tägliche Aktualisierung der Angebote ohne inhaltlische Änderung ist nicth
                                gestattet,
                            </li>
                            <li>Angebote, bei denen
                                <ul style="list-style-type: lower-alpha">
                                    <li>die vom Sytsem zur Verfügung gestellte Berufsbezeichnung mit der errstellten
                                        Beschreibung nicht übereinstimmt.
                                    </li>
                                    <li>für dden Bewerber dei Konditionen, Anforderungen, Tätigkeiten und
                                        Arbeitsbedingungen der Stelle bzw. der Veranstaltung nicht eindeutig erkennbar
                                        sind.
                                    </li>
                                    <li>ein inhaltlich identisches Angebot bereits veröffentlicht wurde.</li>
                                </ul>
                            </li>
                        </ol>
                        </p>
                        <p>(4) Anbieter von Stellen sind verpflichtet, die eingehenden Berwerbungen vertraulich zu
                            behandeln. Eine Weitergabe der Bewerbungen an Dritte ist ohne ausdrückliches Einverständnis
                            des Bewerbers nicht zulässig und kann ggf. strafrechtlich verfolgt werden. Unternehmen,
                            welche Daten und Angebote herunterladen und gespeichert oder anderweitig aufgenommen haben,
                            sind verpflichtet, diese nach Abschluss des jeweiligen Stellenbesetzungsverfahrens zu
                            löschen, sofern keine gesetzliche Verpflichtung für eine längere Aufbewahrungsfrist
                            besteht.</p>
                        <p>(5) Privaten Arbeitsvermittlern und Zeitarbeitsunternehmen ist es ausdrücklich untersagt, das
                            Portal zum Aufbau eines eigenen Stellen- oder Bewerberpools zu nutzen. Dies beinhaltet
                            insbesondere das Verbot, Angebote zu dem Zweck der Poolbildung (vgl. § 9 Abs. 3 Ziffer 6) in
                            das Portal einzustellen. Ebenso ist es untersagt, ein Angebot, dem nur ein einziges
                            existierendes Angebot zu Grunde liegt in mehrfachen Varianten einzustellen (z.B. durch
                            Veränderung oder Umstellung des Textes, durch Angabe mehrerer Ansprechpartner, durch
                            Bezugnahme auf verschiedene Orte).</p>
                        <p>(6) Bezieht sich ein Angebot mit mehreren zu besetzenden Stellen auf unterschiedliche
                            Arbeitsorte, so müssen diese in mehreren Stellenangeboten angegeben werden. </p>
                       <h4>§ 8 Unzulässige Angebote und Inhalte - Arbeitnehmer</h4>
                        <p>Für ausbildung- und arbeitssuchende Kunden gelten §7 Abs. 1 und Abs. 3 Nr.1 analog für veröffentlichte Stellengesuche.</p>
                       <p>Hier geht es zum <a class="aa" href="impressum.php">Impressum</a> und zum <a class="aa" href="privacy.php">Datenschutz</a> </p>
                        <p>Quelle: <a class="aa" href="https://www.arbeitsagentur.de/datei/Nutzungsbedingungen_ba042566.pdf">Agentur
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

