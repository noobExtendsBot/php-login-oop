<?php 
    include_once  "config/core.php";
    include_once "config/database.php";
    include_once "objects/user.php";
    include_once "utils/error_check.php";
    
    if(!isset($_SESSION['designation'])){
      header("Location: index.php");
    }

    

    $database = new Database();
    $db = $database->getConnection();
    
    $user = new User($db);
    $stmt = $user->getUserList();
    $num = $stmt->rowCount();

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
  <title>Konnect</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <a href="index.php" class="navbar-brand">Konnect</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="index.php" class="nav-link active">Dashboard</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item mr-3">
            <a href="#" class="nav-link">
              <i class="fas fa-user"></i> Welcome <?php if(isset($_SESSION['user_name'])) echo ucwords($_SESSION['user_name']);?>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fas fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>
            <i class="fas fa-cog"></i> <?php 
                            if(isset($_SESSION['designation'])){
                                if($_SESSION['designation'] == 1) {
                                    echo "Welcome Customer";
                                } else {
                                    echo "Welcome Admin";
                                }
                            }
                                
                             ?>
            </h3>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
        <?php 
            if(isset($_SESSION['designation']) && $_SESSION['designation'] == 2){
                echo "<a href='pdf.php' target='_blank' class='btn btn-primary btn-block'>
                <i class='fas fa-download'></i> Download User List
              </a>";
            }
        ?>
          
        </div>
      </div>
    </div>
  </section>

  <!-- USERS -->
  <section id="users">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h4>Latest Users</h4>
              </div>
              <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th>Full Name</th>
                    <th>Email ID</th>
                    <th>Mobile</th>
                    <th>Deg Role</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if($num > 0 ){
                      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "<td>".$row['FullName']."</td>";
                        echo "<td>".$row['Email']."</td>";
                        echo "<td>".$row['Mobile']."</td>";
                        echo "<td>".$row['DegRole']."</td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<div class='alert alert-danger alert-dismissible'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>No Users to show!</strong>
                            </div>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  <!-- FOOTER -->
  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="lead text-center">
            Copyright &copy;
            <span id="year"></span>
            Konnect
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
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    CKEDITOR.replace('editor1');
  </script>
</body>

</html>