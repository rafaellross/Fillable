<?php



$status = $_POST['status'];
unset($_POST['status']);

include 'config.php';

$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
$username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_SPECIAL_CHARS);

if ($_POST['timeSheetId'] == "") {
    $sql = "INSERT INTO fillable (type, content, date_created, username, ts_status, empSign, employee, end_week) VALUES ('". $type . "', '". json_encode($_POST) ."', now(), '" . $username . "', '" . $status . "', '".$_POST['empSign']."', ".$_POST['empId'].", STR_TO_DATE('".$_POST['weestart']."', '%d/%m/%Y'));";

} else {
    $sql = "UPDATE fillable Set content = '" . json_encode($_POST) . "', ts_status = '".$status."' WHERE id = " . $_POST['timeSheetId'] . ";";
}



mysqli_query($link, $sql);



// Close connection
mysqli_close ($link);



header("location: view.php?type=" . $type);
