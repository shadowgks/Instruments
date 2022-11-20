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
          <div class="d-flex gap-2">
            <!-- Btn Menu -->
            <a class="btn btn-dark rounded-0 d-block d-lg-none" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button">
              MENU
            </a>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          
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
            
            <div class="d-flex justify-content-center">
              <!-- IMG USER -->
              <div class="rounded-circle" style="background-image: url('../<?php echo $_SESSION['user']['img']?>'); width: 40px; height: 40px; background-repeat: no-repeat; background-position: center; background-size: cover;"></div>
              <form class="navbar-nav">
                <ul class="navbar-nav">
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
                  <a class="btn btn-dark rounded-0 d-none d-lg-block" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button">
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

    <!-- BEGIN Profile -->
    <section class="py-5 ">
        <div class="container border border-bottom rounded-2 shadow">
            <div class="row align-items-center">
                <div class="col-md">
                  <img src="../assets/img/svg/profile/profile.svg" alt="REGISTER">
                </div>
                <div class="col-md">
                  <h1 class="text-center my-5">Your Profile</h1>

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

                  <form class="mx-1 mx-md-4" method="POST" action="../scripts.php" name="form-register" enctype="multipart/form-data" id="form-register" data-parsley-validate>
                    <div class="d-flex align-items-center mb-4">
                      <i class="fas fa-user me-3 mt-4"></i>
                      <div class="form-outline flex-fill">
                        <label class="form-label" for="form3Example1c">Your Name</label>
                        <input type="text" value="<?php echo $_SESSION['user']['name']?>" name="yourname" id="form3Example1c" class="form-control" data-parsley-trigger="keyup" data-parsley-length="[2, 30]" required/>
                      </div>
                    </div>
  
                    <div class="d-flex align-items-center mb-4">
                      <i class="fas fa-envelope me-3 mt-4"></i>
                      <div class="form-outline flex-fill">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" value="<?php echo $_SESSION['user']['email']?>" name="email" id="form3Example3c" class="form-control" data-parsley-trigger="keyup" data-parsley-pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" required/>
                      </div>
                    </div>
  
                    <div class="d-flex align-items-center mb-4">
                      <i class="fas fa-lock me-3 mt-4"></i>
                      <div class="form-outline flex-fill">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" value="<?php echo $_SESSION['user']['password']?>" name="password" id="password" class="form-control" data-parsley-trigger="keyup" data-parsley-minlength="8" required/>
                      </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                      <i class="fas fa-key me-3 mt-4"></i>
                      <div class="form-outline flex-fill">
                        <label class="form-label" for="form3Example4cd">Repeat Your Password</label>
                        <input type="password" value="<?php echo $_SESSION['user']['password']?>" name="password-confirme" id="password-confirme" class="form-control" data-parsley-trigger="keyup" data-parsley-equalto="#password" data-parsley-minlength="8" required/>
                      </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                      <i class="bi bi-image me-3 mt-4"></i>
                      <div class="form-outline flex-fill">
                        <label class="form-label" for="form3Example4cd">Picture (Optionnel)</label>
                        <input type="file" name="picture" class="form-control" id="picture" accept="image/png, image/jpeg">
                      </div>
                    </div>
  
                    <div class="d-flex justify-content-center mb-5">
                      <button type="submit" name="update_profile" class="btn btn-dark rounded-0">Save Changes</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END Profile -->

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
endif;
//END CONDISTION