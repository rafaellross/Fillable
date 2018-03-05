<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $type;?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    <style>
        .container {
            width: 80%;
            margin-left: 10%;            
        }

        .table-hover th, td {
            text-align: center;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('.delete').click(function(){                 
                var result = confirm("Are you sure you want to delete this document (#" + $(this).attr('id')  + ")?");                
                if (result == true) {                
                    $(location).attr('href', 'delete.php' + window.location.search + '&id=' + $(this).attr('id'));
                }                
            });
        });
    </script>
</head>
<body>
<?php
include 'navbar.php';
$con = @mysqli_connect('localhost', 'root', '', 'fillable');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}




$sql = "SELECT id, type, DATE_FORMAT(date_created,'%H:%i - %d/%m/%Y') date_created, username, content FROM fillable WHERE type='". $type ."' order by id desc";

$query 	= mysqli_query($con, $sql);

$resul = array();

?>
<div class="container">
<?php
    echo '<h2 style="text-align: center;">' .$type. '</h2>';
?>
<hr/>
<?php

    echo '<a href="html/' . $type . '?user=' . $_SESSION['username'] . '&type='. $type.'" class="btn btn-primary">Create New</a><br>';
?>
<hr/>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Date</th>

<?php
	if($type == "TimeSheet.php"){
		echo '<th scope="col">Employee</th>';
		echo '<th scope="col">Week End</th>';		
	}
?>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>

<?php
    while ($row = mysqli_fetch_array($query))
    {
//        echo '<a href="read/'.$type.'id=' . $row['id'] .'">'. $row['date_created'] .'</a><br>';
        echo '<tr><th scope="row">' .$row['id'] . '</th>
        <td>'.$row['username'].'</td>
        <td>'.$row['date_created'].'</td>';

	if($type == "TimeSheet.php"){
		$data = json_decode($row['content']);
		
		echo '<td>'.$data->empname.'</td>';
		$tsDate = explode("-", $data->weestart);
		echo "<td> $data->weestart</td>";		
	}


        echo '<td style="text-align: center;">
            <a class="btn btn-info" href="pdf.php?id=' . $row['id'] .'" target="_blank">View</a>
            <a id="' . $row['id'] .'" class="btn btn-danger delete" >Delete</a>
        </td>
        </tr>
        ';          
    }
?>    
    </tr>
  </tbody>
</table>
</div>


<?php
    while ($row = mysqli_fetch_array($query))
    {
        echo '<a href="read.php?id=' . $row['id'] .'">'. $row['date_created'] .'</a><br>';
    }
// Close connection
mysqli_close ($con);

?>    
</body>
</html>
