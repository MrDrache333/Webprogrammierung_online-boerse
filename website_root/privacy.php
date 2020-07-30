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
                        <h3>Datenschutz und Verwendung von Cookies</h3>
                        <p>Diese Datenschutzerklärung informiert über Art, Umfang und Zweck der Verarbeitung
                            personenbezogener Daten durch die verantworltiche Anbieter KeFeDo GmbH, vertreten durch den
                            Vorstand, Ammerländer Heerstraße 114-118, 26129 Oldenburg, auf dieser Website.</p>


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

