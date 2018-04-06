<?php
//echo json_encode($_FILES);
//echo json_encode($_POST);

$matches = 1;
$path = explode("[", implode(" ", explode("]", $_POST['name'])));
var_dump($path);
$type = trim($path[1]);
$side = trim($path[3]);




$target_dir = './uploads';
$target_file = $_FILES['license']['name'][$type]['image'][$side];
echo "aqui ". $_FILES['license']['tmp_name'][$type]['image'][$side];
var_dump($_FILES['license']['tmp_name'][$type]);

move_uploaded_file($_FILES['license']['tmp_name'][$type]['image'][$side], "$target_dir/$target_file");
/*


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
}
*/
?>