<?php
//INCLUDE DATABASE FILE
include("db/connexionDB.php");

//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

//Login
if(isset($_POST['register'])){
    regestreUser();
}
if(isset($_POST['sign_in'])){
    signinUser();
}

//CRUD
if(isset($_POST['save'])){
    saveInstrument();
}

//Login
//Register
function regestreUser(){
    global $conn;

    //Get data form
    $name       = $_POST['yourname'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
   
    //Sql Query
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $execute = mysqli_query($conn,$checkEmail);
    //Execute sql query
    if(mysqli_num_rows($execute) > 0){
        $_SESSION['Failed'] = "This Account Before Used!";
        header("location: Login/register.php");
    }else{
        //Sql Query
        $createAccount = "INSERT INTO users(name, email, password, dateEntre) 
        VALUES ('$name','$email','$password',NOW())";
        $execute = mysqli_query($conn,$createAccount);
        if($execute){
            $_SESSION['Success'] = "This Account Has been Created";
            header("location: Login/register.php");
        }else{
            $_SESSION['Failed'] = "This Account Has been not Created";
            header("location: Login/register.php");
        }
     }
}

//Sign IN
function signinUser(){
    global $conn;

    //Get data form
    $email      = $_POST['email'];
    $password   = $_POST['password'];
   
    //Sql Query
    $requete = "SELECT * FROM users 
    WHERE email = '$email' 
    and password = '$password'";
    $execute = mysqli_query($conn,$requete);

    if(mysqli_num_rows($execute) === 1){
        $row = mysqli_fetch_assoc($execute);
        $_SESSION['user'] = $row;
        header("location: user/index.php",true);
    }else{
        $_SESSION['Failed'] = "Email or Password not correct!";
        header("location: Login/sign_in.php");
    }
}

//check if user went to sign out
if(isset($_GET['sign_out'])){
    //destroy session user
    session_destroy();

    //ineed to check this condition!!!!!
    if(header("location: ../Login/sign_in.php")){
        header("location: user/index.php");
    }else{
        header("location: index.php");
    }
};

//==========================================================================
//CRUD
//Create
function saveInstrument(){
    global $conn;

    $title      = $_POST['title'];
    $picture    = $_POST['picture'];
    $families   = $_POST['families'];
    $date       = $_POST['date'];
    $price      = $_POST['price'];
    $quantities = $_POST['quantities'];
    $description= $_POST['description'];

    

}
