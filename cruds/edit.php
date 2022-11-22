<?php

//Instrument
function updateInstrument(){
    global $conn;

    //Get data from form
    $id_instrument    = intval($_POST['id_instrument']);
    $title            = $_POST['title'];
    //Upload img
    //-----------------------------------------------
    $tmp_picture_name = $_FILES['picture']['tmp_name'];
    //unique id img
    $new_unique_name  = uniqid(".",true);
    //check picture
    if(!$_FILES['picture']['name'] == ""){
        $distination_file = 'assets/img/upload/instruments/'.$new_unique_name;
    }else{
        $get_img = mysqli_query($conn,"SELECT img FROM instruments WHERE id = $id_instrument");
        $row = mysqli_fetch_assoc($get_img);
        $distination_file = $row["img"];
    }
    //Func upload picture
    move_uploaded_file($tmp_picture_name,$distination_file);
    //-----------------------------------------------
    $fammllies        = $_POST['fammllies'];
    $date             = $_POST['date'];
    $price            = $_POST['price'];
    $quantities       = $_POST['quantities'];
    $description      = $_POST['description'];

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
        $requete = "UPDATE instruments 
        SET   `name`        = '$title', 
              `img`         = '$distination_file', 
              `description` = '$description', 
              `date`        = '$date', 
              `qnt`         = '$quantities', 
              `price`       = '$price', 
              `fammille_id` = '$fammllies'
        WHERE `id`          =  $id_instrument"; 
        $data = mysqli_query($conn,$requete);
        if($data){
            $_SESSION['Success'] = "Updated Instrument";
            header("location: user/index.php");
        }else{
            $_SESSION['Failed'] = "Oops not update instrument!!!";
            header("location: user/index.php");
        }
    }
}

//================================================
//Profile User
function updateProfile(){
    global $conn;

    //Get data from form
    $id_user              = $_SESSION['user']['id'];
    $name                 = $_POST['yourname'];
    $email                = $_POST['email'];
    $password             = $_POST['password'];
    $password_confirme    = $_POST['password-confirme'];
    //Upload img
    //-----------------------------------------------
    $tmp_picture_name = $_FILES['picture']['tmp_name'];
    //unique id img
    $new_unique_name  = uniqid(".",true);
    //check picture
    if(!$_FILES['picture']['name'] == ""){
        $distination_file = 'assets/img/upload/users/'.$new_unique_name;
    }else{
        $get_img = mysqli_query($conn,"SELECT img FROM users WHERE id = $id_user");
        $row = mysqli_fetch_assoc($get_img);
        $distination_file = $row["img"];
    }
    //Func upload picture
    move_uploaded_file($tmp_picture_name,$distination_file);
    //-----------------------------------------------

    //Check inputs form if empty
    if(empty($name)
    || empty($email)){
        $_SESSION['Failed'] = "Fill IN THE BLANKS AS APPROPRIATE!";
        header("location: user/profile.php");
    }else{
        //Update profile
        $requete_UPDATE = "UPDATE users 
        SET   `name`        = '$name', 
              `email`       = '$email', 
              `img`         = '$distination_file'
        WHERE `id`          =  $id_user"; 

        //SQL QUERY $requete_UPDATE
        mysqli_query($conn,$requete_UPDATE);

        //Select data profile
        $requete_SELECT ="SELECT * FROM users
        WHERE id = $id_user";
        $data = mysqli_query($conn,$requete_SELECT);

        if($data){
            //Fetch data user
            $row = mysqli_fetch_assoc($data);
            unset($_SESSION['user']);
            $_SESSION['user'] = $row;
            $_SESSION['Success'] = "Updated Your Profile";
            header("location: user/profile.php");
        }else{
            $_SESSION['Failed'] = "Oops Not Updated Your Profile!!!";
            header("location: user/profile.php");
        }
    }
}