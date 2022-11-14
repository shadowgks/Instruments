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

//Validation Forms
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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

//==========================================================================
//CRUD
//Create
function saveInstrument(){
    global $conn;

    //Get data from form
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

    //Check inputs form if empty
    if($title        === "" 
    || $picture_name === ""
    || $families     === "Please Select"
    || $date         === ""
    || $price        === ""
    || $quantities   === ""
    || $description  === ""){
        $_SESSION['Failed'] = "Fill in the blanks as appropriate!";
        header("location: Login/register.php");
    }else{
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
}

//Read
function getInstruments(){
    global $conn;

    $requete = "SELECT instruments.*, fammiles.name AS 'NameFammiles' 
    FROM instruments join fammiles 
    on instruments.fammille_id = fammiles.id";
    $data = mysqli_query($conn,$requete);
    if(mysqli_num_rows($data) > 0){
        foreach($data as $item){
            echo '
            <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
                    <div class="card shadow">
                        <img src="../assets/img/upload/'.$item["img"].'" class="card-img-top" height="350" alt="...">
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
                        <div class="p-3 d-flex justify-content-between">
                            <button class="btn btn-dark p-3 w-100 me-3"><i class="fa-solid fa-cart-shopping"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="btn_edit()" class="btn btn-warning p-3"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
            </div>';
        }
    }else{
        $_SESSION['Failed'] = "You dont have any carte!!!";
        unset($_SESSION['Failed']);
    }
}

