<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!--Header einbinden-->
    <?php include "header.html"; ?>

    <!--Searchbox-->
    <form>
      <div>
        <div>
          <input type="text" placeholder="z.B. Programmierer"></input>
        </div>
        <div>
          <select>
            <option disabled selected value="">Kategorie</option>
            <option value="">Vollzeit</option>
            <option value="">Teilzeit</option>
            <option value="">Freiberufler</option>
            <option value="">Praktikum</option>
            <option value="">Befristet</option>
          </select>
        </div>
        <div>
          <input type="submit" value="Suchen">
        </div>
      </div>
    </form>
    <?php include "footer.html"; ?>
  </body>
</html>
