<?php
    error_reporting(0);
/*
 * Total Normal Pay Less 4HR RDO 
 * 
 *  This is the total of hours worked on the week without overtime (1.5 & 2.0)
 * Formula = [Total Hours] + [Tafe]
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 *  */



require_once 'config.php';

$con = $link;


if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);


$sql = "SELECT fillable.id, fillable.type, fillable.content, fillable.date_created, fillable.empSign, employees.casual, employees.rdo, employees.fare, employees.siteallow FROM fillable inner join employees on employees.id = fillable.employee WHERE fillable.id in (" . $id . ") order by employees.name;";



$query 	= mysqli_query($con, $sql);



require('fpdf/fpdf.php');

function D($J){
    return ($J<10? '0':'') . $J;
};

function minutesToHour($minutes = 0){
     if ($minutes > 0) {
       return D($minutes/60 | 0) . ':' . D($minutes%60);
     } else {
     }
     return "";
}

function hourToMinutes($hour){
    $piece = explode(":", $hour);
    if (count($piece) > 1) {
      return $piece[0]*60 + +$piece[1];
    } else {
      return 0;
    }
}

function hourToDecimal($hour){
    $piece = explode(":", $hour);
    if (count($piece) > 1) {
        if($piece[1] > 0) {
           return $piece[0] + $piece[1]/60;            
        } else {
            return $piece[0] + 0;            
        }
      
    } else {
      return "";
    }
}






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

//Font sizes
$font_large = 12;
$font_regular = 10;
$font_sm = 8;

while($data = mysqli_fetch_array($query)){
    
    
    
    $travel_days = 0;
    $minutes_normal = 0;    
    $timeSheetId = $data['id'];
    $casual = $data['casual'];
    $getRdo = $data['rdo'];
    $getFare = $data['fare'];
    $empSign = $data['empSign'];
    $getSiteAllow = $data['siteallow'];
    
    $data = json_decode($data[2]);


    $pdf->SetFont('Arial','',$font_large);

    $pdf->AddPage('L');
    $pdf->Cell(17,10,'Name:');
    $pdf->Cell(80,10, substr ($data->empname , 0, 30 ), 'B');
    $pdf->Cell(15,10,'W/E:');
    
    //Write id on the pdf
    $pdf->Text(280, 10,'#' . $timeSheetId);


    $weekStartTemp = explode("-", $data->weestart);
    $weekStart = (count($weekStartTemp) > 1 ? $weekStartTemp[2] . "/" . $weekStartTemp[1] . "/" . $weekStartTemp[0] : "");


    $pdf->Cell(30,10,substr ($data->weestart, 0, 30 ), 'B');
    $pdf->Ln();
    $pdf->Ln();

    $width_first = 20;
    $width_days = 35;
    $height = 10;

    $pdf->SetDrawColor(1, 1, 1);
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

    //Line show start and end hours of Job 1
    $pdf->Text(17, 37, 'START &');
    $pdf->Text(15, 39, 'FINISH TIME');
    $pdf->Cell($width_first, 5,"", 1, 'C');
    $pdf->SetFont('Arial','',$font_regular);
    $pdf->Cell($width_days,5, minutesToHour($data->mon_start_1) . ($data->mon_end_1 !== "" ? " - " : "") . minutesToHour($data->mon_end_1),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->tue_start_1) . ($data->tue_end_1 !== "" ? " - " : "") . minutesToHour($data->tue_end_1),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->wed_start_1) . ($data->wed_end_1 !== "" ? " - " : "") . minutesToHour($data->wed_end_1),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->thu_start_1) . ($data->thu_end_1 !== "" ? " - " : "") . minutesToHour($data->thu_end_1),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->fri_start_1) . ($data->fri_end_1 !== "" ? " - " : "") . minutesToHour($data->fri_end_1),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->sat_start_1) . ($data->sat_end_1 !== "" ? " - " : "") . minutesToHour($data->sat_end_1),1,0,'C', true);
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25,5,hourToDecimal($data->totalWeek),1,0,'C');
    $pdf->Ln();

    //Start Job/Hrs lines Job1
    $pdf->SetFont('Arial','',5);
    $pdf->Cell($width_first, 5,"JOB/HRS", 1, 0, 'C');
    $pdf->SetFont('Arial','',$font_regular);
    $pdf->Cell($width_days, 5, $data->{'jobMon1'} .(empty($data->{'jobMon1'}) ? "" : "/") . hourToDecimal($data->{'hrs_mon_1'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobTue1'} .(empty($data->{'jobTue1'}) ? "" : "/") . hourToDecimal($data->{'hrs_tue_1'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobWed1'} .(empty($data->{'jobWed1'}) ? "" : "/") . hourToDecimal($data->{'hrs_wed_1'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobThu1'} .(empty($data->{'jobThu1'}) ? "" : "/") . hourToDecimal($data->{'hrs_thu_1'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobFri1'} .(empty($data->{'jobFri1'}) ? "" : "/") . hourToDecimal($data->{'hrs_fri_1'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobSat1'} .(empty($data->{'jobSat1'}) ? "" : "/") . hourToDecimal($data->{'hrs_sat_1'}),1,0,'C');
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25, 5,"",1,0,'C');
    $pdf->Ln();


    //Line show start and end hours of Job 2
    $pdf->SetFont('Arial','',5);
    $pdf->Text(17, 47, 'START &');
    $pdf->Text(15, 49, 'FINISH TIME');
    $pdf->Cell($width_first, 5,"", 1, 'C');
    $pdf->SetFont('Arial','',$font_regular);
    $pdf->Cell($width_days,5, minutesToHour($data->mon_start_2) . ($data->mon_end_2 !== "" ? " - " : "") . minutesToHour($data->mon_end_2),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->tue_start_2) . ($data->tue_end_2 !== "" ? " - " : "") . minutesToHour($data->tue_end_2),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->wed_start_2) . ($data->wed_end_2 !== "" ? " - " : "") . minutesToHour($data->wed_end_2),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->thu_start_2) . ($data->thu_end_2 !== "" ? " - " : "") . minutesToHour($data->thu_end_2),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->fri_start_2) . ($data->fri_end_2 !== "" ? " - " : "") . minutesToHour($data->fri_end_2),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->sat_start_2) . ($data->sat_end_2 !== "" ? " - " : "") . minutesToHour($data->sat_end_2),1,0,'C', true);
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25,5,'',1,0,'C');
    $pdf->Ln();

    //Start Job/Hrs lines Job2
    $pdf->SetFont('Arial','',5);
    $pdf->Cell($width_first, 5,"JOB/HRS", 1, 0, 'C');
    $pdf->SetFont('Arial','',$font_regular);
    $pdf->Cell($width_days, 5, $data->{'jobMon2'} .(empty($data->{'jobMon2'}) ? "" : "/") . hourToDecimal($data->{'hrs_mon_2'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobTue2'} .(empty($data->{'jobTue2'}) ? "" : "/") . hourToDecimal($data->{'hrs_tue_2'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobWed2'} .(empty($data->{'jobWed2'}) ? "" : "/") . hourToDecimal($data->{'hrs_wed_2'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobThu2'} .(empty($data->{'jobThu2'}) ? "" : "/") . hourToDecimal($data->{'hrs_thu_2'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobFri2'} .(empty($data->{'jobFri2'}) ? "" : "/") . hourToDecimal($data->{'hrs_fri_2'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobSat2'} .(empty($data->{'jobSat2'}) ? "" : "/") . hourToDecimal($data->{'hrs_sat_2'}),1,0,'C');
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25, 5,"",1,0,'C');
    $pdf->Ln();


    //Line show start and end hours of Job 3
    $pdf->SetFont('Arial','',5);
    $pdf->Text(17, 57, 'START &');
    $pdf->Text(15, 59, 'FINISH TIME');
    $pdf->Cell($width_first, 5,"", 1, 'C');
    $pdf->SetFont('Arial','',$font_regular);
    $pdf->Cell($width_days,5, minutesToHour($data->mon_start_3) . ($data->mon_end_3 !== "" ? " - " : "") . minutesToHour($data->mon_end_3),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->tue_start_3) . ($data->tue_end_3 !== "" ? " - " : "") . minutesToHour($data->tue_end_3),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->wed_start_3) . ($data->wed_end_3 !== "" ? " - " : "") . minutesToHour($data->wed_end_3),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->thu_start_3) . ($data->thu_end_3 !== "" ? " - " : "") . minutesToHour($data->thu_end_3),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->fri_start_3) . ($data->fri_end_3 !== "" ? " - " : "") . minutesToHour($data->fri_end_3),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->sat_start_3) . ($data->sat_end_3 !== "" ? " - " : "") . minutesToHour($data->sat_end_3),1,0,'C', true);
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25,5,'',1,0,'C');
    $pdf->Ln();

    //Start Job/Hrs lines Job3
    $pdf->SetFont('Arial','',5);
    $pdf->Cell($width_first, 5,"JOB/HRS", 1, 0, 'C');
    $pdf->SetFont('Arial','',$font_regular);
    $pdf->Cell($width_days, 5, $data->{'jobMon3'} .(empty($data->{'jobMon3'}) ? "" : "/") . hourToDecimal($data->{'hrs_mon_3'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobTue3'} .(empty($data->{'jobTue3'}) ? "" : "/") . hourToDecimal($data->{'hrs_tue_3'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobWed3'} .(empty($data->{'jobWed3'}) ? "" : "/") . hourToDecimal($data->{'hrs_wed_3'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobThu3'} .(empty($data->{'jobThu3'}) ? "" : "/") . hourToDecimal($data->{'hrs_thu_3'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobFri3'} .(empty($data->{'jobFri3'}) ? "" : "/") . hourToDecimal($data->{'hrs_fri_3'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobSat3'} .(empty($data->{'jobSat3'}) ? "" : "/") . hourToDecimal($data->{'hrs_sat_3'}),1,0,'C');
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25, 5,"",1,0,'C');
    $pdf->Ln();

    //Line show start and end hours of Job 4
    $pdf->SetFont('Arial','',5);
    $pdf->Text(17, 67, 'START &');
    $pdf->Text(15, 69, 'FINISH TIME');
    $pdf->Cell($width_first, 5,"", 1, 'C');
    $pdf->SetFont('Arial','',$font_regular);
    $pdf->Cell($width_days,5, minutesToHour($data->mon_start_4) . ($data->mon_end_4 !== "" ? " - " : "") . minutesToHour($data->mon_end_4),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->tue_start_4) . ($data->tue_end_4 !== "" ? " - " : "") . minutesToHour($data->tue_end_4),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->wed_start_4) . ($data->wed_end_4 !== "" ? " - " : "") . minutesToHour($data->wed_end_4),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->thu_start_4) . ($data->thu_end_4 !== "" ? " - " : "") . minutesToHour($data->thu_end_4),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->fri_start_4) . ($data->fri_end_4 !== "" ? " - " : "") . minutesToHour($data->fri_end_4),1,0,'C', true);
    $pdf->Cell($width_days,5, minutesToHour($data->sat_start_4) . ($data->sat_end_4 !== "" ? " - " : "") . minutesToHour($data->sat_end_4),1,0,'C', true);
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25,5,'',1,0,'C');
    $pdf->Ln();

    //Start Job/Hrs lines Job4
    $pdf->SetFont('Arial','',5);
    $pdf->Cell($width_first, 5,"JOB/HRS", 1, 0, 'C');
    $pdf->SetFont('Arial','',$font_regular);
    $pdf->Cell($width_days, 5, $data->{'jobMon4'} .(empty($data->{'jobMon4'}) ? "" : "/") . hourToDecimal($data->{'hrs_mon_4'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobTue4'} .(empty($data->{'jobTue4'}) ? "" : "/") . hourToDecimal($data->{'hrs_tue_4'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobWed4'} .(empty($data->{'jobWed4'}) ? "" : "/") . hourToDecimal($data->{'hrs_wed_4'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobThu4'} .(empty($data->{'jobThu4'}) ? "" : "/") . hourToDecimal($data->{'hrs_thu_4'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobFri4'} .(empty($data->{'jobFri4'}) ? "" : "/") . hourToDecimal($data->{'hrs_fri_4'}),1,0,'C');
    $pdf->Cell($width_days, 5, $data->{'jobSat4'} .(empty($data->{'jobSat4'}) ? "" : "/") . hourToDecimal($data->{'hrs_sat_4'}),1,0,'C');
    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25, 5,"",1,0,'C');
    $pdf->Ln();

    $pdf->SetFont('Arial','',5);
    $pdf->SetFillColor(255,154,0);

    $pdf->Cell($width_first, 8,"TOTAL HRS", 1, 0, 'C');
    $pdf->SetFont('Arial','',$font_regular);


    $pdf->Cell($width_days,8, hourToDecimal($data->hrsMon),1,0,'C', true);
    $pdf->Cell($width_days,8, hourToDecimal($data->hrsTue),1,0,'C', true);
    $pdf->Cell($width_days,8, hourToDecimal($data->hrsWed),1,0,'C', true);
    $pdf->Cell($width_days,8, hourToDecimal($data->hrsThu),1,0,'C', true);
    $pdf->Cell($width_days,8, hourToDecimal($data->hrsFri),1,0,'C', true);
    $pdf->Cell($width_days,8, hourToDecimal($data->hrsSat),1,0,'C', true);

    $pdf->Cell(10,5,'',0,0,'C');
    $pdf->Cell(25,8,hourToDecimal($data->totalWeek),1,0,'C');

    $pdf->Ln(10);

    $pdf->Cell($width_first, 8,"By signing this form I take full responsibility for the hours stated above and confirm the information is correct and true.");
    $pdf->Ln();

    $pdf->Text(11, 105,'Employee Signature   ');
    //$pdf->Image($data->empSign, 150, 85, 40);
    $img = explode(',',$empSign);

    $pic = 'data://text/plain;base64,'. $img[1];

    $pdf->Image($pic, 40,97.7,40,0,'png');






    $pdf->Text(75, 105,'Date      '. $data->empDate);
    $pdf->Line(11, 106, 80, 106);
    $pdf->Line(89, 106, 105, 106);

    $pdf->Text(11, 115,'Authorised By   '. /*'$data->authBy'*/'');
    $authByDateTemp =  'explode("-", $data->authByDate)';

    $authByDate = (count($authByDateTemp) > 1 ? $authByDateTemp[2] . "/" . $authByDateTemp[1] . "/" . $authByDateTemp[0] : "");
    $pdf->Text(75, 115,'Date      '. $authByDate);
    $pdf->Line(11, 116, 80, 116);
    $pdf->Line(89, 116, 105, 116);

    $pdf->Image('images/Site Diary_img_0.jpg', 150, 95, 40);
    $pdf->SetFont('Arial','B',15);
    $pdf->Text(209, 100,'TIME SHEET');
    $pdf->SetFont('Arial','',8);
    $pdf->Text(208, 105,'Fax Number 02 8668 4892');
    $pdf->SetFont('Arial','',8);
    $pdf->Text(200, 110,'admin@smartplumbingsolutions.com.au');
    $pdf->SetFont('Arial','B',8);
    $pdf->Text(207, 115,'Call 1800 69 SMART (76278)');

    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial','',4);
    $pdf->Text(10, 125,'OFFICE USE ONLY');
    $pdf->Line(10, 126, 275, 126);
    $pdf->Ln(25);


    $pdf->SetFont('Arial','',$font_sm);

    //Define table dimensions

    //Table left
    $tb_left_width = 14;
    $gap_after_tb_left = 14;

    //Table center
    $tb_center_width = 17;
    $gap_after_tb_center = 16;

    //Table right
    $tb_right_width = 60;
    $tb_right_width_col2 = 10;



    //JOB HOURS
    $pdf->Cell($tb_left_width,5,'JOB',1,0,'C');
    $pdf->Cell($tb_left_width,5,'HOURS',1,0,'C');

        //Calculate total hours by job
        $jobs_hours = array();

        //Monday

        $job_hourMon1 = new stdClass;
        $job_hourMon1->job = $data->{'jobMon1'};
        $job_hourMon1->hour = $data->{'hrs_mon_1'};
        array_push($jobs_hours, $job_hourMon1);



        $job_hourMon2 = new stdClass;
        $job_hourMon2->job = $data->{'jobMon2'};
        $job_hourMon2->hour = $data->{'hrs_mon_2'};
        array_push($jobs_hours, $job_hourMon2);



        $job_hourMon3 = new stdClass;
        $job_hourMon3->job = $data->{'jobMon3'};
        $job_hourMon3->hour = $data->{'hrs_mon_3'};
        array_push($jobs_hours, $job_hourMon3);


        $job_hourMon4 = new stdClass;
        $job_hourMon4->job = $data->{'jobMon4'};
        $job_hourMon4->hour = $data->{'hrs_mon_4'};
        array_push($jobs_hours, $job_hourMon4);


        //Tuesday
        $job_hourTue1 = new stdClass;
        $job_hourTue1->job = $data->{'jobTue1'};
        $job_hourTue1->hour = $data->{'hrs_tue_1'};
        array_push($jobs_hours, $job_hourTue1);

        $job_hourTue2 = new stdClass;
        $job_hourTue2->job = $data->{'jobTue2'};
        $job_hourTue2->hour = $data->{'hrs_tue_2'};
        array_push($jobs_hours, $job_hourTue2);

        $job_hourTue3 = new stdClass;
        $job_hourTue3->job = $data->{'jobTue3'};
        $job_hourTue3->hour = $data->{'hrs_tue_3'};
        array_push($jobs_hours, $job_hourTue3);

        $job_hourTue4 = new stdClass;
        $job_hourTue4->job = $data->{'jobTue4'};
        $job_hourTue4->hour = $data->{'hrs_tue_4'};
        array_push($jobs_hours, $job_hourTue4);


        //Wednesday
        $job_hourWed1 = new stdClass;
        $job_hourWed1->job = $data->{'jobWed1'};
        $job_hourWed1->hour = $data->{'hrs_wed_1'};
        array_push($jobs_hours, $job_hourWed1);

        $job_hourWed2 = new stdClass;
        $job_hourWed2->job = $data->{'jobWed2'};
        $job_hourWed2->hour = $data->{'hrs_wed_2'};
        array_push($jobs_hours, $job_hourWed2);

        $job_hourWed3 = new stdClass;
        $job_hourWed3->job = $data->{'jobWed3'};
        $job_hourWed3->hour = $data->{'hrs_wed_3'};
        array_push($jobs_hours, $job_hourWed3);

        $job_hourWed4 = new stdClass;
        $job_hourWed4->job = $data->{'jobWed4'};
        $job_hourWed4->hour = $data->{'hrs_wed_4'};
        array_push($jobs_hours, $job_hourWed4);

        //Thursday
        $job_hourThu1 = new stdClass;
        $job_hourThu1->job = $data->{'jobThu1'};
        $job_hourThu1->hour = $data->{'hrs_thu_1'};
        array_push($jobs_hours, $job_hourThu1);

        $job_hourThu2 = new stdClass;
        $job_hourThu2->job = $data->{'jobThu2'};
        $job_hourThu2->hour = $data->{'hrs_thu_2'};
        array_push($jobs_hours, $job_hourThu2);

        $job_hourThu3 = new stdClass;
        $job_hourThu3->job = $data->{'jobThu3'};
        $job_hourThu3->hour = $data->{'hrs_thu_3'};
        array_push($jobs_hours, $job_hourThu3);

        $job_hourThu4 = new stdClass;
        $job_hourThu4->job = $data->{'jobThu4'};
        $job_hourThu4->hour = $data->{'hrs_thu_4'};
        array_push($jobs_hours, $job_hourThu4);

        //Friday
        $job_hourFri1 = new stdClass;
        $job_hourFri1->job = $data->{'jobFri1'};
        $job_hourFri1->hour = $data->{'hrs_fri_1'};
        array_push($jobs_hours, $job_hourFri1);

        $job_hourFri2 = new stdClass;
        $job_hourFri2->job = $data->{'jobFri2'};
        $job_hourFri2->hour = $data->{'hrs_fri_2'};
        array_push($jobs_hours, $job_hourFri2);

        $job_hourFri3 = new stdClass;
        $job_hourFri3->job = $data->{'jobFri3'};
        $job_hourFri3->hour = $data->{'hrs_fri_3'};
        array_push($jobs_hours, $job_hourFri3);

        $job_hourFri4 = new stdClass;
        $job_hourFri4->job = $data->{'jobFri4'};
        $job_hourFri4->hour = $data->{'hrs_fri_4'};
        array_push($jobs_hours, $job_hourFri4);

        //Saturday
        $job_hourSat1 = new stdClass;
        $job_hourSat1->job = $data->{'jobSat1'};
        $job_hourSat1->hour = $data->{'hrs_sat_1'};
        array_push($jobs_hours, $job_hourSat1);

        $job_hourSat2 = new stdClass;
        $job_hourSat2->job = $data->{'jobSat2'};
        $job_hourSat2->hour = $data->{'hrs_sat_2'};
        array_push($jobs_hours, $job_hourSat2);

        $job_hourSat3 = new stdClass;
        $job_hourSat3->job = $data->{'jobSat3'};
        $job_hourSat3->hour = $data->{'hrs_sat_3'};
        array_push($jobs_hours, $job_hourSat3);

        $job_hourSat4 = new stdClass;
        $job_hourSat4->job = $data->{'jobSat4'};
        $job_hourSat4->hour = $data->{'hrs_sat_4'};
        array_push($jobs_hours, $job_hourSat4);

        sort($jobs_hours);

        //Get list of jobs and total of hours

        $curr = "";
        $arr_jobs_hours = array();
        foreach ($jobs_hours as $job_hour) {

            if ($job_hour->job !== "") {
                if ($curr != $job_hour->job) {
                    $curr = $job_hour->job;

                }
                if($job_hour->hour !== ""){

                    $job_mins = explode(":", $job_hour->hour);
                    $totalMins = (count($job_mins) > 0) ? ($job_mins[0]*60 + $job_mins[1]) : 0;

                    if(isset($arr_jobs_hours[$curr])){
                        if (in_array($curr, ["rdo", "sick", "anl", "pld", "tafe", "holiday"])) {
                            if(isset($arr_jobs_hours['001'])){
                                $arr_jobs_hours['001'] += $totalMins;
                            } else {
                                $arr_jobs_hours['001'] = $totalMins;
                            }
                        }

                        $arr_jobs_hours[$curr] += $totalMins;
                    } else {
                        if (in_array($curr, ["rdo", "sick", "anl", "pld", "tafe", "holiday"])) {
                            if(isset($arr_jobs_hours['001'])){
                                $arr_jobs_hours['001'] += $totalMins;
                            } else {
                                $arr_jobs_hours['001'] = $totalMins;
                            }
                        }
                        $arr_jobs_hours[$curr] = $totalMins;
                    }
                }
            }
        }
        
        //Check travel day Mon
        $travel_Mon = false;
        if (!in_array($job_hourMon1->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Mon = true;
        }

        //Check travel day Tue
        $travel_Tue = false;
        if (!in_array($job_hourTue1->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Tue = true;
        }

        //Check travel day Wed
        $travel_Wed = false;
        if (!in_array($job_hourWed1->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Wed = true;
        }


        //Check travel day Thu
        $travel_Thu = false;
        if (!in_array($job_hourThu1->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Thu = true;
        }

        //Check travel day Fri
        $travel_Fri = false;
        if (!in_array($job_hourFri1->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Fri = true;
        }

        //Check travel day Sat
        $travel_Sat = false;            
            if (!in_array($job_hourSat1->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
                $travel_Sat = true;
        }

        //Check travel day Mon

        if (!in_array($job_hourMon2->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Mon = true;
        }

        //Check travel day Tue

        if (!in_array($job_hourTue2->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Tue = true;
        }

        //Check travel day Wed

        if (!in_array($job_hourWed2->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Wed = true;
        }


        //Check travel day Thu

        if (!in_array($job_hourThu2->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Thu = true;
        }

        //Check travel day Fri

        if (!in_array($job_hourFri2->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Fri = true;
        }

        //Check travel day Sat

        if (!in_array($job_hourSat2->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Sat = true;
            
        }

        //Check travel day Mon

        if (!in_array($job_hourMon3->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Mon = true;
        }

        //Check travel day Tue

        if (!in_array($job_hourTue3->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Tue = true;
        }

        //Check travel day Wed

        if (!in_array($job_hourWed3->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Wed = true;
        }


        //Check travel day Thu

        if (!in_array($job_hourThu3->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Thu = true;
        }

        //Check travel day Fri

        if (!in_array($job_hourFri3->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Fri = true;
        }

        //Check travel day Sat

        if (!in_array($job_hourSat3->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            
            $travel_Sat = true;
        }

        //Check travel day Mon

        if (!in_array($job_hourMon4->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Mon = true;
        }

        //Check travel day Tue

        if (!in_array($job_hourTue4->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Tue = true;
        }

        //Check travel day Wed

        if (!in_array($job_hourWed4->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Wed = true;
        }


        //Check travel day Thu

        if (!in_array($job_hourThu4->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Thu = true;
        }

        //Check travel day Fri

        if (!in_array($job_hourFri4->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {
            $travel_Fri = true;
        }

        //Check travel day Sat


        if (!in_array($job_hourSat4->job, ["sick", "anl", "pld", "", "tafe", "holiday"])) {            
            $travel_Sat = true;
        }

        if($travel_Mon){
            $travel_days +=1;

        }

        if($travel_Tue){
            $travel_days +=1;

        }

        if($travel_Wed){
            $travel_days +=1;

        }

        if($travel_Thu){
            $travel_days +=1;

        }

        if($travel_Fri){
            $travel_days +=1;

        }

        if($travel_Sat){
            $travel_days +=1;
        }


/*
        echo $travel_Mon . ' - Mon <br>';
        echo ($travel_Tue) . ' - Tue<br>';
        echo ($travel_Wed) . ' - Wed<br>';
        echo ($travel_Thu) . ' - Thu<br>';
        echo ($travel_Fri) . ' - Fri<br>';
        echo ($travel_Sat) . ' - Sat<br>';
  */    
        

        //Fill left table
        $startY_job = 143;
        //print_r($arr_jobs_hours);

        foreach($arr_jobs_hours as $job => $hour) {
            if(!in_array($job, ["rdo", "sick", "anl", "pld", "tafe", "holiday"])){
                $totalMins = $hour;
                $hours = str_pad(floor($totalMins / 60), 2, "0", STR_PAD_LEFT);
                $minutes = str_pad(($totalMins % 60), 2, "0", STR_PAD_LEFT);
                $pdf->Text(15, $startY_job, $job);
                $pdf->Text(28, $startY_job, hourToDecimal($hours . ":" . $minutes));                
                $startY_job += 5;

            }
        }



    //Gap
    $pdf->Cell($gap_after_tb_left,5,'');

        //Center table
        $pdf->Cell($tb_center_width,5,'',1,0,'C');
        foreach ($days as $day) {
            $pdf->Cell($tb_center_width,5,$day,1,0,'C');
        }
        $pdf->Cell($tb_center_width,5,'TOTAL',1,0,'C');



        //Summary
        $pdf->Cell($gap_after_tb_center,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL NORMAL PAY LESS 4HR RDO',1,0,'R');

        $totalMins_rdo_taken = (isset($arr_jobs_hours['rdo']) ? $arr_jobs_hours['rdo'] : 0);
        
        
        $totalMins_sick_taken = (isset($arr_jobs_hours['sick']) ? $arr_jobs_hours['sick'] : 0);
        $totalMins_anl_taken = (isset($arr_jobs_hours['anl']) ? $arr_jobs_hours['anl'] : 0);
        $totalMins_pld_taken = (isset($arr_jobs_hours['pld']) ? $arr_jobs_hours['pld'] : 0);
        $totalMins_tafe_taken = (isset($arr_jobs_hours['tafe']) ? $arr_jobs_hours['tafe'] : 0);
        $totalMins_pub_holiday_taken = (isset($arr_jobs_hours['holiday']) ? $arr_jobs_hours['holiday'] : 0);        
        $norm_less_rdo_mins = explode(":", $data->totalNormal);
        $totalMins = ($norm_less_rdo_mins[0]*60 + $norm_less_rdo_mins[1]) - (!$getRdo ? 0 : (4*60))- $totalMins_rdo_taken - $totalMins_sick_taken - $totalMins_pld_taken - $totalMins_anl_taken;
        $totalMins = ($totalMins > 0 ? $totalMins : 0);
        $hours_normal = str_pad(floor($totalMins / 60), 2, "0", STR_PAD_LEFT);
        $minutes_normal = str_pad(($totalMins % 60), 2, "0", STR_PAD_LEFT);

        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, ($totalMins > 0 ? hourToMinutes($hours_normal . ':' . $minutes_normal)/60 : ""),1,0,'C', true);


    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job1*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours1'*/'',1,0,'C');
        //Center Table
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        $pdf->Cell($tb_center_width,5,'TOTAL HRS',1,0,'C');

        //Total
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->hrsMon),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->hrsTue),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->hrsWed),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->hrsThu),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->hrsFri),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->hrsSat),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->totalWeek),1,0,'C');

        //Summary
        $pdf->Cell($gap_after_tb_center,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL TIME AND HALF (1.5)',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell($tb_right_width_col2,5, hourToMinutes($data->total15) > 0 ? hourToMinutes($data->total15)/60 : "",1,0,'C', true);



    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job2'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours2'*/'',1,0,'C');
        //Center Table
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        $pdf->Cell($tb_center_width,5,'NOR',1,0,'C');
        //Total
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->MonNorm),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->TueNorm),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->WedNorm),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->ThuNorm),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->FriNorm),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->SatNorm),1,0,'C');
        $pdf->Cell($tb_center_width,5, hourToDecimal($data->totalNormal),1,0,'C');

        //Summary
        $pdf->Cell($gap_after_tb_center,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL DOUBLE TIME (2T)',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, hourToMinutes($data->total20) > 0 ? hourToMinutes($data->total20)/60 : "",1,0,'C', true);


    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job3,1'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours3'*/'',1,0,'C');

        //Center Table
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        $pdf->Cell($tb_center_width,5,'1.5',1,0,'C');
        //Total
        $pdf->Cell($tb_center_width,5, ($data->Mon15 !== "00:00" ? hourToDecimal($data->Mon15) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Tue15 !== "00:00" ? hourToDecimal($data->Tue15) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Wed15 !== "00:00" ? hourToDecimal($data->Wed15) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Thu15 !== "00:00" ? hourToDecimal($data->Thu15) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Fri15 !== "00:00" ? hourToDecimal($data->Fri15) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Sat15 !== "00:00" ? hourToDecimal($data->Sat15) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->total15 !== "00:00" ? hourToDecimal($data->total15) : ""),1,0,'C');

            //Summary
        $pdf->Cell($gap_after_tb_center,5,'');//Gap

        $totalMins_pld = (isset($arr_jobs_hours['pld']) ? $arr_jobs_hours['pld'] : 0)  + (isset($data->req_pld) ? $data->req_pld : 0);
        $hours_pld = str_pad(floor($totalMins_pld / 60), 2, "0", STR_PAD_LEFT);
        $minutes_pld = str_pad(($totalMins_pld % 60), 2, "0", STR_PAD_LEFT);

        $pdf->Cell($tb_right_width,5,'TOTAL PLD',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, ($totalMins_pld > 0 ? $totalMins_pld/60 : ""),1,0,'C', true);


    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job4'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours4'*/'',1,0,'C');
    
        //Center Table
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        
        $pdf->Cell($tb_center_width,5,'2',1,0,'C');
        //Total
        $pdf->Cell($tb_center_width,5, ($data->Mon20 !== "00:00" ? hourToDecimal($data->Mon20) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Tue20 !== "00:00" ? hourToDecimal($data->Tue20) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Wed20 !== "00:00" ? hourToDecimal($data->Wed20) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Thu20 !== "00:00" ? hourToDecimal($data->Thu20) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Fri20 !== "00:00" ? hourToDecimal($data->Fri20) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Sat20 !== "00:00" ? hourToDecimal($data->Sat20) : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->total20 !== "00:00" ? $data->total20 : ""),1,0,'C');

        //Summary
        $pdf->Cell($gap_after_tb_center,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL RDO HRS TAKEN	',1,0,'R');
        $pdf->SetFillColor(255,154,0);

        $totalMins_rdo = (isset($arr_jobs_hours['rdo']) ? $arr_jobs_hours['rdo'] : 0);
        
        $hours_rdo = str_pad(floor($totalMins_rdo / 60), 2, "0", STR_PAD_LEFT);
        $minutes_rdo = str_pad(($totalMins_rdo % 60), 2, "0", STR_PAD_LEFT);


        $pdf->Cell(10,5, $totalMins_rdo + (isset($data->req_rdo) ? $data->req_rdo : 0) > 0 ? ($totalMins_rdo + (isset($data->req_rdo) ? $data->req_rdo : 0))/60 : "",1,0,'C', true);



    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job5'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours5'*/'',1,0,'C');
        //Summary
        $pdf->Cell($gap_after_tb_left+$gap_after_tb_center+136,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL SICK TAKEN',1,0,'R');
        $pdf->SetFillColor(255,154,0);

        $totalMins_sick = (isset($arr_jobs_hours['sick']) ? $arr_jobs_hours['sick'] : 0);
        $hours_sick = str_pad(floor($totalMins_sick / 60), 2, "0", STR_PAD_LEFT);
        $minutes_sick = str_pad(($totalMins_sick % 60), 2, "0", STR_PAD_LEFT);

        $pdf->Cell(10,5,$totalMins_sick > 0 ? $totalMins_sick/60 :  "",1,0,'C', true);


    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job6*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5,/* '$data->hours6'*/'',1,0,'C');
    
        //Summary
        $pdf->Cell($gap_after_tb_left,5,'');//Gap

        $special_request_width = 20;
        //Special Request
        $pdf->Cell($special_request_width * 2,5, 'Special Requests',1,0,'C', true);
        
        //Gap after special table
        $pdf->Cell($gap_after_tb_left+$gap_after_tb_center+82,5,'');//Gap
        
        $pdf->Cell($tb_right_width,5,'TOTAL HOLIDAY TAKEN',1,0,'R');
        $pdf->SetFillColor(255,154,0);

        $totalMins_anl = (isset($arr_jobs_hours['anl']) ? $arr_jobs_hours['anl'] : 0) + (isset($data->req_anl) ? $data->req_anl : 0);
        $hours_anl = str_pad(floor($totalMins_anl / 60), 2, "0", STR_PAD_LEFT);
        $minutes_anl = str_pad(($totalMins_anl % 60), 2, "0", STR_PAD_LEFT);


        $pdf->Cell(10,5, $totalMins_anl > 0 ? $totalMins_anl/60 : "",1,0,'C', true);


    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours7'*/'',1,0,'C');
        //Summary
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        
        //Special Request
        $pdf->Cell($special_request_width,5, 'PLD',1,0,'C');
        $pdf->Cell($special_request_width,5, !isset($data->req_pld) || $data->req_pld == "0" ? "" : $data->req_pld/60  ,1,0,'C');
                //Gap after special table
        $pdf->Cell($gap_after_tb_left+$gap_after_tb_center+82,5,'');//Gap

        $pdf->Cell($tb_right_width,5,'TOTAL TRAVEL DAYS',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        
        
        //Check if there is Request RDO and add 1 more day to travel days
        if(isset($data->req_rdo) && $data->req_rdo > 0) {
        
            $pdf->Cell(10,5,$travel_days+1,1,0,'C', true);
        } else {
            $pdf->Cell(10,5,!$getFare ? "" : $travel_days,1,0,'C', true);
        }
        

    $pdf->Ln();

        //Summary
        $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
        $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        $pdf->Cell($special_request_width,5, 'RDO',1,0,'C');
        $pdf->Cell($special_request_width,5, !isset($data->req_rdo) || $data->req_rdo == "0" ? "" : $data->req_rdo/60  ,1,0,'C');
        //Gap after special table
        $pdf->Cell($gap_after_tb_left+$gap_after_tb_center+82,5,'');//Gap
        
        
        $pdf->Cell($tb_right_width,5,'TOTAL SITE ALLOW.',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        

        $totalWeek_for_site_allow = explode(":", $data->totalWeek);

        //$site_allow = ($norm_less_rdo_mins[0]*60 + $norm_less_rdo_mins[1]) - $totalMins_rdo_taken - $totalMins_sick_taken - $totalMins_anl_taken - $totalMins_pld_taken;
        $site_allow = ($totalWeek_for_site_allow[0]*60 + $totalWeek_for_site_allow[1])-$totalMins_rdo_taken - $totalMins_sick_taken - $totalMins_anl_taken - $totalMins_pld_taken - $totalMins_tafe_taken - $totalMins_pub_holiday_taken;
        $totalMins_site = ($site_allow > 0 ? $site_allow : 0);
        $hours_site = str_pad(floor($totalMins_site / 60), 2, "0", STR_PAD_LEFT);
        $minutes_site = str_pad(($totalMins % 60), 2, "0", STR_PAD_LEFT);

        
        $pdf->Cell(10,5, $site_allow > 0 && $getSiteAllow ? $site_allow/60 : "",1,0,'C', true);

    //lines for left table
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours7'*/'',1,0,'C');
    $pdf->Cell($gap_after_tb_left,5,'');//Gap
    $pdf->Cell($special_request_width,5, 'Annual Leave',1,0,'C');
    $pdf->Cell($special_request_width,5, !isset($data->req_anl) || $data->req_anl == "0" ? "" : $data->req_anl/60  ,1,0,'C');
    
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours7'*/'',1,0,'C');
}


$pdf->Output();

?>
