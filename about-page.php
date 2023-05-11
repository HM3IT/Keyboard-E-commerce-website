<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/about-us.css">

    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/social-icon.css" />
</head>

<body>
    <?php

    define('COMPONENTS_PATH', './pages/');

    require COMPONENTS_PATH . 'navbar.html';

    ?>


    <section class="parallax-wrapper">


        <img src="images/About-us/sky.png" alt="sky" class="parallax-bg-sky">
        <img src="images/About-us/cloud-left1.png" alt="cloud left 1" class="parallax-bg-cloud-left1">
        <img src="images/About-us/cloud-left2.png" alt="cloud left 2" class="parallax-bg-cloud-left2">
        <img src="images/About-us/cloud-left3.png" alt="cloud left 2" class="parallax-bg-cloud-left3">
        <img src="images/About-us/cloud-left4.png" alt="cloud left 2" class="parallax-bg-cloud-left4">
        <img src="images/About-us/cloud-top.png" alt="cloud top" class="parallax-bg-cloud-top">
        <h2 id="title">Hello World</h2>
        <img src="images/About-us/cloud-right1.png" alt="cloud right 1" class="parallax-bg-cloud-right1">
        <img src="images/About-us/cloud-right2.png" alt="cloud right 2" class="parallax-bg-cloud-right2">
        <img src="images/About-us/mountain-left1.png" alt="mountain left 1" class="parallax-bg-mountain-left1">
        <img src="images/About-us/mountain-left2.png" alt="mountain left 2" class="parallax-bg-mountain-left2">
        <img src="images/About-us/mountain-both-side.png" alt="mountain both side" class="parallax-bg-mountain-both-side">
        <img src="images/About-us/sun.png" alt="sun" class="parallax-bg-sun">
        <img src="images/About-us/meadow.png" alt="girl" class="parallax-bg-meadow">
        <img src="images/About-us/girl.png" alt="girl" class="parallax-bg-girl">
        <img src="images/About-us/mountain-right1.png" alt="mountain right1" class="parallax-bg-mountain-right1">


    </section>
    <section class="content-section">
        <div class="hidden">
            <h2>About us</h2>
            <p class="background-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. At perferendis accusantium, eum minus ullam suscipit facilis quaerat totam magnam deserunt officia sed fuga numquam. Velit dolor dicta voluptatum nam saepe assumenda illum repudiandae minima provident tenetur accusantium aliquid nisi beatae eaque deserunt placeat, vitae natus officia deleniti? Provident harum sunt quae odio, omnis reprehenderit temporibus quasi. Harum soluta deserunt magni incidunt reprehenderit non tenetur corrupti dignissimos quisquam excepturi. Error cupiditate totam recusandae illum! Nesciunt enim, consectetur veniam, delectue?</p>
        </div>
        <div class="hidden">
            <h2>Vision & Mission</h2>
            <p class="background-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. At perferendis accusantium, eum minus ullam suscipit facilis quaerat totam magnam deserunt officia sed fuga numquam. Velit dolor dicta voluptatum nam saepe assumenda illum repudiandae minima provident ten</p>
        </div>
    </section>
    <section id="our-team-section">
        <h2>Meet Our Team</h2>
        <div class="team-member-card-container">

            <div class="team-member hidden">
                <div class="team-member-card">
                    <div class="team-member-card-img admin"></div>
                    <h2 class="name">Hein Min Min Maw </h2>
                    <h3 class="role">(Admin)</h3>
                </div>
            </div>
            <div class="team-member hidden">
                <div class="team-member-card">
                    <div class="team-member-card-img customer-service"></div>
                    <h2 class="name">Kaung Set Hein </h2>
                    <h3 class="role">(Customer Service)</h3>
                </div>
            </div>
            <div class="team-member hidden">
                <div class="team-member-card">
                    <div class="team-member-card-img finance"></div>
                    <h2 class="name">Kyal Sin Hein</h2>
                    <h3 class="role">(Finance)</h3>
                </div>
            </div>
            <div class="team-member hidden">
                <div class="team-member-card">
                    <div class="team-member-card-img business-develop"></div>
                    <h2 class="name">Sai Lon Aung</h2>
                    <h3 class="role">(Business Development)</h3>
                </div>
            </div>
        </div>
    </section>

    <?php
    require COMPONENTS_PATH . 'footer.html';
    ?>
    <script src="scripts/navbar.js"> </script>
    <script src="scripts/about-us-parallax.js"> </script>
    <script src="scripts/footer.js"></script>
</body>

</html>