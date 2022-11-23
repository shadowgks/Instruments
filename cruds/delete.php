<?php

//Delete
function deleteInstrument(){
    global $conn;

    //Get data id from form
    $id_instrument = $_POST['id_instrument'];
    intval($id_instrument);

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


//Check if user went to sign out
if(isset($_GET['sign_out'])){
    //unset & destroy session user
    session_destroy();

    //page home Redirect to page sign-in
    header("location: index.php");
};
