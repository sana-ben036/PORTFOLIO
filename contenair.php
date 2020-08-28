<div id="all" class="contenair" >
                <!--------php --------------------->
        <?php 
        // get data from db
        $sth= $db->query("SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c ORDER BY date DESC");
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



<div id="design" class="none" >
                <!--------php --------------------->
        <?php 
        // get data from db
        $sth= $db->query("SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c WHERE name ='Design' ORDER BY date DESC");
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


<div id="application" class="none" >
                <!--------php --------------------->
        <?php 
        // get data from db
        $sth= $db->query("SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c WHERE name ='Application' ORDER BY date DESC");
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


<div id="website" class="none" >
                <!--------php --------------------->
        <?php 
        // get data from db
        $sth= $db->query("SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c WHERE name ='Website' ORDER BY date DESC");
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