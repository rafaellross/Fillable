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

$travel_days = 0;
$minutes_normal = 0;

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

//Font sizes
$font_large = 12;
$font_regular = 10;
$font_sm = 8;

while($data = mysqli_fetch_array($query)){
    $empSign = $data['empSign'];
    $data = json_decode($data[2]);
    

    $pdf->SetFont('Arial','',$font_large);
    
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
    $pdf->SetFont('Arial','',$font_regular);
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
    
        
        //Create

        $pdf->SetFont('Arial','',5);
        $pdf->Cell($width_first, 5,"JOB/HRS", 'LRB', 0, 'C');
        $pdf->SetFont('Arial','',$font_regular);
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
        $pdf->SetFont('Arial','',$font_regular);
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
        $pdf->SetFont('Arial','',$font_regular);
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
        $pdf->SetFont('Arial','',$font_regular);
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
    $pdf->SetFont('Arial','',$font_regular);
    
    
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
        $job_hourMon1->hour = $data->{'hrsMon1'};
        array_push($jobs_hours, $job_hourMon1);

        

        $job_hourMon2 = new stdClass;
        $job_hourMon2->job = $data->{'jobMon2'};
        $job_hourMon2->hour = $data->{'hrsMon2'};
        array_push($jobs_hours, $job_hourMon2);

       

        $job_hourMon3 = new stdClass;
        $job_hourMon3->job = $data->{'jobMon3'};
        $job_hourMon3->hour = $data->{'hrsMon3'};
        array_push($jobs_hours, $job_hourMon3);
        

        $job_hourMon4 = new stdClass;
        $job_hourMon4->job = $data->{'jobMon4'};
        $job_hourMon4->hour = $data->{'hrsMon4'};
        array_push($jobs_hours, $job_hourMon4);


        //Tuesday
        $job_hourTue1 = new stdClass;
        $job_hourTue1->job = $data->{'jobTue1'};
        $job_hourTue1->hour = $data->{'hrsTue1'};
        array_push($jobs_hours, $job_hourTue1);

        $job_hourTue2 = new stdClass;
        $job_hourTue2->job = $data->{'jobTue2'};
        $job_hourTue2->hour = $data->{'hrsTue2'};
        array_push($jobs_hours, $job_hourTue2);

        $job_hourTue3 = new stdClass;
        $job_hourTue3->job = $data->{'jobTue3'};
        $job_hourTue3->hour = $data->{'hrsTue3'};
        array_push($jobs_hours, $job_hourTue3);

        $job_hourTue4 = new stdClass;
        $job_hourTue4->job = $data->{'jobTue4'};
        $job_hourTue4->hour = $data->{'hrsTue4'};
        array_push($jobs_hours, $job_hourTue4);


        //Wednesday
        $job_hourWed1 = new stdClass;
        $job_hourWed1->job = $data->{'jobWed1'};
        $job_hourWed1->hour = $data->{'hrsWed1'};
        array_push($jobs_hours, $job_hourWed1);

        $job_hourWed2 = new stdClass;
        $job_hourWed2->job = $data->{'jobWed2'};
        $job_hourWed2->hour = $data->{'hrsWed2'};
        array_push($jobs_hours, $job_hourWed2);

        $job_hourWed3 = new stdClass;
        $job_hourWed3->job = $data->{'jobWed3'};
        $job_hourWed3->hour = $data->{'hrsWed3'};
        array_push($jobs_hours, $job_hourWed3);

        $job_hourWed4 = new stdClass;
        $job_hourWed4->job = $data->{'jobWed4'};
        $job_hourWed4->hour = $data->{'hrsWed4'};
        array_push($jobs_hours, $job_hourWed4);

        //Thursday
        $job_hourThu1 = new stdClass;
        $job_hourThu1->job = $data->{'jobThu1'};
        $job_hourThu1->hour = $data->{'hrsThu1'};
        array_push($jobs_hours, $job_hourThu1);

        $job_hourThu2 = new stdClass;
        $job_hourThu2->job = $data->{'jobThu2'};
        $job_hourThu2->hour = $data->{'hrsThu2'};
        array_push($jobs_hours, $job_hourThu2);

        $job_hourThu3 = new stdClass;
        $job_hourThu3->job = $data->{'jobThu3'};
        $job_hourThu3->hour = $data->{'hrsThu3'};
        array_push($jobs_hours, $job_hourThu3);

        $job_hourThu4 = new stdClass;
        $job_hourThu4->job = $data->{'jobThu4'};
        $job_hourThu4->hour = $data->{'hrsThu4'};
        array_push($jobs_hours, $job_hourThu4);

        //Friday
        $job_hourFri1 = new stdClass;
        $job_hourFri1->job = $data->{'jobFri1'};
        $job_hourFri1->hour = $data->{'hrsFri1'};
        array_push($jobs_hours, $job_hourFri1);

        $job_hourFri2 = new stdClass;
        $job_hourFri2->job = $data->{'jobFri2'};
        $job_hourFri2->hour = $data->{'hrsFri2'};
        array_push($jobs_hours, $job_hourFri2);

        $job_hourFri3 = new stdClass;
        $job_hourFri3->job = $data->{'jobFri3'};
        $job_hourFri3->hour = $data->{'hrsFri3'};
        array_push($jobs_hours, $job_hourFri3);

        $job_hourFri4 = new stdClass;
        $job_hourFri4->job = $data->{'jobFri4'};
        $job_hourFri4->hour = $data->{'hrsFri4'};
        array_push($jobs_hours, $job_hourFri4);

        //Saturday
        $job_hourSat1 = new stdClass;
        $job_hourSat1->job = $data->{'jobSat1'};
        $job_hourSat1->hour = $data->{'hrsSat1'};
        array_push($jobs_hours, $job_hourSat1);

        $job_hourSat2 = new stdClass;
        $job_hourSat2->job = $data->{'jobSat2'};
        $job_hourSat2->hour = $data->{'hrsSat2'};
        array_push($jobs_hours, $job_hourSat2);

        $job_hourSat3 = new stdClass;
        $job_hourSat3->job = $data->{'jobSat3'};
        $job_hourSat3->hour = $data->{'hrsSat3'};
        array_push($jobs_hours, $job_hourSat3);

        $job_hourSat4 = new stdClass;
        $job_hourSat4->job = $data->{'jobSat4'};
        $job_hourSat4->hour = $data->{'hrsSat4'};
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
                        if (in_array($curr, ["rdo", "sick", "anl", "pld"])) {                            
                            if(isset($arr_jobs_hours['001'])){
                                $arr_jobs_hours['001'] += $totalMins;
                            } else {
                                $arr_jobs_hours['001'] = $totalMins;
                            }                            
                        }
                        
                        $arr_jobs_hours[$curr] += $totalMins;
                    } else {
                        if (in_array($curr, ["rdo", "sick", "anl", "pld"])) {
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
        if (!in_array($job_hourMon1->job, ["sick", "anl", "pld", ""])) {                        
            $travel_Mon = true;            
        }

        //Check travel day Tue
        $travel_Tue = false;
        if (!in_array($job_hourTue1->job, ["sick", "anl", "pld", ""])) {
            $travel_Tue = true;
        }

        //Check travel day Wed
        $travel_Wed = false;
        if (!in_array($job_hourWed1->job, ["sick", "anl", "pld", ""])) {
            $travel_Wed = true;
        }
        
        
        //Check travel day Thu
        $travel_Thu = false;
        if (!in_array($job_hourThu1->job, ["sick", "anl", "pld", ""])) {
            $travel_Thu = true;
        }

        //Check travel day Fri
        $travel_Fri = false;
        if (!in_array($job_hourFri1->job, ["sick", "anl", "pld", ""])) {
            $travel_Fri = true;
        }
		        
        //Check travel day Sat
        $travel_Sat = false;
        if (!in_array($job_hourSat1->job, ["sick", "anl", "pld", ""])) {
            $travel_Sat = true;
        }

        //Check travel day Mon
        
        if (!in_array($job_hourMon2->job, ["sick", "anl", "pld", ""])) {
            $travel_Mon = true;
        }

        //Check travel day Tue
        
        if (!in_array($job_hourTue2->job, ["sick", "anl", "pld", ""])) {
            $travel_Tue = true;
        }

        //Check travel day Wed
        
        if (!in_array($job_hourWed2->job, ["sick", "anl", "pld", ""])) {
            $travel_Wed = true;
        }
        
        
        //Check travel day Thu
        
        if (!in_array($job_hourThu2->job, ["sick", "anl", "pld", ""])) {
            $travel_Thu = true;
        }

        //Check travel day Fri
        
        if (!in_array($job_hourFri2->job, ["sick", "anl", "pld", ""])) {
            $travel_Fri = true;
        }
		        
        //Check travel day Sat
        
        if (!in_array($job_hourSat2->job, ["sick", "anl", "pld", ""])) {
            $travel_Sat = true;
        }

        //Check travel day Mon
        
        if (!in_array($job_hourMon3->job, ["sick", "anl", "pld", ""])) {
            $travel_Mon = true;
        }

        //Check travel day Tue
        
        if (!in_array($job_hourTue3->job, ["sick", "anl", "pld", ""])) {
            $travel_Tue = true;
        }

        //Check travel day Wed
        
        if (!in_array($job_hourWed3->job, ["sick", "anl", "pld", ""])) {
            $travel_Wed = true;
        }
        
        
        //Check travel day Thu
        
        if (!in_array($job_hourThu3->job, ["sick", "anl", "pld", ""])) {
            $travel_Thu = true;
        }

        //Check travel day Fri
        
        if (!in_array($job_hourFri3->job, ["sick", "anl", "pld", ""])) {
            $travel_Fri = true;
        }
		        
        //Check travel day Sat
        
        if (!in_array($job_hourSat3->job, ["sick", "anl", "pld", ""])) {
            $travel_Sat = true;
        }        

        //Check travel day Mon
        
        if (!in_array($job_hourMon4->job, ["sick", "anl", "pld", ""])) {
            $travel_Mon = true;
        }

        //Check travel day Tue
        
        if (!in_array($job_hourTue4->job, ["sick", "anl", "pld", ""])) {
            $travel_Tue = true;
        }

        //Check travel day Wed
        
        if (!in_array($job_hourWed4->job, ["sick", "anl", "pld", ""])) {
            $travel_Wed = true;
        }
        
        
        //Check travel day Thu
        
        if (!in_array($job_hourThu4->job, ["sick", "anl", "pld", ""])) {
            $travel_Thu = true;
        }

        //Check travel day Fri
        
        if (!in_array($job_hourFri4->job, ["sick", "anl", "pld", ""])) {
            $travel_Fri = true;
        }
		        
        //Check travel day Sat
        

        if (!in_array($job_hourSat4->job, ["sick", "anl", "pld", ""])) {
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
                
        
        //Fill left table
        $startY_job = 128;
        //print_r($arr_jobs_hours);

        foreach($arr_jobs_hours as $job => $hour) {
            if(!in_array($job, ["rdo", "sick", "anl", "pld"])){
                $totalMins = $hour;
                $hours = str_pad(floor($totalMins / 60), 2, "0", STR_PAD_LEFT);
                $minutes = str_pad(($totalMins % 60), 2, "0", STR_PAD_LEFT);
                $pdf->Text(15, $startY_job, $job);
                $pdf->Text(28, $startY_job, $hours . ":" . $minutes);
                //echo $job . " - " .$hours . ":" . $minutes . "<br>";
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

        $norm_less_rdo_mins = explode(":", $data->totalNormal);
        $totalMins = ($norm_less_rdo_mins[0]*60 + $norm_less_rdo_mins[1]) - (4*60) - $totalMins_rdo_taken - $totalMins_sick_taken - $totalMins_pld_taken - $totalMins_anl_taken;
        $totalMins = ($totalMins > 0 ? $totalMins : 0);
        $hours_normal = str_pad(floor($totalMins / 60), 2, "0", STR_PAD_LEFT);
        $minutes_normal = str_pad(($totalMins % 60), 2, "0", STR_PAD_LEFT);

        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, $hours_normal . ':' . $minutes_normal,1,0,'C', true);
    
    
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job1*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours1'*/'',1,0,'C');
        //Center Table
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        $pdf->Cell($tb_center_width,5,'TOTAL HRS',1,0,'C');
        
        //Total
        $pdf->Cell($tb_center_width,5, $data->hrsMon,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->hrsTue,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->hrsWed,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->hrsThu,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->hrsFri,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->hrsSat,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->totalWeek,1,0,'C');
    
        //Summary
        $pdf->Cell($gap_after_tb_center,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL TIME AND HALF (1.5)',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell($tb_right_width_col2,5, $data->total15,1,0,'C', true);
        
    
        
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job2'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours2'*/'',1,0,'C');
        //Center Table
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        $pdf->Cell($tb_center_width,5,'NOR',1,0,'C');
        //Total
        $pdf->Cell($tb_center_width,5, $data->MonNorm,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->TueNorm,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->WedNorm,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->ThuNorm,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->FriNorm,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->SatNorm,1,0,'C');
        $pdf->Cell($tb_center_width,5, $data->totalNormal,1,0,'C');
        
        //Summary
        $pdf->Cell($gap_after_tb_center,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL DOUBLE TIME (2T)',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, $data->total20,1,0,'C', true);
        
    
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job3,1'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours3'*/'',1,0,'C');
    
        //Center Table
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        $pdf->Cell($tb_center_width,5,'1.5',1,0,'C');
        //Total
        $pdf->Cell($tb_center_width,5, ($data->Mon15 !== "00:00" ? $data->Mon15 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Tue15 !== "00:00" ? $data->Tue15 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Wed15 !== "00:00" ? $data->Wed15 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Thu15 !== "00:00" ? $data->Thu15 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Fri15 !== "00:00" ? $data->Fri15 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Sat15 !== "00:00" ? $data->Sat15 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->total15 !== "00:00" ? $data->total15 : ""),1,0,'C');
    
            //Summary
        $pdf->Cell($gap_after_tb_center,5,'');//Gap

        $totalMins_pld = (isset($arr_jobs_hours['pld']) ? $arr_jobs_hours['pld'] : 0);
        $hours_pld = str_pad(floor($totalMins_pld / 60), 2, "0", STR_PAD_LEFT);
        $minutes_pld = str_pad(($totalMins_pld % 60), 2, "0", STR_PAD_LEFT);
        
        $pdf->Cell($tb_right_width,5,'TOTAL PLD',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5, $hours_pld . ":" . $minutes_pld ,1,0,'C', true);
    
    
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job4'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours4'*/'',1,0,'C');
    
        //Center Table
        $pdf->Cell($gap_after_tb_left,5,'');//Gap
        $pdf->Cell($tb_center_width,5,'2',1,0,'C');
        //Total
        $pdf->Cell($tb_center_width,5, ($data->Mon20 !== "00:00" ? $data->Mon20 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Tue20 !== "00:00" ? $data->Tue20 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Wed20 !== "00:00" ? $data->Wed20 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Thu20 !== "00:00" ? $data->Thu20 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Fri20 !== "00:00" ? $data->Fri20 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->Sat20 !== "00:00" ? $data->Sat20 : ""),1,0,'C');
        $pdf->Cell($tb_center_width,5, ($data->total20 !== "00:00" ? $data->total20 : ""),1,0,'C');        
    
        //Summary
        $pdf->Cell($gap_after_tb_center,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL RDO HRS TAKEN	',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        
        $totalMins_rdo = (isset($arr_jobs_hours['rdo']) ? $arr_jobs_hours['rdo'] : 0);
        $hours_rdo = str_pad(floor($totalMins_rdo / 60), 2, "0", STR_PAD_LEFT);
        $minutes_rdo = str_pad(($totalMins_rdo % 60), 2, "0", STR_PAD_LEFT);


        $pdf->Cell(10,5, $hours_rdo . ":" . $minutes_rdo,1,0,'C', true);
        
    
        
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
        
        $pdf->Cell(10,5, $hours_sick . ":" . $minutes_sick ,1,0,'C', true);
        
    
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job6*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5,/* '$data->hours6'*/'',1,0,'C');
        //Summary
        $pdf->Cell($gap_after_tb_left+$gap_after_tb_center+136,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL HOLIDAY TAKEN',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        
        $totalMins_anl = (isset($arr_jobs_hours['anl']) ? $arr_jobs_hours['anl'] : 0);
        $hours_anl = str_pad(floor($totalMins_anl / 60), 2, "0", STR_PAD_LEFT);
        $minutes_anl = str_pad(($totalMins_anl % 60), 2, "0", STR_PAD_LEFT);
        
        
        $pdf->Cell(10,5, $hours_anl . ":" . $minutes_anl,1,0,'C', true);
        
    
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours7'*/'',1,0,'C');
        //Summary
        $pdf->Cell($gap_after_tb_left+$gap_after_tb_center+136,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL TRAVEL DAYS',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $pdf->Cell(10,5,$travel_days,1,0,'C', true);
    
    $pdf->Ln();
    
        //Summary
        $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
        $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
        $pdf->Cell($gap_after_tb_left+$gap_after_tb_center+136,5,'');//Gap
        $pdf->Cell($tb_right_width,5,'TOTAL SITE ALLOW.',1,0,'R');
        $pdf->SetFillColor(255,154,0);
        $site_allow = ($norm_less_rdo_mins[0]*60 + $norm_less_rdo_mins[1]) - $totalMins_rdo_taken - $totalMins_sick_taken - $totalMins_anl_taken - $totalMins_pld_taken;
        $totalMins_site = ($site_allow > 0 ? $site_allow : 0);
        $hours_site = str_pad(floor($totalMins_site / 60), 2, "0", STR_PAD_LEFT);
        $minutes_site = str_pad(($totalMins % 60), 2, "0", STR_PAD_LEFT);
        
        $pdf->Cell(10,5, $hours_site . ':' . $minutes_site,1,0,'C', true);
    
    //lines for left table
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours7'*/'',1,0,'C');    
    $pdf->Ln();
    $pdf->Cell($tb_left_width,5, /*'$data->job7'*/'',1,0,'C');
    $pdf->Cell($tb_left_width,5, /*'$data->hours7'*/'',1,0,'C');        
}




//var_dump($data);
$pdf->Output();
//echo '<img src="' . $_POST['empSign'] . '"/>';
//print_r($_POST);
?>