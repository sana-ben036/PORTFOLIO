
<?php require '../action.php' ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../dist/css/import.css">
    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&display=swap" rel="stylesheet">
    
    <title>Accueil</title>
</head>
<body>
    <!-- header -->
    <?php include 'header.php'?>
    <!-- section -->
    <section class="section-dashboard">
        <!-- asidebar -->
        <?php include 'aside.php'?>

        <div class="contenair">
            <div class="contenair">
            <!-----------php/alert---------------->
            <?php if(isset($_SESSION['message'])){ ;?>
                <p class='alert alert_<?= $_SESSION['msg_type'];?>'>
                    <b><?= $_SESSION['message'] ; ?></b></p>
                <?php } unset($_SESSION['message']) ; ?>
            <!-----------php---------------------->
            <div class="title">
                <p><strong>Bienvenu sur Dashboard</strong> </p>
            </div>

            <!-- table info -->
            <table >
                <!-----------php---------------------->
                <?php
                $sth= $db->query("SELECT * FROM admin ");
                while ($row = $sth->fetch())
                    {
                ?>
                    <tr>
                        <td>Photo</td>
                        <td class='data' ><img src="<?=$row['photo']; ?>" width="100"></td>
                    </tr>
                    <tr>
                        <td >Name</td>    
                        <td class='data' id='data'><?=$row['name']; ?> </td>  
                    </tr>
                    <tr>
                        <td >Profil</td> 
                        <td class='data'><?=$row['profil']; ?></td>   
                    </tr>
                    <tr>
                        <td >Email</td>
                        <td class='data'><?=$row['email']; ?></td> 
                    </tr>
                    <tr>
                        <td >Phone</td>
                        <td class='data'><?=$row['phone']; ?></td> 
                    </tr>
                    <tr>
                        <td >Ville</td>
                        <td class='data'><?=$row['ville']; ?></td> 
                    </tr>
                    <tr>
                        <td >Adresse</td>
                        <td class='data'><?=$row['adresse']; ?></td> 
                    </tr>
                    <tr>
                        <td >Skills</td>
                        <td class='data'><?=$row['skills']; ?></td> 
                    </tr>
                    <tr>
                        <td >Mot de passe</td>
                        <td class='data'><?=$row['password']; ?></td> 
                    </tr>

                
                <?php
                    }
                ?>
                <tr>
                    <td >&nbsp;</td> 
                    <td id='edit'><a href="personel.php?" >Si vous voulez changer une information, click sur Edit!</a></td>
                    </tr>
            </table>


            <!-- info form 
            <form style='display:none;margin: 10px auto' id='info-form' class="form" action="" method='POST' enctype="multipart/form-data">
        
        
                <label for="name">Name :</label>
                <input class="form_item" type="text" name="name" value='<?= $row['name']; ?>'  id="name"> 
                <label for="profil">Profil :</label>
                <input class="form_item" type="text" name="profil" value='<?= $profil; ?>' id="profil"> 
                <label for="email">Email :</label>
                <input class="form_item" type="email" name="email" value='<?= $email; ?>' id="email"> 
                <label for="phone">Phone :</label>
                <input class="form_item" type="phone" name="phone" value='<?= $phone; ?>' id="phone"> 
                <label for="ville">Ville :</label>
                <input class="form_item" type="text" name="ville" value='<?= $ville; ?>' id="ville"> 
                <label for="adresse">Adresse :</label>
                <input class="form_item" type="text" name="adresse" value='<?= $adresse; ?>' id="adress"> 
                <label for="password">Mot de passe :</label>
                <input class="form_item" type="password" name="password" value='<?= $password; ?>' id="password"> 
                <label for="skills">Skills :</label>
                <textarea class="form_item form_item--text" type="text" name="skills"  id="skills"><?= $skilss; ?></textarea> 
                <label for="image">Photo :</label>
                <input type="hidden" name='oldimage' value='<?= $photo; ?>'>
                <input class="form_item" type="file" name="image" id="image" accept="image/png, image/jpg" >
                <img src="<?= $image; ?>" width='100' class='img-thumbnail'>
                
                
                <input class="form_item form_item--add" type="submit" name="add-info" value="Enregister">

                
                    
            </form> -->

            
            
        </div>  

    </section>



















    <footer>
        <p>Copyright © 2020 All rights reserved </p>
    </footer>


<!-- JS -->
<script src="personel.js"></script>
    
</body>
</html>