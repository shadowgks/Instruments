<?php
  include("../scripts.php");
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
                <a href="sign_in.php" class="btn text-dark border-secondary rounded-0 px-4">Sign In</a>
                <a href="register.php" class="btn btn-dark rounded-0 px-4">Register</a>
            </div>
          </div>
        </div>
      </nav>
    <!-- END NAVBAR -->

    <!-- BEGIN Signup -->
    <section class="py-5 ">
        <div class="container border border-bottom rounded-2 shadow">
            <div class="row align-items-center">
                <div class="col-md">
                  <img src="../assets/img/svg/login/sign_in.svg" alt="Regestre">
                </div>
                <div class="col-md">
                  <h1 class="text-center mb-5">SIGN IN</h1>

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
                    
                  <form class="mx-1 mx-md-4" method="POST" action="../scripts.php" enctype="multipart/form-data" data-parsley-validate>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope me-3 mt-4"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" name="email" id="form3Example3c" class="form-control" data-parsley-trigger="keyup" data-parsley-pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" required/>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock me-3 mt-4"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" name="password" id="form3Example4c" class="form-control" data-parsley-trigger="keyup" data-parsley-minlength="8" required/>
                      </div>
                    </div>
  
                    <div class="d-flex justify-content-center mb-5">
                      <button type="submit" name="sign_in" class="btn btn-dark rounded-0">Sign Up</button>
                    </div>
  
                  </form>
  
                </div>
            </div>
        </div>
    </section>
    <!-- END Signup -->

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