<?php

//Delete
function deleteInstrument(){
    global $conn;

    //Get data id from form
    $id_instrument = $_POST['id_instrument'];

    //delete instruments
    $requete = "DELETE FROM `instruments`
    WHERE `id`     = $id_instrument";
    $data          = mysqli_query($conn,$requete);
    if($data){
        $_SESSION['Success'] = "Deleted Instrument";
        header("location: user/index.php");
    }else{
        $_SESSION['Failed'] = "Oops not delete instrument!!!";
        header("location: user/index.php");
    }
}


