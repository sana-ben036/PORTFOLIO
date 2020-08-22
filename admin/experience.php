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
    <title>Experience</title>
</head>
<body>
    <!-- header -->
    <?php include 'header.php'?>
    <!-- section -->
    <section class="section-dashboard">
        <!-- asidebar -->
        <?php include 'aside.php'?>
        <!-- manage experience -->
        <div class="contenair">
            <div class="title">
                <p>Ajouter une nouvelle Experience</p>
                <hr>
            </div>
            <!-- add form -->
            <form class="form" action="" method="POST">

                <input class="form_item" type="text" name="title"  placeholder="Periode" required> 
                <input class="form_item" type="text" name="profil"  placeholder="Profil" required> 
                <input class="form_item" type="text" name="etablissement"  placeholder="Etablissement" required> 
                <textarea class="form_item form_item--text" type="text" name="text" placeholder="Description"></textarea> 
                <select class="form_item form_item--cat" name="cat" id="cat">
                    <option value=" ">-- categorie --</option>
                </select>
                
                <input class="form_item form_item--add" type="submit" name="add" value="Ajouter">
            </form>


            <!-- list of all  -->
            <div class="title">
                <p>la liste des experiences</p>
                <hr>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th >Profil</th>
                        <th >Periode</th>
                        <th >Categorie</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>profil</td>
                        <td>periode</td>
                        <td>categorie</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </tbody>
            </table>

        </div>

    </section>


            
 
    

    <footer>
        <p>Copyright © 2020 All rights reserved </p>
    </footer>


<!-- JS -->
<script src="../dist/js/script.js"></script>
    
</body>
</html>