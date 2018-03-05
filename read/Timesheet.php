<?php

require_once '../config.php';

$con = $link;


if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);


$sql = "SELECT id, type, content, date_created FROM fillable WHERE id=" . $id . ";";


$query 	= mysqli_query($con, $sql);

$data = json_decode(mysqli_fetch_array($query)[2]);


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="../js/jspdf.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>	

    <script src="../js/jquery.mask.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.time').mask('00:00');		
	});
	
</script>

</head>
<style type="text/css">
	#days-table {
		font-size: 12px;
		border: 1px solid black;
		text-align: center;		
	}
	#days-table input{
		width: 50px;
	}

	#days-table td {
		border: 1px solid black;
	}

	.signature {
		font-size: 12px;
	}
	#officeJob input, #totalOffice input {
		width: 60px;
	}

	#officeJob, #totalOffice, #summary {
		float: left;
		font-size: 70%;
		margin-right: 10px;
	}

	.container {
		border: 3px solid black;
	}

	#officeJob td, #totalOffice td, #summary td {
		border: 1px solid black;
	}

	#officeJob, #totalOffice {
		text-align: center;
	}

	#summary {
		text-align: right;
	}

	#summary input {
		width: 20px;
		font-size: 70%;
		font-weight: bold;
		background-color: #FF9A00;
		border: 0;
	}



</style>
<body>

<div class="container">
 <form class="form">	
  <table style="font-size: 70%;">
		<th>Name:</th>
		<th><input name="empname" type="text" class="form-control form-control-sm" value="<?= $data->empname;?>" size="60"></th>
		<th>W/E:</th>
		<th><input name="weestart" type="date" class="form-control form-control-sm" value="<?= $data->weestart;?>"></th>
	</table>

	<table id="days-table">
		<tr>
			<td></td>
			<td>MON</td>
			<td>TUE</td>
			<td>WED</td>
			<td>THU</td>
			<td>FRI</td>
			<td>SAT</td>
			<td style="20px;"></td>
			<td>TOTAL HRS</td>		
		</tr>
		<tr>
			<td>START & FINISH</td>
			<!--Mon -->
			<td><input name="monStart" type="text" class="time" value="<?= $data->monStart;?>">
		  -<input name="monEnd" type="text" class="time" value="<?= $data->monEnd;?>"></td>
			<!--Tue -->
		  <td><input name="tueStart" type="text" class="time" value="<?= $data->tueStart;?>">-<input name="tueEnd" type="text" class="time" value="<?= $data->tueEnd;?>"></td>

			<!--Wed -->
			<td><input name="wedStart" type="text" class="time" value="<?= $data->wedStart;?>">-<input name="wedEnd" type="text" class="time" value="<?= $data->wedEnd;?>"></td>
			<!--Thu -->
			<td><input name="thuStart" type="text" class="time" value="<?= $data->thuStart;?>">-<input name="thuEnd" type="text" class="time" value="<?= $data->thuEnd;?>"></td>

			<!--Fri -->
			<td><input name="friStart" type="text" class="time" value="<?= $data->friStart;?>">-<input name="friEnd" type="text" class="time" value="<?= $data->friEnd;?>"></td>
			<!--Sat -->
			<td><input name="satStart" type="text" class="time" value="<?= $data->satStart;?>">-<input name="satEnd" type="text" class="time" value="<?= $data->satEnd;?>"></td>
			<td></td>
			<td><input name="totalWeek" type="text" class="time" value="<?= $data->totalWeek;?>"></td>			
		</tr>
		<tr>
			<td>JOB/HRS</td>
			<td><input name="jobMon1" type="text" value="<?= $data->jobMon1;?>">/<input name="hrsMon1" type="text" class="time" value="<?= $data->hrsMon1;?>"></td>
			<td><input name="jobTue1" type="text" value="<?= $data->jobTue1;?>">/<input name="hrsTue1" type="text" class="time" value="<?= $data->hrsTue1;?>"></td>
			<td><input name="jobWed1" type="text" value="<?= $data->jobWed1;?>">/<input name="hrsWed1" type="text" class="time" value="<?= $data->hrsWed1;?>"></td>
			<td><input name="jobThu1" type="text" value="<?= $data->jobThu1;?>">/<input name="hrsThu1" type="text" class="time" value="<?= $data->hrsThu1;?>"></td>
			<td><input name="jobFri1" type="text" value="<?= $data->jobFri1;?>">/<input name="hrsFri1" type="text" class="time" value="<?= $data->hrsFri1;?>"></td>						
			<td><input name="jobSat1" type="text" value="<?= $data->jobSat1;?>">/<input name="hrsSat1" type="text" class="time" value="<?= $data->hrsSat1;?>"></td>
			<td></td>
			<td><input name="totalMon1" type="text" value="<?= $data->totalMon1;?>"></td>						
		</tr>		
		<tr>
			<td>JOB/HRS</td>
			<td><input name="jobMon2" type="text" value="<?= $data->jobMon2;?>">/<input name="hrsMon2" type="text" class="time" value="<?= $data->hrsMon2;?>"></td>
			<td><input name="jobTue2" type="text" value="<?= $data->jobTue2;?>">/<input name="hrsTue2" type="text" class="time" value="<?= $data->hrsTue2;?>"></td>
			<td><input name="jobWed2" type="text" value="<?= $data->jobWed2;?>">/<input name="hrsWed2" type="text" class="time" value="<?= $data->hrsWed2;?>"></td>
			<td><input name="jobThu2" type="text" value="<?= $data->jobThu2;?>">/<input name="hrsThu2" type="text" class="time" value="<?= $data->hrsThu2;?>"></td>
			<td><input name="jobFri2" type="text" value="<?= $data->jobFri2;?>">/<input name="hrsFri2" type="text" class="time" value="<?= $data->hrsFri2;?>"></td>						
			<td><input name="jobSat2" type="text" value="<?= $data->jobSat2;?>">/<input name="hrsSat2" type="text" class="time" value="<?= $data->hrsSat2;?>"></td>
			<td></td>
			<td><input name="totalMon2" type="text" value="<?= $data->totalMon2;?>"></td>						
		</tr>		
		<tr>
			<td>JOB/HRS</td>
			<td><input name="jobMon3" type="text" value="<?= $data->jobMon3;?>">/<input name="hrsMon3" type="text" class="time" value="<?= $data->hrsMon3;?>"></td>
			<td><input name="jobTue3" type="text" value="<?= $data->jobTue3;?>">/<input name="hrsTue3" type="text" class="time" value="<?= $data->hrsTue3;?>"></td>
			<td><input name="jobWed3" type="text" value="<?= $data->jobWed3;?>">/<input name="hrsWed3" type="text" class="time" value="<?= $data->hrsWed3;?>"></td>
			<td><input name="jobThu3" type="text" value="<?= $data->jobThu3;?>">/<input name="hrsThu3" type="text" class="time" value="<?= $data->hrsThu3;?>"></td>
			<td><input name="jobFri3" type="text" value="<?= $data->jobFri3;?>">/<input name="hrsFri3" type="text" class="time" value="<?= $data->hrsFri3;?>"></td>						
			<td><input name="jobSat3" type="text" value="<?= $data->jobSat3;?>">/<input name="hrsSat3" type="text" class="time" value="<?= $data->hrsSat3;?>"></td>
			<td></td>
			<td><input name="totalMon3" type="text" value="<?= $data->totalMon3;?>"></td>						
		</tr>		
		<tr>
			<td>JOB/HRS</td>
			<td><input name="jobMon4" type="text" value="<?= $data->jobMon4;?>">/<input name="hrsMon4" type="text" class="time" value="<?= $data->hrsMon4;?>"></td>
			<td><input name="jobTue4" type="text" value="<?= $data->jobTue4;?>">/<input name="hrsTue4" type="text" class="time" value="<?= $data->hrsTue4;?>"></td>
			<td><input name="jobWed4" type="text" value="<?= $data->jobWed4;?>">/<input name="hrsWed4" type="text" class="time" value="<?= $data->hrsWed4;?>"></td>
			<td><input name="jobThu4" type="text" value="<?= $data->jobThu4;?>">/<input name="hrsThu4" type="text" class="time" value="<?= $data->hrsThu4;?>"></td>
			<td><input name="jobFri4" type="text" value="<?= $data->jobFri4;?>">/<input name="hrsFri4" type="text" class="time" value="<?= $data->hrsFri4;?>"></td>						
			<td><input name="jobSat4" type="text" value="<?= $data->jobSat4;?>">/<input name="hrsSat4" type="text" class="time" value="<?= $data->hrsSat4;?>"></td>
			<td></td>
			<td><input name="totalMon4" type="text" value="<?= $data->totalMon4;?>"></td>						
		</tr>		
		<tr>
			<td>TOTAL HRS</td>
			<td><input name="totalHrsMon" type="text" class="time" style="width: 100px;" value="<?= $data->totalHrsMon;?>"></td>
			<td><input name="totalHrsTue" type="text" class="time" style="width: 100px;" value="<?= $data->totalHrsTue;?>"></td>
			<td><input name="totalHrsWed" type="text" class="time" style="width: 100px;" value="<?= $data->totalHrsWed;?>"></td>
			<td><input name="totalHrsThu" type="text" class="time" style="width: 100px;" value="<?= $data->totalHrsThu;?>"></td>
			<td><input name="totalHrsFri" type="text" class="time" style="width: 100px;" value="<?= $data->totalHrsFri;?>"></td>
			<td><input name="totalHrsSat" type="text" class="time" style="width: 100px;" value="<?= $data->totalHrsSat;?>"></td>
			<td></td>
			<td><input name="totalHrsTot" type="text" class="time" value="<?= $data->totalHrsTot;?>"></td>			
		</tr>		
	</table>
	<div>
		<span style="font-size:5.7pt; color:#000000">By signing this form I take full responsibility for the hours stated above and confirm the information is correct and true. </span>	
	</div>
	
	<div style="float: left;">
		<table class="signature">
			<tr>
				<td>
					<span>Employee Signature</span> 
					<input name="empSign" type="text" id="empSign" value="<?= $data->empSign;?>">
			  </td>
				<td>
					<span>Date</span>
					<input name="empDate" type="date" value="<?= $data->empDate;?>">
				</td>	
			</tr>
			<tr>
				<td>
					<span>Authorised By</span> 
					<input name="authBy" type="text" value="<?= $data->authBy;?>">
			  </td>
				<td>
					<span>Date</span>
					<input name="authByDate" type="date" value="<?= $data->authByDate;?>">
				</td>	
			</tr>
			

		</table>		
	</div>
	<div style="float: left;">
		<div style="float: left;">
			<img src="images/Timesheets Blank_img_0.jpg">
		</div>		
		<div style="float: right;">
			<h3>TIME SHEET</h3>
			<span style="font-size:7.6pt; color:#000000">Fax Number 02 8668 4892 </span>
			<br>
			<span style="font-size:7.6pt; font-weight:normal; color:#0000FF; text-decoration:underline">admin@smartplumbingsolutions.com.au </span> <span style="border-style:thin"></span> 
		</div>
	</div>

	<div style="border-bottom: 1px solid black;width: 100%;float: left;margin-top: 10px;margin-bottom: 10px;">
			<span style="font-size:5.7pt; color:#000000">OFFICE USE ONLY</span>	
	</div>
	<div class="office">
		<div id="officeJob">
			<table>
				<tr>
					<td>JOB</td>
					<td>HOURS</td>				
				</tr>
				<tr>
					<td><input name="job1" type="text" value="<?= $data->job1;?>" maxlength="6"></td>
					<td><input name="hours1" type="text" class="time" value="<?= $data->hours1;?>" ></td>
				</tr>
				<tr>
					<td><input name="job2" type="text" value="<?= $data->job2;?>" maxlength="6"></td>
					<td><input name="hours2" type="text" class="time" value="<?= $data->hours2;?>"></td>
				</tr>
				<tr>
					<td><input name="job3" type="text" value="<?= $data->job3;?>" maxlength="6"></td>
					<td><input name="hours3" type="text" class="time" value="<?= $data->hours3;?>"></td>
				</tr>
				<tr>
					<td><input name="job4" type="text" value="<?= $data->job4;?>" maxlength="6"></td>
					<td><input name="hours4" type="text" class="time" value="<?= $data->hours4;?>"></td>
				</tr>
				<tr>
					<td><input name="job5" type="text" value="<?= $data->job5;?>" maxlength="6"></td>
					<td><input name="hours5" type="text" class="time" value="<?= $data->hours5;?>"></td>
				</tr>
				<tr>
					<td><input name="job6" type="text" value="<?= $data->job6;?>" maxlength="6"></td>
					<td><input name="hours6" type="text" class="time" value="<?= $data->hours6;?>"></td>
				</tr>
				<tr>
					<td><input name="job6" type="text" value="<?= $data->job6;?>" maxlength="6"></td>
					<td><input name="hours6" type="text" class="time" value="<?= $data->hours6;?>"></td>
				</tr>
			</table>			
		</div>
		<div id="totalOffice">
				<table >
					<tr>
						<td></td>
						<td>MON</td>
						<td>TUE</td>
						<td>WED</td>
						<td>THU</td>
						<td>FRI</td>
						<td>SAT</td>
						<td>TOTAL</td>		
					</tr>	
					<tr style="background-color: #C0C0C0;">
						<td>TOTAL HRS</td>
						<td><input name="totalHrsMon" type="text" class="time" style="background-color: #C0C0C0;border: 0;" value="<?= $data->totalHrsMon;?>"></td>
						<td><input name="totalHrsTue" type="text" class="time" style="background-color: #C0C0C0;border: 0;" value="<?= $data->totalHrsTue;?>"></td>
						<td><input name="totalHrsWed" type="text" class="time" style="background-color: #C0C0C0;border: 0;" value="<?= $data->totalHrsWed;?>"></td>
						<td><input name="totalHrsThu" type="text" class="time" style="background-color: #C0C0C0;border: 0;" value="<?= $data->totalHrsThu;?>"></td>
						<td><input name="totalHrsFri" type="text" class="time" style="background-color: #C0C0C0;border: 0;" value="<?= $data->totalHrsFri;?>"></td>
						<td><input name="totalHrsSat" type="text" class="time" style="background-color: #C0C0C0;border: 0;" value="<?= $data->totalHrsSat;?>"></td>						
						<td><input name="totalHrsTot" type="text" class="time" style="background-color: #C0C0C0;border: 0;" value="<?= $data->totalHrsTot;?>"></td>			
					</tr>		
					<tr>
						<td>NOR</td>
						<td><input name="totalHrsMon" type="text" class="time" value="<?= $data->totalHrsMon;?>"></td>
						<td><input name="totalHrsTue" type="text" class="time" value="<?= $data->totalHrsTue;?>"></td>
						<td><input name="totalHrsWed" type="text" class="time" value="<?= $data->totalHrsWed;?>"></td>
						<td><input name="totalHrsThu" type="text" class="time" value="<?= $data->totalHrsThu;?>"></td>
						<td><input name="totalHrsFri" type="text" class="time" value="<?= $data->totalHrsFri;?>"></td>
						<td><input name="totalHrsSat" type="text" class="time" value="<?= $data->totalHrsSat;?>"></td>						
						<td><input name="totalHrsTot" type="text" class="time" value="<?= $data->totalHrsTot;?>"></td>			
					</tr>		
					<tr>
						<td>1.5</td>
						<td><input name="totalHrsMon" type="text" class="time" value="<?= $data->totalHrsMon;?>"></td>
						<td><input name="totalHrsTue" type="text" class="time" value="<?= $data->totalHrsTue;?>"></td>
						<td><input name="totalHrsWed" type="text" class="time" value="<?= $data->totalHrsWed;?>"></td>
						<td><input name="totalHrsThu" type="text" class="time" value="<?= $data->totalHrsThu;?>"></td>
						<td><input name="totalHrsFri" type="text" class="time" value="<?= $data->totalHrsFri;?>"></td>
						<td><input name="totalHrsSat" type="text" class="time" value="<?= $data->totalHrsSat;?>"></td>						
						<td><input name="totalHrsTot" type="text" class="time" value="<?= $data->totalHrsTot;?>"></td>			
					</tr>		
					<tr>
						<td>2</td>
						<td><input name="totalHrsMon" type="text" class="time" value="<?= $data->totalHrsMon;?>"></td>
						<td><input name="totalHrsTue" type="text" class="time" value="<?= $data->totalHrsTue;?>"></td>
						<td><input name="totalHrsWed" type="text" class="time" value="<?= $data->totalHrsWed;?>"></td>
						<td><input name="totalHrsThu" type="text" class="time" value="<?= $data->totalHrsThu;?>"></td>
					  <td><input name="totalHrsFri" type="text" class="time" value="<?= $data->totalHrsFri;?>"></td>
						<td><input name="totalHrsSat" type="text" class="time" value="<?= $data->totalHrsSat;?>"></td>						
						<td><input name="totalHrsTot" type="text" class="time" value="<?= $data->totalHrsTot;?>"></td>			
					</tr>		
				</table>				
		</div>
		<div id="summary">
			<table>
				<tr>
					<td>TOTAL NORMAL PAY LESS 4HR RDO</td>	
					<td style="background-color: #FF9A00;"><input name="tot1" type="text" class="time" value="<?= $data->tot1;?>"></td>						
				</tr>
				<tr>
					<td>TOTAL TIME AND HALF (1.5)</td>	
					<td style="background-color: #FF9A00;"><input name="tot2" type="text" class="time" value="<?= $data->tot2;?>"></td>											
				</tr>
				<tr>
					<td>TOTAL DOUBLE TIME (2T)	</td>	
					<td style="background-color: #FF9A00;"><input name="tot3" type="text" class="time" value="<?= $data->tot3;?>"></td>											
				</tr>
				<tr>
					<td>TOTAL PRODUCTIVITY HRS	</td>	
					<td style="background-color: #FF9A00;"><input name="tot4" type="text" class="time" value="<?= $data->tot4;?>"></td>											
				</tr>
				<tr>
					<td>TOTAL RDO HRS TAKEN	</td>	
					<td style="background-color: #FF9A00;"><input name="tot5" type="text" class="time" value="<?= $data->tot5;?>"></td>											
				</tr>
				<tr>
					<td>TOTAL SICK TAKEN</td>	
					<td style="background-color: #FF9A00;"><input name="tot6" type="text" class="time" value="<?= $data->tot6;?>"></td>											
				</tr>
				<tr>
					<td>TOTAL HOLIDAY TAKEN	</td>	
					<td style="background-color: #FF9A00;"><input name="tot7" type="text" class="time" value="<?= $data->tot7;?>"></td>											
				</tr>
				<tr>
					<td>TOTAL TRAVEL DAYS</td>	
					<td style="background-color: #FF9A00;"><input name="tot8" type="text" class="time" value="<?= $data->tot8;?>"></td>											
				</tr>
				<tr>
					<td>TOTAL SITE ALLOW.</td>	
					<td style="background-color: #FF9A00;"><input name="tot9" type="text" class="time" value="<?= $data->tot9;?>"></td>											
				</tr>				
			</table>
		</div>
	</div>
	<div>
		<button style="margin-top: 10px;visibility: hidden;" type="button" class="btn btn-primary btn-lg btn-block" id="">Print</button>
	</div>
</form>
</div>
	<div>
		<button style="margin-top: 10px;" type="button" class="btn btn-primary btn-lg btn-block" id="create_pdf">Print</button>
	</div>

</body>
</html>
<script>
    (function () {
        var
         form = $('.form'),
         cache_width = form.width(),
         a4 = [895.28, 841.89]; // for a4 size paper width and height

        $('#create_pdf').on('click', function () {
            $('body').scrollTop(0);
            createPDF();
        });
        //create pdf
        function createPDF() {
            getCanvas().then(function (canvas) {
                var
                 img = canvas.toDataURL("image/png"),
                 doc = new jsPDF({
                 	 orientation: 'l',
                     unit: 'px',
                     format: 'a4'
                 });
                doc.addImage(img, 'JPEG', 20, 20);
                doc.save('bhavdip-html-to-pdf.pdf');
				//doc.output('datauri')
                form.width(cache_width);
            });
        }

        // create canvas object
        function getCanvas() {
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
            return html2canvas(form, {
                imageTimeout: 2000,
                removeContainer: false
            });
        }

    }());
</script>
<script>
    /*
 * jQuery helper plugin for examples and tests
 */
    (function ($) {
        $.fn.html2canvas = function (options) {
            var date = new Date(),
            $message = null,
            timeoutTimer = false,
            timer = date.getTime();
            html2canvas.logging = options && options.logging;
            html2canvas.Preload(this[0], $.extend({
                complete: function (images) {
                    var queue = html2canvas.Parse(this[0], images, options),
                    $canvas = $(html2canvas.Renderer(queue, options)),
                    finishTime = new Date();

                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);
                    $canvas.siblings().toggle();

                    $(window).click(function () {
                        if (!$canvas.is(':visible')) {
                            $canvas.toggle().siblings().toggle();
                            throwMessage("Canvas Render visible");
                        } else {
                            $canvas.siblings().toggle();
                            $canvas.toggle();
                            throwMessage("Canvas Render hidden");
                        }
                    });
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);
                }
            }, options));

            function throwMessage(msg, duration) {
                window.clearTimeout(timeoutTimer);
                timeoutTimer = window.setTimeout(function () {
                    $message.fadeOut(function () {
                        $message.remove();
                    });
                }, duration || 2000);
                if ($message)
                    $message.remove();
                $message = $('<div ></div>').html(msg).css({
                    margin: 0,
                    padding: 10,
                    background: "#000",
                    opacity: 0.7,
                    position: "fixed",
                    top: 10,
                    right: 10,
                    fontFamily: 'Tahoma',
                    color: '#fff',
                    fontSize: 12,
                    borderRadius: 12,
                    width: 'auto',
                    height: 'auto',
                    textAlign: 'center',
                    textDecoration: 'none'
                }).hide().fadeIn().appendTo('body');
            }
        };
    })(jQuery);

</script>
