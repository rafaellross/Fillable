<?php

$status = $_POST['status'];
unset($_POST['status']);



$con = @mysqli_connect('localhost', 'root', '', 'fillable');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
$username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_SPECIAL_CHARS);

if ($_POST['timeSheetId'] == "") {
    $sql = "INSERT INTO fillable (type, content, date_created, username, ts_status, empSign) VALUES ('". $type . "', '". json_encode($_POST) ."', now(), '" . $username . "', '" . $status . "', '".$_POST['empSign']."');";
} else {
    $sql = "UPDATE fillable Set content = '" . json_encode($_POST) . "' WHERE id = " . $_POST['timeSheetId'];
}

    

mysqli_query($con, $sql);



// Close connection
mysqli_close ($con);



header("location: view.php?type=" . $type);


