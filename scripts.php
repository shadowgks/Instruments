<?php
//INCLUDE DATABASE FILE
include("db/connexionDB.php");
include("crud/add.php");
include("crud/delete.php");
include("crud/edit.php");
include("crud/show.php");

//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

//Login
if(isset($_POST['register'])){
    regestreUser();
}
if(isset($_POST['sign_in'])){
    signinUser();
}

//============================
//CRUD
if(isset($_POST['save'])){
    saveInstrument();
}
if(isset($_POST['update'])){
    updateInstrument();
}
if(isset($_POST['delete'])){
    deleteInstrument();
}

//============================
//Login
//Register
function regestreUser(){
    global $conn;

    //Get data from form
    $name = $_POST["yourname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirme = $_POST["password-confirme"];

    //Check inputs form if empty
    if($name              === "" 
    || $email             !== "[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" && $email === ""
    || $password          === ""
    || $password_confirme !== $password){
        $_SESSION['Failed'] = "Fill in the blanks as appropriate!";
        header("location: Login/register.php");
    }else{
        //Sql Query
        $checkEmail = "SELECT * FROM users WHERE email = '$email'";
        $data = mysqli_query($conn,$checkEmail);
        //Execute sql query check num email on db
        if(mysqli_num_rows($data) > 0){
            $_SESSION['Failed'] = "This Account Before Used!";
            header("location: Login/register.php");
        }else{
            //Sql Query
            $requete = "INSERT INTO users(name, email, password, dateEntre) 
            VALUES ('$name','$email','$password',NOW())";
            $data = mysqli_query($conn,$requete);
            if($data){
                $_SESSION['Success'] = "This Account Has been Created";
                header("location: Login/register.php");
            }else{
                $_SESSION['Failed'] = "This Account Has been not Created";
                header("location: Login/register.php");
            }
        }
    }
}

//Sign IN
function signinUser(){
    global $conn;

    //Get data from form
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    //Check inputs form if empty
    if($email    === "" 
    || $password === ""){
        $_SESSION['Failed'] = "Fill in the blanks as appropriate!";
        header("location: Login/register.php");
    }else{
        //Sql Query
        $requete = "SELECT * FROM users 
        WHERE email = '$email' 
        and password = '$password'";
        $data = mysqli_query($conn,$requete);

        //Check if you find any user on db
        if(mysqli_num_rows($data) === 1){
            $row = mysqli_fetch_assoc($data);  
            $_SESSION['user'] = $row;
            header("location: user/index.php");
        }else{
            $_SESSION['Failed'] = "Email or Password not correct!";
            header("location: Login/sign_in.php");
        }
    }   
}

//check if user went to sign out
if(isset($_GET['sign_out'])){
    //unset & destroy session user
    unset($_SESSION['user']);
    session_destroy();

    //page home Redirect to page sign-in
    header("location: Login/sign_in.php");
};