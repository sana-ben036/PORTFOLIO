<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/css/import.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    
    <title>Dashboard</title>
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
                <p><strong>Bienvenu sur Dashboard</strong> </p>
            </div>

            <main class="main">
                <div class="clockbox">
                    <svg id="clock" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
                        <g id="face">
                            <circle class="circle" cx="300" cy="300" r="253.9" />
                            <path class="hour-marks"
                                d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6" />
                            <circle class="mid-circle" cx="300" cy="300" r="16.2" />
                        </g>
                        <g id="hour">
                            <path class="hour-arm" d="M300.5 298V142" />
                            <circle class="sizing-box" cx="300" cy="300" r="253.9" />
                        </g>
                        <g id="minute">
                            <path class="minute-arm" d="M300.5 298V67" />
                            <circle class="sizing-box" cx="300" cy="300" r="253.9" />
                        </g>
                        <g id="second">
                            <path class="second-arm" d="M300.5 350V55" />
                            <circle class="sizing-box" cx="300" cy="300" r="253.9" />
                        </g>
                    </svg>
                </div><!-- .clockbox -->
            </main>

        </div>

    </section>








    <footer>
        <p>Copyright © 2020 All rights reserved </p>
    </footer>



<script src="../dist/js/script.js"></script>
<script src="script.js" defer></script>
    
</body>
</html>