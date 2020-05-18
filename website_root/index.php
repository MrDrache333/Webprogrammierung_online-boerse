<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/global.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

            <title>KEFEDO-Startseite</title>
  </head>
  <body>
    <?php include "header.html"; ?>
    <div class="header">
          <ul class="navi">
            <li class="navibutton"> <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div></li>  <!--active Anzeige nur als TEst wie umsteztbar???-->
          <li class="navibutton">   <a href="search_job.php" class="naviobjekt"> Job suchen </a></li>
            <li class="navibutton"> <a href="offer_job.php" class="naviobjekt"> Anzeige erstellen</a></li>
          <li class="navibutton">   <a href="contact.php" class="naviobjekt">Kontakt </a></li>
            <li class="navibutton"> <a href="impressum.php" class="naviobjekt"> Impressum</a></li></ul>
    </div>
      <div class = "grid-container-index">
            <div class="grid-item1">
              <a href="search_job.php"> <image src="images/auto.jpg" class="images" > </a></div>
                  <div class="grid-item2">
            <a href="search_job.php"> <image src="images/garten.jpg" class="images"> </a></div>
                <div class="grid-item3">
            <a href="search_job.php"> <image src="images/haus.jpg" class="images">  </a></div>
                <div class="grid-item4">
           <a href="search_job.php"> <image src="images/dienstleistungen.jpg" class="images"> </a></div>
               <div class="grid-item5">
            <a href="search_job.php">  <image src="images/technik.jpg"class="images" ></a></div>
                <div class="grid-item6">
           <a href="search_job.php"> <image src="images/fitness.jpg"class="images" > </a></div>
               <div class="grid-item7">
              <a href="search_job.php"> <image src="images/taxi.jpg" class="images"> </a></div>
</div>
  <?php include "footer.html"; ?>
  </body>
</html>
