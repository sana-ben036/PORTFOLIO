<?php

// conexion db 
require 'connect.php';

// declarer session
session_start();

// fonction pr securiser les input
function valid_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



// script for login :::::::::::::::::::::::::::::::::::::

    if(isset($_POST['valid'])){

        $email = valid_data ($_POST['email']);
        $password = $_POST['password'];
    
    
        $sth = $db->prepare("SELECT * FROM admin WHERE email = :email ");
        $sth->bindParam(':email',$email);
        $sth->execute();
        while ($row = $sth->fetch())
        {
            
            if ($row && ($_POST['password'] === $row['password']))
            {
                header("LOCATION:admin/dashboard.php"); 
            
            }else{
                $_SESSION['message']= " E-mail ou Mot de passe est non Validé !";
                $_SESSION['msg_type']= "danger";
        
            }
        } 
        

    }

// script for contact us :::::::::::::::::::::::::::::::::


    if (isset($_POST['envoyer'])) {
        $name = valid_data($_POST['name']);
        $email= valid_data($_POST['email']);
        $phone= valid_data($_POST['phone']);
        $message = valid_data($_POST['message']);
    
        if((!empty($name)) && (!empty($email)) && (!empty($phone)) && (!empty($message))){
            $dest = "lamar.chebbo@gmail.com";
            $subj = "Contact Form";
            $msg= " New message recieved \n
            Name = $name \n
            E-mail = $email \n
            Phone = $phone \n
            Message = $message ";
            $headers= 'MINE-Version: 1.0'. "\r\n";
            $headers= 'From : $name <$email>'. "\r\n";
            $headers= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";
            mail($dest, $subj, $msg, $headers);
        }else{
            echo "erreur";
        }
    
    /*
        //On insère les données vers db
        $sth = $db->prepare("
        INSERT INTO contact(name, email, phone, message)
        VALUES(:name, :email, :phone, :message)");
    $sth->bindParam(':name',$name);
    $sth->bindParam(':email',$email);
    $sth->bindParam(':phone',$phone);
    $sth->bindParam(':message',$message);
    $sth->execute();
    */
    $_SESSION['message']= "Message est bien envoyé !";
    $_SESSION['msg_type']= "danger";
    
    }


// script for new projet :::::::::::::::::::::::::::::::::::::

    $update = false;

    $id=" ";
    $title=" ";
    $url=" ";
    $categorie=" ";
    $image=" ";
    
    
    if(isset($_POST['add-projet'])){                    
    
        //test values on input
        $title =valid_data ($_POST['title']);
        $url= valid_data($_POST['url']);
        $categorie= valid_data($_POST['cat']);
        $image= $_FILES['image']['name'];
        $upload="uploads/".$image;
    
         //insert values in  db
        $sth = $db->prepare("
        INSERT INTO projet (titre, url, categorie, image)
        VALUES(:titre,:url, :categorie, :image)");
        $sth->bindParam(':titre',$title);
        $sth->bindParam(':url',$url);
        $sth->bindParam(':categorie',$categorie);
        $sth->bindParam(':image',$upload);
        $sth->execute();
        move_uploaded_file($_FILES['image']['tmp_name'],$upload);
    
    
        //$_SESSION['message']= " le projet est bien ajouté !";
        //$_SESSION['msg_type']= "success";

        header("LOCATION:projet.php"); 
    
    }


// script to delet post ::::::::::::::::::::::::::::::::::

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    //delete image from uploads folder
    $sth=$db->prepare( 'SELECT image FROM projet WHERE id_p= :id ');
    $sth->bindParam(':id',$id);
    $sth->execute();
    while ($row = $sth->fetch())
    {
        $imagepath=$row['image'];
        unlink($imagepath);
    }

    // delete the post from db
    $sth=$db->prepare('DELETE FROM projet WHERE id_p= :id ')  ;
    $sth->bindParam(':id',$id);
    $sth->execute();

    //header(""LOCATION:projet.php");

    $_SESSION['message']= "Une ligne est bien suprimée !";
    $_SESSION['msg_type']= "danger";

}

  // recuperer details de projet in form::::::::::::::::::::::
    
  if(isset($_GET['edit'])){
    
    $id = $_GET['edit'];

    // select the post a modifier selon son id et recuperer les details de ce post
    $sth=$db->prepare('SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c  WHERE id_p = :id ')  ;
    $sth->bindParam(':id',$id);
    $sth->execute();
    while ($row = $sth->fetch())
    {
        $id=$row['id_p'];
        $title=$row['titre'];
        $url=$row['url'];
        $categorie=$row['name'];
        $image=$row['image'];

        $update = true;     // true ou false selon selon le choix : form vide  ou   recuperer les details de projet in input
        
    }

    


}

    // edit details of projet

    if(isset($_POST['update-projet'])){
    
        //valider new details for update 
        $id = $_POST['id'];
        $title = valid_data($_POST['title']);
        $url= valid_data ($_POST['url']);
        $categorie=$_POST['cat'];
        $oldimage= $_POST['oldimage'];
    
        // to change and upload new image 
        if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != " ")){
    
            $newimage="uploads/".$_FILES['image']['name'];
            unlink($oldimage);
            move_uploaded_file($_FILES['image']['tmp_name'],$newimage);
    
        } else{
            $newimage=$oldimage;
        }
    
        $sth=$db->prepare('UPDATE projet SET titre=?,url=?,categorie=?,image=?  WHERE id_p = ? ')  ;
        $sth->bindParam(1,$title);
        $sth->bindParam(2,$url);
        $sth->bindParam(3,$categorie);
        $sth->bindParam(4,$newimage);
        $sth->bindParam(5,$id);
        $sth->execute();
    
        $_SESSION['message']= " Une ligne est bien modifiée!";
        $_SESSION['msg_type']= "danger";

        //header(""LOCATION:projet.php");

    }


// script for new experience :::::::::::::::::::::::::::::::::::::

    $update = false;

    $id=" ";
    $periode=" ";
    $profil=" ";
    $desc=" ";
    $lieu=" ";
    $categorie=" ";
    
    
    if(isset($_POST['add-experience'])){                    
    
        //test values on input
        $periode =valid_data ($_POST['periode']);
        $profil= valid_data($_POST['profil']);
        $desc= valid_data($_POST['description']);
        $lieu= valid_data($_POST['lieu']);
        $categorie= valid_data($_POST['cat']);
    
         //insert values in  db
        $sth = $db->prepare("
        INSERT INTO experience (periode, profil, description, lieu, categorie)
        VALUES(?,?,?,?,?)");
        $sth->bindParam(1,$periode);
        $sth->bindParam(2,$profil);
        $sth->bindParam(3,$desc);
        $sth->bindParam(4,$lieu);
        $sth->bindParam(5,$categorie);
        $sth->execute();
    
    
        //$_SESSION['message']= " Une ligne est bien ajoutée !";
        //$_SESSION['msg_type']= "success";

        header("LOCATION:experience.php"); 
    
    }


// script to delet experience ::::::::::::::::::::::::::::::::::

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    // delete the experience from db
    $sth=$db->prepare('DELETE FROM experience WHERE id_e= ? ')  ;
    $sth->bindParam(1,$id);
    $sth->execute();

    //header(""LOCATION:projet.php");

    $_SESSION['message']= "Une ligne est bien suprimée !";
    $_SESSION['msg_type']= "danger";

}

// recuperer details d'experience in form::::::::::::::::::::::
    
    if(isset($_GET['edit'])){
    
        $id = $_GET['edit'];
    
        // select experience a modifier selon son id et recuperer ses  details 
        $sth=$db->prepare('SELECT * FROM experience INNER JOIN category ON experience.categorie = category.id_c  WHERE id_e = ?')  ;
        $sth->bindParam(1,$id);
        $sth->execute();
        while ($row = $sth->fetch())
        {
            $id=$row['id_e'];
            $periode=$row['periode'];
            $profil=$row['profil'];
            $lieu=$row['lieu'];
            $desc=$row['description'];
            $categorie=$row['name'];
    
            $update = true;     // true ou false pour changer le btn from add or update
            
        }

    }

    // edit details of experience

    if(isset($_POST['update-experience'])){
    
        //valider new details to update 
        $periode =valid_data ($_POST['periode']);
        $profil= valid_data($_POST['profil']);
        $lieu= valid_data($_POST['lieu']);
        $desc= valid_data($_POST['description']);
        $categorie= valid_data($_POST['cat']);
        

        //insert new details to db 
        $sth=$db->prepare('UPDATE experience SET periode=?, profil=?, lieu=?, description=?, categorie=?  WHERE id_e = ? ')  ;

        $sth->bindParam(1,$periode);
        $sth->bindParam(1,$periode);
        $sth->bindParam(2,$profil);
        $sth->bindParam(3,$lieu);
        $sth->bindParam(4,$desc);
        $sth->bindParam(5,$categorie);
        $sth->bindParam(6,$id);
        $sth->execute();
    
        $_SESSION['message']= " Une ligne est bien modifiée!";
        $_SESSION['msg_type']= "danger";

        //header(""LOCATION:experience.php");

    }



// script select projet by category :::::::::::::::::::::::::::::::::::::

if(isset($_GET['ca'])){

    $ca=$_GET['ca'];

    if($ca == 'design')
    {
    $query = "SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c WHERE name ='Design' ORDER BY date DESC";
    }
    elseif($ca == 'application')
    {
     $query = "SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c WHERE name ='Application' ORDER BY date DESC";
    }
    elseif($ca == 'site')
    {
     $query = "SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c WHERE name ='Website' ORDER BY date DESC";
    }
    
    else{
     $query = "SELECT * FROM projet INNER JOIN category ON projet.categorie = category.id_c ORDER BY date DESC";
    }

    

}




  // recuperer details de projet in form::::::::::::::::::::::
    
    if(isset($_POST['edit'])){
    
    
        // select the post a modifier selon son id et recuperer les details de ce post
        $sth=$db->query('SELECT * FROM admin ')  ;
        while ($row = $sth->fetch())
        {
            $id=$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $password=$row['password'];
            $profil=$row['profil'];
            $ville=$row['ville'];
            $adresse=$row['adresse'];
            $skills=$row['skills'];
            $photo=$row['photo'];
    
            
        }
    
        
    
    
    }
    
        // edit details of projet
    
        if(isset($_POST['update-projet'])){
        
            //valider new details for update 
            $id = $_POST['id'];
            $title = valid_data($_POST['title']);
            $url= valid_data ($_POST['url']);
            $categorie=$_POST['cat'];
            $oldimage= $_POST['oldimage'];
        
            // to change and upload new image 
            if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != " ")){
        
                $newimage="uploads/".$_FILES['image']['name'];
                unlink($oldimage);
                move_uploaded_file($_FILES['image']['tmp_name'],$newimage);
        
            } else{
                $newimage=$oldimage;
            }
        
            $sth=$db->prepare('UPDATE projet SET titre=?,url=?,categorie=?,image=?  WHERE id_p = ? ')  ;
            $sth->bindParam(1,$title);
            $sth->bindParam(2,$url);
            $sth->bindParam(3,$categorie);
            $sth->bindParam(4,$newimage);
            $sth->bindParam(5,$id);
            $sth->execute();
        
            $_SESSION['message']= " Une ligne est bien modifiée!";
            $_SESSION['msg_type']= "danger";
    
            //header(""LOCATION:projet.php");
    
        }


?>