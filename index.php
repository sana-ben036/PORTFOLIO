<?php require 'action.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <section class="section-home"  id="section-home" >
        <div class="name">
            <h1>Bonjour, </h1>
            <h1>je suis Sana Bengannoune</h1>
        </div>
        <div class="profil">
            <h3>Developpeuse WEB</h3>
        </div>

    </section> 

    <!-- section-portfolio -->
    <section class="section-portfolio"  id="section-portfolio" >
        <div class="title">
            <p><strong>Portfolio</strong> Professionel</p>
        </div><br><br>

        <div class="sub-nav">
            <ul class="nav">
                <a class=" nav nav_item" href="#section-all">All</a>
                <a class=" nav nav_item" href="#section-design">Design</a>
                <a class=" nav nav_item" href="#section-application">Application</a>
                <a class=" nav nav_item" href="#section-site">Site Web</a>
            </ul>
        </div><br>

        <div class="contenair" >

            <!-- item-projet -->

        <!--------php --------------------->
        <?php 
        // get data from db

        $sth= $db->prepare("SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c ORDER BY date DESC");
        //$sth->bindParam(':ca',$ca);
        $sth->execute();
        while ($row = $sth->fetch())
        {
            ?>
            <div class="projet">
                <div class="projet_img">
                    <a href="<?= $row['url'];?>">
                        <img src="admin/<?= $row['image'];?>" alt="">
                    </a>
                </div>
                <div class="projet_title">
                    <a href="<?= $row['url'];?>">
                        <p><?= $row['titre'];?></p>
                    </a>
                </div>
                <div class="projet_type">
                    <p><?= $row['name'];?></p>
                </div>
            </div> 
            <?php 
        }  
        ?> 
    <!--------php --------------------->
        </div>

    </section> 

    <!-- section-about -->
    <section class="section-about"  id="section-about">
        <div class="title">
            <p><strong>À propos</strong> De Moi</p>
        </div>

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
        <div class="left">
            <div class="photo">
                <img src="dist/img/Assets/pexels-anna-shvets-4482891.jpg" alt="photo">
            </div>
        </div>

        <div class="right">
            <div class="title">
                <p><strong>Soft</strong> Skills</p>
            </div>
            <div class="text">
                <p>Je suis une personne responsable, disciplinée et 
                    sociable.
                    Grace à mes expériences, j'ai acquis l'esprit de travail
                    collaboratif, de partage et d'écoute.  
                    Actuellement je suis capable d'étre un membre positif au sein d'une 
                    équipe afin de réaliser des objectifs.
                    </p>

            </div>
            <div class="btn">
                <a href="dist/img/Pdf/cv sanae.pdf" download><button class="btn_element btn_element--cv">Télécharger CV</button></a>
            </div>
        </div>
    </section>

    <!-- section-contact -->
    <section class="section-contact" id="section-contact">
        <div class="title">
            <p><strong>Contacter</strong> Moi</p>

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
<script src="dist/js/script.js"></script>

</body>
</html>