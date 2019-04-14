<?php
  include_once  "config/core.php";
  include_once "config/database.php";
  include_once "utils/error_check.php";
  
  if(isset($_SESSION['designation'])){
    header("Location: home.php");
  }

  $database = new Database();
  $db = $database->getConnection();

  if(isset($_SESSION['user_role']) && isset($_SESSION['user_name'])){
    if($_SESSION['user_role'] == 1){
      header("Location: admin/index.php");
    } else if ($_SESSION['user_role'] == 2){
      header("Location: admin/agent.php");
    } else if ($_SESSION['user_role'] == 3){
      header("Location: admin/home.php");
    }
  }
  if(isset($_POST['login'])){

    include_once "objects/user.php";
  
    $user = new User($db);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $user->email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

    if($user->verifyUser()){
      if(password_verify($password, $user->password)){
        //echo "LOgged In";
        if($user->designation == 1){
          $_SESSION['designation'] = 1; /* 1 - customer */
          $_SESSION['user_name'] = $user->full_name;
          
        } else if ($user->designation == 2){
          $_SESSION['designation'] = 2; /* 2 - admin */
          $_SESSION['user_name'] = $user->full_name;
          
        }
        header("Location: home.php");
      } else{
        $error_check["index"]["login_user"] = "no";
      }
    }
    else {
      $error_check["index"]["login_user"] = "no";
    }

    
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Konnect</title>
</head>

<body data-spy="scroll" data-target="#main-nav" id="home">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="main-nav">
    <div class="container">
      <a href="index.html" class="navbar-brand">Konnect</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#explore-section" class="nav-link">Explore</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HOME SECTION -->
  <header id="home-section">
    <div class="dark-overlay">
      <div class="home-inner container">
        <div class="row">
          <div class="col-lg-8 d-none d-lg-block">
            <h1 class="display-4">Come
              <strong>connect</strong> with your
              <strong>friends</strong>
            </h1>
            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                Connect with your friends.
              </div>
            </div>

            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                Chat and share.
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card bg-primary text-center card-form">
              <div class="card-body">
                <h3>Log In</h3>
                <p>Fill in the details</p>
                <?php 
                    if(isset($error_check["index"]["login_user"]) && $error_check["index"]["login_user"] == "no"){
                      echo "<p class='text-danger label'>Please Check Your Login Credentials.</p>";
                    }
                ?>
                <form method="POST" action="">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" placeholder="Enter Email" name="email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
                  </div>
                  <input type="submit" value="Submit" class="btn btn-outline-light btn-block mb-2" name="login">

                  <a href="register.php" class="mt-2">Not Registered? Create an account.</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- EXPLORE SECTION -->
  <section id="explore-section" class="bg-light text-muted py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="img/explore-section1.jpeg" alt="" class="img-fluid mb-3 rounded-circle">
        </div>
        <div class="col-md-6">
          <h3>Explore & Connect</h3>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore reiciendis, voluptate at alias laborum odit aliquid
            tempore perspiciatis repudiandae hic?</p>
          <div class="d-flex">
            <div class="p-4 align-self-start">
              <i class="fas fa-check fa-2x"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?
            </div>
          </div>

          <div class="d-flex">
            <div class="p-4 align-self-start">
              <i class="fas fa-check fa-2x"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <!-- FOOTER -->
  <footer id="main-footer" class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col text-center py-4">
          <h3>Konnect</h3>
          <p>Copyright &copy;
            <span id="year"></span>
          </p>
        </div>
      </div>
    </div>
  </footer>

  


  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    // Init Scrollspy
    $('body').scrollspy({ target: '#main-nav' });

    // Smooth Scrolling
    $("#main-nav a").on('click', function (event) {
      if (this.hash !== "") {
        event.preventDefault();

        const hash = this.hash;

        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function () {

          window.location.hash = hash;
        });
      }
    });
  </script>
</body>

</html>
