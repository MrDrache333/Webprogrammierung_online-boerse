<?php include "header.php"; ?>
<div class="header">
    <ul class="navi">
        <li class="navibutton">
            <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
        </li>  <!--active Anzeige nur als TEst wie umsteztbar???-->

        <li class="navibutton"><a href="profil.php" class="naviobjekt"> Mein Profil</a></li>
        <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
        <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
    </ul>
</div>
<div class="content">
    <form class="searchBox">
        <div class="searchBox-grid">
            <p class="searchBox-text">Wonach suchen Sie ?</p>
            <label for="searchBox-what" hidden>Was? (z.B. Beruf oder Stichwort)</label>
            <input id="searchBox-what" class="searchBox-input searchBox-item" type="text"
                   placeholder="Was? (z.B. Beruf oder Stichwort)"/>
            <label for="searchBox-where" hidden>Wo? (z.B. PLZ oder Ort)</label>
            <input id="searchBox-where" class="searchBox-input searchBox-item" type="text"
                   placeholder="Wo? (z.B. PLZ oder Ort)"/>
        </div>
        <a href="search_job.php" class="searchBox-button searchBox-button-text searchBox-item"><span
                    class="searchBox-button-gradient"></span>Suchen</a>
    </form>
</div>
<?php include "footer.html"; ?>

