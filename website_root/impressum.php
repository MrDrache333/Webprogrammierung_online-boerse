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
            <div class="active"><a href="impressum.php" class="naviobjekt">Impressum</a></div>
        </li>
    </ul>
</div>
<div class="grid-farbe">
    <div class="content impressum">
        <div class="impressumContent">
            <h1>Impressum</h1>
            <div class="impressumContainer">
                <div class="contact-row">
                    <div class="contact-col">
                        <h2 class="contact-h2">Datenschutzbestimmungen</h2>
                        <p> At vero eos et accusam et justo duo dolores et ea rebum.
                            Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore magna aliquyam erat,
                            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                            gubergren,
                            no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                    <div class="contact-col">
                        <h2 class="contact-h2">Cookie Policy for KeFeDo</h2>
                        <p>This is the Cookie Policy for KeFeDo</p>
                        <p><strong>What Are Cookies</strong></p>
                        <p>As is common practice with almost all professional websites this site uses cookies, which are
                            tiny
                            files that are downloaded to your computer, to improve your experience. This page describes
                            what
                            information they gather, how we use it and why we sometimes need to store these cookies. We
                            will
                            also share how you can prevent these cookies from being stored however this may downgrade or
                            'break'
                            certain elements of the sites functionality.</p>
                        <p>For more general information on cookies, please read <a
                                    href="https://www.cookieconsent.com/what-are-cookies/">"What Are Cookies"</a>.</p>
                        <p><strong>How We Use Cookies</strong></p>
                        <p>We use cookies for a variety of reasons detailed below. Unfortunately in most cases there are
                            no
                            industry standard options for disabling cookies without completely disabling the
                            functionality and
                            features they add to this site. It is recommended that you leave on all cookies if you are
                            not sure
                            whether you need them or not in case they are used to provide a service that you use.</p>
                        <p><strong>Disabling Cookies</strong></p>
                        <p>You can prevent the setting of cookies by adjusting the settings on your browser (see your
                            browser
                            Help for how to do this). Be aware that disabling cookies will affect the functionality of
                            this and
                            many other websites that you visit. Disabling cookies will usually result in also disabling
                            certain
                            functionality and features of the this site. Therefore it is recommended that you do not
                            disable
                            cookies.</p>
                        <p><strong>The Cookies We Set</strong></p>
                        <ul>
                            <li>
                                <p>Login related cookies</p>
                                <p>We use cookies when you are logged in so that we can remember this fact. This
                                    prevents you
                                    from having to log in every single time you visit a new page. These cookies are
                                    typically
                                    removed or cleared when you log out to ensure that you can only access restricted
                                    features
                                    and areas when logged in.</p>
                            </li>
                        </ul>
                        <p><strong>Third Party Cookies</strong></p>
                        <p>In some special cases we also use cookies provided by trusted third parties. The following
                            section
                            details which third party cookies you might encounter through this site.</p>
                        <ul>
                            <li>
                                <p>From time to time we test new features and make subtle changes to the way that the
                                    site is
                                    delivered. When we are still testing new features these cookies may be used to
                                    ensure that
                                    you receive a consistent experience whilst on the site whilst ensuring we understand
                                    which
                                    optimisations our users appreciate the most.</p>
                            </li>
                        </ul>
                        <p><strong>More Information</strong></p>
                        <p>Hopefully that has clarified things for you and as was previously mentioned if there is
                            something
                            that you aren't sure whether you need or not it's usually safer to leave cookies enabled in
                            case it
                            does interact with one of the features you use on our site.
                        </p>
                    </div>
                    <div class="contact-col">
                        <h2 class="contact-h2">Nutzungsbedingungen</h2>
                        <p>At vero eos et accusam et justo duo dolores et ea rebum.
                            Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore magna aliquyam erat,
                            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                            gubergren,
                            no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="contact-col">
                        <h2 class="contact-h2">Impressum</h2>
                        <p>At vero eos et accusam et justo duo dolores et ea rebum.
                            Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore magna aliquyam erat,
                            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                            gubergren,
                            no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "footer.php"; ?>

