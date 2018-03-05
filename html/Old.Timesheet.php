<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>	
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="../js/jquery.mask.js"></script>
	<!--
    <script src="../js/render.js"></script>	
    <script src="../js/new.js"></script>		
	-->
<script type="text/javascript">
	$(document).ready(function(){
		//$('.time').mask('00:00');		
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
	
<?php
	$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
	echo '<form method="post" name="fillable_form" action="../pdf.php?type='.$type.'&user='.$username.'">';
?>
	<table style="font-size: 70%;">
		<th>Name:</th>
		<th>
			<input type="text" name="empname" size="60" class="form-control form-control-sm" required>
		</th>
		<th>W/E:</th>
		<th><input type="date" name="weestart" class="form-control form-control-sm" required></th>
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

			<td>START & FINISH TIME</td>
			<!--Mon -->
			<td><input list="hours" name="monStart" class="time">-<input list="hours" name="monEnd" class="time"></td>
			<!--Tue -->
			<td><input list="hours" name="tueStart" class="time">-<input list="hours" name="tueEnd" class="time"></td>

			<!--Wed -->
			<td><input list="hours" name="wedStart" class="time">-<input list="hours" name="wedEnd" class="time"></td>
			<!--Thu -->
			<td><input list="hours" name="thuStart" class="time">-<input list="hours" name="thuEnd" class="time"></td>

			<!--Fri -->
			<td><input list="hours" name="friStart" class="time">-<input list="hours" name="friEnd" class="time"></td>
			<!--Sat -->
			<td><input list="hours" name="satStart" class="time">-<input list="hours" name="satEnd" class="time"></td>
			<td></td>
			<td><input type="text" name="totalWeek" class="time" required></td>			
			<datalist id="hours">
				<option value="00:00">00:00</option><option value="00:15">00:15</option><option value="00:30">00:30</option><option value="00:45">00:45</option><option value="01:00">01:00</option><option value="01:15">01:15</option><option value="01:30">01:30</option><option value="01:45">01:45</option><option value="02:00">02:00</option><option value="02:15">02:15</option><option value="02:30">02:30</option><option value="02:45">02:45</option><option value="03:00">03:00</option><option value="03:15">03:15</option><option value="03:30">03:30</option><option value="03:45">03:45</option><option value="04:00">04:00</option><option value="04:15">04:15</option><option value="04:30">04:30</option><option value="04:45">04:45</option><option value="05:00">05:00</option><option value="05:15">05:15</option><option value="05:30">05:30</option><option value="05:45">05:45</option><option value="06:00">06:00</option><option value="06:15">06:15</option><option value="06:30">06:30</option><option value="06:45">06:45</option><option value="07:00">07:00</option><option value="07:15">07:15</option><option value="07:30">07:30</option><option value="07:45">07:45</option><option value="08:00">08:00</option><option value="08:15">08:15</option><option value="08:30">08:30</option><option value="08:45">08:45</option><option value="09:00">09:00</option><option value="09:15">09:15</option><option value="09:30">09:30</option><option value="09:45">09:45</option><option value="10:00">10:00</option><option value="10:15">10:15</option><option value="10:30">10:30</option><option value="10:45">10:45</option><option value="11:00">11:00</option><option value="11:15">11:15</option><option value="11:30">11:30</option><option value="11:45">11:45</option><option value="12:00">12:00</option><option value="12:15">12:15</option><option value="12:30">12:30</option><option value="12:45">12:45</option><option value="13:00">13:00</option><option value="13:15">13:15</option><option value="13:30">13:30</option><option value="13:45">13:45</option><option value="14:00">14:00</option><option value="14:15">14:15</option><option value="14:30">14:30</option><option value="14:45">14:45</option><option value="15:00">15:00</option><option value="15:15">15:15</option><option value="15:30">15:30</option><option value="15:45">15:45</option><option value="16:00">16:00</option><option value="16:15">16:15</option><option value="16:30">16:30</option><option value="16:45">16:45</option><option value="17:00">17:00</option><option value="17:15">17:15</option><option value="17:30">17:30</option><option value="17:45">17:45</option><option value="18:00">18:00</option><option value="18:15">18:15</option><option value="18:30">18:30</option><option value="18:45">18:45</option><option value="19:00">19:00</option><option value="19:15">19:15</option><option value="19:30">19:30</option><option value="19:45">19:45</option><option value="20:00">20:00</option><option value="20:15">20:15</option><option value="20:30">20:30</option><option value="20:45">20:45</option><option value="21:00">21:00</option><option value="21:15">21:15</option><option value="21:30">21:30</option><option value="21:45">21:45</option><option value="22:00">22:00</option><option value="22:15">22:15</option><option value="22:30">22:30</option><option value="22:45">22:45</option><option value="23:00">23:00</option><option value="23:15">23:15</option><option value="23:30">23:30</option><option value="23:45">23:45</option>
				<option value="RDO">RDO</option>
				<option value="TAFE">TAFE</option>
				<option value="Sick Leave">Sick Leave</option>				
			</datalist>		


		</tr>
		<tr>
			<td>JOB/HRS</td>
			<td><input type="text" name="jobMon1">/<input type="text" class="time" name="hrsMon1"></td>
			<td><input type="text" name="jobTue1">/<input type="text" class="time" name="hrsTue1"></td>
			<td><input type="text" name="jobWed1">/<input type="text" class="time" name="hrsWed1"></td>
			<td><input type="text" name="jobThu1">/<input type="text" class="time" name="hrsThu1"></td>
			<td><input type="text" name="jobFri1">/<input type="text" class="time" name="hrsFri1"></td>						
			<td><input type="text" name="jobSat1">/<input type="text" class="time" name="hrsSat1"></td>
			<td></td>
			<td><input type="text" name="totalMon1"></td>						
		</tr>		
		<tr>
			<td>JOB/HRS</td>
			<td><input type="text" name="jobMon2">/<input type="text" class="time" name="hrsMon2"></td>
			<td><input type="text" name="jobTue2">/<input type="text" class="time" name="hrsTue2"></td>
			<td><input type="text" name="jobWed2">/<input type="text" class="time" name="hrsWed2"></td>
			<td><input type="text" name="jobThu2">/<input type="text" class="time" name="hrsThu2"></td>
			<td><input type="text" name="jobFri2">/<input type="text" class="time" name="hrsFri2"></td>						
			<td><input type="text" name="jobSat2">/<input type="text" class="time" name="hrsSat2"></td>
			<td></td>
			<td><input type="text" name="totalMon2"></td>						
		</tr>		
		<tr>
			<td>JOB/HRS</td>
			<td><input type="text" name="jobMon3">/<input type="text" class="time" name="hrsMon3"></td>
			<td><input type="text" name="jobTue3">/<input type="text" class="time" name="hrsTue3"></td>
			<td><input type="text" name="jobWed3">/<input type="text" class="time" name="hrsWed3"></td>
			<td><input type="text" name="jobThu3">/<input type="text" class="time" name="hrsThu3"></td>
			<td><input type="text" name="jobFri3">/<input type="text" class="time" name="hrsFri3"></td>						
			<td><input type="text" name="jobSat3">/<input type="text" class="time" name="hrsSat3"></td>
			<td></td>
			<td><input type="text" name="totalMon3"></td>						
		</tr>		
		<tr>
			<td>JOB/HRS</td>
			<td><input type="text" name="jobMon4">/<input type="text" class="time" name="hrsMon4"></td>
			<td><input type="text" name="jobTue4">/<input type="text" class="time" name="hrsTue4"></td>
			<td><input type="text" name="jobWed4">/<input type="text" class="time" name="hrsWed4"></td>
			<td><input type="text" name="jobThu4">/<input type="text" class="time" name="hrsThu4"></td>
			<td><input type="text" name="jobFri4">/<input type="text" class="time" name="hrsFri4"></td>						
			<td><input type="text" name="jobSat4">/<input type="text" class="time" name="hrsSat4"></td>
			<td></td>
			<td><input type="text" name="totalMon4"></td>						
		</tr>		
		<tr>
			<td>TOTAL HRS</td>
			<td><input style="width: 100px;" type="text" name="totalHrsMon" class="time"></td>
			<td><input style="width: 100px;" type="text" name="totalHrsTue" class="time"></td>
			<td><input style="width: 100px;" type="text" name="totalHrsWed" class="time"></td>
			<td><input style="width: 100px;" type="text" name="totalHrsThu" class="time"></td>
			<td><input style="width: 100px;" type="text" name="totalHrsFri" class="time"></td>
			<td><input style="width: 100px;" type="text" name="totalHrsSat" class="time"></td>
			<td></td>
			<td><input type="text" name="totalHrsTot" class="time"></td>			
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
					<input type="text" name="empSign" id="empSign">
				</td>
				<td>
					<span>Date</span>
					<input type="date" name="empDate">
				</td>	
			</tr>
			<tr>
				<td>
					<span>Authorised By</span> 
					<input type="text" name="authBy" id="empSign">
				</td>
				<td>
					<span>Date</span>
					<input type="date" name="authByDate">
				</td>	
			</tr>
			

		</table>		
	</div>
	<div style="float: left;">
		<div style="float: left;">
			<img src="images/Timesheets Blank_img_0.jpg">
		</div>		
		<div style="float: right;"">
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
					<td><input type="text" name="job1" maxlength="6"></td>
					<td><input type="text" name="hours1" class="time" ></td>
				</tr>
				<tr>
					<td><input type="text" name="job2" maxlength="6"></td>
					<td><input type="text" name="hours2" class="time"></td>
				</tr>
				<tr>
					<td><input type="text" name="job3" maxlength="6"></td>
					<td><input type="text" name="hours3" class="time"></td>
				</tr>
				<tr>
					<td><input type="text" name="job4" maxlength="6"></td>
					<td><input type="text" name="hours4" class="time"></td>
				</tr>
				<tr>
					<td><input type="text" name="job5" maxlength="6"></td>
					<td><input type="text" name="hours5" class="time"></td>
				</tr>
				<tr>
					<td><input type="text" name="job6" maxlength="6"></td>
					<td><input type="text" name="hours6" class="time"></td>
				</tr>
				<tr>
					<td><input type="text" name="job7" maxlength="6"></td>
					<td><input type="text" name="hours7" class="time"></td>
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
						<td><input style="background-color: #C0C0C0;border: 0;" type="text" name="totalHrsMonOf" class="time"></td>
						<td><input style="background-color: #C0C0C0;border: 0;" type="text" name="totalHrsTueOf" class="time"></td>
						<td><input style="background-color: #C0C0C0;border: 0;" type="text" name="totalHrsWedOf" class="time"></td>
						<td><input style="background-color: #C0C0C0;border: 0;" type="text" name="totalHrsThuOf" class="time"></td>
						<td><input style="background-color: #C0C0C0;border: 0;" type="text" name="totalHrsFriOf" class="time"></td>
						<td><input style="background-color: #C0C0C0;border: 0;" type="text" name="totalHrsSatOf" class="time"></td>						
						<td><input style="background-color: #C0C0C0;border: 0;" type="text" name="totalHrsTotOf" class="time"></td>			
					</tr>		
					<tr>
						<td>NOR</td>
						<td><input type="text" name="totalHrsMonNor" class="time"></td>
						<td><input type="text" name="totalHrsTueNor" class="time"></td>
						<td><input type="text" name="totalHrsWedNor" class="time"></td>
						<td><input type="text" name="totalHrsThuNor" class="time"></td>
						<td><input type="text" name="totalHrsFriNor" class="time"></td>
						<td><input type="text" name="totalHrsSatNor" class="time"></td>						
						<td><input type="text" name="totalHrsTotNor" class="time"></td>			
					</tr>		
					<tr>
						<td>1.5</td>
						<td><input type="text" name="totalHrsMon15" class="time"></td>
						<td><input type="text" name="totalHrsTue15" class="time"></td>
						<td><input type="text" name="totalHrsWed15" class="time"></td>
						<td><input type="text" name="totalHrsThu15" class="time"></td>
						<td><input type="text" name="totalHrsFri15" class="time"></td>
						<td><input type="text" name="totalHrsSat15" class="time"></td>						
						<td><input type="text" name="totalHrsTot15" class="time"></td>			
					</tr>		
					<tr>
						<td>2</td>
						<td><input type="text" name="totalHrsMon2" class="time"></td>
						<td><input type="text" name="totalHrsTue2" class="time"></td>
						<td><input type="text" name="totalHrsWed2" class="time"></td>
						<td><input type="text" name="totalHrsThu2" class="time"></td>
						<td><input type="text" name="totalHrsFri2" class="time"></td>
						<td><input type="text" name="totalHrsSat2" class="time"></td>						
						<td><input type="text" name="totalHrsTot2" class="time"></td>			
					</tr>		
				</table>				
		</div>
		<div id="summary">
			<table>
				<tr>
					<td>TOTAL NORMAL PAY LESS 4HR RDO</td>	
					<td style="background-color: #FF9A00;"><input type="text" name="tot1" class="time"></td>						
				</tr>
				<tr>
					<td>TOTAL TIME AND HALF (1.5)</td>	
					<td style="background-color: #FF9A00;"><input type="text" name="tot2" class="time"></td>											
				</tr>
				<tr>
					<td>TOTAL DOUBLE TIME (2T)	</td>	
					<td style="background-color: #FF9A00;"><input type="text" name="tot3" class="time"></td>											
				</tr>
				<tr>
					<td>TOTAL PRODUCTIVITY HRS	</td>	
					<td style="background-color: #FF9A00;"><input type="text" name="tot4" class="time"></td>											
				</tr>
				<tr>
					<td>TOTAL RDO HRS TAKEN	</td>	
					<td style="background-color: #FF9A00;"><input type="text" name="tot5" class="time"></td>											
				</tr>
				<tr>
					<td>TOTAL SICK TAKEN</td>	
					<td style="background-color: #FF9A00;"><input type="text" name="tot6" class="time"></td>											
				</tr>
				<tr>
					<td>TOTAL HOLIDAY TAKEN	</td>	
					<td style="background-color: #FF9A00;"><input type="text" name="tot7" class="time"></td>											
				</tr>
				<tr>
					<td>TOTAL TRAVEL DAYS</td>	
					<td style="background-color: #FF9A00;"><input type="text" name="tot8" class="time"></td>											
				</tr>
				<tr>
					<td>TOTAL SITE ALLOW.</td>	
					<td style="background-color: #FF9A00;"><input type="text" name="tot9" class="time"></td>											
				</tr>				
			</table>
		</div>
	</div>
	<div>
		<button style="margin-top: 10px;" type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
	</div>
</form>
</div>

</body>
</html>