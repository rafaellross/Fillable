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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html40/strict.dtd">
<!-- Created from PDF via Acrobat SaveAsXML -->
<!-- Mapping table version: 28-February-2003 -->
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<STYLE type="text/css">
input [type=text]{
	font-size: 70%;
}
IMG {
 text-align:center;
 vertical-align:top;
 margin-bottom:21px;
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
 text-align:;
 margin-bottom:7px;
 margin-top:0px;
 margin-right:475px;
 text-indent:0px;
 direction:ltr
}
TABLE {
 border-width:thin;
 border-collapse:collapse;
 padding:3px;
 text-align:center;
 vertical-align:top;
 margin-bottom:0px;
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
</STYLE>
<META
 name="dc.creator"
 content="Christos" >
<META
 name="dc.title"
 content="Microsoft Word - Electrical Plant & Equipment Register.doc" >
<META
 name="dc.date"
 content="2015-05-06T09:18:45+10:00" >
<META
 name="dc.date.modified"
 content="2015-05-06T09:20:13+10:00" >
<META
 name="generator"
 content="Adobe Acrobat Exchange-Pro 9.0.0" >
</HEAD>
<BODY bgcolor=white text=black link=blue vlink=purple alink=fushia >

<IMG width=988 height=95 style="display:block; float:none" src="images/Electrical Plant & Equipment Register_img_0.jpg">
<P>
<SPAN style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:9.7pt; font-weight:bold; color:#000000"
>Project: </SPAN
><SPAN style="border-style:thin"></SPAN>
</P>
<TABLE>
  <TR>
  <TH style="width:47px; height:42px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:8.7pt; font-weight:bold; color:#000000"
>Item</SPAN
></TH>
  <TH style="width:82px; height:42px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:8.7pt; font-weight:bold; color:#000000"
> Date Tested </SPAN
></TH>
  <TH style="width:163px; height:42px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:8.7pt; font-weight:bold; color:#000000"
>Name of Competent Person Conducting Test </SPAN
></TH>
  <TH style="width:163px; height:42px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:8.7pt; font-weight:bold; color:#000000"
>Equipment Tested </SPAN
></TH>
  <TH style="width:140px; height:42px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:8.7pt; font-weight:bold; color:#000000"
>Serial No/Registration of Equipment </SPAN
></TH>
  <TH style="width:94px; height:42px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:8.7pt; font-weight:bold; color:#000000"
>License No. of Competent Person </SPAN
></TH>
  <TH style="width:163px; height:42px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:8.7pt; font-weight:bold; color:#000000"
>Result/Recommended Action </SPAN
></TH>
  <TH style="width:82px; height:42px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Trebuchet MS', sans-serif; font-size:8.7pt; font-weight:bold; color:#000000"
>Date of Next Inspection </SPAN
></TH>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>1 </SPAN
></TH>
<TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px"><input value="<?= $data->dttest1;?>" name="dttest1" type="date" size="14"></TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson1;?>" type="text" name="namecompperson1" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest1;?>" type="text" name="equiptest1" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg1;?>" type="text" name="serialreg1" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum1;?>" type="text" name="licnum1" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result1;?>" type="text" name="result1" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext1;?>" type="date" name="dtnext1" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>2 </SPAN
></TH>
<TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
 <input value="<?= $data->dttest2;?>" name="dttest2" type="date" size="14">
</TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->namecompperson2;?>" type="text" name="namecompperson2" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->equiptest2;?>" type="text" name="equiptest2" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->serialreg2;?>" type="text" name="serialreg2" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->licnum2;?>" type="text" name="licnum2" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->result2;?>" type="text" name="result2" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dtnext2;?>" type="date" name="dtnext2" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>3 </SPAN
></TH>
<TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
 <input value="<?= $data->dttest3;?>" name="dttest3" type="date" size="14">
</TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->namecompperson3;?>" type="text" name="namecompperson3" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->equiptest3;?>" type="text" name="equiptest3" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->equiptest3;?>" type="text" name="equiptest3" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->licnum3;?>" type="text" name="licnum3" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->result3;?>" type="text" name="result3" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dtnext3;?>" type="date" name="dtnext3" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>4 </SPAN
></TH>
<TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
 <input value="<?= $data->dttest4;?>" name="dttest4" type="date" size="14">
</TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson4;?>" type="text" name="namecompperson4" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest4;?>" type="text" name="equiptest4" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg4;?>" type="text" name="serialreg4" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum4;?>" type="text" name="licnum4" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result4;?>" type="text" name="result4" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext4;?>" type="date" name="dtnext4" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>5 </SPAN
></TH>
<TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
 <input value="<?= $data->dttest5;?>" name="dttest5" type="date" size="14">
</TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson5;?>" type="text" name="namecompperson5" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest5;?>" type="text" name="equiptest5" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg5;?>" type="text" name="serialreg5" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum5;?>" type="text" name="licnum5" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result5;?>" type="text" name="result5" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext5;?>" type="date" name="dtnext5" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>6 </SPAN
></TH>
<TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
 <input value="<?= $data->dttest6;?>" name="dttest6" type="date" size="14">
</TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson6;?>" type="text" name="namecompperson6" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest6;?>" type="text" name="equiptest6" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg6;?>" type="text" name="serialreg6" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum6;?>" type="text" name="licnum6" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result6;?>" type="text" name="result6" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext6;?>" type="date" name="dtnext6" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>7 </SPAN
></TH>
<TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
 <input value="<?= $data->dttest7;?>" name="dttest7" type="date" size="14">
</TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->namecompperson7;?>" type="text" name="namecompperson7" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->equiptest7;?>" type="text" name="equiptest7" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->serialreg7;?>" type="text" name="serialreg7" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->licnum7;?>" type="text" name="licnum7" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->result7;?>" type="text" name="result7" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dtnext7;?>" type="date" name="dtnext7" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>8 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dttest8;?>" type="date" name="dttest8" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->namecompperson8;?>" type="text" name="namecompperson8" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->equiptest8;?>" type="text" name="equiptest8" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->serialreg8;?>" type="text" name="serialreg8" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->licnum8;?>" type="text" name="licnum8" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->result8;?>" type="text" name="result8" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <input value="<?= $data->dtnext8;?>" type="date" name="dtnext8" size="12">
  </span>
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>9 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest9;?>" type="date" name="dttest9" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson9;?>" type="text" name="namecompperson9" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest9;?>" type="text" name="equiptest9" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg9;?>" type="text" name="serialreg9" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum9;?>" type="text" name="licnum9" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result9;?>" type="text" name="result9" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext9;?>" type="date" name="dtnext9" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>10 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest10;?>" type="date" name="dttest10" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson10;?>" type="text" name="namecompperson10" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest10;?>" type="text" name="equiptest10" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg10;?>" type="text" name="serialreg10" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum10;?>" type="text" name="licnum10" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result10;?>" type="text" name="result10" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px"><input value="<?= $data->weekstart;?>" type="date" name="dtnext10" size="12"></TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>11 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest11;?>" type="date" name="dttest11" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson11;?>" type="text" name="namecompperson11" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest11;?>" type="text" name="equiptest11" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg11;?>" type="text" name="serialreg11" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum11;?>" type="text" name="licnum11" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result11;?>" type="text" name="result11" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext11;?>" type="date" name="dtnext11" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>12 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dttest12;?>" type="date" name="dttest12" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->namecompperson12;?>" type="text" name="namecompperson12" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->equiptest12;?>" type="text" name="equiptest12" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->serialreg12;?>" type="text" name="serialreg12" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->licnum12;?>" type="text" name="licnum12" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->result12;?>" type="text" name="result12" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dtnext12;?>" type="date" name="dtnext12" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>13 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dttest13;?>" type="date" name="dttest13" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->namecompperson13;?>" type="text" name="namecompperson13" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->equiptest13;?>" type="text" name="equiptest13" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->serialreg13;?>" type="text" name="serialreg13" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->licnum13;?>" type="text" name="licnum13" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->result13;?>" type="text" name="result13" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dtnext13;?>" type="date" name="dtnext13" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>14 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest14;?>" type="date" name="dttest14" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson14;?>" type="text" name="namecompperson14" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest14;?>" type="text" name="equiptest14" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg14;?>" type="text" name="serialreg14" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum14;?>" type="text" name="licnum14" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result14;?>" type="text" name="result14" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext14;?>" type="date" name="dtnext14" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>15 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest15;?>" type="date" name="dttest15" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson15;?>" type="text" name="namecompperson15" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest15;?>" type="text" name="equiptest15" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg15;?>" type="text" name="serialreg15" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum15;?>" type="text" name="licnum15" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result15;?>" type="text" name="result15" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext15;?>" type="date" name="dtnext15" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>16 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest16;?>" type="date" name="dttest16" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson16;?>" type="text" name="namecompperson16" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest16;?>" type="text" name="equiptest16" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg16;?>" type="text" name="serialreg16" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum16;?>" type="text" name="licnum16" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result16;?>" type="text" name="result16" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext16;?>" type="date" name="dtnext16" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>17 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest17;?>" type="date" name="dttest17" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson17;?>" type="text" name="namecompperson17" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest17;?>" type="text" name="equiptest17" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg17;?>" type="text" name="serialreg17" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum17;?>" type="text" name="licnum17" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result17;?>" type="text" name="result17" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px"><input value="<?= $data->dtnext17;?>" type="date" name="dtnext17" size="12"></TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>18 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest18;?>" type="date" name="dttest18" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson18;?>" type="text" name="namecompperson18" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest18;?>" type="text" name="equiptest18" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg18;?>" type="text" name="serialreg18" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum18;?>" type="text" name="licnum18" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result18;?>" type="text" name="result18" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext18;?>" type="date" name="dtnext18" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>19 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest19;?>" type="date" name="dttest19" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson19;?>" type="text" name="namecompperson19" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest19;?>" type="text" name="equiptest19" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg19;?>" type="text" name="serialreg19" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum19;?>" type="text" name="licnum19" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result19;?>" type="text" name="result19" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext19;?>" type="date" name="dtnext19" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>20 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest20;?>" type="date" name="dttest20" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson20;?>" type="text" name="namecompperson20" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest20;?>" type="text" name="equiptest20" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg20;?>" type="text" name="serialreg20" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum20;?>" type="text" name="licnum20" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result20;?>" type="text" name="result20" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext20;?>" type="date" name="dtnext20" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>21 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest21;?>" type="date" name="dttest21" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson21;?>" type="text" name="namecompperson21" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest21;?>" type="text" name="equiptest21" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg21;?>" type="text" name="serialreg21" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum21;?>" type="text" name="licnum21" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result21;?>" type="text" name="result21" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext21;?>" type="date" name="dtnext21" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>22 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest22;?>" type="date" name="dttest22" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson22;?>" type="text" name="namecompperson22" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest22;?>" type="text" name="equiptest22" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg22;?>" type="text" name="serialreg22" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum22;?>" type="text" name="licnum22" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result22;?>" type="text" name="result22" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext22;?>" type="date" name="dtnext22" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>23 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest23;?>" type="date" name="dttest23" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson23;?>" type="text" name="namecompperson23" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest23;?>" type="text" name="equiptest23" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg23;?>" type="text" name="serialreg23" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum23;?>" type="text" name="licnum23" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result23;?>" type="text" name="result23" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext23;?>" type="date" name="dtnext23" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>24 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dttest24;?>" type="date" name="dttest24" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->namecompperson24;?>" type="text" name="namecompperson24" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->equiptest24;?>" type="text" name="equiptest24" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->serialreg24;?>" type="text" name="serialreg24" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->licnum24;?>" type="text" name="licnum24" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->result24;?>" type="text" name="result24" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px">
    <input value="<?= $data->dtnext24;?>" type="date" name="dtnext24" size="12">
  </TD>
  </TR>
  <TR>
  <TH style="width:47px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
  <SPAN style="font-family:'sans-serif', 'Cordia New', sans-serif; font-size:9.7pt; font-weight:normal; color:#000000"
>25 </SPAN
></TH>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dttest25;?>" type="date" name="dttest25" size="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->namecompperson25;?>" type="text" name="namecompperson25" size="22" maxlength="25">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->equiptest25;?>" type="text" name="equiptest25" size="22" maxlength="25">
  </TD>
  <TD style="width:140px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->serialreg25;?>" type="text" name="serialreg25" size="22" maxlength="25">
  </TD>
  <TD style="width:94px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->licnum25;?>" type="text" name="licnum25" size="11" maxlength="14">
  </TD>
  <TD style="width:163px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->result25;?>" type="text" name="result25" size="22" maxlength="25">
  </TD>
  <TD style="width:82px; height:19px; border-style:solid; border-color:#000000; border-width:1px 1px 1px 1px">
    <input value="<?= $data->dtnext25;?>" type="date" name="dtnext25" size="12">
  </TD>
  </TR>
</TABLE>


</BODY>
</HTML>
