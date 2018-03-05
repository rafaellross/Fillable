<?php

$con = @mysqli_connect('localhost', 'root', '', 'fillable');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
$username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
$sql = "INSERT INTO fillable (type, content, date_created, username) VALUES ('". $type . "', '". json_encode($_POST) ."', now(), '" . $username . "');";
mysqli_query($con, $sql);



// Close connection
mysqli_close ($con);


header("location: view.php?type=" . $type);


