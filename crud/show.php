<?php

//Read
function getInstruments(){
    global $conn;

    //Sql Query
    $requete = "SELECT instruments.*, users.id AS 'UserID', fammiles.name AS 'NameFammiles' 
    FROM instruments join fammiles join users
    on instruments.fammille_id = fammiles.id";
    $data = mysqli_query($conn,$requete);
    if(mysqli_num_rows($data) > 0){
        foreach($data as $item){
            echo '
            <div class="col-lg-3 col-md-6 col-sm-6 pb-3"
            id           = '.$item["id"].'
            title        = '.$item["name"].'
            picture      = '.$item["img"].'
            fammiles-id  = '.$item["fammille_id"].'
            date         = '.$item["date"].'
            qnt          = '.$item["qnt"].'
            price        = '.$item["price"].'
            description  = '.$item["description"].'
            id_user      = '.$item["UserID"].'>
                    <div class="card shadow">
                        <img src="../assets/img/upload/'.$item["img"].'" class="card-img-top" height="330" alt="...">
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
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="btn_edit('.$item["id"].')" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
            </div>';
        }
    }else{
        $_SESSION['Failed'] = "You dont have any carte!!!";
        unset($_SESSION['Failed']);
    }
}