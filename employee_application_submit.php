<?php
error_reporting(E_ALL);
//var_dump($_FILES['license']['tmp_name']);

foreach ($_POST['license'] as $key => $value) {    
    $tmp =  $_FILES['license']['tmp_name'][$key]['image']['front'];    
    if ($tmp !== '') {
        
        $imageData = base64_encode(file_get_contents($tmp));
    
        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data: '.mime_content_type($tmp).';base64,'.$imageData;
        
        // Echo out a sample image
        echo '<img src="' . $src . '"/>';        
        echo '<br>';
    }    

    $tmp_back =  $_FILES['license']['tmp_name'][$key]['image']['back'];    
    if ($tmp_back !== '') {
        
        $imageData = base64_encode(file_get_contents($tmp_back));
    
        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data: '.mime_content_type($tmp_back).';base64,'.$imageData;
        
        // Echo out a sample image
        echo '<img src="' . $src . '"/>';        
        echo '<br>';
    }    
    
}

//var_dump($_POST['license']);

$target_dir = "uploads/";

foreach ($_POST as $license) {
    //var_dump($license);
    /*
    $target_file = $target_dir . basename(md5($license['image']['front']));
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    */
}


// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];        

    // image file directory
    $target = "images/".basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}





/*

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/