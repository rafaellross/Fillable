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
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
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
            
            .btn, #statusSelect {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
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
include 'config.php';
$order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
if($order == ""){
    $sql = "SELECT emp.id, emp.name, emp.phone, (select id from fillable where YEARWEEK(end_week) = YEARWEEK(now()) and employee  = emp.id order by id desc limit 1)  as last_ts from employees emp order by emp.name";    
} else {
    $sql = "SELECT emp.id, emp.name, emp.phone, (select id from fillable where YEARWEEK(end_week) = YEARWEEK(now()) and employee  = emp.id order by id desc limit 1)  as last_ts from employees emp order by " . $order ."";    
}



$query 	= mysqli_query($link, $sql);

$resul = array();

?>
<div class="container">

<h2 style="text-align: center;">Employees</h2>

<hr/>
<div class="form-group row">
<div class="col-md-12 col-lg-12 col-12">         
    <a href="register_employee.php?action=new" class="btn btn-primary">Create New</a>                
    <a href="#" class="btn btn-danger" id="btnDelete">Delete Selected(s)</a>        
    
</div> 

<table class="table table-hover table-responsive-sm">
  <thead>
    <tr>
      <th scope="col"><input type="checkbox" id="chkRow"/></th>          
      <th scope="col"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?order=id"?>">#</a> </th>
      <th scope="col"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?order=name"?>">Name</a></th>
      <th scope="col"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?order=phone"?>">Phone</a></th>      
      <th scope="col"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?order=4 desc, name desc"?>">Time Sheet</a></th>                  
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>

<?php
    while ($row = mysqli_fetch_array($query))
    {
        echo '<tr' . ($row['last_ts'] != "" ? "" : ' style="background-color: red; color: white;"' ) .' ><th ><input type="checkbox" id="chkRow-' . $row['id'] . '"/></th>';
        echo '<td>'.$row['id'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['phone'].'</td>
        <td>' . ($row['last_ts'] == "" ? "No Time Sheet this Week" : '<a class="btn btn-success" href="pdf.php?id='.$row['last_ts'].'" role="button">View</a>').'</td>';        



        echo '<td style="text-align: center;">
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton'.$row['id'].'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton'.$row['id'].'">
                    
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
mysqli_close ($link);

?>    
</div>
</body>
</html>
