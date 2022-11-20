<?php

//Read
function getInstruments(){
    global $conn;
    $id_user = $_SESSION['user']['id'];

    //Sql Query
    $requete = "SELECT instruments.*, fammiles.name AS 'NameFammiles' 
    FROM instruments join fammiles join users
    on  instruments.fammille_id = fammiles.id
    and instruments.user_id     = users.id
    where users.id              = '$id_user'";
    $data = mysqli_query($conn,$requete);
    if(mysqli_num_rows($data) > 0){
        foreach($data as $item){
            echo '
            <div class="col-lg-3 col-md-6 col-sm-6 pb-3"
            id           = "'.$item["id"].'"
            title        = "'.$item["name"].'"
            picture      = "'.$item["img"].'"
            fammiles-id  = "'.$item["fammille_id"].'"
            date         = "'.$item["date"].'"
            qnt          = "'.$item["qnt"].'"
            price        = "'.$item["price"].'"
            description  = "'.$item["description"].'">
                    <div class="card shadow">
                    <div style="background-image: url(../'.$item["img"].'); height: 40vh; background-repeat: no-repeat; background-position: center; background-size: cover;"></div>                        
                        <div class="card-body">
                            <h5 class="card-title">'.$item["name"].'</h5>
                            <h6 class="card-subtitle mb-2 text-muted">'.$item["NameFammiles"].'</h6>
                            <p class="card-text text-truncate" title='.$item["description"].'>'.$item["description"].'</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Date: <span class="text-muted">'.$item["date"].'</span></li>
                            <li class="list-group-item">Quantities: <span class="text-muted">'.$item["qnt"].'</span></li>
                            <li class="list-group-item">Price: <span class="text-muted">'.$item["price"].'DH</span></li>
                        </ul>
                        <div class="p-2 d-flex justify-content-between">
                            <button class="btn btn-dark p-2 w-100 me-3"><i class="fa-solid fa-cart-shopping"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="btn_edit('.$item["id"].')" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
            </div>';
        }
    }else{
        echo '
        <div class="col-12">
            <div class="alert alert-danger">
                <h4 class="alert-heading">Hello Dear!</h4>
                <hr>
                <p>You don\'t have any instruments.</p>
            </div>
        </div>
        ';
    }
}

//============================
//Login
//Sign IN
function signinUser(){
    global $conn;

    //Get data from form
    $email       = $_POST['email'];
    $password    = $_POST['password'];

    //Check inputs form if empty
    if(empty($email) 
    || empty($password)){
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
