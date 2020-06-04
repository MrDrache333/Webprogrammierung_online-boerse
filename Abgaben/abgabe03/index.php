<?php include "header.php"; ?>
<div class="header">
    <ul class="navi">

        <?php
        if (isset($_COOKIE["loggedin"]) and $_COOKIE["loggedin"] === "true") { ?>

            <li class="navibutton">
                <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
            </li>
            <li class="navibutton"><a href="profil.php" class="naviobjekt"> Mein Profil</a></li>
            <li class="navibutton"><a href="messages.php" class="naviobjekt">Meine Anzeigen </a></li>
        <?php } else {
            ?>
            <li class="navibutton">
                <div class="active"><a href="index.php" class="naviobjekt"> Startseite</a></div>
            </li>
            <li class="navibutton"><a href="index.php" class="naviobjekt"> Mein Profil</a></li>


        <?php }
        ?>


        <li class="navibutton"><a href="contact.php" class="naviobjekt">Kontakt </a></li>
        <li class="navibutton"><a href="impressum.php" class="naviobjekt"> Impressum</a></li>
    </ul>
</div>
<div class="content">
    <form class="searchBox" method="post" action="search_job.php">
        <div class="searchBox-grid">
            <p class="searchBox-text">Wonach suchen Sie ?</p>
            <label for="searchBox-what" hidden>Was? (z.B. Beruf oder Stichwort)</label>
            <input id="searchBox-what" class="searchBox-input searchBox-item" type="text"
                   placeholder="Was? (z.B. Beruf oder Stichwort)"/>
            <label for="searchBox-where" hidden>Wo? (z.B. PLZ oder Ort)</label>
            <input id="searchBox-where" class="searchBox-input searchBox-item" type="text"
                   placeholder="Wo? (z.B. PLZ oder Ort)"/>
        </div>
        <button href="search_job.php" class="searchBox-button searchBox-button-text searchBox-item"
                type="sumbit" name="searchjob-searchBox"><span
                    class="searchBox-button-gradient"></span>Suchen
        </button>
    </form>
</div>
<?php include "footer.html"; ?>
