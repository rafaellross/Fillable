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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="brand.ico" />
    <link rel="apple-touch-icon" href="brand.png">	                
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

            if ($(window).width() <= 868) {  

                //$("table").addClass('.table-responsive');

            }     

            $('#btnStatus').click(function(){
                let selecteds = $("input[type=checkbox]:checked").not('#chkRow').length;
                if (selecteds > 0) {                                    
                    $('#modalChangeStatus').modal('show');
                }
            });          

            $('#btnSaveStatus').click(function(){
                let selecteds = $("input[type=checkbox]:checked").not('#chkRow').length;
                if (selecteds > 0) {                                       
                    let url = "TimeSheet.php?id=";
                    let ids = Array();
                    $("input[type=checkbox]:checked").not('#chkRow').each(function(){
                        ids.push(this.id.split("-")[1]);                    
                    });    
                    let newStatus = $("select[name=changeStatus]").val();
                    $(location).attr('href', url + ids.join(",") + "&action=update&newStatus=" + newStatus);                                    
                }
                
            });
          
            $('.delete').click(function(){                 
                var result = confirm("Are you sure you want to delete this document (#" + $(this).attr('id')  + ")?");                
                if (result == true) {                
                    $(location).attr('href', 'delete.php' + window.location.search + '&id=' + $(this).attr('id'));
                }                
            });
            
            $("#chkRow").click(function() {
                var checkBoxes = $("input[type=checkbox]").not(this);
                checkBoxes.prop("checked", !checkBoxes.prop("checked"));
            });                  

            $('#btnPrint').click(function(){
                let selecteds = $("input[type=checkbox]:checked").not('#chkRow').length;
                if (selecteds > 0) {                
                    let url = "pdf.php?id=";
                    let ids = Array();
                    $("input[type=checkbox]:checked").not('#chkRow').each(function(){
                        ids.push(this.id.split("-")[1]);                    
                    });

                    window.open(url + ids.join(","), '_blank');
                }
            });

            $('#btnDelete').click(function(){
                let selecteds = $("input[type=checkbox]:checked").not('#chkRow').length;
                if (selecteds > 0) {
                    let url = 'delete.php' + window.location.search + '&id=';
                    let ids = Array();
                    $("input[type=checkbox]:checked").not('#chkRow').each(function(){
                        ids.push(this.id.split("-")[1]);                    
                    });
                    var result = confirm("Are you sure you want to delete following documents: " + ids  + "?");                
                    if (result == true) {    
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



	if(!isset($_GET['status'])){
		$filter_status = "= 'P'";
	} else if($_GET['status'] == 'all'){
		$filter_status = "is not null";
	} else {
		$filter_status = "= '" . $_GET['status'] . "' ";	
	}



if ($_SESSION['administrator']) {
    $sql = "SELECT id, type, DATE_FORMAT(date_created,'%d/%m/%Y') date_created, username, content, ts_status as status FROM fillable WHERE ts_status " . $filter_status . " and type='". $type ."' order by id desc";
} else {
    $sql = "SELECT id, type, DATE_FORMAT(date_created,'%d/%m/%Y') date_created, username, content, ts_status as status FROM fillable WHERE ts_status " . $filter_status . " and type='". $type ."' and username='".$_SESSION['username']."' order by id desc";
}



$query 	= mysqli_query($link, $sql);

$resul = array();

?>
<div class="container-fluid">

    <h2 style="text-align: center;">Time Sheet</h2>

<hr/>

    <div class="col-md-12 col-lg-12 col-12">           
            <?php echo '<a href="select-employee.php?user=' . $_SESSION['username'] . '&type='. $type.'" class="btn btn-primary">Create New</a>';    ?>            
            <button class="btn btn-danger mobile" id="btnDelete">Delete Selected(s)</button>
            <button class="btn btn-info" id="btnPrint" style="<?= (!$_SESSION['administrator'] ? "display:none" : "" ) ?>">Print Selected(s)</button>            
            <button class="btn btn-secondary" id="btnStatus" style="<?= (!$_SESSION['administrator'] ? "display:none" : "" ) ?>">Change Status</button>            
            <div style="float: right;" id="statusSelect">
                <select class="custom-select mb-4" id="selectStatus">
                    <option selected>Status...</option>
                    <option value="all">All</option>
                    <option value="A">Approved</option>        
                    <option value="P">Pending</option>
                    <option value="C">Cancelled</option>
                </select>            
            
            </div>    
    </div>





<table class="table table-hover table-responsive-sm">
  <thead>
    <tr>
      <th scope="col" class="mobile"><input type="checkbox" id="chkRow"></th>    
      <th scope="col" class="mobile">#</th>
      <th scope="col">User</th>
      <th scope="col" class="mobile">Date</th>

<?php
	if($type == "TimeSheet.php"){
		echo '<th scope="col">Employee</th>';
        echo '<th scope="col">Week End</th>';		
		echo '<th scope="col">Status</th>';		        
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
        echo '<tr class="'.$row['status'].'"><th class="mobile" ><input type="checkbox" id="chkRow-' . $row['id'] . '"></th>';
        echo '<th class="mobile" scope="row">' .$row['id'] . '</th>
        <td>'.$row['username'].'</td>
        <td class="mobile">'.$row['date_created'].'</td>';

	if($type == "TimeSheet.php"){
		$data = json_decode($row['content']);		
		echo '<td>'.$data->empname.'</td>';
		
        echo "<td> $data->weestart</td>";		
        
        switch ($row['status']) {
            case 'A':
                echo "<td>Approved</td>";		        
                break;
            case 'P':
                echo "<td>Pending</td>";		        
                break;
                case 'C':
                echo "<td>Cancelled</td>";		        
                break;            
            default:
                echo "<td>Pending</td>";		        
                break;
        }
	}


        echo '<td style="text-align: center;">
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="pdf.php?id=' . $row['id'] .'" target="_blank">View</a>
                    <a class="dropdown-item" href="TimeSheet.php?user=' . $_SESSION['username'] . '&type=TimeSheet.php&id=' . $row['id'] .'" style="'. (($_SESSION['administrator'] != "1" && $row['status'] != 'P') ? "display: none;" : "" ) .'">Edit</a>                    

                    <a href="#" id="' . $row['id'] .'" class="dropdown-item delete" style="'. (($_SESSION['administrator'] != "1" && $row['status'] != 'P') ? "display: none;" : "" ) .'">Delete</a>
                    
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

<div class="modal" tabindex="-1" role="dialog" id="modalChangeStatus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select new status:</label>
            <select class="form-control" name="changeStatus">
                <option value="P">Pending</option>
                <option value="A">Approved</option>
                <option value="C">Cancelled</option>
            </select>
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnSaveStatus">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
