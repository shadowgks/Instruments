<?php

// function searchInstrument($id_user){
//     global $conn;
//     //Get data from form
//     $search = $_GET["search"];

//     //SQL query
//     $requete = "SELECT instruments.*, fammiles.name AS 'NameFammiles' 
//     FROM  instruments join fammiles join users
//     on    instruments.fammille_id = fammiles.id
//     and   instruments.user_id     = users.id 
//     and   instruments.name LIKE  '%a'";
    
//     $data = mysqli_query($conn,$requete);
//     while($item = mysqli_fetch_assoc($data)){

   

//         echo '
//         <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
//                 <div class="card shadow">
//                     <img src="../'.$item["img"].'" class="card-img-top" height="330" alt="...">
//                     <div class="card-body">
//                         <h5 class="card-title">'.$item["name"].'</h5>
//                         <h6 class="card-subtitle mb-2 text-muted">'.$item["NameFammiles"].'</h6>
//                         <p class="card-text text-truncate" title='.$item["description"].'>'.$item["description"].'</p>
//                     </div>
//                     <ul class="list-group list-group-flush">
//                         <li class="list-group-item">Date: <span class="text-muted">'.$item["date"].'</span></li>
//                         <li class="list-group-item">Quantities: <span class="text-muted">'.$item["qnt"].'</span></li>
//                         <li class="list-group-item">Price: <span class="text-muted">'.$item["price"].'DH</span></li>
//                     </ul>
//                     <div class="p-2 d-flex justify-content-between">
//                         <button class="btn btn-dark p-2 w-100 me-3"><i class="fa-solid fa-cart-shopping"></i></button>
//                         <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="btn_edit('.$item["id"].')" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
//                     </div>
//                 </div>
//         </div>';
//     }
// }