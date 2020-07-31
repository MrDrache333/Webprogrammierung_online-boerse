# Webprogrammierung_GruppeFR-C
Teilnehmende: Fenja Bauer, Dominik Lübben, Keno Oelrichs Garcia

## Vorraussetzungen, um unsere Seite in Betrieb nehmen zu können

 - Ein Admin wurde für die Seite nicht vorgesehen, aber ein Testaccount ist über demo@demo.de Passwort: demo einsehbar.
 - Facebook bzw Twitter verlinkung nicht auf localhost da die von Facebook gesperrt ist.
    Die Verlinkung ist auf ein NAS von uns und die ID der Anzeige wird mitübertragen.
    Die Datenbank dort hat aber nur die Einträge die von uns vordefiniert sind.
    Das heisst bei neu erstellten Anzeigen werden diese auf dem NAS nicht gefunden.

## Funktionalitäten und Sitemap

1. Startseite
- Mit Hilfe von NaviButtons Möglichkeit zu den anderen Seiten zu gelangen
- Footer
- Suche
2. Jobanzeigen erstellen
- Titel
- Addresse
- Beschriebung
- Bild
3. Account erstellen
- Name
- Email
- Bild
4. Einloggen
- Bei erfolgreichem Login weiterleitung auf die Profilseite, bei fehlgeschlagenen Login Fehlermeldung
- Meine Anzeigen
5. Suche nach Jobs
- Filter
- Intelligente Suche
6. Kontakt Seite
- Kontakt per Mail
7. Meine Anzeigen (nur bei eingeloggtem Zustand einsehbar)
- listet alle eigenen Anzeigen auf
- löschen und bearbeiten
8. Detail Ansicht Job
- Teilen der Anzeige auf Facebook,Telegram,Twitter
- Adresse per Map
- Infos vom Job

## Nicht umgesetzte Teilaufgaben

## Fehler oder Mängel
- 133 new_offer_loader.php weiterleitung durch Javascript. Dies ist nicht sinnvoll da Nutzer,
        die Javascript aus haben nicht weitergeleitet werden.
- nicht überall sind Cookies durch Sessions ersetzt worden.

##  Besonderheiten
### Darkmode
- Ist das Farbschema im Betriebssystem auf dunkel gestellt, passt sich unsere Webseite der Einstellung dynamisch an.
