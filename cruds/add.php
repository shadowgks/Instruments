<?php

//Create
function saveInstrument(){
    global $conn;

    //Get data from form
    $title                = str_replace("'","\'",$_POST['title']);
    //Upload img
    //-----------------------------------------------
    $tmp_picture_name     = $_FILES['picture']['tmp_name'];
    //unique id img
    $new_unique_name      = uniqid(".",true);
    //check picture
    if(!empty($_FILES['picture']['name'])){
        $distination_file = 'assets/img/upload/instruments/'.$new_unique_name;
    }else{
        $distination_file = 'assets/img/upload/instruments/default/default_picture.png';
    }
    //Func upload picture
    move_uploaded_file($tmp_picture_name,$distination_file);
    //-----------------------------------------------
    $fammllies            = $_POST['fammllies'];
    $date                 = $_POST['date'];
    $price                = $_POST['price'];
    $quantities           = $_POST['quantities'];
    $description          = str_replace("'","\'",$_POST['description']);
    $id_user              = $_SESSION['user']['id'];

    //Check inputs form if empty
    if(empty($title)
    || empty($fammllies)
    || empty($date)
    || empty($price)
    || empty($quantities)
    || empty($description)){
        $_SESSION['Failed'] = "Fill in the blanks as appropriate!";
        header("location: user/index.php");
    }else{
        //Added instruments
        $requete = "INSERT INTO instruments(`name`, `img`, `description`, `date`, `qnt`, `price`, `fammille_id`, `user_id`) 
        VALUES ('$title','$distination_file','$description','$date','$quantities','$price','$fammllies','$id_user')";

        $data = mysqli_query($conn,$requete);
        if($data){
            $_SESSION['Success'] = "Added Instrument";
            header("location: user/index.php");
        }else{
            $_SESSION['Failed'] = "Oops not added instrument!!!";
            header("location: user/index.php");
        }
    }
}

//============================
//Login
//Register
function regestreUser(){
    global $conn;

    //Get data from form
    $name                 = $_POST['yourname'];
    $email                = $_POST['email'];
    $password             = $_POST['password'];
    $password_confirme    = $_POST['password-confirme'];
    $password_hash        = password_hash($password, PASSWORD_DEFAULT);
    //Upload img
    //-----------------------------------------------
    $tmp_picture_name     = $_FILES['picture']['tmp_name'];
    //unique id img
    $new_unique_name      = uniqid(".",true);
    //check picture
    if(!empty($_FILES['picture']['name'])){
        $distination_file = 'assets/img/upload/users/'.$new_unique_name;
    }else{
        $distination_file = 'assets/img/upload/users/default/user_inco.png';
    }
    //Func upload picture
    move_uploaded_file($tmp_picture_name,$distination_file);
    //-----------------------------------------------

    //Check inputs form if empty
    if(empty($name)
    || empty($email)
    || empty($password)
    || empty($password_confirme) || $password_confirme !== $password){
        $_SESSION['Failed'] = "Fill in the blanks as appropriate!";
        header("location: Login/register.php");
    }else{
        //Sql Query
        $checkEmail = "SELECT * FROM `users` WHERE `email` = '$email'";
        $data = mysqli_query($conn,$checkEmail);
        //Execute sql query check num email on db
        if(mysqli_num_rows($data) > 0){
            $_SESSION['Failed'] = "This Account Before Used!";
            header("location: Login/register.php");
        }else{
            //Sql Query
            $requete = "INSERT INTO users(name, email, password, img, dateEntre) 
            VALUES ('$name','$email','$password_hash','$distination_file',NOW())";
            $data = mysqli_query($conn,$requete);
            if($data){
                $_SESSION['Success'] = "This Account Has been Created";
                header("location: Login/sign_in.php");
            }else{
                $_SESSION['Failed'] = "This Account Has been not Created";
                header("location: Login/register.php");
            }
        }
    }
}