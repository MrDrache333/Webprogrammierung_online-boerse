<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/global.css">

    <title>KEFEDO-Anzeige-erstellen</title>
  </head>
  <body>
<div>
  <?php include "header.html"; ?>
  <div class="header">
      <nav>
        <ul class="navi">
          <li class="navibutton"> <a href="index.php" class="naviobjekt"> Startseite</a></li>  <!--active Anzeige nur als TEst wie umsteztbar???-->
        <li class="navibutton">   <a href="search_job.php" class="naviobjekt"> Job suchen </a></li>
          <li class="navibutton"> <div class="active"> <a href="offer_job.php" class="naviobjekt"> Anzeige erstellen</a></li>
        <li class="navibutton">   <a href="contact.php" class="naviobjekt">Kontakt </a></li>
          <li class="navibutton"> <a href="impressum.php" class="naviobjekt"> Impressum</a></li></ul>
        </div>
      </nav>
      <div>
      Anzeigen Name:  <input type="text" placeholder=""></input>
      </div>
      <div>
      Beschreibung:  <input type="text" placeholder=""></input>
      </div>
    <div>
      Hier Bild einfügen <a href="offer_job.php"> <input type="button" value="Bild hochladen"  ></input>
    </div>
      <div>
        <input type="submit" value="Anzeige freischalten"></input>
      </div>
      <div>
        <input type="reset" value="Zurücksetzen"></input>
      </div>
      <?php include "footer.html"; ?>
    </div>

  </body>
</html>
