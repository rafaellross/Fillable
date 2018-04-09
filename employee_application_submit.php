<?php

include 'connection.php';



if (!isset($_GET['type']) || $_GET['type'] != "license") {
    $db = Db::getInstance();
    $req = $db->prepare('INSERT INTO employee_application (id, firstName, lastName, dateBirth, streetAddress, suburb, postCode, state, mobile, phone, email, emergencyName, emergencyPhone, emergencyRelationship, taxFileNumber, dateCommenced, bankAccName, bsb, accountNumber, superannuation, redundancy, longServiceNumber, apprentice, apprenticeYear) 
    VALUES (id, :firstName, :lastName, :dateBirth, :streetAddress, :suburb, :postCode, :state, :mobile, :phone, :email, :emergencyName, :emergencyPhone, :emergencyRelationship, :taxFileNumber, :dateCommenced, :bankAccName, :bsb, :accountNumber, :superannuation, :redundancy, :longServiceNumber, :apprentice, :apprenticeYear)');
    
    $req->bindValue(':firstName', $_POST['firstName'], PDO::PARAM_STR);
    $req->bindValue(':lastName', $_POST['lastName'], PDO::PARAM_STR);
    $req->bindValue(':dateBirth', $_POST['dateBirth'], PDO::PARAM_STR);
    $req->bindValue(':streetAddress', $_POST['streetAddress'], PDO::PARAM_STR);
    $req->bindValue(':suburb', $_POST['suburb'], PDO::PARAM_STR);
    $req->bindValue(':postCode', $_POST['postCode'], PDO::PARAM_STR);
    $req->bindValue(':state', $_POST['state'], PDO::PARAM_STR);
    $req->bindValue(':mobile', $_POST['mobile'], PDO::PARAM_STR);
    $req->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
    $req->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $req->bindValue(':emergencyName', $_POST['emergencyName'], PDO::PARAM_STR);
    $req->bindValue(':emergencyPhone', $_POST['emergencyPhone'], PDO::PARAM_STR);
    $req->bindValue(':emergencyRelationship', $_POST['emergencyRelationship'], PDO::PARAM_STR);
    $req->bindValue(':taxFileNumber', $_POST['taxFileNumber'], PDO::PARAM_STR);
    $req->bindValue(':dateCommenced', $_POST['dateCommenced'], PDO::PARAM_STR);
    $req->bindValue(':bankAccName', $_POST['bankAccName'], PDO::PARAM_STR);
    $req->bindValue(':bsb', $_POST['bsb'], PDO::PARAM_STR);
    $req->bindValue(':accountNumber', $_POST['accountNumber'], PDO::PARAM_STR);
    $req->bindValue(':superannuation', $_POST['superannuation'], PDO::PARAM_STR);
    $req->bindValue(':redundancy', $_POST['redundancy'], PDO::PARAM_STR);
    $req->bindValue(':longServiceNumber', $_POST['longServiceNumber'], PDO::PARAM_STR);
    $req->bindValue(':apprentice', $_POST['apprentice'], PDO::PARAM_STR);
    $req->bindValue(':apprenticeYear', $_POST['apprenticeYear'], PDO::PARAM_STR);
            
    // the query was prepared, now we replace :id with our actual $id value
    $req->execute();
    
    echo json_encode($db->lastInsertId()); 
    
    
} else {
    
    //echo json_encode($_POST);
    foreach ($_POST['license'] as $key => $value) {
        
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO application_lic(application, type, issue_dt, issuer, license_no, image_front, image_back) 
        VALUES (:application, :type, :issue_dt, :issuer, :license_no, :image_front, :image_back)');    
        
        $application    = $_GET['application'];
        $date           = $_POST['license'][$key]['date'];
        $issuer         = $_POST['license'][$key]['issuer'];
        $license_no     = $_POST['license'][$key]['number'];
        $front          = $_POST['license'][$key]['image']['front']['img'];
        $back           = $_POST['license'][$key]['image']['back']['img'];


        /*
        $req->bindValue(':application', $application, PDO::PARAM_STR);
        $req->bindValue(':type', $key, PDO::PARAM_STR);
        $req->bindValue(':issue_dt', $date, PDO::PARAM_STR);
        $req->bindValue(':issuer', $issuer, PDO::PARAM_STR);
        $req->bindValue(':license_no', $license_no, PDO::PARAM_STR);
        $req->bindValue(':image_front', $front, PDO::PARAM_STR);
        $req->bindValue(':image_back ', $back, PDO::PARAM_STR);     
        */
        $req->execute(array(
            'application'   => $application,
            'type'          => $key,
            'issue_dt'      => $date,
            'issuer'        => $issuer,
            'license_no'    => $license_no,
            'image_front'   => $front,
            'image_back'    => $back
        ));

        $db = null;
        echo json_encode("inserted");
    }

}




/*
$licenses = $_FILES['license'];

var_dump($licenses);

$tmp = $licenses['tmp_name'];


//echo json_encode();

$image = $tmp['whiteCard']['image']['front'];
// Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($image));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($image).';base64,'.$imageData;
*/
// Echo out a sample image
//echo '<img src="' . $src . '">';


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