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
    <title>Login</title>
</head>
<body>

        <!-- header -->
    <header>
        <div class="logo">
            <img class="logo_img" src="dist/img/Assets/logo.png" alt="logo" />
        </div>
        <div class="navbar">
            <ul class="nav-login" >
                <a class="home"  href="/portfolio"><img src="dist/img/Assets/home1.png" alt=""></a>
            </ul>
            
        </div> 
    </header>

    <section class="section-login">
        <div class="contenair">
            <div class="title">
                <p>Espace Administrateur</p>
            </div>
            <form class="form" action="" method="POST">
                <div class="form_item">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" required>  
                </div>
                <div class="form_item">
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" required> 
                </div>
                <div class="form_item form_item--valid">
                    <input type="submit" name="valid" value="valider">
                </div>
                <!-----------php/alert---------------->
                <?php if(isset($_SESSION['message'])){ ;?>
                <p class='alert alert_<?= $_SESSION['msg_type'];?>'>
                    <b><?= $_SESSION['message'] ; ?></b></p>
                <?php } unset($_SESSION['message']) ; ?>
                
                <!-----------php---------------------->
                
                

            </form>
            



        </div>
        
            
            




        



    </section>


















    <footer>
        <p>Copyright © 2020 All rights reserved </p>
    </footer>


<!-- JS -->
<script src="dist/js/script.js"></script>

</body>
</html>