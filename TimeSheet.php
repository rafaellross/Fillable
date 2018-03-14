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
                                <select class="hour-start form-control form-control-lg custom-select " id="preStart" onchange="calc(preStart, preEnd, preHours, Pre15, Pre20, PreNormal)">                                    
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
                                <select class="hour-start form-control form-control-lg custom-select " id="preEnd" onchange="calc(preStart, preEnd, preHours, Pre15, Pre20, PreNormal)">                                    
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
                            <div class="col-md-12 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg" id="preJob" value="001">
                            </div>
                        </div> 
                        <div class="form-row overtime" style="text-align: center;">                        
                            <div class="col-md-6 mb-3">
                                <label>Normal Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time " name="PreNormal" id="PreNormal" value="00:00">                    
                            </div>                        
                            <div class="col-md-6 mb-3">
                                <label>Hours 1.5</label>
                                <input readonly type="text" class="form-control form-control-lg time " name="Pre15" id="Pre15" value="00:00">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours 2.0</label>
                                <input readonly type="text" class="form-control form-control-lg time" name="Pre20" id="Pre20" value="00:00">                    
                            </div>   
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time" id="preHours" value="00:00">
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
                                <select class="hour-start form-control form-control-lg custom-select start" id="monStart" name="monStart" onchange="calc(monStart, monEnd, hrsMon, Mon15, Mon20, MonNorm)">                                
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
                                <select class="hour-start form-control form-control-lg custom-select end" id="monEnd" name="monEnd" onchange="calc(monStart, monEnd, hrsMon, Mon15, Mon20, MonNorm)">                                
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
                        <!-- Job and Hours-->                   
                        <div class="form-row alert alert-secondary" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobMon1" value="<?= (isset($data->jobMon1)) ? $data->jobMon1 : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input type="text" class="form-control form-control-lg time job1" name="hrsMon1" value="<?= (isset($data->hrsMon1)) ? $data->hrsMon1 : "" ;?>">                    
                            </div>                                        
                            <button type="button" class="btn btn-secondary btn-sm" id="btnShowExtra" onclick="showExtra(this, extraJobsMon)">Show More Jobs</button>
                        </div>                                            
                        <div id="extraJobsMon" style="display:none;">
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 2</label>
                                    <input type="text" class="form-control form-control-lg" name="jobMon2" value="<?= (isset($data->jobMon2)) ? $data->jobMon2 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsMon2" value="<?= (isset($data->hrsMon2)) ? $data->hrsMon2 : "" ;?>">                    
                                </div>                                        
                            </div>                                            
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 3</label>
                                    <input type="text" class="form-control form-control-lg" name="jobMon3" value="<?= (isset($data->jobMon3)) ? $data->jobMon3 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsMon3" value="<?= (isset($data->hrsMon3)) ? $data->hrsMon3 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 4</label>
                                    <input type="text" class="form-control form-control-lg" name="jobMon4" value="<?= (isset($data->jobMon4)) ? $data->jobMon4 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsMon4" value="<?= (isset($data->hrsMon4)) ? $data->hrsMon4 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                

                        </div>                    
                                            
                        <!-- Job and Hours-->                   
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Normal Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time horNormal" name="MonNorm" id="MonNorm" value="<?= (isset($data->MonNorm)) ? $data->MonNorm : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours 1.5</label>
                                <input readonly type="text" class="form-control form-control-lg time hor15" name="Mon15" id="Mon15" value="<?= (isset($data->Mon15)) ? $data->Mon15 : "" ;?>">                    
                            </div>
                        </div>                                                                                    
                        
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Hours 2.0</label>
                                <input readonly type="text" class="form-control form-control-lg time hor20" name="Mon20" id="Mon20" value="<?= (isset($data->Mon20)) ? $data->Mon20 : "" ;?>">                    
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
                            <div class="input-group-text">
                                <input type="checkbox" id="tue">
                                <strong style="padding-left: 5px;"> Special Leave?</strong>
                            </div>
                        </div>                    
                
                        <h4 style="text-align: center;">Tuesday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select start" id="tueStart" name="tueStart" onchange="calc(tueStart, tueEnd, hrsTue, Tue15, Tue20, TueNorm)">                                
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
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <select class="hour-start form-control form-control-lg custom-select end" id="tueEnd" name="tueEnd" onchange="calc(tueStart, tueEnd, hrsTue, Tue15, Tue20, TueNorm)">                                
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
                        <!-- Job and Hours-->                   
                        <div class="form-row alert alert-secondary" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobTue1" value="<?= (isset($data->jobTue1)) ? $data->jobTue1 : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input type="text" class="form-control form-control-lg time job1" name="hrsTue1" value="<?= (isset($data->hrsTue1)) ? $data->hrsTue1 : "" ;?>">                    
                            </div>                                        
                            <button type="button" class="btn btn-secondary btn-sm" id="btnShowExtra" onclick="showExtra(this, extraJobsTue)">Show More Jobs</button>
                        </div>                                            
                        <div id="extraJobsTue" style="display:none;">
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 2</label>
                                    <input type="text" class="form-control form-control-lg" name="jobTue2" value="<?= (isset($data->jobTue2)) ? $data->jobTue2 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsTue2" value="<?= (isset($data->hrsTue2)) ? $data->hrsTue2 : "" ;?>">                    
                                </div>                                        
                            </div>                                            
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 3</label>
                                    <input type="text" class="form-control form-control-lg" name="jobTue3" value="<?= (isset($data->jobTue3)) ? $data->jobTue3 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsTue3" value="<?= (isset($data->hrsTue3)) ? $data->hrsTue3 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 4</label>
                                    <input type="text" class="form-control form-control-lg" name="jobTue4" value="<?= (isset($data->jobTue4)) ? $data->jobTue4 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsTue4" value="<?= (isset($data->hrsTue4)) ? $data->hrsTue4 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                

                        </div>                    
                                            
                        <!-- Job and Hours-->                   
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Normal Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time horNormal" name="TueNorm" id="TueNorm" value="<?= (isset($data->TueNorm)) ? $data->TueNorm : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours 1.5</label>
                                <input readonly type="text" class="form-control form-control-lg time hor15" name="Tue15" id="Tue15" value="<?= (isset($data->Tue15)) ? $data->Tue15 : "" ;?>">                    
                            </div>
                        </div>                                                                                    
                        
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Hours 2.0</label>
                                <input readonly type="text" class="form-control form-control-lg time hor20" name="Tue20" id="Tue20" value="<?= (isset($data->Tue20)) ? $data->Tue20 : "" ;?>">                    
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
                            <div class="input-group-text">
                                <input type="checkbox" id="wed">
                                <strong style="padding-left: 5px;"> Special Leave?</strong>
                            </div>
                        </div>                    
                
                        <h4 style="text-align: center;">Wednesday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select start" id="wedStart" name="wedStart" onchange="calc(wedStart, wedEnd, hrsWed, Wed15, Wed20, WedNorm)">                                
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
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <select class="hour-start form-control form-control-lg custom-select end" id="wedEnd" name="wedEnd" onchange="calc(wedStart, wedEnd, hrsWed, Wed15, Wed20, WedNorm)">                                
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
                        <!-- Job and Hours-->                   
                        <div class="form-row alert alert-secondary" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobWed1" value="<?= (isset($data->jobWed1)) ? $data->jobWed1 : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input type="text" class="form-control form-control-lg time job1" name="hrsWed1" value="<?= (isset($data->hrsWed1)) ? $data->hrsWed1 : "" ;?>">                    
                            </div>                                        
                            <button type="button" class="btn btn-secondary btn-sm" id="btnShowExtra" onclick="showExtra(this, extraJobsWed)">Show More Jobs</button>
                        </div>                                            
                        <div id="extraJobsWed" style="display:none;">
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 2</label>
                                    <input type="text" class="form-control form-control-lg" name="jobWed2" value="<?= (isset($data->jobWed2)) ? $data->jobWed2 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsWed2" value="<?= (isset($data->hrsWed2)) ? $data->hrsWed2 : "" ;?>">                    
                                </div>                                        
                            </div>                                            
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 3</label>
                                    <input type="text" class="form-control form-control-lg" name="jobWed3" value="<?= (isset($data->jobWed3)) ? $data->jobWed3 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsWed3" value="<?= (isset($data->hrsWed3)) ? $data->hrsWed3 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 4</label>
                                    <input type="text" class="form-control form-control-lg" name="jobWed4" value="<?= (isset($data->jobWed4)) ? $data->jobWed4 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsWed4" value="<?= (isset($data->hrsWed4)) ? $data->hrsWed4 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                

                        </div>                    
                                            
                        <!-- Job and Hours-->                   
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Normal Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time horNormal" name="WedNorm" id="WedNorm" value="<?= (isset($data->WedNorm)) ? $data->WedNorm : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours 1.5</label>
                                <input readonly type="text" class="form-control form-control-lg time hor15" name="Wed15" id="Wed15" value="<?= (isset($data->Wed15)) ? $data->Wed15 : "" ;?>">                    
                            </div>
                        </div>                                                                                    
                        
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Hours 2.0</label>
                                <input readonly type="text" class="form-control form-control-lg time hor20" name="Wed20" id="Wed20" value="<?= (isset($data->Wed20)) ? $data->Wed20 : "" ;?>">                    
                            </div>                                        
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsWed" value="<?= (isset($data->hrsWed)) ? $data->hrsWed : "" ;?>">                    
                            </div>                                                                    
                        </div>                                                                                                            
                </div>
                <!--End Group Wednesday -->
                <!-- Start Group Thursday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupThursday">                                        
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" id="thu">
                                <strong style="padding-left: 5px;"> Special Leave?</strong>
                            </div>
                        </div>                    
                
                        <h4 style="text-align: center;">Thursday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select start" id="thuStart" name="thuStart" onchange="calc(thuStart, thuEnd, hrsThu, Thu15, Thu20, ThuNorm)">                                
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
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <select class="hour-start form-control form-control-lg custom-select end" id="thuEnd" name="thuEnd" onchange="calc(thuStart, thuEnd, hrsThu, Thu15, Thu20, ThuNorm)">                                
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
                        <!-- Job and Hours-->                   
                        <div class="form-row alert alert-secondary" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobThu1" value="<?= (isset($data->jobThu1)) ? $data->jobThu1 : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input type="text" class="form-control form-control-lg time job1" name="hrsThu1" value="<?= (isset($data->hrsThu1)) ? $data->hrsThu1 : "" ;?>">                    
                            </div>                                        
                            <button type="button" class="btn btn-secondary btn-sm" id="btnShowExtra" onclick="showExtra(this, extraJobsThu)">Show More Jobs</button>
                        </div>                                            
                        <div id="extraJobsThu" style="display:none;">
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 2</label>
                                    <input type="text" class="form-control form-control-lg" name="jobThu2" value="<?= (isset($data->jobThu2)) ? $data->jobThu2 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsThu2" value="<?= (isset($data->hrsThu2)) ? $data->hrsThu2 : "" ;?>">                    
                                </div>                                        
                            </div>                                            
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 3</label>
                                    <input type="text" class="form-control form-control-lg" name="jobThu3" value="<?= (isset($data->jobThu3)) ? $data->jobThu3 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsThu3" value="<?= (isset($data->hrsThu3)) ? $data->hrsThu3 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 4</label>
                                    <input type="text" class="form-control form-control-lg" name="jobThu4" value="<?= (isset($data->jobThu4)) ? $data->jobThu4 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsThu4" value="<?= (isset($data->hrsThu4)) ? $data->hrsThu4 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                

                        </div>                    
                                            
                        <!-- Job and Hours-->                   
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Normal Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time horNormal" name="ThuNorm" id="ThuNorm" value="<?= (isset($data->ThuNorm)) ? $data->ThuNorm : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours 1.5</label>
                                <input readonly type="text" class="form-control form-control-lg time hor15" name="Thu15" id="Thu15" value="<?= (isset($data->Thu15)) ? $data->Thu15 : "" ;?>">                    
                            </div>
                        </div>                                                                                    
                        
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Hours 2.0</label>
                                <input readonly type="text" class="form-control form-control-lg time hor20" name="Thu20" id="Thu20" value="<?= (isset($data->Thu20)) ? $data->Thu20 : "" ;?>">                    
                            </div>                                        
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsThu" value="<?= (isset($data->hrsThu)) ? $data->hrsThu : "" ;?>">                    
                            </div>                                                                    
                        </div>                                                                                                            
                </div>
                <!--End Group Thursday -->
                <!-- Start Group Friday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupFriday">                                        
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" id="fri">
                                <strong style="padding-left: 5px;"> Special Leave?</strong>
                            </div>
                        </div>                    
                
                        <h4 style="text-align: center;">Friday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select start" id="friStart" name="friStart" onchange="calc(friStart, friEnd, hrsFri, Fri15, Fri20, FriNorm)">                                
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
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <select class="hour-start form-control form-control-lg custom-select end" id="friEnd" name="friEnd" onchange="calc(friStart, friEnd, hrsFri, Fri15, Fri20, FriNorm)">                                
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
                        <!-- Job and Hours-->                   
                        <div class="form-row alert alert-secondary" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobFri1" value="<?= (isset($data->jobFri1)) ? $data->jobFri1 : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input type="text" class="form-control form-control-lg time job1" name="hrsFri1" value="<?= (isset($data->hrsFri1)) ? $data->hrsFri1 : "" ;?>">                    
                            </div>                                        
                            <button type="button" class="btn btn-secondary btn-sm" id="btnShowExtra" onclick="showExtra(this, extraJobsFri)">Show More Jobs</button>
                        </div>                                            
                        <div id="extraJobsFri" style="display:none;">
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 2</label>
                                    <input type="text" class="form-control form-control-lg" name="jobFri2" value="<?= (isset($data->jobFri2)) ? $data->jobFri2 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsFri2" value="<?= (isset($data->hrsFri2)) ? $data->hrsFri2 : "" ;?>">                    
                                </div>                                        
                            </div>                                            
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 3</label>
                                    <input type="text" class="form-control form-control-lg" name="jobFri3" value="<?= (isset($data->jobFri3)) ? $data->jobFri3 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsFri3" value="<?= (isset($data->hrsFri3)) ? $data->hrsFri3 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 4</label>
                                    <input type="text" class="form-control form-control-lg" name="jobFri4" value="<?= (isset($data->jobFri4)) ? $data->jobFri4 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsFri4" value="<?= (isset($data->hrsFri4)) ? $data->hrsFri4 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                

                        </div>                    
                                            
                        <!-- Job and Hours-->                   
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Normal Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time horNormal" name="FriNorm" id="FriNorm" value="<?= (isset($data->FriNorm)) ? $data->FriNorm : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours 1.5</label>
                                <input readonly type="text" class="form-control form-control-lg time hor15" name="Fri15" id="Fri15" value="<?= (isset($data->Fri15)) ? $data->Fri15 : "" ;?>">                    
                            </div>
                        </div>                                                                                    
                        
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Hours 2.0</label>
                                <input readonly type="text" class="form-control form-control-lg time hor20" name="Fri20" id="Fri20" value="<?= (isset($data->Fri20)) ? $data->Fri20 : "" ;?>">                    
                            </div>                                        
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsFri" value="<?= (isset($data->hrsFri)) ? $data->hrsFri : "" ;?>">                    
                            </div>                                                                    
                        </div>                                                                                                            
                </div>
                <!--End Group Friday -->
                <!-- Start Group Saturday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupSaturday">                                        
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" id="sat">
                                <strong style="padding-left: 5px;"> Special Leave?</strong>
                            </div>
                        </div>                    
                
                        <h4 style="text-align: center;">Saturday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>                                
                                <select class="hour-start form-control form-control-lg custom-select start" id="satStart" name="satStart" onchange="calc(satStart, satEnd, hrsSat, Sat15, Sat20, SatNorm)">                                
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
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <select class="hour-start form-control form-control-lg custom-select end" id="satEnd" name="satEnd" onchange="calc(satStart, satEnd, hrsSat, Sat15, Sat20, SatNorm)">                                
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
                        <!-- Job and Hours-->                   
                        <div class="form-row alert alert-secondary" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobSat1" id="jobSat1" value="<?= (isset($data->jobSat1)) ? $data->jobSat1 : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input type="text" class="form-control form-control-lg time" name="hrsSat1" value="<?= (isset($data->hrsSat1)) ? $data->hrsSat1 : "" ;?>">                    
                            </div>                                        
                            <button type="button" class="btn btn-secondary btn-sm" id="btnShowExtra" onclick="showExtra(this, extraJobsSat)">Show More Jobs</button>
                        </div>                                            
                        <div id="extraJobsSat" style="display:none;">
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 2</label>
                                    <input type="text" class="form-control form-control-lg" name="jobSat2" value="<?= (isset($data->jobSat2)) ? $data->jobSat2 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsSat2" value="<?= (isset($data->hrsSat2)) ? $data->hrsSat2 : "" ;?>">                    
                                </div>                                        
                            </div>                                            
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 3</label>
                                    <input type="text" class="form-control form-control-lg" name="jobSat3" value="<?= (isset($data->jobSat3)) ? $data->jobSat3 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsSat3" value="<?= (isset($data->hrsSat3)) ? $data->hrsSat3 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                
                            <div class="form-row alert alert-secondary" style="text-align: center;">
                                <div class="col-md-6 mb-3">
                                    <label>Job 4</label>
                                    <input type="text" class="form-control form-control-lg" name="jobSat4" value="<?= (isset($data->jobSat4)) ? $data->jobSat4 : "" ;?>">                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Hours</label>
                                    <input type="text" class="form-control form-control-lg time" name="hrsSat4" value="<?= (isset($data->hrsSat4)) ? $data->hrsSat4 : "" ;?>">                    
                                </div>                                        
                            </div>                                                                

                        </div>                    
                                            
                        <!-- Job and Hours-->                   
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Normal Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time horNormal" name="SatNorm" id="SatNorm" value="<?= (isset($data->SatNorm)) ? $data->SatNorm : "" ;?>">                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours 1.5</label>
                                <input readonly type="text" class="form-control form-control-lg time hor15" name="Sat15" id="Sat15" value="<?= (isset($data->Sat15)) ? $data->Sat15 : "" ;?>">                    
                            </div>
                        </div>                                                                                    
                        
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Hours 2.0</label>
                                <input readonly type="text" class="form-control form-control-lg time hor20" name="Sat20" id="Sat20" value="<?= (isset($data->Sat20)) ? $data->Sat20 : "" ;?>">                    
                            </div>                                        
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours" name="hrsSat" id="hrsSat" value="<?= (isset($data->hrsSat)) ? $data->hrsSat : "" ;?>">                    
                            </div>                                                                    
                        </div>                                                                                                            
                </div>
                <!--End Group Saturday -->                                                                
                <!-- Start Group Total-->                 
                <div class="form-group alert alert-success" role="alert">                                        
                    <h4 style="text-align: center;">Total Week</h4>                                        
                    <div class="form-row overtime" style="text-align: center;">                        
                            <div class="col-md-6 mb-3">
                                <label>Normal Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time " name="totalNormal" id="totalNormal" value="<?= (isset($data->totalNormal)) ? $data->totalNormal : "" ;?>">
                            </div>                        
                            <div class="col-md-6 mb-3">
                                <label>Hours 1.5</label>
                                <input readonly type="text" class="form-control form-control-lg time " name="total15" id="total15" value="<?= (isset($data->total15)) ? $data->total15 : "" ;?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours 2.0</label>
                                <input readonly type="text" class="form-control form-control-lg time" name="total20" id="total20" value="<?= (isset($data->total20)) ? $data->total20 : "" ;?>">
                            </div>   
                            <div class="col-md-6 mb-3">
                                <label>Total Week</label>
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
            $('.input-group-text').hide();
            /*
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
            */
/*
            $('#btnPreFill').click(function(){
                if($('#pre').prop('checked')){
                    $('input[type=checkbox]').not('#pre').attr('checked', true);
                    $('input[type=checkbox]').not('#pre').trigger('change');
                }
            });
*/
            $('#weestart').datepicker({format: 'dd/mm/yyyy'});
            $('#empDate').datepicker({format: 'dd/mm/yyyy'});
            $('.time').mask('00:00');		

            $('#btnPreFill').click(function(){
                let preStart = $('#preStart').val();       
                $('.start').not('#satStart').val(preStart);

                let preEnd = $('#preEnd').val();
                $('.end').not('#satEnd').val(preEnd);
                
                let preJob = $('#preJob').val();
                $('.job').not('#jobSat1').val(preJob);

                let preHours = $('#preHours').val();
                $('.hours, .job1').not('#hrsSat ').val(preHours);

                let preNormal = $('#PreNormal').val();
                $('.horNormal').not('#SatNorm').val(preNormal);

                let pre15 = $('#Pre15').val();
                $('.hor15').not('#Sat15').val(pre15);

                let pre20 = $('#Pre20').val();
                $('.hor20').not('#Sat20').val(pre20);
                
                calcTotal();
            });

            calc = function(startHour_param, endHour_param, destination_total_param, destination_15, destination_20, destination_Normal) {
                let startHour = $(startHour_param).val();
                let endHour = $(endHour_param).val();
                let destination = $(destination_total_param);
                function D(J){ 
                    return (J<10? '0':'') + J;
                };
                var startPiece = startHour.split(':');
                var startMins = startPiece[0]*60 + +startPiece[1];

                var endPiece = endHour.split(':');
                var endMins = endPiece[0]*60 + +endPiece[1];
                var totalMins = ((endMins-startMins-15)<0? 0 : endMins - startMins -15);
                if(startHour !== "00:00" && endHour !== "00:00"){
                    if (!isNaN(totalMins)) {   
                        
                        var normal_hours = Math.min((8*60), totalMins);                 
                        
                        if ($(destination_15).attr('id') === 'Sat15') {
                            $(destination_Normal).val("00:00");
                            $(destination_15).val("00:00");
                            var hours_20 = totalMins;
                            $(destination_20).val(D(hours_20%(24*60)/60 | 0) + ':' + D(hours_20%60));
                            
                        } else {
                            $(destination_Normal).val(D(normal_hours%(24*60)/60 | 0) + ':' + D(normal_hours%60));
                            var hours_15 = Math.min((2*60), totalMins-normal_hours);
                            $(destination_15).val(D(hours_15%(24*60)/60 | 0) + ':' + D(hours_15%60));

                            var hours_20 = totalMins - (normal_hours + hours_15);
                            $(destination_20).val(D(hours_20%(24*60)/60 | 0) + ':' + D(hours_20%60));

                        }

                        destination.val(D(totalMins%(24*60)/60 | 0) + ':' + D(totalMins%60));                      
                    }
                                    
                }
                calcTotal();                
            }                             

            calcTotal = function() {
                
                let totalWeekMins = 0;
                function D(J){ 
                    return (J<10? '0':'') + J;
                };  

                $('.hours').each(function(){
                    var totalDay = $(this).val().split(':');
                    var curr = $(this);
                    var totalMins = 0;
                    totalMins = totalDay[0]*60 + +totalDay[1];
                    totalWeekMins += (!isNaN(totalMins) ? totalMins : 0);
                });
                
                var hours = D(totalWeekMins/60 | 0);
                var minutes = D(totalWeekMins%60);
                var totalWeek = D(totalWeekMins/60 | 0) + ':' + D(totalWeekMins%60);  
                $('#totalWeek').val(totalWeek);  

                let totalNormal = 0;
                $('.horNormal').each(function(){
                    var totalDay = $(this).val().split(':');
                    var curr = $(this);
                    var totalMins = 0;
                    totalMins = totalDay[0]*60 + +totalDay[1];
                    totalNormal += (!isNaN(totalMins) ? totalMins : 0);
                });
                var hoursNormal = D(totalNormal/60 | 0);
                var minutesNormal = D(totalNormal%60);
                var totalWeekNormal = D(totalNormal/60 | 0) + ':' + D(totalNormal%60);  
                $('#totalNormal').val(totalWeekNormal);  

                let total15 = 0;
                $('.hor15').each(function(){
                    var totalDay = $(this).val().split(':');
                    var curr = $(this);
                    var totalMins = 0;
                    totalMins = totalDay[0]*60 + +totalDay[1];
                    total15 += (!isNaN(totalMins) ? totalMins : 0);
                });
                var hours15 = D(total15/60 | 0);
                var minutes15 = D(total15%60);
                var totalWeek15 = D(total15/60 | 0) + ':' + D(total15%60);  
                $('#total15').val(totalWeek15);  


                    let total20 = 0;
                $('.hor20').each(function(){
                    var totalDay = $(this).val().split(':');
                    var curr = $(this);
                    var totalMins = 0;
                    totalMins = totalDay[0]*60 + +totalDay[1];
                    total20 += (!isNaN(totalMins) ? totalMins : 0);
                });
                var hours20 = D(total20/60 | 0);
                var minutes20 = D(total20%60);
                var totalWeek20 = D(total20/60 | 0) + ':' + D(total20%60);  
                $('#total20').val(totalWeek20);  
          
/*
                let pre15 = $('#Pre15').val();
                $('.hor15').not('#Sat15').val(pre15);

                let pre20 = $('#Pre20').val();
                $('.hor20').not('#Sat20').val(pre20);

*/

            }   

            showExtra = function(btn, extra_inputs){
                $(extra_inputs).css('display', 'block');
                $(btn).fadeOut();
            }            
        });
    </script>
</body>
</html>