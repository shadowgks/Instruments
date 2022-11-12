<?php 
  include("../scripts.php");

  // BEGIN CONDISTION
  // CEACK USER IF EXISTING
  if(isset($_SESSION['user'])):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruments</title>
    <!-- =============================================================== -->
    <!-- BEGIN FontAwesomme-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BEGIN FontAwesomme-->

    <!-- BEGIN Bootstrap style-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- END Bootstrap style-->

    <!-- BEGIN Bootstrap icons-->
    <link rel="stylesheet" href="../assets/bootstrap-icons/bootstrap-icons.css">
    <!-- END Bootstrap icons-->
    <!-- =============================================================== -->
</head>
<body>
    <!-- BEGIN APP -->

    <!-- BEGIN HEADER -->
    <!-- BEGIN NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: #FAF2EE;">
        <div class="container-fluid px-lg-5">
          <a class="navbar-brand" href="../index.php">
            <img src="../assets/img/logo/Pink Music Composer Logo (1).png" height="70" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../index.php#ABOUT_US">About US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../index.php#CONTACT_US">Contact US</a>
              </li>
            </ul>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <form class="navbar-nav">
                <ul class="navbar-nav">
                    <a class="btn btn-dark rounded-0 " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                      MENU
                    </a>
                    <li class="nav-item dropdown">
                      <!-- session name user -->
                        <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <?php 
                          //Get name user
                          echo $_SESSION['user']['name'];
                          ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li><button type="submit" name="sign_out" class="dropdown-item">Sign out</button></li>
                        </ul>
                    </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
      </nav>
    <!-- END NAVBAR -->

    <!-- BEGIN SIDEBAR MEMU -->
    <div class="offcanvas offcanvas-start py-5" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body w-100">
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Instruments</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="statistic.php">Statistic</a>
      </div>
    </div>
    <!-- END SIDEBAR MENU -->
    <!-- END HEADER --> 

    <!-- BEGIN Instruments -->
    <section class="py-5">
      <div class="container">
        <div class="row pb-4">
          <!-- Mssg Session Failed -->
          <?php if(isset($_SESSION['Failed'])): ?>
            <div class="alert alert-danger" role="alert">
            <strong>Failed!</strong>
              <?php
                echo $_SESSION['Failed'];
                unset($_SESSION['Failed']);
              ?>
            </div>
          <?php endif ?>

          <!-- Mssg Session Success -->
          <?php if(isset($_SESSION['Success'])): ?>
              <div class="alert alert-primary" role="alert">
              <strong>Success!</strong>
                <?php
                  echo $_SESSION['Success'];
                  unset($_SESSION['Success']);
                ?>
              </div>
          <?php endif ?>
          
        <!-- BEGIN Button trigger modal -->
          <div class="d-grid gap-2">
            <button class="btn btn-dark rounded-0 shadow" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              ADD <i class="bi bi-plus-square"></i></i></button>
          </div>
        <!-- END Btn add -->
        </div>
        <div class="row d-flex justify-content-center">
          <form class="d-flex w-50" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </section>

    <!-- BEGIN Card Instrument -->
    <section class="pb-5">
      <div class="container min-vh-100">
        <div class="row">
          <div class="col-md col-sm-6 pb-3">
            <div class="card shadow">
              <img src="" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md col-sm-6 pb-3">
            <div class="card shadow">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md col-sm-6 pb-3">
            <div class="card shadow">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md col-sm-6 pb-3">
            <div class="card shadow">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END Card Instrument -->
    <!-- END Instruments -->

    <!-- BEGIN Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">INSTRUMENTS</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- BEGIN Form -->
          <form action="../scripts.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputTitle1" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="title" aria-describedby="textHelp" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputTitle1" class="form-label">Picture</label>
              <input type="file" name="picture" class="form-control" id="picture" aria-describedby="fileHelp" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputTitle3" class="form-label">Families</label>
              <select name="families" name="priorityMenu" id="priorityMenu" class="form-select" aria-label="Default select example">
                <option value="Please Select" selected>Please Select</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Critical">Critical</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputdate" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" id="date" aria-describedby="dateHelp" required>
            </div>

            <div class="mb-3 row">
              <div class="mb-3 col-6">
                <label for="exampleInputdate" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="price" aria-describedby="numberHelp" required>
              </div>
              <div class="mb-3 col-6">
                <label for="exampleInputdate" class="form-label">Quantities</label>
                <input type="number" name="quantities" class="form-control" id="quantities" aria-describedby="numberHelp" required>
              </div>
            </div>
            
            <div class="mb-3">
                <label for="validationTextarea" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn text-dark rounded-0" style="border: 1px solid #E1B09E;" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-dark w-25 rounded-0">Save</button>
          </div>
        </form>
        <!-- END Form -->
        </div>
      </div>
    </div>
    <!-- END Modal -->

    <!-- BEGIN FOOTER -->
    <footer id="footer" class="bg-black text-white text-center">
        <div class="container py-5">
        <h3>INSTRUMENTS</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt maiores aspernatur ut veniam aperiam, esse, adipisci autem quis possimus iure animi qui repellat ipsum beatae ratione! Omnis atque cumque provident?.</p>
        <div class="social-links">
            <a href="#" style="color:#E1B09E;"><i class="display-5 px-4 bi bi-twitter"></i></a>
            <a href="#" style="color:#E1B09E;"><i class="display-5 px-4 bi bi-facebook"></i></a>
            <a href="#" style="color:#E1B09E;"><i class="display-5 px-4 bi bi-instagram"></i></a>
            <a href="#" style="color:#E1B09E;"><i class="display-5 px-4 bi bi-skype"></i></a>
            <a href="#" style="color:#E1B09E;"><i class="display-5 px-4 bi bi-linkedin"></i></a>
        </div>
        <div class="copyright pt-5">
            &copy; Copyright <strong><span>SAAD MOUMOU</span></strong>. YOUCODE
        </div>
        </div>
        </div>
    </footer>
    <!-- END FOOTER -->
    <!-- END APP -->

    <!-- BEGIN Bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- END Bootstrap js-->
    <!-- =============================================================== -->
    <!-- BEGIN js scripts -->
    <script src="../scripts.js"></script>
    <!-- END js scripts -->
</body>
</html>
<?php 
//USER IF NOT EXISTING
else: header("location: ../Login/sign_in.php"); 
die("");
endif;
// END CONDISTION


