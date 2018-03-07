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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
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

        @media only screen and (max-width: 568px) {
            .mobile {
                display: none;
            }            
        }        
    </style>
    <script>
        $(document).ready(function(){
            $('.delete').click(function(){                 
                var result = confirm("Are you sure you want to delete this employee?");                
                if (result == true) {                
                    $(location).attr('href', 'register_employee.php?action=delete&id=' + $(this).attr('id'));
                }                
            });
            
            $("#chkRow").click(function() {
                var checkBoxes = $("input[type=checkbox]").not(this);
                checkBoxes.prop("checked", !checkBoxes.prop("checked"));
            });                  


            $('#btnDelete').click(function(){
                let selecteds = $("input[type=checkbox]:checked").not('#chkRow').length;
                if (selecteds > 0) {
                    let url = 'register_employee.php?action=delete&id=';
                    let ids = Array();
                    $("input[type=checkbox]:checked").not('#chkRow').each(function(){
                        ids.push(this.id.split("-")[1]);                    
                    });
                    var result = confirm("Are you sure you want to delete the selecteds employees?");                
                    if (result == true) {                
                        //window.open(url + ids.join(","), '_blank');
                         $(location).attr('href', url + ids.join(","));
                    }                            
                }
                

            });

            $('#selectStatus').change(function(){
                let url = window.location.href + "&status=" + $(this).val();
                window.location = url;
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

$sql = "SELECT id, name, phone from employees order by name desc";


$query 	= mysqli_query($con, $sql);

$resul = array();

?>
<div class="container">

<h2 style="text-align: center;">Employees</h2>

<hr/>
<div class="form-group row">
    <div class="col-md-12 col-lg-12 col-12">   
        <div class="col-md-3 col-lg-3 col-3 float-left">   
            <a href="register_employee.php?action=new" class="btn btn-primary btn-block">Create New</a>
        </div>
        <div class="col-md-3 col-lg-3 col-3 float-left">   
            <a href="#" class="btn btn-danger btn-block mobile" id="btnDelete">Delete Selected(s)</a>
        </div>

    </div> 
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"><input type="checkbox" id="chkRow"></th>          
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>

<?php
    while ($row = mysqli_fetch_array($query))
    {
        echo '<tr><th ><input type="checkbox" id="chkRow-' . $row['id'] . '"></th>';
        echo '<td>'.$row['id'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['phone'].'</td>';        



        echo '<td style="text-align: center;">
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    
                    <a class="dropdown-item" href="register_employee.php?action=update&id=' . $row['id'] .'">Edit</a>                    
                    <a href="#" id="' . $row['id'] .'" class="dropdown-item delete" >Delete</a>
                    
                    </div>
                </div>        
            
            
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
