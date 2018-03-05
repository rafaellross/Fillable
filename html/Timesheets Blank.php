<html><head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
        P {
         text-align:justify;
         margin-bottom:23px;
         margin-top:0px;
         margin-right:0px;
         text-indent:0px;
         direction:ltr
        }
        SPAN {
         font-family:'Arial','Arial',sans-serif;
         font-size:14.3pt;
         font-style:normal;
         font-weight:bold
        }
        TABLE {
         border-width:thin;
         border-collapse:collapse;
         padding:3px;
         text-align:center;
         vertical-align:top;
         margin-bottom:23px;
         margin-top:0px;
         margin-right:0px;
         margin-left:0px;
         direction:ltr;
         width:auto;
         height:auto;
         display:table;
         float:none
        }
        TR {
         vertical-align:top;
         height:auto
        }
        TH {
         text-align:left;
         vertical-align:bottom
        }
        TD { 
         text-align:center;
         vertical-align:top
        }
        DIV[class="Part"] {
         text-align:left;
         margin-bottom:0px;
         margin-top:0px;
         margin-right:0px;
         text-indent:0px;
         direction:ltr
        }
        H6 {
         text-align:justify;
         margin-bottom:32px;
         margin-top:0px;
         margin-right:0px;
         text-indent:0px;
         direction:ltr
        }
        H2 {
         text-align:;
         margin-bottom:9px;
         margin-top:0px;
         margin-right:15px;
         margin-left:819px;
         text-indent:0px;
         direction:ltr
        }
        IMG {
         text-align:left;
         vertical-align:top;
         margin-bottom:9px;
         margin-top:0px;
         margin-right:15px;
         margin-left:819px;
         direction:ltr
        }
        DIV[class="Sect"] {
         text-align:left;
         margin-bottom:0px;
         margin-top:0px;
         margin-right:0px;
         text-indent:0px;
         direction:ltr
        }
    </style>
    <meta name="dc.creator" content="Christos">
    <meta name="dc.title" content="Timesheets.xls">
    <meta name="dc.date" content="2015-05-05T16:26:36+10:00">
    <meta name="dc.date.modified" content="2016-10-17T14:12:06+11:00">
    <meta name="generator" content="Adobe Acrobat Exchange-Pro 9.0.0">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.mask.js"></script>
<script>
$(document).ready(function(){

	$('.time').mask('00:00');
  
	$('.time').change(function(){
/*
		var timeOfCall = $('#monstart').val(),
			timeOfResponse = $('#monend').val(),
			hours = timeOfResponse.split(':')[0] - timeOfCall.split(':')[0],
			minutes = timeOfResponse.split(':')[1] - timeOfCall.split(':')[1];
		
		minutes = minutes.toString().length<2?'0'+minutes:minutes;
		if(minutes<0){ 
			hours--;
			minutes = 60 + minutes;
		}
		hours = hours.toString().length<2?'0'+hours:hours;
		$('#total').val(hours + ':' + minutes);
*/
	});

});
</script>
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="fushia">
    <p>
      <span style="color:#000000">Name: </span>
    <span style="border-style:thin"></span>
    <label>
      <input type="text" name="name" size="50" maxlength="60">
    </label>
    <span style="color:#000000">W/E: </span>
    <label>
      <input type="date" name="weekend">
    </label>
    </p>
    <table>
<tbody><tr>
            <th style="text-align:center; vertical-align:top; width:52px; height:22px; border-style:solid; border-color:#000000; border-width:2px">
            </th><th colspan="3" style="text-align: center;height:22px;border-style:solid;border-color:#000000;border-width:2px;">
                <span style="font-size:4.8pt; color:#000000">MON </span>
            </th>
            <th colspan="3" style="height:22px;border-style:solid;border-color:#000000;border-width:2px;text-align: center;">
                <span style="font-size:4.8pt; color:#000000">TUE </span>
            </th>
            <th colspan="3" style="height:22px;border-style:solid;border-color:#000000;border-width:2px;text-align: center;">
                <span style="font-size:4.8pt; color:#000000">WED </span>
            </th>
            <th colspan="3" style="height:22px;border-style:solid;border-color:#000000;border-width:2px;text-align: center;">
                <span style="font-size:4.8pt; color:#000000">THU </span>
            </th>
            <th colspan="3" style="width:141px;height:22px;border-style:solid;border-color:#000000;border-width:2px;text-align: center;">
                <span style="font-size:4.8pt; color:#000000">FRI </span>
            </th>
            <th colspan="3" style="width:95px;height:22px;border-style:solid;border-color:#000000;border-width:2px;text-align: center;">
                <span style="font-size:4.8pt; color:#000000">SAT </span>
            </th>
            <th style="width:20px;height:22px;border-style:solid;border-color:#000000;border-width: 0;">&nbsp;</th>
            <th style="width:95px;height:22px;border-style:solid;border-color:#000000;border-width:2px;text-align: center;">
              <span style="font-size:4.8pt; color:#000000">TOTAL HRS </span>
</th>
        </tr>
        <tr>
            <th style="text-align:center; width:52px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="font-size:4.8pt; color:#000000">START &amp; FINISH TIME </span>
            </th>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width: 0;">
                <span style="border-style:thin"></span>



                    <input type="text" name="monstart" id="monstart" class="time" maxlength="5" size="2">

</td>
            <td style="height:31px; border-style:solid; border-color:#000000; border-width:0px">-</td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width: 0;">
            <input type="text" name="monend" class="time" id="monend" maxlength="5" size="2"></td>
            
            <td style="height:31px;border-style:solid;border-color:#000000;border-width: 1px 0px 2px 2px;">
                <span style="border-style:thin"></span>
            <input type="text" name="tuestart" class="time" id="tuestart" maxlength="5" size="2"></td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width: 0;">-</td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width: 2px 0 0 0;"><input type="text" name="tueend" class="time" id="tueend" maxlength="5" size="2"></td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width:2px;border-right-width: 0;">
                <span style="border-style:thin"></span>
            <input type="text" name="wedstart" class="time" id="wedstart" maxlength="5" size="2"></td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width: 0;">-</td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width:2px;border-left-width: 0;"><input type="text" name="wedend" class="time" id="wedend" maxlength="5" size="2"></td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width:2px;border-right-width: 0;">
                <span style="border-style:thin"></span>
            <input type="text" name="thustart" class="time" id="thustart" maxlength="5" size="2"></td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width: 0;">-</td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width:2px;border-left-width: 0;"><input type="text" name="thuend" class="time" id="thuend" maxlength="5" size="2"></td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width:2px;border-right-width: 0;">
                <span style="border-style:thin"></span>
            <input type="text" name="fristart" class="time" id="fristart" maxlength="5" size="2"></td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width: 0;">-</td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width:2px;border-left-width: 0;"><span style="height:31px;border-style:solid;border-color:#000000;border-width: 0;">
              <input type="text" name="friend" class="time" id="friend" maxlength="5" size="2">
            </span></td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width:2px;border-right-width: 0;">
                <span style="border-style:thin"></span>
            <input type="text" name="satstart" class="time" id="satstart" maxlength="5" size="2"></td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width: 0;">-</td>
            <td style="height:31px;border-style:solid;border-color:#000000;border-width:2px;border-left-width: 0;"><span style="height:31px;border-style:solid;border-color:#000000;border-width: 0;">
              <input type="text" name="satend" class="time" id="satend" maxlength="5" size="2">
            </span></td>
            <td style="width:20px;height:31px;border-style:solid;border-color:#000000;border-width: 0;">&nbsp;</td>
            <td style="height:31px; border-style:solid; border-color:#000000; border-width:2px">
              <label>
                <input type="text" name="total" id="total" class="time" size="3">
              </label>
</td>
        </tr>
        <tr>
            <th style="text-align:center; width:52px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="font-size:4.8pt; color:#000000">JOB/HRS </span>
            </th>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>

                    <input type="text" name="job1mon" size="6">
                    <span></span>
                    <input type="text" name="hour1mon" size="6">                    
</td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1tue1" size="6">
                <span></span>
            <input type="text" name="hour1tue1" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1wed1" size="6">
                <span></span>
            <input type="text" name="hour1wed1" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1thu" size="6">
                <span></span>
            <input type="text" name="hour1thu" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
            

                <input type="text" name="job1fri" size="6">

                <input type="text" name="hour1fri" size="6">
</td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>

              <input type="text" name="job1sat" size="6">

              <input type="text" name="hour1sat" size="6">
</td>
            <td style="width:20px;height:31px;border-style:solid;border-color:#000000;border-width: 0;">&nbsp;</td>
            <td style="width:95px; height:31px; border-style:solid; border-color:#000000; border-width:2px"><input type="text" name="total2" id="total2" class="time" size="3"></td>
        </tr>
        <tr>
            <th style="text-align:center; width:52px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="font-size:4.8pt; color:#000000">JOB/HRS </span>
            </th>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1mon2" id="job1mon2" size="6">
                <span></span>
            <input type="text" name="hour1mon2" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1tue2" size="6">
                <span></span>
            <input type="text" name="hour1tue2" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1wed2" size="6">
                <span></span>
            <input type="text" name="hour1wed2" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1thu2" size="6">
                <span></span>
            <input type="text" name="hour1thu2" size="6"></td>
            <td colspan="3" style="width:141px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              

                <input type="text" name="job1fri2" size="6">
                <input type="text" name="hour1fri2" size="6">
</td>
            <td colspan="3" style="width:95px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>

                <input type="text" name="job1sat2" size="6">

                <input type="text" name="hour1sat2" size="6">
</td>
            <td style="width:20px;height:31px;border-style:solid;border-color:#000000;border-width: 0;">&nbsp;</td>
            <td style="width:95px; height:31px; border-style:solid; border-color:#000000; border-width:2px"><input type="text" name="total3" id="total3" class="time" size="3"></td>
        </tr>
        <tr>
            <th style="text-align:center; width:52px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="font-size:4.8pt; color:#000000">JOB/HRS </span>
            </th>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1mon3" id="job1mon3" size="6">
                <span></span>
            <input type="text" name="hour1mon3" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1tue3" size="6">
                <span></span>
            <input type="text" name="hour1tue3" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1wed3" size="6">
                <span></span>
            <input type="text" name="hour1wed3" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1thu3" size="6">
                <span></span>
            <input type="text" name="hour1thu3" size="6"></td>
            <td colspan="3" style="width:141px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
                
            

                <input type="text" name="job1fri3" size="6">
                <input type="text" name="hour1fri3" size="6">
</td>
            <td colspan="3" style="width:95px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>

                <input type="text" name="job1sat3" size="6">

                <input type="text" name="hour1sat3" size="6">
</td>
            <td style="width:20px;height:31px;border-style:solid;border-color:#000000;border-width: 0;">&nbsp;</td>
            <td style="width:95px; height:31px; border-style:solid; border-color:#000000; border-width:2px"><input type="text" name="total4" id="total4" class="time" size="3"></td>
        </tr>
        <tr>
            <th style="text-align:center; width:52px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="font-size:4.8pt; color:#000000">JOB/HRS </span>
            </th>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1mon4" size="6">
                <span></span>
            <input type="text" name="hour1mon4" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1tue4" size="6">
                <span></span>
            <input type="text" name="hour1tue4" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1wed4" size="6">
                <span></span>
            <input type="text" name="hour1wed4" size="6"></td>
            <td colspan="3" style="width:154px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
              <input type="text" name="job1thu4" size="6">
                <span></span>
            <input type="text" name="hour1thu4" size="6"></td>
            <td colspan="3" style="width:141px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>

              <input type="text" name="job1fri4" size="6">
              <input type="text" name="hour1fri4" size="6">

              </td>
            <td colspan="3" style="width:95px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>

                <input type="text" name="job1sat4" size="6">

                <input type="text" name="hour1sat4" size="6">
</td>
            <td style="width:20px;height:31px;border-style:solid;border-color:#000000;border-width: 0;">&nbsp;</td>
            <td style="width:95px; height:31px; border-style:solid; border-color:#000000; border-width:2px"><input type="text" name="total5" id="total5" class="time" size="3"></td>
        </tr>
        <tr>
            <th style="text-align:center; width:52px; height:31px; border-style:solid; border-color:#000000; border-width:2px">
                <span style="font-size:4.8pt; color:#000000">TOTAL HRS </span>
            </th>
            <td colspan="3" style="width:154px; height:31px; background-color:#C0C0C0; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
            <input type="text" name="totahours"class="time" size="3"></td>
            <td colspan="3" style="width:154px; height:31px; background-color:#C0C0C0; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
            <input type="text" name="totahours2"class="time" size="3"></td>
            <td colspan="3" style="width:154px; height:31px; background-color:#C0C0C0; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
            <input type="text" name="totahours3"class="time" size="3"></td>
            <td colspan="3" style="width:154px; height:31px; background-color:#C0C0C0; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>
            <input type="text" name="totahours4"class="time" size="3"></td>
            <td colspan="3" style="width:141px; height:31px; background-color:#C0C0C0; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>

                <input type="text" name="totahours5"class="time" size="3">
</td>
            <td colspan="3" style="width:95px; height:31px; background-color:#C0C0C0; border-style:solid; border-color:#000000; border-width:2px">
                <span style="border-style:thin"></span>

                <input type="text" name="totahours6"class="time" size="3">
</td>
            <td style="width:20px;height:31px;border-style:solid;border-color:#000000;border-width: 0;">&nbsp;</td>
            <td style="width:95px; height:31px; background-color:#C0C0C0; border-style:solid; border-color:#000000; border-width:2px"><input type="text" name="total6" id="total6" class="time" size="3"></td>
        </tr>
    </tbody></table>
    <div class="Part">
      <h6>
            <span style="font-size:5.7pt; color:#000000">By signing this form I take full responsibility for the hours stated above and confirm the information is correct and true. </span>
            <span style="border-style:thin"></span>
            <span style="border-style:thin"></span>
            <span style="border-style:thin"></span>
      </h6>
        <p style="margin-bottom:0px">
        <span style="font-size:7.6pt; font-weight:normal; color:#000000">Employee Signature </span>
        <input type="text" name="employeesign" id="textfield">
        <span style="font-size:7.6pt; font-weight:normal; color:#000000">Date </span>
        <label>
          <input type="date" name="currdate">
        </label>
        </p>
</div>
<div class="Part">

  <div class="Sect">
    <p style="margin-bottom:9px">
        <span style="font-size:7.6pt; font-weight:normal; color:#000000">Authorised By </span><span style="margin-bottom:0px">
        <input type="text" name="textfield" id="textfield2">
        <span style="font-size:7.6pt; font-weight:normal; color:#000000">Date</span>        </span>
      <input type="date" name="currdate2">
    </p>
            <h2><span style="font-size:19.1pt; color:#000000">TIME SHEET </span> </h2>
            <p style="text-align:; margin-bottom:4px; margin-right:30px; margin-left:833px"> <span style="font-size:7.6pt; color:#000000">Fax Number 02 8668 4892 </span> </p>
            <p style="text-align:; margin-bottom:0px; margin-left:804px"> <span style="font-size:7.6pt; font-weight:normal; color:#0000FF; text-decoration:underline">admin@smartplumbingsolutions.com.au </span> <span style="border-style:thin"></span> </p>
      <p style="margin-bottom:9px">&nbsp;</p>
</div>
        <p style="text-align:; margin-bottom:9px; margin-right:24px; margin-left:828px">
            <span style="font-size:7.6pt; color:#000000">Call 1800 69 SMART (76278) </span>
        </p>
        <div class="Sect">
            <p style="margin-bottom:13px">
                <span style="font-size:5.2pt; font-style:italic; font-weight:normal; color:#000000">OFFICE USE ONLY </span>
            </p>
            <table style="text-align:left">
                <tbody><tr>
                    <th style="text-align:center; width:54px; height:21px; border-style:solid; border-color:#000000; border-width:2px 1px 2px 2px">
                        <span style="font-size:4.8pt; color:#000000">JOB </span>
                    </th>
                    <th style="text-align:center; width:76px; height:21px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 1px">
                        <span style="font-size:4.8pt; color:#000000">HOURS </span>
                    </th>
                </tr>
                <tr>
                    <td style="text-align:center; width:54px; height:22px; border-style:solid; border-color:#000000; border-width:2px 1px 1px 2px">
                    </td><td style="text-align:center; width:76px; height:22px; border-style:solid; border-color:#000000; border-width:2px 2px 1px 1px">
                </td></tr>
                <tr>
                    <td style="text-align:center; width:54px; height:23px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
                    </td><td style="text-align:center; width:76px; height:23px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
                </td></tr>
                <tr>
                    <td style="text-align:center; width:54px; height:23px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
                    </td><td style="text-align:center; width:76px; height:23px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
                </td></tr>
                <tr>
                    <td style="text-align:center; width:54px; height:23px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
                    </td><td style="text-align:center; width:76px; height:23px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
                </td></tr>
                <tr>
                    <td style="text-align:center; width:54px; height:23px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
                    </td><td style="text-align:center; width:76px; height:23px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
                </td></tr>
                <tr>
                    <td style="text-align:center; width:54px; height:23px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
                    </td><td style="text-align:center; width:76px; height:23px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
                </td></tr>
                <tr>
                    <td style="text-align:center; width:54px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 2px 2px">
                    </td><td style="text-align:center; width:76px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 2px 1px">
                </td></tr>
            </tbody></table>
            <table>
                <tbody><tr>
                    <th style="text-align:center; vertical-align:top; width:76px; height:21px; border-style:solid; border-color: #000000; border-width:2px">
                    </th><th style="text-align:center; width:77px; height:21px; border-style:solid; border-color: #000000; border-width:2px 1px 2px 2px">
                        <span style="font-size:4.8pt; color:#000000">MON </span>
                    </th>
                    <th style="text-align:center; width:78px; height:21px; border-style:solid; border-color: #000000; border-width:2px 1px 2px 1px">
                        <span style="font-size:4.8pt; color:#000000">TUE </span>
                    </th>
                    <th style="text-align:center; width:78px; height:21px; border-style:solid; border-color: #000000; border-width:2px 1px 2px 1px">
                        <span style="font-size:4.8pt; color:#000000">WED </span>
                    </th>
                    <th style="text-align:center; width:78px; height:21px; border-style:solid; border-color: #000000; border-width:2px 1px 2px 1px">
                        <span style="font-size:4.8pt; color:#000000">THU </span>
                    </th>
                    <th style="text-align:center; width:77px; height:21px; border-style:solid; border-color: #000000; border-width:2px 1px 2px 1px">
                        <span style="font-size:4.8pt; color:#000000">FRI </span>
                    </th>
                    <th style="text-align:center; width:77px; height:21px; border-style:solid; border-color: #000000; border-width:2px 2px 2px 1px">
                        <span style="font-size:4.8pt; color:#000000">SAT </span>
                    </th>
                    <th style="text-align:center; width:62px; height:21px; border-style:solid; border-color: #000000; border-width:2px">
                        <span style="font-size:4.8pt; color:#000000">TOTAL </span>
                    </th>
                </tr>
                <tr>
                    <td style="text-align:center; vertical-align:bottom; width:76px; height:22px; background-color:#C0C0C0; border-style:solid; border-color: #101010; border-width:2px 2px 1px 2px">
                        <span style="font-size:4.8pt; color:#000000">TOTAL HRS </span>
                    </td>
                    <td style="text-align:center; width:77px; height:22px; background-color:#C0C0C0; border-style:solid; border-color: #101010; border-width:2px 1px 1px 2px">
                    </td><td style="text-align:center; width:78px; height:22px; background-color:#C0C0C0; border-style:solid; border-color: #101010; border-width:2px 1px 1px 1px">
                    </td><td style="text-align:center; width:78px; height:22px; background-color:#C0C0C0; border-style:solid; border-color: #101010; border-width:2px 1px 1px 1px">
                    </td><td style="text-align:center; width:78px; height:22px; background-color:#C0C0C0; border-style:solid; border-color: #101010; border-width:2px 1px 1px 1px">
                    </td><td style="text-align:center; width:77px; height:22px; background-color:#C0C0C0; border-style:solid; border-color: #101010; border-width:2px 1px 1px 1px">
                    </td><td style="text-align:center; width:77px; height:22px; background-color:#C0C0C0; border-style:solid; border-color: #101010; border-width:2px 2px 1px 1px">
                    </td><td style="text-align:center; width:62px; height:22px; border-style:solid; border-color: #101010; border-width:2px 2px 1px 2px">
                </td></tr>
                <tr>
                    <td style="text-align:center; vertical-align:bottom; width:76px; height:23px; border-style:solid; border-color: #1C1C1C; border-width:1px 2px 1px 2px">
                        <span style="font-size:4.8pt; color:#000000">NOR </span>
                    </td>
                    <td style="text-align:center; width:77px; height:23px; border-style:solid; border-color: #1C1C1C; border-width:1px 1px 1px 2px">
                    </td><td style="text-align:center; width:78px; height:23px; border-style:solid; border-color: #1C1C1C; border-width:1px">
                    </td><td style="text-align:center; width:78px; height:23px; border-style:solid; border-color: #1C1C1C; border-width:1px">
                    </td><td style="text-align:center; width:78px; height:23px; border-style:solid; border-color: #1C1C1C; border-width:1px">
                    </td><td style="text-align:center; width:77px; height:23px; border-style:solid; border-color: #1C1C1C; border-width:1px">
                    </td><td style="text-align:center; width:77px; height:23px; border-style:solid; border-color: #1C1C1C; border-width:1px 2px 1px 1px">
                    </td><td style="text-align:center; width:62px; height:23px; background-color:#FFFF9A; border-style:solid; border-color: #1C1C1C; border-width:1px 2px 1px 2px">
                </td></tr>
                <tr>
                    <td style="text-align:center; vertical-align:bottom; width:76px; height:23px; border-style:solid; border-color: #000000; border-width:1px 2px 1px 2px">
                        <span style="font-size:4.8pt; color:#000000">1.5 </span>
                    </td>
                    <td style="text-align:center; width:77px; height:23px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
                    </td><td style="text-align:center; width:78px; height:23px; border-style:solid; border-color:#000000; border-width:1px">
                    </td><td style="text-align:center; width:78px; height:23px; border-style:solid; border-color:#000000; border-width:1px">
                    </td><td style="text-align:center; width:78px; height:23px; border-style:solid; border-color:#000000; border-width:1px">
                    </td><td style="text-align:center; width:77px; height:23px; border-style:solid; border-color:#000000; border-width:1px">
                    </td><td style="text-align:center; width:77px; height:23px; border-style:solid; border-color: #000000; border-width:1px 2px 1px 1px">
                    </td><td style="text-align:center; width:62px; height:23px; background-color:#FFFF9A; border-style:solid; border-color: #000000; border-width:1px 2px 1px 2px">
                </td></tr>
                <tr>
                    <td style="text-align:center; vertical-align:bottom; width:76px; height:22px; border-style:solid; border-color: #000000; border-width:1px 2px 2px 2px">
                        <span style="font-size:4.8pt; color:#000000">2 </span>
                    </td>
                    <td style="text-align:center; width:77px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 2px 2px">
                    </td><td style="text-align:center; width:78px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 2px 1px">
                    </td><td style="text-align:center; width:78px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 2px 1px">
                    </td><td style="text-align:center; width:78px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 2px 1px">
                    </td><td style="text-align:center; width:77px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 2px 1px">
                    </td><td style="text-align:center; width:77px; height:22px; border-style:solid; border-color: #000000; border-width:1px 2px 2px 1px">
                    </td><td style="text-align:center; width:62px; height:22px; background-color:#FFFF9A; border-style:solid; border-color: #000000; border-width:1px 2px 2px 2px">
                </td></tr>
            </tbody></table>
            <table style="text-align:right; margin-bottom:0px">
                <tbody><tr>
                    <th style="text-align:right; width:158px; height:21px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                        <span style="font-size:4.8pt; font-weight:normal; color:#000000">TOTAL NORMAL PAY LESS 4HR RDO </span>
                    </th>
                    <th style="text-align:right; vertical-align:top; width:31px; height:21px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                </th></tr>
                <tr>
                    <th style="text-align:right; width:158px; height:21px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                        <span style="font-size:4.8pt; font-weight:normal; color:#000000">TOTAL TIME AND HALF (1.5) </span>
                    </th>
                    <td style="text-align:right; width:31px; height:21px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                </td></tr>
                <tr>
                    <th style="text-align:right; width:158px; height:21px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                        <span style="font-size:4.8pt; font-weight:normal; color:#000000">TOTAL DOUBLE TIME (2T) </span>
                    </th>
                    <td style="text-align:right; width:31px; height:21px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                </td></tr>
                <tr>
                    <th style="text-align:right; width:158px; height:21px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                        <span style="font-size:4.8pt; font-weight:normal; color:#000000">TOTAL PRODUCTIVITY HRS </span>
                    </th>
                    <td style="text-align:right; width:31px; height:21px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                </td></tr>
                <tr>
                    <th style="text-align:right; width:158px; height:21px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                        <span style="font-size:4.8pt; font-weight:normal; color:#000000">TOTAL RDO HRS TAKEN </span>
                    </th>
                    <td style="text-align:right; width:31px; height:21px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                </td></tr>
                <tr>
                    <th style="text-align:right; width:158px; height:21px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                        <span style="font-size:4.8pt; font-weight:normal; color:#000000">TOTAL SICK TAKEN </span>
                    </th>
                    <td style="text-align:right; width:31px; height:21px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                </td></tr>
                <tr>
                    <th style="text-align:right; width:158px; height:21px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                        <span style="font-size:4.8pt; font-weight:normal; color:#000000">TOTAL HOLIDAY TAKEN </span>
                    </th>
                    <td style="text-align:right; width:31px; height:21px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                </td></tr>
                <tr>
                    <th style="text-align:right; width:158px; height:21px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                        <span style="font-size:4.8pt; font-weight:normal; color:#000000">TOTAL TRAVEL DAYS </span>
                    </th>
                    <td style="text-align:right; width:31px; height:21px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                </td></tr>
                <tr>
                    <th style="text-align:right; width:158px; height:22px; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                        <span style="font-size:4.8pt; font-weight:normal; color:#000000">TOTAL SITE ALLOW. </span>
                    </th>
                    <td style="text-align:right; width:31px; height:22px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:2px 2px 2px 2px">
                </td></tr>
            </tbody></table>
        </div>
</div>


</body></html>