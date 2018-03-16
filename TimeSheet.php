<?php
    require_once 'config.php';

    // Initialize the session
    session_start();

    // If session variable is not set it will redirect to login page
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
    }

    //Get params
    $empId = filter_input(INPUT_GET, 'empId', FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

    $con = $link;

    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }

    if ($action == 'update') {
        $newStatus = filter_input(INPUT_GET, 'newStatus', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = sprintf("UPDATE fillable Set TS_STATUS = '%s' WHERE id in(%s);", $newStatus, $id);

        //Execute query update
        mysqli_query($con, $sql);

        // Close connection
        mysqli_close ($con);

        echo "<script>
                alert('Status successfully changed!');
                window.location.href='view.php?type=TimeSheet.php';
             </script>";
    }

    //Check if there is employee id as param
    if ($empId != "") {
        $sql = sprintf("SELECT id, name FROM employees WHERE id = %s ;", $empId);
    } else {
        //Load Time Sheet
        $sql = sprintf("SELECT id, type, content, date_created, ts_status, empSign FROM fillable WHERE id in (%s);", $id);
    }

    //Execute query select Employee or Timesheet
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

    $list_jobs = [
        '' => 'Select Job',
        'rdo' => 'RDO',
        'pld' => 'PLD',
        'anl' => 'Annual Leave',
        'sick' => 'Sick Leave',
        '001' => '001 - Office',
        '002' => '002 - Job 2'
    ];
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
    <script src="js/TimeSheet.js"></script>
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
            <form method="post" name="fillable_form" action="submit.php?type=<?= $type.'&user='.$_SESSION['username'];?>">
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
                                <select class="form-control form-control-lg custom-select " id="preJob">
                                <?php
                                    foreach ($list_jobs as $key => $value) {
                                        echo '<option '.($key == "001" ? "selected" : "").' value="' . $key . '">'. $value .'</option>';
                                    }
                                ?>
                                </select>
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
                        <div class="alert alert-secondary" style="text-align: center;">
                                                <h4>Job 1</h4>
                                                <div class="form-row" style="text-align: center;">
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <label>Start</label>
                                                        <select class="hour-start form-control form-control-lg custom-select start" id="mon_start_1" name="mon_start_1">
                                                        <option value="">-</option>
                                                        <?php
                                                            for ($i = 0; $i <= (24*60)-15; $i += 15) {
                                                                    $hour = str_pad(floor($i/60), 2, "0", STR_PAD_LEFT);
                                                                    $minutes = str_pad($i%60, 2, "0", STR_PAD_LEFT);
                                                                    $finalHour = $hour . ':' .$minutes;
                                                                    $selected = (isset($data->mon_start_1) && $data->mon_start_1 == $finalHour) ? "selected" : "" ;
                                                                    echo '<option ' . $selected . ' value="' . $i . '">'.$finalHour.'</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <label>End</label>
                                                        <select disabled class="hour-end form-control form-control-lg custom-select end" id="mon_end_1" name="mon_end_1">
                                                        <option value="">-</option>
                                                        <?php
                                                            for ($i=0; $i <= 23; $i++) {
                                                                $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                                for ($j=0; $j < 60; $j+=15) {
                                                                    $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                                    $finalHour = $hour . ':' .$minutes;
                                                                    $selected = (isset($data->mon_end_1) && $data->mon_end_1 == $finalHour) ? "selected" : "" ;
                                                                    echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';
                                                                }
                                                            }
                                                        ?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <!-- Job and Hours-->
                                                <div class="form-row" style="text-align: center;">

                                                    <div class="col-md-6 mb-3">
                                                        <label>Job</label>
                                                        <select class="form-control form-control-lg custom-select job" name="jobMon2" id="jobMon1">
                                                            <?php
                                                                foreach ($list_jobs as $key => $value) {
                                                                    if (isset($data->jobMon2) && $key == $data->jobMon2) {
                                                                        echo '<option selected value="' . $key . '">'. $value .'</option>';
                                                                    } else {
                                                                        echo '<option '.($key == '' && !isset($data->jobMon2) ? "selected" : "").' value="' . $key . '">'. $value .'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Hours</label>
                                                        <input readonly type="text" class="form-control form-control-lg time job1 hours" name="hrs_mon_1" id="hrs_mon_1" value="<?= (isset($data->hrs_mon_1)) ? $data->hrs_mon_1 : "" ;?>">
                                                    </div>
                                                    <button type="button" class="btn btn-secondary btn-sm" id="btnShowExtra" onclick="showExtra(this, extraJobsMon)">Show More Jobs</button>
                                                </div>
                                              </div>


                        <div id="extraJobsMon" style="display:none;">
                          <!-- Start Job 2 -->
                          <div class="alert alert-secondary" style="text-align: center;">
                                                  <h4>Job 2</h4>
                                                  <div class="form-row" style="text-align: center;">
                                                      <div class="col-md-6 col-12 mb-3">
                                                          <label>Start</label>
                                                          <select disabled class="hour-start form-control form-control-lg custom-select start" id="mon_start_2" name="mon_start_2">
                                                          <option value="">-</option>
                                                          <?php
                                                              for ($i = 0; $i <= (24*60)-15; $i += 15) {
                                                                      $hour = str_pad(floor($i/60), 2, "0", STR_PAD_LEFT);
                                                                      $minutes = str_pad($i%60, 2, "0", STR_PAD_LEFT);
                                                                      $finalHour = $hour . ':' .$minutes;
                                                                      $selected = (isset($data->mon_start_2) && $data->mon_start_2 == $finalHour) ? "selected" : "" ;
                                                                      echo '<option ' . $selected . ' value="' . $i . '">'.$finalHour.'</option>';
                                                              }
                                                          ?>
                                                          </select>
                                                      </div>
                                                      <div class="col-md-6 col-12 mb-3">
                                                          <label>End</label>
                                                          <select disabled class="hour-end form-control form-control-lg custom-select end" id="mon_end_2" name="mon_end_2">
                                                          <option value="">-</option>
                                                          <?php
                                                              for ($i=0; $i <= 23; $i++) {
                                                                  $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                                  for ($j=0; $j < 60; $j+=15) {
                                                                      $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                                                      $finalHour = $hour . ':' .$minutes;
                                                                      $selected = (isset($data->mon_end_2) && $data->mon_end_2 == $finalHour) ? "selected" : "" ;
                                                                      echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';
                                                                  }
                                                              }
                                                          ?>
                                                          </select>

                                                      </div>
                                                  </div>
                                                  <!-- Job and Hours-->
                                                  <div class="form-row" style="text-align: center;">

                                                      <div class="col-md-6 mb-3">
                                                          <label>Job</label>
                                                          <select class="form-control form-control-lg custom-select job" name="jobMon2" id="jobMon1">
                                                              <?php
                                                                  foreach ($list_jobs as $key => $value) {
                                                                      if (isset($data->jobMon2) && $key == $data->jobMon2) {
                                                                          echo '<option selected value="' . $key . '">'. $value .'</option>';
                                                                      } else {
                                                                          echo '<option '.($key == '' && !isset($data->jobMon2) ? "selected" : "").' value="' . $key . '">'. $value .'</option>';
                                                                      }
                                                                  }
                                                              ?>
                                                          </select>
                                                      </div>
                                                      <div class="col-md-6 mb-3">
                                                          <label>Hours</label>
                                                          <input readonly type="text" class="form-control form-control-lg time job1 hours" name="hrs_mon_2" id="hrs_mon_2" value="<?= (isset($data->hrs_mon_2)) ? $data->hrs_mon_2 : "" ;?>">
                                                      </div>

                                                  </div>
                                                </div>
                          <!-- Start Job 3 -->
                          <div class="alert alert-secondary" style="text-align: center;">
                        <h4>Job 3</h4>
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>
                                <select disabled class="hour-start form-control form-control-lg custom-select start" id="mon_start_3" name="mon_start_3">
                                <option value="">-</option>
                                <?php
                                    for ($i = 0; $i <= (24*60)-15; $i += 15) {
                                            $hour = str_pad(floor($i/60), 2, "0", STR_PAD_LEFT);
                                            $minutes = str_pad($i%60, 2, "0", STR_PAD_LEFT);
                                            $finalHour = $hour . ':' .$minutes;
                                            $selected = (isset($data->mon_start_3) && $data->mon_start_3 == $finalHour) ? "selected" : "" ;
                                            echo '<option ' . $selected . ' value="' . $i . '">'.$finalHour.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <select disabled class="hour-end form-control form-control-lg custom-select end" id="mon_end_3" name="mon_end_3">
                                <option value="">-</option>
                                <?php
                                    for ($i=0; $i <= 23; $i++) {
                                        $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                        for ($j=0; $j < 60; $j+=15) {
                                            $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                            $finalHour = $hour . ':' .$minutes;
                                            $selected = (isset($data->mon_end_3) && $data->mon_end_3 == $finalHour) ? "selected" : "" ;
                                            echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';
                                        }
                                    }
                                ?>
                                </select>

                            </div>
                        </div>
                        <!-- Job and Hours-->
                        <div class="form-row" style="text-align: center;">

                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <select class="form-control form-control-lg custom-select job" name="jobMon2" id="jobMon1">
                                    <?php
                                        foreach ($list_jobs as $key => $value) {
                                            if (isset($data->jobMon2) && $key == $data->jobMon2) {
                                                echo '<option selected value="' . $key . '">'. $value .'</option>';
                                            } else {
                                                echo '<option '.($key == '' && !isset($data->jobMon2) ? "selected" : "").' value="' . $key . '">'. $value .'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time job1 hours" name="hrs_mon_3" id="hrs_mon_3" value="<?= (isset($data->hrs_mon_3)) ? $data->hrs_mon_3 : "" ;?>">
                            </div>

                        </div>
                      </div>

                        <!--Start Group 4 -->
                        <div class="alert alert-secondary" style="text-align: center;">
                        <h4>Job 4</h4>
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>
                                <select disabled class="hour-start form-control form-control-lg custom-select start" id="mon_start_4" name="mon_start_4">
                                <option value="">-</option>
                                <?php
                                    for ($i = 0; $i <= (24*60)-15; $i += 15) {
                                            $hour = str_pad(floor($i/60), 2, "0", STR_PAD_LEFT);
                                            $minutes = str_pad($i%60, 2, "0", STR_PAD_LEFT);
                                            $finalHour = $hour . ':' .$minutes;
                                            $selected = (isset($data->mon_start_4) && $data->mon_start_4 == $finalHour) ? "selected" : "" ;
                                            echo '<option ' . $selected . ' value="' . $i . '">'.$finalHour.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <select disabled class="hour-end form-control form-control-lg custom-select end" id="mon_end_4" name="mon_end_4">
                                <option value="">-</option>
                                <?php
                                    for ($i=0; $i <= 23; $i++) {
                                        $hour = str_pad($i, 2, "0", STR_PAD_LEFT);
                                        for ($j=0; $j < 60; $j+=15) {
                                            $minutes = str_pad($j, 2, "0", STR_PAD_LEFT);
                                            $finalHour = $hour . ':' .$minutes;
                                            $selected = (isset($data->mon_end_4) && $data->mon_end_4 == $finalHour) ? "selected" : "" ;
                                            echo '<option ' . $selected . ' value="' . $finalHour . '">'.$finalHour.'</option>';
                                        }
                                    }
                                ?>
                                </select>

                            </div>
                        </div>
                        <!-- Job and Hours-->
                        <div class="form-row" style="text-align: center;">

                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <select class="form-control form-control-lg custom-select job" name="jobMon2" id="jobMon1">
                                    <?php
                                        foreach ($list_jobs as $key => $value) {
                                            if (isset($data->jobMon2) && $key == $data->jobMon2) {
                                                echo '<option selected value="' . $key . '">'. $value .'</option>';
                                            } else {
                                                echo '<option '.($key == '' && !isset($data->jobMon2) ? "selected" : "").' value="' . $key . '">'. $value .'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time job1 hours" name="hrs_mon_4" id="hrs_mon_4" value="<?= (isset($data->hrs_mon_4)) ? $data->hrs_mon_4 : "" ;?>">
                            </div>

                        </div>
                      </div>
                        </div>

                        <!-- Job and Hours-->
                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Normal Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time horNormal" name="MonNorm" id="mon_nor" value="<?= (isset($data->MonNorm)) ? $data->MonNorm : "" ;?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours 1.5</label>
                                <input readonly type="text" class="form-control form-control-lg time hor15" name="Mon15" id="mon_15" value="<?= (isset($data->Mon15)) ? $data->Mon15 : "" ;?>">
                            </div>
                        </div>

                        <div class="form-row overtime " style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Hours 2.0</label>
                                <input readonly type="text" class="form-control form-control-lg time hor20" name="Mon20" id="mon_20" value="<?= (isset($data->Mon20)) ? $data->Mon20 : "" ;?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input readonly type="text" class="form-control form-control-lg time hours-total" name="hrsMon" id="hrs_mon" value="<?= (isset($data->hrsMon)) ? $data->hrsMon : "" ;?>">
                            </div>
                        </div>
                </div>
                <!--End Group Monday -->


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
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                  <label for="status">Status</label>
                                  <select class="form-control" name="status" id="">
                                    <option <?= (!isset($ts_status) || $ts_status == "P") ? "selected" : "" ;?> value="P">Pending</option>
                                    <option <?= (!isset($ts_status) && $ts_status == "A") ? "selected" : "" ;?> value="A">Approved</option>
                                    <option <?= (!isset($ts_status) && $ts_status == "C") ? "selected" : "" ;?> value="C">Cancelled</option>
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
                </form>
        </div>
    </div>
</body>
</html>
