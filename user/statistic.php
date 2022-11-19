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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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

    <!-- BEGIN parsley css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css">
    <!-- END parsley css-->

    <!-- BEGIN Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@400;500;600;700&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- END Font -->

    <!-- BEGIN style css-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- END style css-->

    <!-- =============================================================== -->
</style>
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
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
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
                  <!-- IMG USER -->
                  <div class="rounded-circle" style="background-image: url('../<?php echo $_SESSION['user']['img']?>'); width: 40px; height: 40px; background-repeat: no-repeat; background-position: center; background-size: cover;"></div>
                  <!-- Dropdown user -->
                  <li class="nav-item dropdown">
                      <!-- session name user -->
                        <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown">
                          <?php 
                          //Get name user
                          echo $_SESSION['user']['name'];
                          ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li><button type="submit" name="sign_out" class="dropdown-item">Sign out</button></li>
                        </ul>
                  </li>
                  <!-- Btn Menu -->
                  <a class="btn btn-dark rounded-0 " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button">
                    MENU
                  </a>
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
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><i class="bi bi-list me-2"></i>MENU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body w-100">
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php"><i class="bi bi-calendar-check fs-4 me-4"></i>Instruments</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="statistic.php"><i class="bi bi-graph-up-arrow fs-4 me-4"></i>Statistic</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="profile.php"><i class="bi bi-person-square fs-4 me-4"></i>Profile</a>
      </div>
    </div>
    <!-- END SIDEBAR MENU -->
    <!-- END HEADER --> 

    <!-- BEGIN Statistic --> 
    <div class="container statistic">
      <div class="row mt-5">
        <h1 class="text-center">STATISTIC USERS</h1>
        <hr class="mt-5">
          <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block text-center text-sm-end">
                    <h6 class="m-b-20">USERS</h6>
                    <h2 class="text-right"><i class="fa fa-user f-left"></i>
                        <span>
                          <?php
                            //SQL query
                            $requete = "SELECT count(*) AS 'countUsers' FROM users";
                            $data = mysqli_query($conn,$requete);

                            //fetch data
                            $row = mysqli_fetch_assoc($data);
                            if($row > 0){
                              echo "$row[countUsers]"."+";
                            }else{
                              echo "0";
                            }
                          ?>
                        </span>
                    </h2>
                </div>
            </div>
          </div>
        
          <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block text-center text-sm-end">
                    <h6 class="m-b-20">Instruments</h6>
                    <h2 class="text-right"><i class="bi bi-music-note-list f-left"></i>
                      <span>
                        <?php
                          //SQL query
                          $requete = "SELECT count(*) AS 'countInstrument' FROM instruments";
                          $data = mysqli_query($conn,$requete);

                          //fetch data
                          $row = mysqli_fetch_assoc($data);
                          if($row > 0){
                            echo "$row[countInstrument]"."+";
                          }else{
                            echo "0";
                          }
                        ?>
                      </span>
                    </h2>
                </div>
            </div>
          </div>
        
          <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block text-center text-sm-end">
                    <h6 class="m-b-20">Price DH</h6>
                    <h2 class="text-right"><i class="bi bi-cash-coin f-left"></i>
                    <span>
                      <?php
                          //SQL query
                          $requete = "SELECT SUM(price) AS 'countPrice' FROM instruments";
                          $data = mysqli_query($conn,$requete);

                          //fetch data
                          $row = mysqli_fetch_assoc($data);
                          if($row > 0){
                            echo "$row[countPrice]"."+";
                          }else{
                            echo "0";
                          }
                        ?>
                    </span>
                  </h2>
                </div>
            </div>
          </div>
        
          <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block text-center text-sm-end">
                    <h6 class="m-b-20">Quantity</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i>
                      <span>
                        <?php
                            //SQL query
                            $requete = "SELECT SUM(qnt) AS 'countQnt' FROM instruments";
                            $data = mysqli_query($conn,$requete);

                            //fetch data
                            $row = mysqli_fetch_assoc($data);
                            if($row > 0){
                              echo "$row[countQnt]"."+";
                            }else{
                              echo "0";
                            }
                          ?>
                      </span>
                    </h2>
                </div>
            </div>
          </div>
	    </div>
      <div class="row">
        <div class="col">
          <img src="../assets/img/svg/statistic/statistic.svg">
        </div>
      </div>
    </div>
    <!-- END Statistic --> 

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

    <!-- =============================================================== -->
    <!-- BEGIN Bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- END Bootstrap js-->

    <!-- BEGIN jquery js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END jquery js-->

    <!-- BEGIN parsley js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END parsley js-->

    <!-- BEGIN js scripts -->
    <script src="../scripts.js"></script>
    <!-- END js scripts -->
    <!-- =============================================================== -->
</body>
</html>
<?php 
//USER IF NOT EXISTING
else: header("location: ../Login/sign_in.php"); 
die();
endif;
//END CONDISTION