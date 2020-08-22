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
    <title>Portfolio</title>
</head>
<body>
    <!-- header -->
    <?php include 'header.php'?>
    <!-- section -->
    <section class="section-dashboard">
        <!-- asidebar -->
        <?php include 'aside.php'?>
        <!-- manage projet -->
        <div class="contenair">
            <!-----------php/alert---------------->
            <?php if(isset($_SESSION['message'])){ ;?>
                <p class='alert alert_<?= $_SESSION['msg_type'];?>'>
                    <b><?= $_SESSION['message'] ; ?></b></p>
                <?php } unset($_SESSION['message']) ; ?>
            <!-----------php---------------------->
            <div class="title">
                <p>Ajouter un nouveau projet</p>
                <hr>
                
            </div>
            <!-- add form -->
            <form class="form" action="" method='POST' enctype="multipart/form-data">
            
                <input type="hidden" name='id' value='<?= $id; ?>'> 
                <label for="title">Titre :</label>
                <input class="form_item" type="text" name="title" value='<?= $title; ?>'  id=" title" required> 
                <label for="url">Url :</label>
                <input class="form_item" type="url" name="url" value='<?= $url; ?>' id="url" required> 
                <select  class="form_item form_item--cat" name="cat" >
                    <option value="<?= $categorie; ?>">-- Categorie --</option>

                    <!--------php --------------------->
                    
                    <?php  
                    $db = new mysqli('localhost','root','','portfolio');
                    $db->query("SET NAMES utf8");
                    $db->query("SET CHARACTER SET utf8");
                    if($db->connect_error){
                        die("connection failed:".$db->connect_error);
                    }
                    
                    // get category from db
                    function categoryTree($id_parent= 0,$sub_mark =''){
                        global $db;
                        $query = $db->query("SELECT * FROM category  WHERE id_parent = $id_parent ORDER BY name DESC "  );
                        
                        if ($query->num_rows > 0){
                            while ($row = $query-> fetch_assoc()){
                                
                                echo '<option value="'.$row['id_c'].'">'.$sub_mark.$row['name'].'</option>';
                            
                                categoryTree($row['id_c'],$sub_mark.'---');
                            }
                        
                        }
                    }
                    echo categoryTree();
                    ?>
                    <!--------php --------------------->
                </select>
                <label for="image">Image :</label>
                <input type="hidden" name='oldimage' value='<?= $image; ?>'>
                <input class="form_item" type="file" name="image" id="image" accept="image/png, image/jpg">
                <img src="<?= $image; ?>" width='120' class='img-thumbnail'>
                <?php if($update == true){ ?>
                    <input class="form_item form_item--add" type="submit" name="update-projet" value="Modifier">
                    <?php }else { ?>
                        <input class="form_item form_item--add" type="submit" name="add-projet" value="Ajouter">
                    <?php } ?>
            </form>

            <!-- list of all -->
            <div class="title">
                <p>la liste des projets</p>
                <hr>
            </div>

            <table>
                <thead>
                    <tr>
                        <th >Titre</th>
                        <th >Categorie</th>
                        <th >Date</th>
                        <th  colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!--------php --------------------->
                    <?php
                   // get data from db
                        $sth=$db->query('SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c');
                        while ($row = $sth->fetch_assoc())
                    {
                        ?>
                    <tr>
                        <td><?= $row['titre']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><a href="projet.php?edit=<?= $row['id_p'] ;?>" >Edit</a></td>
                        <td><a href="projet.php?delete=<?= $row['id_p'] ;?>"  onclick="return confirm ('Do you want delete this projet?');" >Delete</a></td>
                    </tr>
                        <?php
                    }

                    //$db=null; // Termine le traitement de la requête
                    ?>
                    <!--------php --------------------->
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