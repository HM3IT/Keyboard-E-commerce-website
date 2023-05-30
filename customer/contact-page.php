<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "./components/base-link.php" ?>
    <link rel="stylesheet" href="css/contact-page.css">
    <link rel="stylesheet" href="css/newsletter.css">
</head>

<body>
    <?php

    define('COMPONENTS_PATH', './pages/');

    require COMPONENTS_PATH . 'navbar.php';
    ?>

    <section id="contact-section">
        <div class="contact-banner">
            <h2>#let's_talk</h2>
            <p>Leave a message, we love <i class="fa-regular fa-face-smile-beam"></i> to hear from you!</p>
        </div>

        <div class="contact-detail">
            <div class="contact-detail-left">
                <h4>Get In Touch</h4>
                <h2>Reach out one of our agency locations or contact us today</h2>
                <h3>Head Office</h3>
                <ul>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <p>No 24D Kamayut Township, Yangon, Myanmar</p>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <p>heinmin2maw.it@gmail.com</p>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone-volume"></i>
                        <p>+95 9 77943 5552</p>
                    </li>
                    <li>
                        <i class="fa-solid fa-clock"></i>
                        <p>Monday to Sunday 9:00 am to 5:00 pm</p>
                    </li>
                </ul>

            </div>
            <div class="contact-detail-right map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d491.3773926734785!2d96.13059370199883!3d16.82086430342922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c195a39e214e85%3A0xf09fa891b489553c!2sZTO%20Express%2C%20Kamayut!5e0!3m2!1sen!2smm!4v1683828738733!5m2!1sen!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <?php
    require COMPONENTS_PATH . 'newsletter.html';
    require COMPONENTS_PATH . 'footer.html';
    ?>
    <script src="scripts/navbar.js"> </script>
    <script src="scripts/footer.js"></script>
</body>

</html>