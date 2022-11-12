<?php 
  include("scripts.php");
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- END Bootstrap style-->

    <!-- BEGIN Bootstrap icons-->
    <link rel="stylesheet" href="assets/bootstrap-icons/bootstrap-icons.css">
    <!-- END Bootstrap icons-->
    <!-- =============================================================== -->
</head>
<body>
    <!-- BEGIN APP -->

    <!-- BEGIN HEADER -->
    <!-- BEGIN NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: #FAF2EE;">
        <div class="container-fluid px-lg-5">
          <a class="navbar-brand" href="index.php">
            <img src="assets/img/logo/Pink Music Composer Logo (1).png" height="70" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#ABOUT_US">About US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#CONTACT_US">Contact US</a>
              </li>
            </ul>
            <?php if(!isset($_SESSION['user'])): ?>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="Login/sign_in.php" class="btn text-dark border-secondary rounded-0 px-4">Sign In</a>
                <a href="Login/register.php" class="btn btn-dark rounded-0 px-4">Register</a>
            </div>

            <!-- BEGIN CONDISTION -->
            <?php else: ?>
              <form class="navbar-nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <!-- session name user -->
                        <a class="nav-link dropdown-toggle text-center" role="button" data-bs-toggle="dropdown">
                          <?php 
                          //Get name user
                          echo $_SESSION['user']['name'];
                          ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li><a href="user/index.php" class="dropdown-item">Dashboard</a></li>
                          <li><button type="submit" name="sign_out" class="dropdown-item">Sign out</button></li>
                        </ul>
                    </li>
                </ul>
              </form>
              <?php endif ?>
              <!-- END CONDISTION -->
          </div>
        </div>
      </nav>
    <!-- END NAVBAR -->
    
    <!-- BEGIN SECTION -->
    <section class="text-white bg-black py-5">
        <div class="container-fluid px-5 d-md-flex gap-5 text-center text-md-start">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h1 class="display-5">WELCOME TO INSTRUMENTS</h1>
                    <p class="py-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Inventore, ut vero. Exercitationem, nesciunt sapiente 
                        tempore quasi nisi aliquid debitis amet ut corrupti 
                        totam dolores et rerum. At quae omnis perspiciatis.</p>
                    <a href="#" class="btn text-white rounded-0 w-50" style="border: 1px solid #E1B09E;">GET STARTED</a>
                </div>
            </div>
            <img src="assets/img/svg/main.svg" class="w-50 d-none d-md-block" alt="">
        </div>
    </section>
    <!-- END SECTION -->
    <!-- END HEADER -->

    <!-- BEGIN SERVICES --> 
    <section class="py-5" id="SERVICES">
        <div class="container">
            <h1 class="text-center pb-5">SERVICES</h1>
            <div class="row text-center">
                <div class="col-sm col-sm-6 col-md-4">
                    <div class="card mb-3 shadow" style="background-color: #FAF2EE;">
                        <img src="assets/img/svg/services/Saxophone_ArtFavor.svg" class="card-img-top py-3" height="300" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-dark rounded-0">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-sm col-sm-6 col-md-4">
                    <div class="card mb-3 shadow" style="background-color: #FAF2EE;">
                    <img src="assets/img/svg/services/TheresaKnott_piano.svg" class="card-img-top py-3" height="300" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-dark rounded-0">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm col-sm-6 col-md-4">
                    <div class="card mb-3 shadow" style="background-color: #FAF2EE;">
                        <img src="assets/img/svg/services/papapishu_double_bass_1.svg" class="card-img-top py-3" height="300" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-dark rounded-0">Go somewhere</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICES -->

    <!-- BEGIN ABOUT US -->
    <section class="py-5 bg-black text-white" id="ABOUT_US">
        <div class="container">
            <h1 class="text-center pb-5">ABOUT US</h1>
            <div class="row align-items-center">
                <div class="col-md">
                    <img src="assets/img/svg/about_us.svg" alt="">
                </div>
                <div class="col-md text-center text-md-start">
                  <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi eos culpa ducimus maiores doloremque deserunt voluptatibus vitae, officia inventore laborum rem aperiam provident illum reiciendis voluptas ipsam cum sapiente cumque.</p>
                  <a href="#" class="btn text-white rounded-0 w-50" style="border: 1px solid #E1B09E;">Learn More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT US -->

    <!-- BEGIN CONTACT US -->
    <section id="CONTACT_US" class="contact py-5">
      <div class="container">
          <h1 class="text-center pb-5">CONTACT US</h1>
        <div class="row align-items-center">
          <div class="col-md">
            <img src="assets/img/svg/contactUS.svg" alt="">
          </div>
          <div class="col">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="text-center">
                  <button class="btn btn-dark rounded-0" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- END CONTACT US -->

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
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- END Bootstrap js-->
    <!-- =============================================================== -->
    <!-- BEGIN js scripts -->
    <script src="scripts.js"></script>
    <!-- END js scripts -->
</body>
</html>