<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/global.css">
<title>KEFEDO-Kontakt</title>

  </head>
  <body>
    <!--icludes header -->
    <?php include "header.html"; ?>
    <div class="header">
        <nav>
          <ul class="navi">
            <li class="navibutton"> <a href="index.php" class="naviobjekt"> Startseite</a></li>  <!--active Anzeige nur als TEst wie umsteztbar???-->
          <li class="navibutton">   <a href="search_job.php" class="naviobjekt"> Job suchen </a></li>
            <li class="navibutton"> <a href="offer_job.php" class="naviobjekt"> Anzeige erstellen</a></li>
          <li class="navibutton">  <div class="active"> <a href="contact.php" class="naviobjekt">Kontakt </a></div></li>
            <li class="navibutton"> <a href="impressum.php"  class="naviobjekt"> Impressum</a></li></ul>
          </div>

    <!--Kontaktformular-->
    <section>
      <div>
        <h2>Kontakt</h2>
        <p><span>Adresse:</span>Ammerländer Heerstraße 114-118, 26129 Oldenburg</p>
        <p><span>Telefon:</span><a href="tel://1234567920"> +012-3456789</a></p>
        <p><span>Email:</span><a href="mailto:info@kefedo.de">info@kefedo.de</a></p>
        <p><span>Website</span><a href="#">kefedo.de</a></p>
        <form action="#" >
          <input type="text" placeholder="Dein Name">
          <input type="email" placeholder="Deine E-Mail">
          <input type="text" placeholder="Betreff">
          <textarea name="Was möchtest du uns noch sagen" id="massagefield" cols="30" rows="7" placeholder="Nachricht"></textarea>
          <input type="submit" value="Send Message" >
        </form>
      </div>
    </section>
    <!--icludes footer -->
    <?php include "footer.html"; ?>
  </body>
</html>
