<?php

require_once 'config.php';

$con = $link;

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
$sql = "DELETE FROM FILLABLE WHERE id=" . $id . ";";
mysqli_query($con, $sql);




// Close connection
mysqli_close ($con);


header("location: view.php?type=" . $type);