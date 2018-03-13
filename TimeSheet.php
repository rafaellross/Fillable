<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

    $empId = filter_input(INPUT_GET, 'empId', FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);        
    require_once 'config.php';
    
    $con = $link;
    
    
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }

    if ($action == 'update') {
        $newStatus = filter_input(INPUT_GET, 'newStatus', FILTER_SANITIZE_SPECIAL_CHARS); 
        $sql = "UPDATE fillable Set TS_STATUS = '" . $newStatus . "' WHERE id in(" . $id . ");";
        
        mysqli_query($con, $sql);
        
        // Close connection
        mysqli_close ($con);                

        echo "<script>";
        
        echo " alert('Status successfully changed!');      
                window.location.href='view.php?type=TimeSheet.php';
             </script>";    
    }

    //Check if there is employee id as param
    if ($empId != "") {
        $sql = "SELECT id, name FROM employees WHERE id =" . $empId . ";";
    } else {
        //Load Time Sheet
        $sql = "SELECT id, type, content, date_created, ts_status, empSign FROM fillable WHERE id in (" . $id . ");";
    }
   
        
    $query 	= mysqli_query($con, $sql);    
    
    //This if for new time sheet
    if ($empId != "") {
        $empName =  mysqli_fetch_array($query)[1];
    } else {
        $data = mysqli_fetch_array($query);
        $ts_status = $data['ts_status'];
        $empSign = $data['empSign'];
        $data = json_decode($data['content']);        
        $empName = $data->empname;
    }
//print_r($data);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>    
    <script src="js/jquery.mask.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    
    
    <title>Time Sheet</title>
</head>
<body>

<?php
include 'navbar.php';
?>

    <div class="container">
        <!-- Logo -->        
            <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center">    
                <img src="images/logo.jpg" alt="Smart Plumbing Solutions" class="img-fluid" style="padding: 1em;">
            </div>                
        <!-- Title -->        
        <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center">    
            <h2>Time Sheet</h2>
        </div>                
        <div class="col-xs-12 col-sm-12 col-md-12">    
        <?php
            $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
            
            echo '<form method="post" name="fillable_form" action="submit.php?type='.$type.'&user='.$_SESSION['username'].'">';
        ?>            
                <input type="hidden" name="timeSheetId" value="<?= ($id != "") ? $id : "" ;?>">                    
                <input type="hidden" name="empId" value="<?= ($empId != "") ? $empId : "" ;?>">                    
                <div class="form-group">
                    <label for="empname">
                        <h5>Name:</h5>
                    </label>
                    <input readonly type="text" class="form-control form-control-lg" name="empname" id="empname" placeholder="Type employee name" value="<?= $empName;?>" required>                    
                </div>       
                <div class="form-group">
                    <label for="empname">
                        <h5>Week End:</h5>
                    </label>                    
                    <input type="text" class="form-control form-control-lg date-picker" name="weestart" id="weestart" required value="<?= (isset($data->weestart)) ? $data->weestart : "" ;?>">                    
                </div>      
                <!-- Start Group Prefill-->                 
                <div class="form-group alert alert-info" role="alert" id="groupPre">                                        
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" id="pre">
                                <strong style="padding-left: 5px;"> Special Leave?</strong>
                            </div>
                        </div>                    
                
                    <h4 style="text-align: center;">Autofill Time Sheet</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>
                                <!--
                                <input type="text" class="form-control form-control-lg time" id="preStart" name="preStart" value="07:00">
                                -->
                                <select class="hour-start form-control form-control-lg custom-select " id="preStart" onchange="calc(preStart, preEnd, preHours)">                                    
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;                                            
                                                echo '<option value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>
                                </select>                                
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <select class="hour-start form-control form-control-lg custom-select " id="preEnd" onchange="calc(preStart, preEnd, preHours)">                                    
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;                                            
                                                echo '<option value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>
                                </select>                                
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg" id="preJob" value="001">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time" id="preHours" value="08:00">
                            </div>                                        
                        </div> 
                        <div class="col-md-12 mb-3">
                                <button type="button" class="btn btn-secondary btn-lg btn-block" id="btnPreFill">Autofill Time Sheet</button>
                        </div>
                    
                </div>               
                <!-- Start Group Monday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupMonday">                                        
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" id="mon">
                                <strong style="padding-left: 5px;"> Special Leave?</strong>
                            </div>
                        </div>                    
                
                        <h4 style="text-align: center;">Monday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select start" id="monStart" name="monStart" onchange="calc(monStart, monEnd, hrsMon)">                                
                                <option value="">-</option>
                                <?php                                
                                    for ($i=0; $i <= 23; $i++) {                                         
                                        $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                        for ($j=0; $j < 60; $j+=15) { 
                                            $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                            $finalHour = $hour . ':' .$minutes;
                                            $selected = (isset($data->monStart) && $data->monStart == $finalHour) ? "selected" : "" ;
                                            echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                        }                                        
                                    }
                                ?>
                                </select>                                
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <select class="hour-start form-control form-control-lg custom-select end" id="monEnd" name="monEnd" onchange="calc(monStart, monEnd, hrsMon)">                                
                                <option value="">-</option>
                                <?php                                
                                    for ($i=0; $i <= 23; $i++) {                                         
                                        $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                        for ($j=0; $j < 60; $j+=15) { 
                                            $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                            $finalHour = $hour . ':' .$minutes;
                                            $selected = (isset($data->monEnd) && $data->monEnd == $finalHour) ? "selected" : "" ;
                                            echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                        }                                        
                                    }
                                ?>
                                </select>                                

                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobMon" value="<?= (isset($data->jobMon)) ? $data->jobMon : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsMon" value="<?= (isset($data->hrsMon)) ? $data->hrsMon : "" ;?>">                    
                            </div>                                        
                        </div>                                                                
                    
                </div>
                <!--End Group Monday -->
                <!-- Start Group Tuesday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupTuesday">                                        
                    <div class="input-group-prepend">
                        <div class="input-group-text" >
                            <input type="checkbox" id="tue">
                            <strong style="padding-left: 5px;"> Special Leave?</strong>
                        </div>
                    </div>                    
                
                    <h4 style="text-align: center;">Tuesday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Start</label>
                                <select class="hour-start form-control form-control-lg custom-select start" name="tueStart" id="tueStart"  onchange="calc(tueStart, tueEnd, hrsTue)">
                                    <option value="">-</option>
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;
                                                $selected = (isset($data->tueStart) && $data->tueStart == $finalHour) ? "selected" : "" ;
                                                echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>                                
                                <select class="hour-start form-control form-control-lg custom-select end" name="tueEnd" id="tueEnd"  onchange="calc(tueStart, tueEnd, hrsTue)">
                                    <option value="">-</option>
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;
                                                $selected = (isset($data->tueEnd) && $data->tueEnd == $finalHour) ? "selected" : "" ;
                                                echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>
                                </select>                                
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobTue" value="<?= (isset($data->jobTue)) ? $data->jobTue : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsTue" value="<?= (isset($data->hrsTue)) ? $data->hrsTue : "" ;?>">                    
                            </div>                                        
                        </div>                                                                
                    
                </div>
                <!--End Group Tuesday -->
                <!-- Start Group Wednesday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupWednesday">                                        
                <div class="input-group-prepend">
                        <div class="input-group-text" >
                            <input type="checkbox" id="wed">
                            <strong style="padding-left: 5px;"> Special Leave?</strong>
                        </div>
                    </div>                    

                    <h4 style="text-align: center;">Wednesday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select start" name="wedStart" id="wedStart"  onchange="calc(wedStart, wedEnd, hrsWed)">
                                    <option value="">-</option>
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;
                                                $selected = (isset($data->wedStart) && $data->wedStart == $finalHour) ? "selected" : "" ;
                                                echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>
                                </select>                                                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>                                
                                <select class="hour-start form-control form-control-lg custom-select end" name="wedEnd" id="wedEnd"  onchange="calc(wedStart, wedEnd, hrsWed)">
                                    <option value="">-</option>
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;
                                                $selected = (isset($data->wedEnd) && $data->wedEnd == $finalHour) ? "selected" : "" ;
                                                echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>                           
                                </select>                                                                                                
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobWed" value="<?= (isset($data->jobWed)) ? $data->jobWed : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsWed" id="hrsWed" value="<?= (isset($data->hrsWed)) ? $data->hrsWed : "" ;?>">                    
                            </div>                                        
                        </div>                                                                
                    
                </div>
                <!--End Group Wednesday -->
                <!-- Start Group Thursday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupThursday">                                        
                <div class="input-group-prepend">
                        <div class="input-group-text" >
                            <input type="checkbox" id="thu">
                            <strong style="padding-left: 5px;"> Special Leave?</strong>
                        </div>
                    </div>                    
                
                    <h4 style="text-align: center;">Thursday</h4>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select start" name="thuStart" id="thuStart"  onchange="calc(thuStart, thuEnd, hrsThu)">
                                    <option value="">-</option>
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;
                                                $selected = (isset($data->thuStart) && $data->thuStart == $finalHour) ? "selected" : "" ;
                                                echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>
                                </select>                                                                                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>                                
                                <select class="hour-start form-control form-control-lg custom-select end" name="thuEnd" id="thuEnd" onchange="calc(thuStart, thuEnd, hrsThu)">
                                <option value="">-</option>
                                <?php                                
                                    for ($i=0; $i <= 23; $i++) {                                         
                                        $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                        for ($j=0; $j < 60; $j+=15) { 
                                            $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                            $finalHour = $hour . ':' .$minutes;
                                            $selected = (isset($data->thuEnd) && $data->thuEnd == $finalHour) ? "selected" : "" ;
                                            echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                        }                                        
                                    }
                                ?>                            
                                </select>                                                                
                                
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobThu" value="<?= (isset($data->jobThu)) ? $data->jobThu : "" ;?>">                    
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsThu" id="hrsThu" value="<?= (isset($data->hrsThu)) ? $data->hrsThu : "" ;?>">                    
                            </div>                                        
                        </div>                                                                
                    
                </div>                
                <!--End Group Thursday -->                
                <!-- Start Group Friday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupFriday">                                        
                <div class="input-group-prepend">
                        <div class="input-group-text" >
                            <input type="checkbox" id="fri">
                            <strong style="padding-left: 5px;"> Special Leave?</strong>
                        </div>
                    </div>                                    
                    <h4 style="text-align: center;">Friday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select start" name="friStart" id="friStart"  onchange="calc(friStart, friEnd, hrsFri)">
                                    <option value="">-</option>
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;
                                                $selected = (isset($data->friStart) && $data->friStart == $finalHour) ? "selected" : "" ;
                                                echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>                           
                                </select>                                                                                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>                                
                                <select class="hour-start form-control form-control-lg custom-select end" name="friEnd" id="friEnd"  onchange="calc(friStart, friEnd, hrsFri)">
                                    <option value="">-</option>
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;
                                                $selected = (isset($data->friEnd) && $data->friEnd == $finalHour) ? "selected" : "" ;
                                                echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>
                                </select>                                                                                                                                
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobFri" value="<?= (isset($data->jobFri)) ? $data->jobFri : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsFri" id="hrsFri" value="<?= (isset($data->hrsFri)) ? $data->hrsFri : "" ;?>">                    
                            </div>                                        
                        </div>                                                                                    
                </div>  
                <!-- Start Group Saturday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupFriday">                                        
                    <h4 style="text-align: center;">Saturday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select" name="satStart" id="satStart"  onchange="calc(satStart, satEnd, hrsSat)">
                                    <option value="">-</option>
                                    <?php                                
                                        for ($i=0; $i <= 23; $i++) {                                         
                                            $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                            for ($j=0; $j < 60; $j+=15) { 
                                                $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                $finalHour = $hour . ':' .$minutes;
                                                $selected = (isset($data->satStart) && $data->satStart == $finalHour) ? "selected" : "" ;
                                                echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                            }                                        
                                        }
                                    ?>                              
                                </select>                                                                                                                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>                                
                                <select class="hour-start form-control form-control-lg custom-select" name="satEnd" id="satEnd"  onchange="calc(satStart, satEnd, hrsSat)">
                                <option value="">-</option>
                                <?php                                
                                    for ($i=0; $i <= 23; $i++) {                                         
                                        $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                        for ($j=0; $j < 60; $j+=15) { 
                                            $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                            $finalHour = $hour . ':' .$minutes;
                                            $selected = (isset($data->satEnd) && $data->satEnd == $finalHour) ? "selected" : "" ;
                                            echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';                                                                            
                                        }                                        
                                    }
                                ?>                           
                                </select>                                                                                                                                                                
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobSat" value="<?= (isset($data->jobSat)) ? $data->jobSat : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsSat" id="hrsSat" value="<?= (isset($data->hrsSat)) ? $data->hrsSat : "" ;?>" >                    
                            </div>                                        
                        </div>                                                                                   
                </div>   
                <!-- Start Group Total-->                 
                <div class="form-group alert alert-success" role="alert">                                        
                    <h4 style="text-align: center;">Total Week</h4>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-12 mb-3">                                
                                <input readonly type="text" class="form-control form-control-lg time totalWeek" name="totalWeek" id="totalWeek" value="<?= (isset($data->totalWeek)) ? $data->totalWeek : "" ;?>">                    
                            </div>
                        </div>                                                            
                </div>                                             
                <!--End Group Total -->       
                <!-- Start Group Signature-->                 
                <div class="form-group alert alert-success" role="alert" id="groupFriday">                                        
                    <h4 style="text-align: center;">Signature</h4>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-12 mb-3">                                
                                <!-- you load jquery somewhere above here ... -->
                                <!--[if lt IE 9]>
                                <script type="text/javascript" src="js/flashcanvas.js"></script>
                                <![endif]-->
                                <script src="js/jSignature.min.js"></script>                                
                                <input type="hidden" name="empSign" id="output" value="<?= (isset($empSign)) ? $empSign : "" ;?>">
                                <?php
                                    if (isset($empSign)) {
                                       echo '<img src="'.$empSign.'">';
                                    } else {
                                       echo '<div id="signature"></div>';
                                       
                                       echo '<input type="button" value="Clear" id="btnClearSign" class="btn btn-danger" >';
                                    }                                                                    
                                ?>
                                <script>
                                    $(document).ready(function() {
                                        var $sigdiv = $("#signature")
                                        $sigdiv.jSignature() // inits the jSignature widget.
                                        // after some doodling...
                                        $('#btnClearSign').click(function(){
                                            $sigdiv.jSignature("reset") // clears the canvas and rerenders the decor on it.
                                        });

                                       $('form').submit(function(){
                                           $('#output').val($sigdiv.jSignature("getData"));
                                       });
                                    });
                                </script>                                
                            </div>
                        </div>                                                                                 
                </div>                                             
                <!-- Start Group Date-->                 
                <div class="form-group alert alert-success" role="alert" id="groupFriday">                                        
                    <h4 style="text-align: center;">Date</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-12 mb-3">                                
                                <input type="text" class="form-control form-control-lg date-picker" name="empDate" id="empDate" required value="<?= (isset($data->empDate)) ? $data->empDate : date("d/m/Y") ;?>">                    
                            </div>
                        </div>                                                                                    
                </div>                                             
                <!-- Start Group Date-->                 
                <div class="form-group alert alert-success" role="alert" id="groupStatus" style="<?= (!$_SESSION['administrator'] ? "display:none" : "" ) ?>">                                        
                    <h4 style="text-align: center;">Status</h4>                    
                    <?php //print_r($ts_status);?>
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-12 mb-3">                                
                                <div class="form-group">
                                  <label for="status">Status</label>
                                  <select class="form-control" name="status" id="">
                                    <option <?= (!isset($ts_status) || $ts_status == "P") ? "selected" : "" ;?> value="P">Pending</option>
                                    <option <?= ($ts_status == "A") ? "selected" : "" ;?> value="A">Approved</option>
                                    <option <?= ($ts_status == "C") ? "selected" : "" ;?> value="C">Cancelled</option>
                                  </select>
                                </div>
                            </div>
                        </div>                                                                                    
                </div>                                             
                
                <!--End Group Total -->                       
                <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <a href="view.php?type=TimeSheet.php" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                            </div>                                        
                        </div>                                                                                        

                <?= "    </form>"; ?>                
        
        </div>        
    </div>

    <script>
        $(document).ready(function(){

            $('input[type=checkbox]').change(function(){
                
                let nameEnd = $(this).attr('id') + 'End';
                let nameStart = $(this).attr('id') + 'Start';
                console.log(nameEnd);
                if ($(this).prop('checked')) {
                    $('input[name=' + nameEnd + ']').val("").parent().hide();
                    $('input[name=' + nameStart + ']').parent().removeClass( "col-md-6" ).addClass( "col-md-12" );
                    $('input[name=' + nameStart + ']').val("").unmask().siblings().empty().append("Description");    
                    
                } else {
                    $('input[name=' + nameEnd + ']').parent().show();
                    $('input[name=' + nameStart + ']').parent().removeClass( "col-md-12" ).addClass( "col-md-6" );
                    $('input[name=' + nameStart + ']').mask('00:00').siblings().empty().append("Start");                        
                }
            });

            $('#btnPreFill').click(function(){
                if($('#pre').prop('checked')){
                    $('input[type=checkbox]').not('#pre').attr('checked', true);
                    $('input[type=checkbox]').not('#pre').trigger('change');
                }
            });

            $('#weestart').datepicker({format: 'dd/mm/yyyy'});
            $('#empDate').datepicker({format: 'dd/mm/yyyy'});
            $('.time').mask('00:00');		

            $('#btnPreFill').click(function(){
                let preStart = $('#preStart').val();       
                $('.start').not('input[name=satStart]').val(preStart);

                let preEnd = $('#preEnd').val();
                $('.end').not('input[name=satEnd]').val(preEnd);
                
                let preJob = $('#preJob').val();
                $('.job').not('input[name=jobSat]').val(preJob);

                let preHours = $('#preHours').val();
                $('.hours').not('input[name=hrsSat]').val(preHours);
                calcTotal();
            });

            calc = function(startHour_param, endHour_param, destination_param) {
                let startHour = $(startHour_param).val();
                let endHour = $(endHour_param).val();
                let destination = $(destination_param);
                function D(J){ 
                    return (J<10? '0':'') + J;
                };
                var startPiece = startHour.split(':');
                var startMins = startPiece[0]*60 + +startPiece[1];

                var endPiece = endHour.split(':');
                var endMins = endPiece[0]*60 + +endPiece[1];
                var totalMins = endMins - startMins -15;
                if(startHour !== "00:00" && endHour !== "00:00"){
                    if (!isNaN(totalMins)) {                    
                        destination.val(D(totalMins%(24*60)/60 | 0) + ':' + D(totalMins%60));                      
                    }
                                    
                }
                calcTotal();                
            }                             

            calcTotal = function() {
                
                let totalWeekMins = 0;

                $('.hours').each(function(){
                    var totalDay = $(this).val().split(':');
                    var curr = $(this);
                    var totalMins = 0;
                    totalMins = totalDay[0]*60 + +totalDay[1];
                    totalWeekMins += (!isNaN(totalMins) ? totalMins : 0);
                });
                
                function D(J){ 
                    return (J<10? '0':'') + J;
                };  
                var hours = D(totalWeekMins/60 | 0);
                var minutes = D(totalWeekMins%60);
                var totalWeek = D(totalWeekMins/60 | 0) + ':' + D(totalWeekMins%60);  
                $('#totalWeek').val(totalWeek);  
            }                             
        });
    </script>
</body>
</html>