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
<?php
	$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
	echo '<form method="post" name="fillable_form" action="../submit.php?type='.$type.'&user='.$username.'">';
?>
<p style="border-top: 1px solid black;">
    <span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">Date:</span> 
    <label>
      <input type="date" name="date" size="10">
    </label>
    <span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000"> </span><span style="border-style:thin"></span><span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">Time:</span>
    <label>
      <input type="time" name="time">
    </label>
    <span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000"> </span><span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">Project: </span>
    <label>
      <input type="text" name="textfield" id="textfield" size="35" maxlength="35">
    </label>
</p>
<p style="text-align:;margin-bottom:26px;margin-right:203px;border-top: 1px solid black;border-bottom: 1px solid black;">
  <span style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:11.6pt; font-weight:normal; color:#000000">Foreman: </span>
  <label>
    <input type="text" name="textfield2" id="textfield2" size="81" maxlength="80">
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
  
  <input type="text" name="det1" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
	<input type="text" name="det2" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
	<input type="text" name="det3" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det4" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det5" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det6" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det7" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det8" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det9" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det10" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det11" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det12" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det13" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det14" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det15" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det16" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det17" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det18" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px">
<input type="text" name="det19" size="91"/>
  </td>
  </tr>
  <tr>
  <td style="width:673px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="det20" size="91"/>
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
    <input type="text" name="attendname1" size="25" maxlength="28"/>
</td>
<td style="width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname11" size="25" maxlength="28"/>
</span></td>
<td style="width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input type="text" name="attendname2" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname12" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input type="text" name="attendname3" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname13" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input type="text" name="attendname4" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname14" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input type="text" name="attendname5" size="25" maxlength="28"/></td>
<td style="vertical-align:bottom; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname15" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:bottom; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input type="text" name="attendname6" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname16" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input type="text" name="attendname7" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname17" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input type="text" name="attendname8" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname18" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input type="text" name="attendname9" size="25" maxlength="28"/></td>
<td style="vertical-align:middle; width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname19" size="25" maxlength="28"/>
</span></td>
<td style="vertical-align:middle; width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
<tr>
<td style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
<input type="text" name="attendname10" size="25" maxlength="28"/></td>
<td style="width:155px; height:22px; border-style:solid; border-color:#000000; border-width:1px 2px 1px 1px">
<span style="border-style:thin"></span>
</td>
<td style="width:165px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 2px">
<span style="border-style:thin"></span>
<span style="width:182px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<input type="text" name="attendname20" size="25" maxlength="28"/>
</span></td>
<td style="width:169px; height:22px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
</td>
</tr>
</tbody></table>

    <input type="submit" name="button" value="Submit">

</form>
</body></html>