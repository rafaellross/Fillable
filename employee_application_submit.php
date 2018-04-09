<?php

//ini_set('memory_limit','160M');

$licenses = $_FILES;


echo json_encode($licenses);

//echo json_encode($_FILES['license']);
/*
foreach ($licenses as $key => $value) {
  //  echo "key: " . $key . "<br>";
    //echo "value: " . var_dump($value) . "<br>";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uploaddir = 'upload/';
        //var_dump($value['image']);
        //print($_FILES['license']['name'][$key]['front']);

        $uploadfile = $uploaddir . basename($value['image']['front']);
        list($width, $height, $type, $attr) = getimagesize($value['image']['front']);
        echo $_FILES['license']['tmp_name'][$key]['image']['front'];
        if (move_uploaded_file($_FILES['license']['tmp_name'][$key]['image']['front'], $uploadfile)) {
            echo "File was successfully uploaded.\n";
        }

    }
}
*/