<?php

// include configuration
require_once(dirname(__FILE__) . '/config.php');
include 'Employee.php';

$con = @mysqli_connect('localhost', 'root', '', 'fillable');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}


    $sql = "select id, name, phone from employees order by name";
 

// Some Query

$query 	= mysqli_query($con, $sql);

$resul = array();

while ($row = mysqli_fetch_array($query))
{
  $name = explode(",", $row['name']);
  $name = $name[1]. " " . $name[0];

  echo "UPDATE employees SET name= '" . strtoupper(trim($name)) . "' WHERE id = " . $row['id'] . ";<br>";
    //echo $row['id'] . $row['name'] . $row['phone'] . '<br>';
    
}




// Close connection
mysqli_close ($con);


?>