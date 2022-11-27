<?php

function searchInstrument(){
    global $conn;
    
    //Get data from form
    $search = $_GET["search"];
    $id_user = $_SESSION['user']['id'];

    //SQL query
    $requete = "SELECT instruments.*, fammiles.name AS 'NameFammiles' 
    FROM  instruments join fammiles join users
    on    instruments.fammille_id = fammiles.id
    and   instruments.user_id     = users.id 
    and   instruments.user_id     = '$id_user'
    and   instruments.name LIKE  '%$search%'";
    
    $data = mysqli_query($conn,$requete);
    if(mysqli_num_rows($data) > 0){
        foreach($data as $row){
            echo '
            <div class="col-sm-12 col-md-6 col-lg-3 pb-3"
            id           = "'.$row["id"].'"
            title        = "'.$row["name"].'"
            picture      = "'.$row["img"].'"
            fammiles-id  = "'.$row["fammille_id"].'"
            date         = "'.$row["date"].'"
            qnt          = "'.$row["qnt"].'"
            price        = "'.$row["price"].'"
            description  = "'.$row["description"].'">
                    <div class="card shadow">
                    <div style="background-image: url(../'.$row["img"].'); height: 40vh; background-repeat: no-repeat; background-position: center; background-size: cover;"></div>
                        <div class="card-body">
                            <h5 class="card-title">'.$row["name"].'</h5>
                            <h6 class="card-subtitle mb-2 text-muted">'.$row["NameFammiles"].'</h6>
                            <p class="card-text text-truncate" title='.$row["description"].'>'.$row["description"].'</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Date: <span class="text-muted">'.$row["date"].'</span></li>
                            <li class="list-group-item">Quantities: <span class="text-muted">'.$row["qnt"].'</span></li>
                            <li class="list-group-item">Price: <span class="text-muted">'.$row["price"].'DH</span></li>
                        </ul>
                        <div class="p-2 d-flex justify-content-between">
                            <button class="btn btn-dark p-2 w-100 me-3"><i class="fa-solid fa-cart-shopping"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="btn_edit('.$row["id"].')" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
            </div>';
        }
    }else{
        echo '
        <div class="col-12">
            <div class="alert alert-warning">
                <h4 class="alert-heading">Oops!</h4>
                <hr>
                <p>This is not found.</p>
            </div>
        </div>
        ';
    }
}
