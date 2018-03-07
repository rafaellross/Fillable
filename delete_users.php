<?php

require_once 'config.php';

$con = $link;

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "DELETE FROM users WHERE id in (" . $id . ");";
mysqli_query($con, $sql);




// Close connection
mysqli_close ($con);


header("location: users.php");