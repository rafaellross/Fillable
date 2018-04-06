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
    <title>Time Sheet - Select Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){

        $('#btnSearch').click(function(){
            $('#employee').empty();
            let name = $('#search').val();

            $.getJSON( "list-employees.php?name=" + name, function( data ) {
				
                $.each( data.employees, function( key, val ) {
					console.log(val);
                    let emp = `

                        <div class="card ` + (val.last_ts === null ? "" : "bg-warning") + `">
                          <div class="card-header" role="tab" id="heading-undefined">
                            <h6 class="mb-0">
                              <div>
                                <a href="TimeSheet.php?type=TimeSheet.php&empId=` + val.id + ` " style="` + (val.last_ts === null ? "" : "color: white;") + `">
                                  <span> `+ val.name +`</span>
                                  </a>
								<div class="float-right" style="` + (val.last_ts === null ? "display: none" : "display: block;") + `">
								 <i style="margin-right: 20px;">This employee already have a Time Sheet for this week 	&#32;</i>
								<a href="pdf.php?id=` + val.last_ts + `" class="btnAdd btn btn-primary float-right" style="color: white;display:` + (val.last_ts === null ? "none" : "block") + `;" target="_blank">View</a>
								</div>
                                 
                              </div>
                            </h6>
                          </div>
                          </div>
                    `;
                    $('#employee').append(emp);
                });
            });
        });
        $(document).on( "click", ".btnAdd", function() {
            var id = $(this).attr('id');
            var select = Utilities.loadEmployee(id);
            if (!Utilities.containsObject(select, selected)){
                selected.push(select);
                Utilities.updateSeleteds(selected);
                $(this).parent().parent().parent().parent().parent().fadeOut();
            }
        });
    });


    </script>
</head>
<body>
<?php
    include 'navbar.php';
?>
<div class="container">
  <div class="row">
        <input class="form-control form-control-lg" type="text" placeholder="Search Employee" id="search">
  </div>

  <div class="row">
        <button type="button" class="btn btn-info btn-lg btn-block" id="btnSearch">Search</button>
  </div>
  <hr>
  <div id="employee" class="col-xs-12 col-sm-12 col-lg-12 col-md-12"></div>
  <hr>
  <div id="selecteds" class="col-xs-12 col-sm-12 col-lg-12 col-md-12"></div>

</div>

</body>
</html>
