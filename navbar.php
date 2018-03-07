<?php
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="brand.ico" width="30" height="30" alt="">
    </a>  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</span></a>
      </li>
      <li class="nav-item" style="<?= ($_SESSION['administrator'] == "1") ? "display: block;" : "display: none;" ;?>">
        <a class="nav-link" href="users.php">Users</a>
      </li>
      <li class="nav-item" style="<?= ($_SESSION['administrator'] == "1") ? "display: block;" : "display: none;" ;?>">
        <a class="nav-link" href="employees.php">Employees</a>
      </li>
      
    </ul>
    <ul class="navbar-nav col-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
                echo $_SESSION['username'];
            ?>        
                
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <?php
            echo '<a class="dropdown-item" href="change_password.php?username='.$_SESSION['username'].'">Change Password</a>          ';
          ?>
          <a class="dropdown-item" href="logout.php">Logout</a>          
        </div>
      </li>
</ul>

  </div>
</nav>




















<!--


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="brand.ico" width="30" height="30" class="d-inline-block align-top" alt="">
        
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown align-self-right">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
         //  echo $_SESSION['username'];
        ?>        
          
        </a>
      </li>
    </ul>
    <div class="align-self-center">
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">                    
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>    
    </div>
    
  </div>
</nav>-->