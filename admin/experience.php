<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/css/import.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&display=swap" rel="stylesheet">
    <title>Experience</title>
</head>
<body>
    <!-- header -->
    <header>
        <div class="logo">
            <img class="logo_img" src="/dist/img/Assets/logo.png" alt="logo" />
        </div>
        <div class="navbar">
            <ul class="nav-dashboard">
                <il class="nav_item" >
                    <img src="/dist/img/Assets/user.png" alt="user">
                    <p>Username</p>
                </il>
            </ul>
        </div>
 
    </header>
    
    <section class="section-dashboard">
        <aside class="aside">
            <ul class="asidebar">
                <a class="asidebar_item" href="dashboard.php">Accueil</a>
                <a class="asidebar_icon" href="dashboard.php"><img src="/dist/img/Assets/home.png" alt="home"></a>
                <hr>
                <a class="asidebar_item" href="projet.php">Projet</a>
                <a class="asidebar_icon" href="projet.php"><img src="/dist/img/Assets/folder (1).png" alt="folder"></a>
                <hr>
                <a class="asidebar_item" href="experience.php">Experience</a>
                <a class="asidebar_icon" href="experience.php"><img src="/dist/img/Assets/university.png" alt="diploma"></a>
                <hr>
                <a class="asidebar_item asidebar_item--logout" href="/login.php">Logout</a>
                <a class="asidebar_icon " href="/login.php"><img src="/dist/img/Assets/logout.png" alt="logout"></a>
                
            </ul>

        </aside>
        <div class="contenair">
            <div class="title">
                <p>Ajouter une nouvelle Experience</p>
                <hr>
            </div>

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



<script src="../dist/js/script.js"></script>
    
</body>
</html>