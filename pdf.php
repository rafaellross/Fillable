<?php

require_once 'config.php';

$con = $link;


if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);


$sql = "SELECT fillable.id, fillable.type, fillable.content, fillable.date_created, fillable.empSign FROM fillable inner join employees on employees.id = fillable.employee WHERE fillable.id in (" . $id . ") order by employees.name;";



$query 	= mysqli_query($con, $sql);




require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Load data
function LoadData($data)
{
    return $data;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

}

$pdf = new PDF();

while($data = mysqli_fetch_array($query)){
    $empSign = $data['empSign'];
    $data = json_decode($data[2]);
    

    $pdf->SetFont('Arial','',14);
    
    $pdf->AddPage('L');
    $pdf->Cell(17,10,'Name:');
    $pdf->Cell(80,10, substr ($data->empname , 0, 30 ), 'B');
    $pdf->Cell(15,10,'W/E:');
    
    
    
    $weekStartTemp = explode("-", $data->weestart);
    $weekStart = (count($weekStartTemp) > 1 ? $weekStartTemp[2] . "/" . $weekStartTemp[1] . "/" . $weekStartTemp[0] : "");
    
    
    $pdf->Cell(30,10,substr ($data->weestart, 0, 30 ), 'B');
    $pdf->Ln();
    $pdf->Ln();
    
    $width_first = 20;
    $width_days = 35;
    $height = 10;
    $pdf->SetFillColor(192, 192, 192);
    $pdf->SetFont('Arial','',5);
    $pdf->Cell($width_first,5,'', 1);
    
    $days = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
    
    foreach ($days as $day) {
        $pdf->Cell($width_days,5,$day,1,0,'C');
    }
    
    //total hrs
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25,5,'TOTAL HRS',1,0,'C');
    
    $pdf->Ln();
    
    //Second line
    $pdf->Text(17, 37, 'START &');
    $pdf->Text(15, 39, 'FINISH TIME');
    $pdf->Cell($width_first, 5,"", 'LRB', 'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell($width_days,5, $data->monStart . ($data->monEnd !== "" ? " - " : "") . $data->monEnd,'LRB',0,'C');
    $pdf->Cell($width_days,5, $data->tueStart . ($data->tueEnd !== "" ? " - " : "") . $data->tueEnd,'RB',0,'C');
    $pdf->Cell($width_days,5, $data->wedStart . ($data->wedEnd !== "" ? " - " : "") . $data->wedEnd,'RB',0,'C');
    $pdf->Cell($width_days,5, $data->thuStart . ($data->thuEnd !== "" ? " - " : "") . $data->thuEnd,'RB',0,'C');
    $pdf->Cell($width_days,5, $data->friStart . ($data->friEnd !== "" ? " - " : "") . $data->friEnd,'RB',0,'C');
    $pdf->Cell($width_days,5, $data->satStart . ($data->satEnd !== "" ? " - " : "") . $data->satEnd,'RB',0,'C');
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25,5,$data->totalWeek,'LRB',0,'C');
    $pdf->Ln();
    //Start Job/Hrs lines
    //Second line
    
        
        $pdf->SetFont('Arial','',5);
        $pdf->Cell($width_first, 5,"JOB/HRS", 'LRB', 0, 'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell($width_days, 5, $data->{'jobMon1'} .(empty($data->{'jobMon1'}) ? "" : "/") . $data->{'hrsMon1'},'LRB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobTue1'} .(empty($data->{'jobTue1'}) ? "" : "/") . $data->{'hrsTue1'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobWed1'} .(empty($data->{'jobWed1'}) ? "" : "/") . $data->{'hrsWed1'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobThu1'} .(empty($data->{'jobThu1'}) ? "" : "/") . $data->{'hrsThu1'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobFri1'} .(empty($data->{'jobFri1'}) ? "" : "/") . $data->{'hrsFri1'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobSat1'} .(empty($data->{'jobSat1'}) ? "" : "/") . $data->{'hrsSat1'},'RB',0,'C');
        $pdf->Cell(10,5,'',0,0,'C');
        $pdf->Cell(25, 5,"",'LRB',0,'C');
        $pdf->Ln();        

        $pdf->SetFont('Arial','',5);
        $pdf->Cell($width_first, 5,"JOB/HRS", 'LRB', 0, 'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell($width_days, 5, $data->{'jobMon2'} .(empty($data->{'jobMon2'}) ? "" : "/") . $data->{'hrsMon2'},'LRB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobTue2'} .(empty($data->{'jobTue2'}) ? "" : "/") . $data->{'hrsTue2'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobWed2'} .(empty($data->{'jobWed2'}) ? "" : "/") . $data->{'hrsWed2'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobThu2'} .(empty($data->{'jobThu2'}) ? "" : "/") . $data->{'hrsThu2'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobFri2'} .(empty($data->{'jobFri2'}) ? "" : "/") . $data->{'hrsFri2'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobSat2'} .(empty($data->{'jobSat2'}) ? "" : "/") . $data->{'hrsSat2'},'RB',0,'C');
        $pdf->Cell(10,5,'',0,0,'C');
        $pdf->Cell(25, 5,"",'LRB',0,'C');
        $pdf->Ln();        
     
    
        $pdf->SetFont('Arial','',5);
        $pdf->Cell($width_first, 5,"JOB/HRS", 'LRB', 0, 'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell($width_days, 5, $data->{'jobMon3'} .(empty($data->{'jobMon3'}) ? "" : "/") . $data->{'hrsMon3'},'LRB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobTue3'} .(empty($data->{'jobTue3'}) ? "" : "/") . $data->{'hrsTue3'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobWed3'} .(empty($data->{'jobWed3'}) ? "" : "/") . $data->{'hrsWed3'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobThu3'} .(empty($data->{'jobThu3'}) ? "" : "/") . $data->{'hrsThu3'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobFri3'} .(empty($data->{'jobFri3'}) ? "" : "/") . $data->{'hrsFri3'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobSat3'} .(empty($data->{'jobSat3'}) ? "" : "/") . $data->{'hrsSat3'},'RB',0,'C');
        $pdf->Cell(10,5,'',0,0,'C');
        $pdf->Cell(25, 5,"",'LRB',0,'C');
        $pdf->Ln();        

    
        $pdf->SetFont('Arial','',5);
        $pdf->Cell($width_first, 5,"JOB/HRS", 'LRB', 0, 'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell($width_days, 5, $data->{'jobMon4'} .(empty($data->{'jobMon4'}) ? "" : "/") . $data->{'hrsMon4'},'LRB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobTue4'} .(empty($data->{'jobTue4'}) ? "" : "/") . $data->{'hrsTue4'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobWed4'} .(empty($data->{'jobWed4'}) ? "" : "/") . $data->{'hrsWed4'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobThu4'} .(empty($data->{'jobThu4'}) ? "" : "/") . $data->{'hrsThu4'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobFri4'} .(empty($data->{'jobFri4'}) ? "" : "/") . $data->{'hrsFri4'},'RB',0,'C');
        $pdf->Cell($width_days, 5, $data->{'jobSat4'} .(empty($data->{'jobSat4'}) ? "" : "/") . $data->{'hrsSat4'},'RB',0,'C');
        $pdf->Cell(10,5,'',0,0,'C');
        $pdf->Cell(25, 5,"",'LRB',0,'C');
        $pdf->Ln();        

    
    
    
    $pdf->SetFont('Arial','',5);
    $pdf->Cell($width_first, 8,"TOTAL HRS", 'LRB', 0, 'C');
    $pdf->SetFont('Arial','',8);
    
    
    $pdf->Cell($width_days,8, $data->hrsMon,'LRB',0,'C', true);
    $pdf->Cell($width_days,8, $data->hrsTue,'LRB',0,'C', true);
    $pdf->Cell($width_days,8, $data->hrsWed,'LRB',0,'C', true);
    $pdf->Cell($width_days,8, $data->hrsThu,'LRB',0,'C', true);
    $pdf->Cell($width_days,8, $data->hrsFri,'LRB',0,'C', true);
    $pdf->Cell($width_days,8, $data->hrsSat,'LRB',0,'C', true);
    
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25,8,$data->totalWeek,'LRB',0,'C');
    
    $pdf->Ln(10);
    
    $pdf->Cell($width_first, 8,"By signing this form I take full responsibility for the hours stated above and confirm the information is correct and true.");
    $pdf->Ln();
    
    $pdf->Text(11, 95,'Employee Signature   ');
    //$pdf->Image($data->empSign, 150, 85, 40);    
    $img = explode(',',$empSign);
    
    $pic = 'data://text/plain;base64,'. $img[1];
    
    $pdf->Image($pic, 35,87.7,40,0,'png');
    
    
    
    
    
    
    $pdf->Text(80, 95,'Date      '. $data->empDate);
    $pdf->Line(11, 96, 80, 96);
    $pdf->Line(89, 96, 105, 96);
    
    $pdf->Text(11, 105,'Authorised By   '. /*'$data->authBy'*/'');
    $authByDateTemp =  'explode("-", $data->authByDate)';
    
    $authByDate = (count($authByDateTemp) > 1 ? $authByDateTemp[2] . "/" . $authByDateTemp[1] . "/" . $authByDateTemp[0] : "");
    $pdf->Text(80, 105,'Date      '. $authByDate);
    $pdf->Line(11, 106, 80, 106);
    $pdf->Line(89, 106, 105, 106);
    
    $pdf->Image('images/Site Diary_img_0.jpg', 150, 85, 40);
    $pdf->SetFont('Arial','B',15);
    $pdf->Text(209, 90,'TIME SHEET');
    $pdf->SetFont('Arial','',8);
    $pdf->Text(208, 95,'Fax Number 02 8668 4892');
    $pdf->SetFont('Arial','',8);
    $pdf->Text(200, 100,'admin@smartplumbingsolutions.com.au');
    $pdf->SetFont('Arial','B',8);
    $pdf->Text(207, 105,'Call 1800 69 SMART (76278)');
    
    $pdf->Ln();
    $pdf->Ln();
    
    $pdf->SetFont('Arial','',4);
    $pdf->Text(10, 115,'OFFICE USE ONLY');
    $pdf->Line(10, 116, 275, 116);
    $pdf->Ln(25);
    
    //JOB HOURS
    $pdf->Cell(10,5,'JOB',1,0,'C');
    $pdf->Cell(14,5,'HOURS',1,0,'C');
    
    //Gap
    $pdf->Cell(24,5,'');
    
        //Center table
        $pdf->Cell(10,5,'',1,0,'C');
        foreach ($days as $day) {
            $pdf->Cell(14,5,$day,1,0,'C');
        }
        $pdf->Cell(14,5,'TOTAL',1,0,'C');
    
        //Summary
        $pdf->Cell(14,5,'');//Gap
        $pdf->Cell(40,5,'TOTAL NORMAL PAY LESS 4HR RDO',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, /*'$data->tot1'*/'',1,0,'C', true);
    
    
    $pdf->Ln();
    $pdf->Cell(10,5, /*'$data->job1*/'',1,0,'C');
    $pdf->Cell(14,5, /*'$data->hours1'*/'',1,0,'C');
        //Center Table
        $pdf->Cell(24,5,'');//Gap
        $pdf->Cell(10,5,'TOTAL HRS',1,0,'C');
        //Total
        $pdf->Cell(14,5, $data->hrsMon,1,0,'C');
        $pdf->Cell(14,5, $data->hrsTue,1,0,'C');
        $pdf->Cell(14,5, $data->hrsWed,1,0,'C');
        $pdf->Cell(14,5, $data->hrsThu,1,0,'C');
        $pdf->Cell(14,5, $data->hrsFri,1,0,'C');
        $pdf->Cell(14,5, $data->hrsSat,1,0,'C');
        $pdf->Cell(14,5, $data->totalWeek,1,0,'C');
    
        //Summary
        $pdf->Cell(14,5,'');//Gap
        $pdf->Cell(40,5,'TOTAL TIME AND HALF (1.5)',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, /*'$data->tot2'*/'',1,0,'C', true);
        
    
        
    $pdf->Ln();
    $pdf->Cell(10,5, /*'$data->job2'*/'',1,0,'C');
    $pdf->Cell(14,5, /*'$data->hours2'*/'',1,0,'C');
        //Center Table
        $pdf->Cell(24,5,'');//Gap
        $pdf->Cell(10,5,'NOR',1,0,'C');
        //Total
        $pdf->Cell(14,5, $data->MonNorm,1,0,'C');
        $pdf->Cell(14,5, $data->TueNorm,1,0,'C');
        $pdf->Cell(14,5, $data->WedNorm,1,0,'C');
        $pdf->Cell(14,5, $data->ThuNorm,1,0,'C');
        $pdf->Cell(14,5, $data->FriNorm,1,0,'C');
        $pdf->Cell(14,5, $data->SatNorm,1,0,'C');
        $pdf->Cell(14,5, $data->totalNormal,1,0,'C');
        
        //Summary
        $pdf->Cell(14,5,'');//Gap
        $pdf->Cell(40,5,'TOTAL DOUBLE TIME (2T)',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, /*'$data->tot3'*/'',1,0,'C', true);
        
    
    $pdf->Ln();
    $pdf->Cell(10,5, /*'$data->job3,1'*/'',1,0,'C');
    $pdf->Cell(14,5, /*'$data->hours3'*/'',1,0,'C');
    
        //Center Table
        $pdf->Cell(24,5,'');//Gap
        $pdf->Cell(10,5,'1.5',1,0,'C');
        //Total
        $pdf->Cell(14,5, $data->Mon15,1,0,'C');
        $pdf->Cell(14,5, $data->Tue15,1,0,'C');
        $pdf->Cell(14,5, $data->Wed15,1,0,'C');
        $pdf->Cell(14,5, $data->Thu15,1,0,'C');
        $pdf->Cell(14,5, $data->Fri15,1,0,'C');
        $pdf->Cell(14,5, $data->Sat15,1,0,'C');
        $pdf->Cell(14,5, $data->total15,1,0,'C');
    
            //Summary
        $pdf->Cell(14,5,'');//Gap
        $pdf->Cell(40,5,'TOTAL PRODUCTIVITY HRS',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, /*'$data->tot4'*/'',1,0,'C', true);
    
    
    $pdf->Ln();
    $pdf->Cell(10,5, /*'$data->job4'*/'',1,0,'C');
    $pdf->Cell(14,5, /*'$data->hours4'*/'',1,0,'C');
    
        //Center Table
        $pdf->Cell(24,5,'');//Gap
        $pdf->Cell(10,5,'2',1,0,'C');
        //Total
        $pdf->Cell(14,5, $data->Mon20,1,0,'C');
        $pdf->Cell(14,5, $data->Tue20,1,0,'C');
        $pdf->Cell(14,5, $data->Wed20,1,0,'C');
        $pdf->Cell(14,5, $data->Thu20,1,0,'C');
        $pdf->Cell(14,5, $data->Fri20,1,0,'C');
        $pdf->Cell(14,5, $data->Sat20,1,0,'C');
        $pdf->Cell(14,5, $data->total20,1,0,'C');
    
        //Summary
        $pdf->Cell(14,5,'');//Gap
        $pdf->Cell(40,5,'TOTAL RDO HRS TAKEN	',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, /*'$data->tot5*/'',1,0,'C', true);
        
    
        
    $pdf->Ln();
    $pdf->Cell(10,5, /*'$data->job5'*/'',1,0,'C');
    $pdf->Cell(14,5, /*'$data->hours5'*/'',1,0,'C');
        //Summary
        $pdf->Cell(146,5,'');//Gap
        $pdf->Cell(40,5,'TOTAL SICK TAKEN',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, /*'$data->tot6'*/'',1,0,'C', true);
        
    
    $pdf->Ln();
    $pdf->Cell(10,5, /*'$data->job6*/'',1,0,'C');
    $pdf->Cell(14,5,/* '$data->hours6'*/'',1,0,'C');
        //Summary
        $pdf->Cell(146,5,'');//Gap
        $pdf->Cell(40,5,'TOTAL HOLIDAY TAKEN',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, /*'$data->tot7'*/'',1,0,'C', true);
        
    
    $pdf->Ln();
    $pdf->Cell(10,5, /*'$data->job7'*/'',1,0,'C');
    $pdf->Cell(14,5, /*'$data->hours7'*/'',1,0,'C');
        //Summary
        $pdf->Cell(146,5,'');//Gap
        $pdf->Cell(40,5,'TOTAL TRAVEL DAYS',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5,/* '$data->tot8'*/'',1,0,'C', true);
    
    $pdf->Ln();
    
        //Summary
        $pdf->Cell(170,5,'');//Gap
        $pdf->Cell(40,5,'TOTAL SITE ALLOW.',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, /*'$data->tot9*/'',1,0,'C', true);
    
        
}




//var_dump($data);
$pdf->Output();
//echo '<img src="' . $_POST['empSign'] . '"/>';
//print_r($_POST);
?>