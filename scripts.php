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
    $data = mysqli_query($conn,$checkEmail);
    //Execute sql query
    if(mysqli_num_rows($data) > 0){
        $_SESSION['Failed'] = "This Account Before Used!";
        header("location: Login/register.php");
    }else{
        //Sql Query
        $data = "INSERT INTO users(name, email, password, dateEntre) 
        VALUES ('$name','$email','$password',NOW())";
        $execute = mysqli_query($conn,$data);
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
    $data = mysqli_query($conn,$requete);

    if(mysqli_num_rows($data) === 1){
        $row = mysqli_fetch_assoc($data);  
        $_SESSION['user'] = $row;
        header("location: user/index.php");
    }else{
        $_SESSION['Failed'] = "Email or Password not correct!";
        header("location: Login/sign_in.php");
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

//==========================================================================
//CRUD
//Create
function saveInstrument(){
    global $conn;

    $title      = $_POST['title'];
    //Upload img
    //================================================
    $picture_name    = $_FILES['picture']['name'];
    $tmp_picture_name = $_FILES['picture']['tmp_name'];
    $folder = 'assets/img/upload/';
    move_uploaded_file($tmp_picture_name,$folder.$picture_name);
    //================================================
    $families   = $_POST['families'];
    $date       = $_POST['date'];
    $price      = $_POST['price'];
    $quantities = $_POST['quantities'];
    $description= $_POST['description'];

    $requete = "INSERT INTO instruments(name, img, description, date, qnt, price, fammille_id) 
    VALUES ('$title','$picture_name','$description','$date','$quantities','$price','$families')";
    $data = mysqli_query($conn,$requete);
    if($data){
        $_SESSION['Success'] = "Added Instrument";
        header("location: user/index.php");
    }else{
        $_SESSION['Failed'] = "Oops not added instrument!!!";
        header("location: user/index.php");
    }
    

}

//read
function getInstruments(){
    global $conn;

    $requete = "SELECT instruments.*, fammiles.name AS 'NameFammiles' 
    FROM instruments join fammiles 
    on instruments.fammille_id = fammiles.id";
    $data = mysqli_query($conn,$requete);
    if(mysqli_num_rows($data) > 0){
        foreach($data as $item){
            echo '<div class="col-lg-3 col-md-6 col-sm-6 pb-3">
                    <div class="card shadow">
                        <img src="../assets/img/upload/'.$item["img"].'" class="card-img-top" height="320" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$item["name"].'</h5>
                            <h6 class="card-subtitle mb-2 text-muted">'.$item["NameFammiles"].'</h6>
                            <p class="card-text">'.$item["description"].'</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item ">Date: <span class="text-muted">'.$item["date"].'</span></li>
                            <li class="list-group-item">Quantities: <span class="text-muted">'.$item["qnt"].'</span></li>
                            <li class="list-group-item">Price: <span class="text-muted">'.$item["price"].'DH</span></li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="btn btn-dark">Buy Now</a>
                        </div>
                    </div>
                </div>';
        }
    }else{
        $_SESSION['Failed'] = "You dont have any carte!!!";
        unset($_SESSION['Failed']);
    }
}
