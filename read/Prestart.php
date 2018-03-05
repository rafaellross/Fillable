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
input[type=text]{
	font-size: 70%;
}

IMG {
 text-align:center;
 vertical-align:top;
 margin-bottom:44px;
 margin-top:0px;
 margin-right:0px;
 margin-left:0px;
 direction:ltr
}
SPAN {
 font-style:normal;
 font-weight:normal
}
P {
 text-align:justify;
 margin-bottom:12px;
 margin-top:0px;
 margin-right:0px;
 text-indent:0px;
 direction:ltr
}
TABLE {
 border-width:thin;
 border-collapse:collapse;
 padding:3px;
 text-align:center;
 vertical-align:top;
 margin-bottom:16px;
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
 vertical-align:top
}
TD { 
 text-align:left;
 vertical-align:top
}
</style>
<meta name="dc.creator" content="Christos">
<meta name="dc.title" content="Microsoft Word - Prestart.doc">
<meta name="dc.date" content="2015-12-17T09:23:27+11:00">
<meta name="dc.date.modified" content="2015-12-17T09:30:24+11:00">
<meta name="generator" content="Adobe Acrobat Exchange-Pro 9.0.0">
</head>
<body bgcolor="white" text="black" link="blue" vlink="purple" alink="fushia">
<img width="673" height="80" style="display:block; float:none" src="images/Prestart_img_0.jpg">
<div style="width:100%;">

<p style="border-top: 1px solid black;">
    <span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">Date:</span> 
    <label>
      <input name="date" type="date" value="<?= $data->date;?>" size="10">
    </label>
    <span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000"> </span><span style="border-style:thin"></span><span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">Time:</span>
    <label>
      <input name="time" type="time" value="<?= $data->time;?>">
    </label>
    <span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000"> </span><span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">Project: </span>
    <label>
      <input name="textfield" type="text" id="textfield" value="<?= $data->textfield;?>" size="35" maxlength="35">
    </label>
</p>
<p style="text-align:;margin-bottom:26px;margin-right:203px;border-top: 1px solid black;border-bottom: 1px solid black;">
  <span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">Foreman: </span>
  <label>
    <input name="textfield2" type="text" value="<?= $data->textfield2;?>" size="81" maxlength="80">
  </label>
</p>
</div>
<table>
  <tbody><tr>
  <th style="width:673px; height:19px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">Details of Discussion </span></th>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
  
  <input name="det1" type="text" value="<?= $data->det1;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
	<input name="det2" type="text" value="<?= $data->det2;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
	<input name="det3" type="text" value="<?= $data->det3;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det4" type="text" value="<?= $data->det4;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det5" type="text" value="<?= $data->det5;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det6" type="text" value="<?= $data->det6;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det7" type="text" value="<?= $data->det7;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px"><input name="det8" type="text" value="<?= $data->det8;?>" size="91"/></td>
  </tr>
  <tr>
  <td style="width:673px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det9" type="text" value="<?= $data->det9;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det10" type="text" value="<?= $data->det10;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det11" type="text" value="<?= $data->det11;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det12" type="text" value="<?= $data->det12;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det13" type="text" value="<?= $data->det13;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det14" type="text" value="<?= $data->det14;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det15" type="text" value="<?= $data->det15;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det16" type="text" value="<?= $data->det16;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det17" type="text" value="<?= $data->det17;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det18" type="text" value="<?= $data->det18;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input name="det19" type="text" value="<?= $data->det19;?>" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="det20" type="text" value="<?= $data->det20;?>" size="91"/>
  </td>
  </tr>
</tbody></table>
<p style="text-align:left; margin-bottom:7px">
<span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">All persons in attendance must sign below. </span></p>
<table style="margin-bottom:0px">
<tbody>
  <tr>
<th align="center" style="width:182px; height:23px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:bold; color:#000000">Name </span></th>
<th style="width:155px; height:23px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:bold; color:#000000">Signature </span></th>
<th style="width:165px; height:23px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:bold; color:#000000">Name </span></th>
<th style="width:169px; height:23px; background-color:#FF9A00; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:bold; color:#000000">Signature </span></th>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
    <input name="attendname1" type="text" value="<?= $data->attendname1;?>" size="25" maxlength="28"/>
</td>
<td style="width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname11" type="text" value="<?= $data->attendname11;?>" size="25" maxlength="28"/>
</span></td>
<td style="width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input name="attendname2" type="text" value="<?= $data->attendname2;?>" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname12" type="text" value="<?= $data->attendname12;?>" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input name="attendname3" type="text" value="<?= $data->attendname3;?>" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname13" type="text" value="<?= $data->attendname13;?>" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input name="attendname4" type="text" value="<?= $data->attendname4;?>" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname14" type="text" value="<?= $data->attendname14;?>" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input name="attendname5" type="text" value="<?= $data->attendname5;?>" size="25" maxlength="28"/></td>
<td style="vertical-align:bottom; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname15" type="text" value="<?= $data->attendname15;?>" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:bottom; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input name="attendname6" type="text" value="<?= $data->attendname6;?>" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname16" type="text" value="<?= $data->attendname16;?>" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input name="attendname7" type="text" value="<?= $data->attendname7;?>" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname17" type="text" value="<?= $data->attendname17;?>" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input name="attendname8" type="text" value="<?= $data->attendname8;?>" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname18" type="text" value="<?= $data->attendname18;?>" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input name="attendname9" type="text" value="<?= $data->attendname9;?>" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname19" type="text" value="<?= $data->attendname19;?>" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input name="attendname10" type="text" value="<?= $data->attendname10;?>" size="25" maxlength="28"/></td>
<td style="width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input name="attendname20" type="text" value="<?= $data->attendname20;?>" size="25" maxlength="28"/>
</span></td>
<td style="width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
</tbody></table>

</body></html>