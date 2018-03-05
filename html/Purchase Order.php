<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
.content {
	width:60%;
}

input[type=text] {
	font-size: 70%;
}
IMG {
 text-align:center;
 vertical-align:top;
 margin-bottom:25px;
 margin-top:0px;
 margin-right:0px;
 margin-left:0px;
 direction:ltr
}
SPAN {
 font-style:normal;
 font-weight:normal
}
TABLE {
 border-width:thin;
 border-collapse:collapse;
 padding:3px;
 text-align:right;
 vertical-align:top;
 margin-bottom:33px;
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
 text-align:center;
 vertical-align:middle
}
TD { 
 text-align:left;
 vertical-align:top
}
P {
 text-align:;
 margin-bottom:0px;
 margin-top:0px;
 margin-right:9px;
 margin-left:97px;
 text-indent:0px;
 direction:ltr
}
</style>
<meta name="dc.date" content="2008-10-30T16:50:35+10:00">
<meta name="dc.date.modified" content="2016-04-29T11:39:07+10:00">
<meta name="generator" content="Adobe Acrobat Exchange-Pro 9.0.0">
</head>
<body bgcolor="white" text="black" link="blue" vlink="purple" alink="fushia">	
<div class="content">
<?php
	$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
	echo '<form method="post" name="fillable_form" action="../submit.php?type='.$type.'&user='.$username.'">';
?>

<table>
  <tbody><tr style="
">
<th width="103" style="width:101px; height:46px; background-color:#FFFFFF; border-style: solid none solid solid; border-color: #0000AB; border-width:1px 1px 1px 1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:15pt; font-weight:normal; color:#45146A">PO No: </span></th>
<td colspan="2" width="469" style="width:95px;height:46px;background-color:#FFFFFF;border: 1px #0000AB solid;border-left: 0;">

    <input type="text" name="ponum" size="20" style="font-size:100%;height: 95%;" maxlength="20">
</td>
</tr>
<tr>
<th width="103" style="width:101px; height:46px; background-color:#FFFFFF; border-style: solid none solid solid; border-color: #0000AB; border-width:1px 1px 1px 1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:15pt; font-weight:normal; color:#45146A">Date: </span></th>
<th style="width:54px;height:46px;border-style: border-style:solid none solid none;border: 1px #0000AB solid;border-left: 0;">
<input type="date" name="podate" size="30" style="font-size:100%;height: 95%;width: 199px;"></th>

</tr>
</tbody></table>
<table style="text-align:center; margin-bottom:10px">
<tbody><tr>
<td style="width:352px; height:27px; border-style:solid; border-color:#0000AB; border-width:1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:9pt; font-weight:normal; color:#45146A">Supplier: </span><span style="border-style:thin"></span>
    <input type="text" name="supplier" size="37">
</td>
<td rowspan="3" style="width:351px; height:80px; border-style:solid; border-color:#0000AB; border-width:1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:9pt; font-weight:normal; color:#45146A">Project </span><span style="border-style:thin"></span>
  <label>
    <textarea name="textarea" id="textarea" cols="45" rows="5" style="resize: none;" maxlength="50"></textarea>
  </label>
</td>
</tr>
<tr>
<td style="width:352px; height:27px; border-style:solid; border-color:#0000AB; border-width:1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:9pt; font-weight:normal; color:#45146A">Attention: </span><span style="border-style:thin"></span>
<input type="text" name="suppattention" size="37" id="suppattention"></td>
</tr>
<tr>
<td style="width:352px; height:26px; border-style:solid; border-color:#0000AB; border-width:1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:9pt; font-weight:normal; color:#45146A">Fax No: </span><span style="border-style:thin"></span>

<input type="text" name="faxnum" size="38" id="faxnum">
</td>
</tr>
<tr>
<td style="width:352px; height:26px; border-style:solid; border-color:#0000AB; border-width:1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:9pt; font-weight:normal; color:#45146A">Site Contact: </span><span style="border-style:thin"></span>

<input type="text" name="sitecontact" size="35" id="sitecontact">
</td>
<td style="width:351px; height:26px; border-style:solid; border-color:#0000AB; border-width:1px" colspan="23">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:9pt; font-weight:normal; color:#45146A">Date Required </span>
<span style="width:352px; height:26px; border-style:solid; border-color:#0000AB; border-width:1px">
<input type="date" name="daterequired" size="35" id="daterequired">
</span></td></tr>
</tbody></table>
<table style="text-align:center; margin-bottom:5px">
<tbody><tr>	
<td colspan="4">	<h4>PLEASE SHOW OUR PURCHASE ORDER NO ON YOUR INVOICES</h4></td>

</tr>
<tr>
<th style="text-align:center; width:68px; height:41px; background-color:#FFECE9; border-style:solid; border-color:#0000AB; border-width:1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:11pt; font-weight:normal; color:#45146A">QTY </span></th>
<th style="text-align:left; width:531px; height:41px; background-color:#FFECE9; border-style:solid; border-color:#0000AB; border-width:1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:11pt; font-weight:normal; color:#45146A">DETAILS </span></th>
<th style="text-align:center; vertical-align:top; width:106px; height:41px; background-color:#FFECE9; border-style:solid; border-color:#0000AB; border-width:1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:11pt; font-weight:normal; color:#45146A">PRICE QUOTED $ </span></th>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #0000AB; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>
    <input type="text" name="qty1" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #0000AB; border-width:1px 1px 1px 1px">

<input type="text" name="details1" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #0000AB; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price1" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty2" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details2" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price2" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty3" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details3" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price3" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty4" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details4" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price4" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty5" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details5" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price5" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty6" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details6" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price6" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty7" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details7" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price7" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty8" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details8" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price8" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty9" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details9" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price9" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty10" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details10" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price10" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty11" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details11" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price11" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty12" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details12" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price12" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty13" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details13" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price13" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty14" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details14" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price14" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty15" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details15" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price15" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty16" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details16" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price16" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty17" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details17" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price17" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty18" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details18" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price18" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty19" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details19" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price19" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty20" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details20" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price20" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty21" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details21" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price21" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty22" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details22" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:22px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price22" size="10" maxlength="13">
</td>
</tr>
<tr>
<td style="vertical-align:middle; width:68px; height:23px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="qty23" size="5" maxlength="9">
</td>
<td style="vertical-align:middle; width:531px; height:23px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="text" name="details23" size="70" maxlength="70">
</td>
<td style="vertical-align:middle; width:106px; height:23px; border-style:solid; border-color: #5533CD; border-width:1px 1px 1px 1px">
<span style="border-style:thin"></span>

<input type="" name="price23" size="10" maxlength="13">
</td>
</tr> 
</tbody></table>
<table style="text-align:center; margin-bottom:9px">
<tbody><tr>
<th style="text-align:right; width:82px; height:21px; background-color:#FFECE9; border-style:solid; border-color:#0000AB; border-width:2px 1px 2px 1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:9pt; font-weight:normal; color:#45146A">GST </span></th>
<td style="vertical-align:middle; width:105px; height:21px; background-color:#FFECE9; border-style:solid; border-color:#0000AB; border-width:2px 1px 2px 1px">


<input name="gst" size="10" maxlength="13" id="gst">
</td>
</tr>
<tr>
<th style="text-align:right; width:82px; height:21px; background-color:#FFD9D2; border-style:solid; border-color:#0000AB; border-width:2px 1px 2px 1px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:9pt; font-weight:normal; color:#45146A">Total </span></th>
<td style="vertical-align:middle; width:105px; height:21px; background-color:#FFD9D2; border-style:solid; border-color:#0000AB; border-width:2px 1px 2px 1px">
<span style="border-style:thin"></span>

<input name="total" size="10" maxlength="13" id="total">
</td>
</tr>
</tbody></table>
<p>
<span style="font-family:'serif', 'Myriad Pro', serif; font-size:10pt; font-weight:normal; color:#45146A">For and on behalf of </span></p>
<p style="text-align:center; margin-bottom:8px; margin-right:0px; margin-left:0px">
<span style="font-family:'sans-serif', 'Helvetica Neue', sans-serif; font-size:10pt; font-weight:normal; color:#45146A">SMART Plumbing Solutions Pty Ltd </span></p>
<p style="margin-bottom:62px; margin-right:13px; margin-left:67px">
<span style="font-family:'serif', 'Myriad Pro', serif; font-size:6pt; font-weight:normal; color:#45146A">Conditions of purchase order are on back. </span></p>
<p style="margin-right:0px; margin-left:30px">
<span style="font-family:'sans-serif', 'Square721 BT', sans-serif; font-size:7.2pt; font-weight:bold; color:#F26530">W </span><span style="font-family:'serif', 'Square721 BT', serif; font-size:7.2pt; font-weight:normal; color:#45146A">www.smartplumbingsolutions.com.au </span></p>
</div>

  <label>
    <input type="submit" name="button" id="button" value="Submit">
  </label>
</form>
</body></html>