<?php

//Update
function updateInstrument(){
    global $conn;

    //Get data from form
    $id_instrument    = intval($_POST['id_instrument']);
    $title            = $_POST['title'];
    //Upload img
    //-----------------------------------------------
    $picture_name     = $_FILES['picture']['name'];
    $tmp_picture_name = $_FILES['picture']['tmp_name'];
    //unique id img
    $new_unique_name= uniqid('',true).$picture_name;
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