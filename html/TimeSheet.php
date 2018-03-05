<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>    
    <script src="../js/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    
    
    <title>Time Sheet</title>
</head>
<body>
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
            $username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
            echo '<form method="post" name="fillable_form" action="../submit.php?type='.$type.'&user='.$username.'">';
        ?>            
                <div class="form-group">
                    <label for="empname">
                        <h5>Name:</h5>
                    </label>
                    <input type="text" class="form-control form-control-lg" name="empname" id="empname" placeholder="Type employee name" value="Rafael" required>                    
                </div>       
                <div class="form-group">
                    <label for="empname">
                        <h5>Week End:</h5>
                    </label>                    
                    <input type="text" class="form-control form-control-lg date-picker" name="weestart" id="weestart" required value="01/03/2018">                    
                </div>      
                <!-- Start Group Prefill-->                 
                <div class="form-group alert alert-info" role="alert" id="groupPre">                                        
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" id="pre">
                                <strong style="padding-left: 5px;"> Special Leave?</strong>
                            </div>
                        </div>                    
                
                    <h4 style="text-align: center;">Prefill Time Sheet</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 col-12 mb-3">
                                <label>Start</label>
                                <input type="text" class="form-control form-control-lg time" id="preStart" name="preStart" value="07:00">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <input type="text" class="form-control form-control-lg time" id="preEnd" name="preEnd" value="15:15">
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg" id="preJob" value="001">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Hours</label>
                                <input type="text" class="form-control form-control-lg time" id="preHours" value="08:00">
                            </div>                                        
                        </div> 
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-12 mb-3">
                                <label>Total Hours Week</label>
                                <input type="text" class="form-control form-control-lg time" id="preTotalHours" value="40:00">
                            </div>                                        
                        </div>                                                                                        
                        <div class="col-md-12 mb-3">
                                <button type="button" class="btn btn-secondary btn-lg btn-block" id="btnPreFill">Prefill Time Sheet</button>
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
                                <input type="text" class="form-control form-control-lg time start" name="monStart">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>End</label>
                                <input type="text" class="form-control form-control-lg time end" name="monEnd">
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobMon">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input type="text" class="form-control form-control-lg time hours" name="hrsMon">
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
                                <input type="text" class="form-control form-control-lg time start" name="tueStart">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>
                                <input type="text" class="form-control form-control-lg time end" name="tueEnd">
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobTue">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input type="text" class="form-control form-control-lg time hours" name="hrsTue">
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
                                <input type="text" class="form-control form-control-lg time start" name="wedStart">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>
                                <input type="text" class="form-control form-control-lg time end" name="wedEnd">
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobWed">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input type="text" class="form-control form-control-lg time hours" name="hrsWed">
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
                                <input type="text" class="form-control form-control-lg time start" name="thuStart">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>
                                <input type="text" class="form-control form-control-lg time end" name="thuEnd">
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobThu">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input type="text" class="form-control form-control-lg time hours" name="hrsThu">
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
                                <input type="text" class="form-control form-control-lg time start" name="friStart">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>
                                <input type="text" class="form-control form-control-lg time end" name="friEnd">
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobFri">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input type="text" class="form-control form-control-lg time hours" name="hrsFri">
                            </div>                                        
                        </div>                                                                
                    
                </div>  
                <!-- Start Group Saturday-->                 
                <div class="form-group alert alert-success" role="alert" id="groupFriday">                                        
                    <h4 style="text-align: center;">Saturday</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Start</label>
                                <input type="text" class="form-control form-control-lg time start" name="satStart">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>End</label>
                                <input type="text" class="form-control form-control-lg time end" name="satEnd">
                            </div>                                        
                        </div>                                        
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control form-control-lg job" name="jobSat">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Hours</label>
                                <input type="text" class="form-control form-control-lg time hours" name="hrsSat">
                            </div>                                        
                        </div>                                                                
                    
                </div>   

                <!-- Start Group Total-->                 
                <div class="form-group alert alert-success" role="alert">                                        
                    <h4 style="text-align: center;">Total Week</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-12 mb-3">                                
                                <input type="text" class="form-control form-control-lg time totalWeek" name="totalWeek">
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
                                <script type="text/javascript" src="../js/flashcanvas.js"></script>
                                <![endif]-->
                                <script src="../js/jSignature.min.js"></script>
                                <div id="signature"></div>
                                <input type="hidden" name="empSign" id="output" required>
                                <input type="button" value="Clear" id="btnClearSign" class="btn btn-danger">
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
                                <!--
                                <input type="text" class="form-control form-control-lg time" name="empSign">
-->
                            </div>
                        </div>   
                                                                              
                </div>                                             
                <!-- Start Group Signature-->                 
                <div class="form-group alert alert-success" role="alert" id="groupFriday">                                        
                    <h4 style="text-align: center;">Date</h4>                    
                    
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-12 mb-3">                                
                                <input type="text" class="form-control form-control-lg date-picker" name="empDate" id="empDate" required value="01/03/2018">                    
                            </div>
                        </div>                                                                                    
                </div>                                             
                
                <!--End Group Total -->                       
                <div class="form-row" style="text-align: center;">
                            <div class="col-md-6 mb-3">
                                <button type="button" class="btn btn-secondary btn-lg btn-block">Cancel</button>
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

                let preTotalHours = $('#preTotalHours').val();
                $('.totalWeek').val(preTotalHours);                
                
            });
        });
    </script>

</body>
</html>