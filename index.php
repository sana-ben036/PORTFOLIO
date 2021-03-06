<?php require 'action.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="dist/img/Assets/logo.png"/>
    <!-- CSS -->
    <link rel="stylesheet" href="dist/css/import.css">
    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&display=swap" rel="stylesheet">

    <title>Portfolio</title>
</head>
<body>

    <!-- header -->
    <header >
        <div class="logo">
            <img src="dist/img/Assets/logo.png" alt="logo" />
        </div>
        <!-- desktop nav -->
        <div class="navbar">
            <ul class="nav">
                <a class="nav nav_item" href="#section-home">accueil</a>
                <a class="nav nav_item" href="#section-portfolio">portfolio</a>
                <a class="nav nav_item" href="#section-about">à propos</a>
                <a class="nav nav_item" href="#section-contact">contact</a>
                <a class="nav nav_item" href="login.php">login</a>
            </ul>
            <!-- humbrgr menu -->
            <div class="icon">
                <button class="click" id="btn-menu"><img src="dist/img/Assets/menu.png" alt="menu"></button>    
            </div>
        </div>  
    </header>

    <!-- mobile nav -->
    <div class="menu" id="menu">
        
        <ul class="nav" id="nav">
            <a class="nav nav_item" href="#section-home">accueil</a>
            <a class="nav nav_item" href="#section-portfolio">portfolio</a>
            <a class="nav nav_item" href="#section-about">à propos</a>
            <a class="nav nav_item" href="#section-contact">contact</a>
            <a class="nav nav_item" href="login.php">login</a>
        </ul>
    </div>

    <!-- section-home -->
    <section style="background-image: url(dist/img/Assets/bg.jpg);opacity:50%" class="section-home"  id="section-home" >
        
    </section> 
    <section class="section-presentation">
        <div class="name">
            <h1 >Bonjour, </h1>
            <h1>je suis Sana Bengannoune</h1>
        </div>
        <div class="profil">
            <h3>Ici, vous découvrirez mon parcours</h3>
        </div>

    </section>
        

    <!-- section-portfolio -->
    <section class="section-portfolio"  id="section-portfolio" >
        <div class="title">
            <p><strong>Portfolio</strong> Professionnel</p>
        </div><br>

        <div class="sub-nav">
            <ul class="nav">
                <a id='menu-all' class=" nav nav_item" href="#section-portfolio">All</a>
                <a id='menu-design' class=" nav nav_item" href="#section-portfolio">Design</a>
                <a id='menu-application'class=" nav nav_item" href="#section-portfolio">Application</a>
                <a id='menu-site' class=" nav nav_item" href="#section-portfolio">Site Web</a>
            </ul>
        </div><br>

        <!-- list projet -->
        <?php include 'contenair.php'  ;?>

    </section> 

    <!-- section-about -->
    <section class="section-about" id="section-about" >
        <div class="title">
            <p><strong>À propos</strong> de moi</p>
        </div><br>

        <div class="contenair">
            <!-- list -->
            <div class="list">
                <div class="list_title">
                    <p>Education</p>
                </div>
                <!-- list_item -->
    <!--------php --------------------->
    <?php 
        // get data from db
        $sth= $db->query('SELECT * FROM experience INNER JOIN category ON experience.categorie = category.id_c WHERE name = "Diploma"' );
        while ($row = $sth->fetch())
        {
            ?>
                <div class="list_item">
                    <p class="date"><?= $row['periode'] ?></p>
                    <p class="profil"><?= $row['profil'] ?></p>
                    <p class="detail"><?= $row['description'] ?></p>
                    <p class="lieu"><?= $row['lieu'] ?></p>
                </div>
                <?php 
        }  
    ?> 
    <!--------php --------------------->
            </div>

            <!-- list -->
            <div class="list">
                <div class="list_title">
                    <p>Experience</p>
                </div>
                <!-- list_item -->
    <!--------php --------------------->
    <?php 
        // get data from db
        $sth= $db->query('SELECT * FROM experience INNER JOIN category ON experience.categorie = category.id_c WHERE name = "Job"' );
        while ($row = $sth->fetch())
        {
            ?>
                <div class="list_item">
                    <p class="date"><?= $row['periode'] ?></p>
                    <p class="profil"><?= $row['profil'] ?></p>
                    <p class="detail"><?= $row['description'] ?></p>
                    <p class="lieu"><?= $row['lieu'] ?></p>
                </div>
                <?php 
        }  
    ?> 
    <!--------php --------------------->
            </div>
        </div>
            
    </div>
    
    </section>
    <!-- section-skills -->
    <section class="section-skills" >
        <!-----------php---------------------->
        <?php
                $sth= $db->query("SELECT * FROM admin ");
                while ($row = $sth->fetch())
                    {
                ?>
        <div class="left">
            <div class="photo grayscale ">
                <img src="admin/<?= $row['photo']  ;?>" alt="photo">
            </div>
        </div>

        <div class="right">
            <div class="title">
                <p><strong>Soft</strong> Skills</p>
            </div><br>
            <div class="text">
                <p><?= $row['skills'] ;?></p>
            </div>
            <div class="btn">
                <a href="admin/<?= $row['cv'] ;?>" download><button class="btn_element">Télécharger CV</button></a>
            </div>

                    <?php
                    }
            ?>
        </div>
    </section>
    

    <!-- section-services -->
    <section class="section-services">

        <div class="title">
            <p><strong>Services</strong> à offrir</p>
        </div><br>

        <div class="contenair">

            <div class="service rounded">
                <div class="service_item">
                    <img src="dist/img/Assets/web.png" alt="">
                </div>
                <div class="service_item service_item--title">
                    <p>Web Design</p>
                </div>
                <div class="service_item service_item--text">
                    <p>Maquettage d’une application ou d’un site web </p>
                    <span>***</span>
                    <p>Balsamiq et Adobe XD</p>
                </div>

            </div>
            <div class="service rounded ">
                <div class="service_item">
                    <img src="dist/img/Assets/frontend.png" alt="">
                </div>
                <div class="service_item service_item--title">
                    <p>Front-End</p>
                </div>
                <div class="service_item service_item--text">
                    <p>Réalisation des interfaces utilisateur web statique ou dynamique </p>  
                    <span>***</span>
                    <p>HTML, CSS et JS</p>
                </div>

            </div>
            <div class="service rounded ">
                <div class="service_item">
                    <img src="dist/img/Assets/backend.png" alt="">
                </div>
                <div class="service_item service_item--title">
                    <p>Back-End</p>
                </div>
                <div class="service_item service_item--text">
                    <p>Développement de la partie back-end des projets web </p>
                    <span>***</span>
                    <p>PHP et SQL</p>
                </div>

            </div>
        </div>

    </section>

    <!-- section-contact -->
    <section class="section-contact" id="section-contact">
        <div class="title">
            <p><strong>Contactez</strong> moi</p>

        </div><br>

        <div class="contenair">
            
            <form class="form" action="" method="POST">
                <!-----------php/alert---------------->
            <?php if(isset($_SESSION['message'])){ ;?>
                <p class='alert alert_<?= $_SESSION['msg_type'];?>'>
                    <b><?= $_SESSION['message'] ; ?></b></p>
                <?php } unset($_SESSION['message']) ; ?>
                
                <!-----------php---------------------->
                <input class="form_item" type="text" name="name" placeholder="Votre Nom" required>
                <input class="form_item" type="email" name="email" placeholder="Votre Email" required>
                <input class="form_item" type="tel" name="phone" placeholder="Votre Téléphone" required>
                <textarea class="form_item form_item--message"  name="message"  placeholder="Ecrire un message" minlength='100'></textarea>
                <input class=" form_item--submit" type="submit" name="envoyer" value="Envoyer">
            </form>

            <div class="info">
                <div class="info_title">
                    <p>information de contact</p>
                </div>

        <!--------php --------------------->
        <?php 
        // get data from db
        $sth= $db->query('SELECT * FROM admin ' );
        while ($row = $sth->fetch())
        {
            ?>
                <div class="info_item">
                    <span>email</span>
                    <p><?= $row['email'] ?></p> 
                </div>
                <div class="info_item">
                    <span>phone</span>
                    <p><?= $row['phone'] ?></p> 
                </div>
                <div class="info_item">
                    <span>adresse</span>
                    <p><?= $row['ville'] ?><br>
                        <?= $row['adresse'] ?>  
                    </p> 
                </div>
            <?php
        }
        ?>

            </div>
        </div>

    </section>
    <footer>
        <p>Copyright © 2020 All rights reserved </p>
    </footer>



<!-- JS -->



<script src="dist/js/menu.js"></script>
<script src="dist/js/contenair.js"></script>

</body>
</html>