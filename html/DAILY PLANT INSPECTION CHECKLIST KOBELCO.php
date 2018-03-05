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
  <input name="weekstart" type="date" id="weekstart" maxlength="8">
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
<input name="workingfor" type="text" id="workingfor" maxlength="28" style="width: 181px;"></td>
<td style="width:287px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">JOB SITE: </span><span style="border-style:thin">
<input name="jobsite" type="text" id="jobsite" size="37" maxlength="35" style="
    width: 215px;
">
</span></td>
</tr>
<tr>
<td style="width:288px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">PLANT DESCRIPTION: </span>
<label for="plantdesc"></label>  <input name="plantdesc" type="text" id="plantdesc" size="27" maxlength="22" style="
    width: 141px;
"></td>
<td style="width:287px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">REGISTRATION or PERMIT NO: </span>
<label>
  <input name="regnumber" type="text" id="regnumber" size="19" style="width: 85px;" maxlength="13">
</label></td>
</tr>
<tr>
<td style="width:288px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">MAKE &amp; MODEL:  </span>
<label>
  <input name="makemodel" type="text" id="makemodel" size="32" maxlength="27" style="
    width: 175px;
">
</label><span style="border-style:thin"></span>
</td>
<td style="width:287px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:9.7pt; color:#000000">EXPIRY DATE: </span>
<label>
  <input name="expdate" type="text" id="expdate" size="34" maxlength="10" style="
    width: 189px;
">
</label></td>
</tr>
<tr>
<td style="width:288px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">SERIAL NO:  </span>
<label>
  <input name="serialnumber" type="text" id="serialnumber" size="36" maxlength="32" style="
    width: 206px;
">
</label></td>
<td style="width:287px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:9.7pt; color:#000000">HOUR METRE/ KM READING: </span>
<label>
  <input name="hourkmread" type="text" id="hourkmread" size="21" style="width: 97px;" maxlength="15">
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
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>
</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
   <label>
    <select name="f2">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f3">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f4">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f5">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f6">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f7">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Visibility-windscreen, windows, wipes, washers, mirrors </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f8">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f9">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f10">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f11">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f12">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f13">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f14">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Electrical system- lights, amber beacon, horn, rev travel alarm </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f15">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f15">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f16">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f17">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f18">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f19">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f20">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Hydraulics- rams, hoses, leaks, wear </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f21">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f22">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f23">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f24">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f25">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f26">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f27">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Leaks- engine, transmission, final drives, cooling systems </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f28">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>


</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f29">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f30">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f31">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f32">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f33">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f34">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Brakes- emergency and service </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f35">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f36">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f37">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f38">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f39">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f40">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f41">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Neutral start </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f42">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f43">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f44">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f45">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f46">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f47">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f48">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Compulsory signs, reflective tape, reflectors </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f49">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f50">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f51">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f52">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f53">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f54">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f55">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Misc- air con, fire extinguisher </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f56">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f57">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f58">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f59">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f60">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f61">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f62">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Damage to- panels / guards-cracks to chassis/frame/body. </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f63">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f64">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f65">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f66">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f67">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f68">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f69">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Wheels, tyres, tracks- wear/tension/pressure </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f70">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f71">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f72">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f73">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f74">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f75">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f76">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Hitch (safety pin) - wear </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f77">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f78">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f79">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f80">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f81">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f82">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f83">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Articulated joint/linkage </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f84">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f85">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f86">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f87">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f88">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f89">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f90">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Environmental spill kit </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f91">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f92">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f93">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f94">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f95">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f96">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f97">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Daily checklist in machine- plant security information list </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f98">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f99">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f100">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f101">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f102">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f103">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px">
  <label>
    <select name="f104">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
</tr>
<tr>
<th style="width:400px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-size:7.7pt; font-weight:normal; color:#000000">Plant security </span></th>
<td style="width:25px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f105">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f106">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:26px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f107">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f108">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f109">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>

</td>
<td style="width:23px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f110">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
    </select>
  </label>


</td>
<td style="width:30px; height:16px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <label>
    <select name="f111">
    	<option value="OK">OK</option>
    	<option value="Fault">Fault</option>
    	<option value="NA">N/A</option>                
    	<option value="none"></option>                        
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
    <input name="opname1" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opinit1" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="driverlic1" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="planop1" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="indcard1" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="tracksaf1" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="supsig1" type="text" size="10">
</td>
</tr>
<tr>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opname2" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opinit2" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="driverlic2" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="planop2" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="indcard2" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="tracksaf2" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="supsig2" type="text" size="10">
</td>
</tr>
<tr>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opname3" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opinit3" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="driverlic3" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="planop3" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="indcard3" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="tracksaf3" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="supsig3" type="text" size="10">
</td>
</tr>
<tr>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opname4" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="opinit4" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="driverlic4" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="planop4" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="indcard4" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="tracksaf4" type="text" size="10">
</td>
<td style="vertical-align:middle; height:13px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input name="supsig4" type="text" size="10">
</td>
</tr>
</tbody></table>
<p style="margin-bottom:63px; margin-left:0px; line-height:15px">
<span style="font-size:9.7pt; font-weight:normal; color:#000000">Details of faults or defects and action taken:  </span><span style="border-style:thin"></span>
</p>
<p style="margin-bottom:0px; margin-left:0px; line-height:15px">
<span style="font-size:9.7pt; font-weight:normal; color:#000000">Fault reported to</span>
<label>
  <input name="faultrep" type="text" id="faultrep" size="40">
</label>
  <span style="font-size:9.7pt; font-weight:normal; color:#000000"> Position 
  <input name="faultrep2" type="text" id="faultrep2" size="40">
  Date 
  <input name="faultrep3" type="date" id="faultrep3" value="" size="20">
  </span><span style="border-style:thin"></span>
  <span style="font-size:9.7pt; font-weight:normal; color:#000000">Does fault constitute a safety hazard YES/NO Does machine require immediate repair? Y/N Does machine require immediate repair? Y/N If yes to either </span><span style="font-size:9.7pt; font-style:italic; font-weight:normal; color:#000000; text-decoration:underline">PARK MACHINE UP</span><span style="font-size:9.7pt; font-weight:normal; color:#000000">. Contact the hirer or supervisor and plant operator-detail inside front cover. Machine should not be used until supervisor or plant operator gives clearance for use. </span></p>
    <input type="submit" name="button" value="Submit">  
  </form>



</div>


</body></html>