<?php

//Update
function updateInstrument(){
    global $conn;

    //Get data from form
    $id_instrument    = $_POST['id_instrument'];
    intval($id_instrument);
    $title            = $_POST['title'];
    //Upload img
    //-----------------------------------------------
    $picture_name     = $_FILES['picture']['name'];
    $tmp_picture_name = $_FILES['picture']['tmp_name'];
    $folder           = 'assets/img/upload/';
    move_uploaded_file($tmp_picture_name,$folder.$picture_name);
    //-----------------------------------------------
    $fammllies        = $_POST['fammllies'];
    $date             = $_POST['date'];
    $price            = $_POST['price'];
    $quantities       = $_POST['quantities'];
    $description      = $_POST['description'];

    //Check inputs form if empty
    if($title        === "" 
    || $picture_name === ""
    || $fammllies    === "Please Select"
    || $date         === ""
    || $price        === ""
    || $quantities   === ""
    || $description  === ""){
        $_SESSION['Failed'] = "Fill in the blanks as appropriate!";
        header("location: user/index.php");
    }else{
        //Added instruments
        $requete = "UPDATE instruments 
        SET name        = '$title', 
            img         = '$picture_name', 
            description = '$description', 
            date        = '$date', 
            qnt         = '$quantities', 
            price       = '$price', 
            fammille_id = '$fammllies'
        WHERE id        = $id_instrument"; 
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