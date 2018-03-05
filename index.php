<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fillable Documents</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    <style>

        .list-group-item {
            font-weight: bold;
        }

        .list-group-item:hover {
            background-color: grey;
        }
    </style>
</head>
<body>
    <?php
    include 'navbar.php';
    echo '<div class="container">';
    $dir = "html";

    // Sort in ascending order - this is default
    $files = scandir($dir);

    // Sort in descending order
    $b = scandir($dir,1);

    //print_r($a);

    foreach ($files as $key => $value) {
        //if ($value != '.' && $value != '..' && $value != 'images') {
            //if (!in_array($value, ['.', '..', 'images', 'submit.php'], true)) {   
            if (in_array($value, ['TimeSheet.php'], true)) {   

          echo '<div class="table-striped">            
                    <a href="view.php?type=' . $value . '" class="list-group-item list-group-item-action ">'. $value.'</a>            
                </div>';
        }
        
    }
    echo '</div>';
    ?>    

</body>
</html>


