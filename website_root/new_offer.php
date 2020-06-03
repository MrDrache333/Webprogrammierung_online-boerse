<!--Header einbinden-->
<?php include "header.php"; ?>
<div class="header">
    <nav>
        <ul class="navi">
            <li class="navibutton">
                <a href="index.php" class="naviobjekt"> Startseite</a>
            </li>
            <li class="navibutton">
                <a href="profil.php" class="naviobjekt"> Mein Profil</a>
            </li>
            <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>


            <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
            <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
        </ul>

    </nav>
</div>
<div class="grid-farbe">


    <div class="row">
        <div class="leftcolumn">
            <div class="card">
                <h1> Neue Anzeige</h1>

                <form method="POST" class="new_offer-form" id="new_offer-form">
                    <h2>Mein Produktbild</h2>

                    <img src="images/company_placeholder.png" alt="Produktbild-Template" id="pb_image">

                    <div class="form-submit">

                        <input type="submit" value="Hochladen" class="button_offer" name="submit_pb" id="submit_pb"/>
                    </div>
                </form>

                <form method="POST" class="new_offer-form" id="new_offer-form"></form>
            </div>
        </div>

        <div class="rightcolumn">
            <div class="card">
                <h2>Meine Informationen</h2>
                <form method="POST" class="new_offer-form" id="new_offer-form">
                    <label for="titel">Titel :</label>
                    <input type="text" name="titel" id="titel" placeholder="Verkäufer/in" required/>

                    <label for="subtitetl">Untertitel :</label>
                    <input type="text" name="subtitel" id="subtitel" placeholder="Einzelhandel" required/>

                    <label for="position">Standort:</label>
                    <input type="text" name="ort" id="ort" placeholder="Ort PLZ"/>
                    <input type="text" name="straße" id="straße" placeholder="Straße Hsnr."/>

                    <label for="free">Frei ab :</label>
                    <input type="text" name="free" id="free" placeholder="15.01.2021"/>

                    <label for="street">Beschreibung :<br></label>
                    <textarea name="beschreibung" id="beschreibung" cols="50" rows="7"
                              placeholder="Was über den Beruf zu sagen ist."></textarea>


                    <div class="form-submit">
                        <input type="submit" value="Anzeige veröffentlichen" class="button_offer" name="reset_pb"
                               id="reset_pb"/>
                        <input type="reset" value="Zurücksetzen" class="button_offer" name="submit_pb" id="submit_pb"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "footer.html"; ?>

