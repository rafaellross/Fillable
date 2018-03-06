<?php 
 header("Access-Control-Allow-Origin: *");
// include configuration
require_once(dirname(__FILE__) . '/config.php');
include 'Employee.php';

$con = @mysqli_connect('localhost', 'root', '', 'fillable');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

if (!is_null($name)) {
    $sql = sprintf("select id, name, phone from employees where name like '%%%s%%' order by name",$name);
     
 } else {

         $sql = "select id, name, phone from employees order by name";
     
 } 
 

// Some Query

$query 	= mysqli_query($con, $sql);

$resul = array();

while ($row = mysqli_fetch_array($query))
{
    
    $myOjb = new Employee($row['id'], $row['name'], $row['phone']);
    array_push($resul, $myOjb);	    
}

$resultado['employees'] = $resul;
echo json_encode($resultado);


// Close connection
mysqli_close ($con);

