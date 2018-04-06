<?php 
 header("Access-Control-Allow-Origin: *");
// include configuration
require_once(dirname(__FILE__) . '/config.php');
include 'Employee.php';

$con = $link;

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

if (!is_null($name)) {
    $sql = sprintf("select emp.id, emp.name, emp.phone, (select id from fillable where YEARWEEK(end_week) = YEARWEEK(now()) and employee  = emp.id order by id desc limit 1) as last_ts from employees emp where name like '%%%s%%' order by name",$name);
     
 } else {

         $sql = "select emp.id, emp.name, emp.phone, (select id from fillable where YEARWEEK(end_week) = YEARWEEK(now()) and employee  = emp.id order by id desc limit 1) as last_ts from employees emp order by name";
     
 } 
 

// Some Query

$query 	= mysqli_query($con, $sql);

$resul = array();

while ($row = mysqli_fetch_array($query))
{
    
    $myOjb = new Employee($row['id'], $row['name'], $row['phone'], $row['last_ts']);
    array_push($resul, $myOjb);	    
}

$resultado['employees'] = $resul;
echo json_encode($resultado);


// Close connection
mysqli_close ($con);

