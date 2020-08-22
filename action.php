<?php

// conexion db 
require 'connect.php';

// declarer session
session_start();

// fonction pr tester les input
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
    $_SESSION['msg_type']= "success";
    
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
        $upload="../dist/img/Assets/".$image;
    
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

    $_SESSION['message']= "Un projet est suprimé !";
    $_SESSION['msg_type']= "success";

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
    
        //show details post befor update it
        $id = $_POST['id'];
        $title = valid_data($_POST['title']);
        $url= valid_data ($_POST['url']);
        $categorie=$_POST['cat'];
        $oldimage= $_POST['oldimage'];
    
        // to change and upload new image 
        if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != " ")){
    
            $newimage="../dist/img/Assets/".$_FILES['image']['name'];
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
    
        $_SESSION['message']= " le projet est bien modifié!";
        $_SESSION['msg_type']= "success";

        //header(""LOCATION:projet.php");

    }










?>