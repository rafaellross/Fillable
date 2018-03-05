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
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
.container {
	width: 581px;
}

input[type=text]{
	font-size: 70%;
}

TABLE {
 border-width:thin;
 border-collapse:collapse;
 padding:3px;
 text-align:center;
 vertical-align:top;
 margin-bottom:27px;
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
TD { 
 text-align:left;
 vertical-align:top
}
SPAN {
 font-family:'Arial','Arial',sans-serif;
 font-size:11.6pt;
 font-style:normal;
 font-weight:bold
}
TH {
 text-align:left;
 vertical-align:top
}
P {
 text-align:left;
 margin-bottom:12px;
 margin-top:0px;
 margin-right:0px;
 margin-left:5px;
 text-indent:0px;
 direction:ltr;
 line-height:15px
}
IMG {
 text-align:left;
 vertical-align:top;
 margin-bottom:-6px;
 margin-top:0px;
 margin-right:0px;

 direction:ltr
}
</style>
<meta name="dc.creator" content="Christos">
<meta name="dc.title" content="Microsoft Word - DAILY PLANT INSPECTION CHECKLIST KOBELCO.doc">
<meta name="dc.date" content="2015-07-24T13:09:32+10:00">
<meta name="dc.date.modified" content="2015-07-24T13:52:12+10:00">
<meta name="generator" content="Adobe Acrobat Exchange-Pro 9.0.0">

</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="fushia">
<div class="container">
<?php
	$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
	echo '<form method="post" name="fillable_form" action="../submit.php?type='.$type.'&user='.$username.'">';
?>

<table>
<tbody>
<tr>
<th style="width:288px; height:93px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<img src="images/Site Diary_img_0.jpg" width="130" align="middle"/>
</th>
<td style="width:287px; height:93px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="color:#000000">Week Starting: </span>
<label>
  <input name="weekstart" type="date" id="weekstart" maxlength="8" value="<?= $data->weekstart;?>">
</label></td>
</tr>
<tr>
<th colspan="2" style="width:575px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
<span style="color:#000000">SMART PLUMBING DAILY PLANT INSPECTION CHECKLIST </span></th>
</tr>
<tr>
<th colspan="2" style="width:575px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
</th></tr>
</tbody></table>
<table style="margin-bottom:15px" class="table-ident">
<tbody><tr>
<td style="width:288px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">WORKING FOR: </span>
<label for="workingfor"></label>
<input name="workingfor" type="text" id="workingfor" maxlength="28" style="width: 181px;"  value="<?= $data->workingfor;?>"></td>
<td style="width:287px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">JOB SITE: </span><span style="border-style:thin">
<input name="jobsite" type="text" id="jobsite" size="37" maxlength="35" style="
    width: 215px;
" value="<?= $data->jobsite;?>">
</span></td>
</tr>
<tr>
<td style="width:288px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">PLANT DESCRIPTION: </span>
<label for="plantdesc"></label>  <input name="plantdesc" type="text" id="plantdesc" style="
    width: 141px;
" value="<?= $data->plantdesc;?>" size="27" maxlength="22"></td>
<td style="width:287px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">REGISTRATION or PERMIT NO: </span>
<label>
  <input name="regnumber" type="text" id="regnumber" style="width: 85px;" value="<?= $data->regnumber;?>" size="19" maxlength="13">
</label></td>
</tr>
<tr>
<td style="width:288px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">MAKE &amp; MODEL:  </span>
<label>
  <input name="makemodel" type="text" id="makemodel" style="
    width: 175px;
" value="<?= $data->makemodel;?>" size="32" maxlength="27">
</label><span style="border-style:thin"></span>
</td>
<td style="width:287px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">EXPIRY DATE: </span>
<label>
  <input name="expdate" type="text" id="expdate" style="
    width: 189px;
" value="<?= $data->expdate;?>" size="34" maxlength="10">
</label></td>
</tr>
<tr>
<td style="width:288px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">SERIAL NO:  </span>
<label>
  <input name="serialnumber" type="text" id="serialnumber" style="
    width: 206px;
" value="<?= $data->serialnumber;?>" size="36" maxlength="32">
</label></td>
<td style="width:287px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">HOUR METRE/ KM READING: </span>
<label>
  <input name="hourkmread" type="text" id="hourkmread" style="width: 97px;" value="<?= $data->hourkmread;?>" size="21" maxlength="15">
</label></td>
</tr>
</tbody></table>
<p>
<span style="font-size:9.7pt; color:#000000; text-decoration:underline">PLANT OPERATOR DAILY SAFETY CHECKLIST<span style="font-size:9.7pt">: 
</span></span><span style="font-size:9.7pt; color:#000000">Operators are required to check the following items before commencing work. Thes</span><span style="font-size:9.7pt; color:#000000">e
</span><span style="font-size:9.7pt; color:#000000">records form the basis of a plant maintenance procedure and will be subject to rando</span><span style="font-size:9.7pt; color:#000000">m 
</span><span style="font-size:9.7pt; color:#000000">inspection. Keep record with machine at all times</span><span style="font-size:9.7pt; color:#000000">. 
</span></p>

<table>
<tr>
	<td>
		<img src="images/DAILY PLANT INSPECTION CHECKLIST KOBELCO_img_0.jpg" width="36" height="35" align="left" style="display:block; float:left">
    </td>
    <td style="padding-left: 10px;">
		<span style="font-size:7.7pt; color:#000000;">OK, no obvious defect </span>    
    </td>
    <td>		
    	<img src="images/DAILY PLANT INSPECTION CHECKLIST KOBELCO_img_1.jpg" width="36" height="35" align="left" style="display:block; float:left">

    </td>
    <td style="padding-left: 10px;">
	    <span style="font-size:7.7pt; color:#000000">Fault identified, use report below</span>
    </td>
	<td>
    	<span style="line-height:21px">N/A </span>
    </td>    
	<td style="padding-left: 10px;">
	    <span style="font-size:7.7pt; color:#000000">Item not applicable to machine or operator</span>
    </td>    
    
</tr>
<tr style="height:15px;"></tr>

<tr style="border: red 2px solid; margin-top: 30px;">
	<td style="text-align:center">
		<span>Y</span>
    </td>
    <td>

    </td>
	<td style="text-align:center">
	    <span>N</span>
    </td>
    <td>
	    <span style="font-size:7.7pt; color:#000000"></span>
    </td>
	<td style="text-align:center">
    	<span style="line-height:21px">N/A </span>
    </td>    
	<td>
	    <span style="font-size:7.7pt; color:#000000"></span>
    </td>       
</tr>
</table>
<p style="margin-bottom:34px; margin-right:45px; margin-left:423px; line-height:12px">&nbsp;</p>
<table style="margin-bottom:11px">
<tbody><tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">BEFORE COMMENCING OPERATIONS CHECK </span></th>
<th style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">M </span></th>
<th style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">T </span></th>
<th style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">W </span></th>
<th style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">T </span></th>
<th style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">F </span></th>
<th style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">S </span></th>
<th style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">S </span></th>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Cabin- Access, egress seating, seatbelts, loose objects, controls, rops or fops </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">

  <label>
    <select name="f1">
    	<option <?php echo ($data->f1 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f1 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f1 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f1 == "none" ? 'selected' : ''); ?> value="none"></option>                        
    </select>
  </label>
</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
   <label>
    <select name="f2">    	<option <?php echo ($data->f2 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f2 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f2 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f2 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f3">    	<option <?php echo ($data->f3 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f3 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f3 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f3 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f4">    	<option <?php echo ($data->f4 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f4 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f4 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f4 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f5">    	<option <?php echo ($data->f5 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f5 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f5 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f5 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f6">    	<option <?php echo ($data->f6 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f6 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f6 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f6 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f7">    	<option <?php echo ($data->f7 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f7 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f7 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f7 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Visibility-windscreen, windows, wipes, washers, mirrors </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f8">    	<option <?php echo ($data->f8 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f8 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f8 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f8 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f9">    	<option <?php echo ($data->f9 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f9 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f9 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f9 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f10">    	<option <?php echo ($data->f10 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f10 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f10 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f10 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f11">    	<option <?php echo ($data->f11 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f11 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f11 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f11 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f12">    	<option <?php echo ($data->f12 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f12 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f12 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f12 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f13">    	<option <?php echo ($data->f13 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f13 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f13 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f13 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f14">    	<option <?php echo ($data->f14 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f14 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f14 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f14 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Electrical system- lights, amber beacon, horn, rev travel alarm </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f15">    	<option <?php echo ($data->f15 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f15 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f15 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f15 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f15">    	<option <?php echo ($data->f15 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f15 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f15 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f15 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f16">    	<option <?php echo ($data->f16 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f16 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f16 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f16 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f17">    	<option <?php echo ($data->f17 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f17 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f17 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f17 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f18">    	<option <?php echo ($data->f18 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f18 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f18 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f18 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f19">    	<option <?php echo ($data->f19 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f19 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f19 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f19 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f20">    	<option <?php echo ($data->f20 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f20 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f20 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f20 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Hydraulics- rams, hoses, leaks, wear </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f21">    	<option <?php echo ($data->f21 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f21 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f21 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f21 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f22">    	<option <?php echo ($data->f22 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f22 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f22 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f22 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f23">    	<option <?php echo ($data->f23 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f23 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f23 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f23 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f24">    	<option <?php echo ($data->f24 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f24 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f24 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f24 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f25">    	<option <?php echo ($data->f25 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f25 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f25 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f25 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f26">    	<option <?php echo ($data->f26 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f26 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f26 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f26 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f27">    	<option <?php echo ($data->f27 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f27 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f27 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f27 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Leaks- engine, transmission, final drives, cooling systems </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f28">    	<option <?php echo ($data->f28 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f28 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f28 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f28 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>


</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f29">    	<option <?php echo ($data->f29 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f29 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f29 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f29 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f30">    	<option <?php echo ($data->f30 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f30 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f30 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f30 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f31">    	<option <?php echo ($data->f31 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f31 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f31 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f31 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f32">    	<option <?php echo ($data->f32 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f32 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f32 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f32 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f33">    	<option <?php echo ($data->f33 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f33 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f33 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f33 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f34">    	<option <?php echo ($data->f34 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f34 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f34 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f34 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Brakes- emergency and service </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f35">    	<option <?php echo ($data->f35 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f35 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f35 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f35 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f36">    	<option <?php echo ($data->f36 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f36 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f36 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f36 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f37">    	<option <?php echo ($data->f37 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f37 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f37 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f37 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f38">    	<option <?php echo ($data->f38 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f38 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f38 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f38 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f39">    	<option <?php echo ($data->f39 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f39 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f39 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f39 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f40">    	<option <?php echo ($data->f40 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f40 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f40 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f40 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f41">    	<option <?php echo ($data->f41 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f41 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f41 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f41 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Neutral start </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f42">    	<option <?php echo ($data->f42 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f42 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f42 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f42 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f43">    	<option <?php echo ($data->f43 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f43 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f43 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f43 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f44">    	<option <?php echo ($data->f44 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f44 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f44 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f44 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f45">    	<option <?php echo ($data->f45 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f45 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f45 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f45 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f46">    	<option <?php echo ($data->f46 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f46 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f46 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f46 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f47">    	<option <?php echo ($data->f47 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f47 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f47 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f47 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f48">    	<option <?php echo ($data->f48 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f48 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f48 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f48 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Compulsory signs, reflective tape, reflectors </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f49">    	<option <?php echo ($data->f49 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f49 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f49 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f49 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f50">    	<option <?php echo ($data->f50 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f50 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f50 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f50 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f51">    	<option <?php echo ($data->f51 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f51 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f51 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f51 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f52">    	<option <?php echo ($data->f52 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f52 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f52 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f52 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f53">    	<option <?php echo ($data->f53 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f53 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f53 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f53 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f54">    	<option <?php echo ($data->f54 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f54 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f54 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f54 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f55">    	<option <?php echo ($data->f55 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f55 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f55 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f55 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Misc- air con, fire extinguisher </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f56">    	<option <?php echo ($data->f56 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f56 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f56 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f56 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f57">    	<option <?php echo ($data->f57 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f57 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f57 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f57 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f58">    	<option <?php echo ($data->f58 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f58 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f58 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f58 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f59">    	<option <?php echo ($data->f59 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f59 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f59 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f59 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f60">    	<option <?php echo ($data->f60 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f60 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f60 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f60 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f61">    	<option <?php echo ($data->f61 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f61 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f61 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f61 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f62">    	<option <?php echo ($data->f62 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f62 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f62 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f62 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Damage to- panels / guards-cracks to chassis/frame/body. </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f63">    	<option <?php echo ($data->f63 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f63 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f63 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f63 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f64">    	
    <option <?php echo ($data->f64 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f64 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f64 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f64 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f65">    	
    	<option <?php echo ($data->f65 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f65 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f65 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f65 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f66">    	<option <?php echo ($data->f66 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f66 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f66 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f66 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f67">    	<option <?php echo ($data->f67 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f67 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f67 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f67 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f68">    	<option <?php echo ($data->f68 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f68 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f68 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f68 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f69">    	<option <?php echo ($data->f69 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f69 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f69 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f69 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Wheels, tyres, tracks- wear/tension/pressure </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f70">    	<option <?php echo ($data->f70 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f70 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f70 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f70 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f71">    	<option <?php echo ($data->f71 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f71 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f71 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f71 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f72">    	<option <?php echo ($data->f72 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f72 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f72 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f72 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f73">    	<option <?php echo ($data->f73 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f73 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f73 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f73 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f74">    	<option <?php echo ($data->f74 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f74 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f74 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f74 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f75">    	<option <?php echo ($data->f75 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f75 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f75 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f75 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f76">    	<option <?php echo ($data->f76 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f76 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f76 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f76 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Hitch (safety pin) - wear </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f77">    	<option <?php echo ($data->f77 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f77 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f77 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f77 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f78">    	<option <?php echo ($data->f78 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f78 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f78 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f78 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f79">    	<option <?php echo ($data->f79 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f79 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f79 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f79 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f80">    	<option <?php echo ($data->f80 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f80 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f80 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f80 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f81">    	<option <?php echo ($data->f81 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f81 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f81 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f81 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f82">    	<option <?php echo ($data->f82 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f82 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f82 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f82 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f83">    	<option <?php echo ($data->f83 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f83 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f83 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f83 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Articulated joint/linkage </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f84">    	<option <?php echo ($data->f84 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f84 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f84 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f84 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f85">    	<option <?php echo ($data->f85 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f85 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f85 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f85 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f86">    	<option <?php echo ($data->f86 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f86 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f86 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f86 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f87">    	<option <?php echo ($data->f87 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f87 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f87 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f87 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f88">    	<option <?php echo ($data->f88 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f88 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f88 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f88 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f89">    	<option <?php echo ($data->f89 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f89 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f89 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f89 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f90">    	<option <?php echo ($data->f90 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f90 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f90 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f90 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Environmental spill kit </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f91">    	<option <?php echo ($data->f91 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f91 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f91 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f91 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f92">    	<option <?php echo ($data->f92 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f92 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f92 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f92 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f93">    	<option <?php echo ($data->f93 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f93 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f93 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f93 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f94">    	<option <?php echo ($data->f94 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f94 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f94 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f94 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f95">    	<option <?php echo ($data->f95 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f95 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f95 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f95 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f96">    	<option <?php echo ($data->f96 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f96 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f96 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f96 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f97">    	<option <?php echo ($data->f97 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f97 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f97 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f97 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Daily checklist in machine- plant security information list </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f98">    	<option <?php echo ($data->f98 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f98 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f98 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f98 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f99">    	<option <?php echo ($data->f99 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f99 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f99 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f99 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f100">    	<option <?php echo ($data->f100 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f100 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f100 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f100 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f101">    	<option <?php echo ($data->f101 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f101 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f101 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f101 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f102">    	<option <?php echo ($data->f102 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f102 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f102 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f102 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f103">    	<option <?php echo ($data->f103 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f103 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f103 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f103 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f104">    	<option <?php echo ($data->f104 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f104 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f104 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f104 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Plant security </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f105">    	<option <?php echo ($data->f105 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f105 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f105 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f105 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f106">    	<option <?php echo ($data->f106 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f106 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f106 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f106 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f107">    	<option <?php echo ($data->f107 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f107 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f107 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f107 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f108">    	<option <?php echo ($data->f108 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f108 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f108 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f108 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f109">    	<option <?php echo ($data->f109 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f109 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f109 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f109 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f110">    	<option <?php echo ($data->f110 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f110 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f110 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f110 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>


</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f111">    	<option <?php echo ($data->f111 == "OK" ? 'selected' : ''); ?> value="OK">OK</option>
    	<option <?php echo ($data->f111 == "Fault" ? 'selected' : ''); ?> value="Fault">Fault</option>
    	<option <?php echo ($data->f111 == "NA" ? 'selected' : ''); ?> value="NA">N/A</option>                
    	<option <?php echo ($data->f111 == "none" ? 'selected' : ''); ?> value="none"></option>                        
</select>
  </label>

</td>
</tr>
</tbody></table>
<table style="margin-bottom:15px" class="opname">
<tbody><tr>
<th style="height:37px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Operators Name </span></th>
<th style="height:37px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Operators Initials </span></th>
<th style="height:37px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Drivers Licence no </span></th>
<th style="height:37px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Plant operators ticket no </span></th>
<th style="height:37px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Induction card no </span></th>
<th style="height:37px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Track safety Awar. Cert no </span></th>
<th style="height:37px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Supervisors Signature </span></th>
</tr>
<tr>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opname1" type="text" value="<?= $data->opname1;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opinit1" type="text" value="<?= $data->opinit1;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="driverlic1" type="text" value="<?= $data->driverlic1;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="planop1" type="text" value="<?= $data->planop1;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="indcard1" type="text" value="<?= $data->indcard1;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="tracksaf1" type="text" value="<?= $data->tracksaf1;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="supsig1" type="text" value="<?= $data->supsig1;?>" size="10">
</td>
</tr>
<tr>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opname2" type="text" value="<?= $data->opname2;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opinit2" type="text" value="<?= $data->opinit2;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="driverlic2" type="text" value="<?= $data->driverlic2;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="planop2" type="text" value="<?= $data->planop2;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="indcard2" type="text" value="<?= $data->indcard2;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="tracksaf2" type="text" value="<?= $data->tracksaf2;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="supsig2" type="text" value="<?= $data->supsig2;?>" size="10">
</td>
</tr>
<tr>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opname3" type="text" value="<?= $data->opname3;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opinit3" type="text" value="<?= $data->opinit3;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="driverlic3" type="text" value="<?= $data->driverlic3;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="planop3" type="text" value="<?= $data->planop3;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="indcard3" type="text" value="<?= $data->indcard3;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="tracksaf3" type="text" value="<?= $data->tracksaf3;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="supsig3" type="text" value="<?= $data->supsig3;?>" size="10">
</td>
</tr>
<tr>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opname4" type="text" value="<?= $data->opname4;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opinit4" type="text" value="<?= $data->opinit4;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="driverlic4" type="text" value="<?= $data->driverlic4;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="planop4" type="text" value="<?= $data->planop4;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="indcard4" type="text" value="<?= $data->indcard4;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="tracksaf4" type="text" value="<?= $data->tracksaf4;?>" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="supsig4" type="text" value="<?= $data->supsig4;?>" size="10">
</td>
</tr>
</tbody></table>
<p style="margin-bottom:63px; margin-left:0px; line-height:15px">
<span style="font-size:9.7pt; font-weight:normal; color:#000000">Details of faults or defects and action taken:  </span><span style="border-style:thin"></span>
</p>
<p style="margin-bottom:0px; margin-left:0px; line-height:15px">
<span style="font-size:9.7pt; font-weight:normal; color:#000000">Fault reported to</span>
<label>
  <input name="faultrep" type="text" id="faultrep" value="<?= $data->faultrep;?>" size="40">
</label>
  <span style="font-size:9.7pt; font-weight:normal; color:#000000"> Position 
  <input name="faultrep2" type="text" id="faultrep2" value="<?= $data->faultrep2;?>" size="40">
  Date 
  <input name="faultrep3" type="date" id="faultrep3" value="<?= $data->faultrep3;?>" size="20">
  </span><span style="border-style:thin"></span>
  <span style="font-size:9.7pt; font-weight:normal; color:#000000">Does fault constitute a safety hazard YES/NO Does machine require immediate repair? Y/N Does machine require immediate repair? Y/N If yes to either </span><span style="font-size:9.7pt; font-style:italic; font-weight:normal; color:#000000; text-decoration:underline">PARK MACHINE UP</span><span style="font-size:9.7pt; font-weight:normal; color:#000000">. Contact the hirer or supervisor and plant operator-detail inside front cover. Machine should not be used until supervisor or plant operator gives clearance for use. </span></p>

  </form>



</div>


</body></html>