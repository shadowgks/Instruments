<?php

//Create
function saveInstrument(){
    global $conn;

    //Get data from form
    $title      = $_POST['title'];
    //Upload img
    //-----------------------------------------------
    $picture_name    = $_FILES['picture']['name'];
    $tmp_picture_name = $_FILES['picture']['tmp_name'];
    $folder = 'assets/img/upload/';
    move_uploaded_file($tmp_picture_name,$folder.$picture_name);
    //-----------------------------------------------
    $fammllies   = $_POST['fammllies'];
    $date       = $_POST['date'];
    $price      = $_POST['price'];
    $quantities = $_POST['quantities'];
    $description= $_POST['description'];
    $id_user    = $_POST['id_user'];
    var_dump($_POST['id_user']);
    die("");
    

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
        $requete = "INSERT INTO instruments(name, img, description, date, qnt, price, fammille_id, user_id) 
        VALUES ('$title','$picture_name','$description','$date','$quantities','$price','$fammllies','$id_user')";
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