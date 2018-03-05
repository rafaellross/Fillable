
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Accept a Signature · Signature Pad</title>
  <style>
    body { font: normal 100.01%/1.375 "Helvetica Neue",Helvetica,Arial,sans-serif; }
  </style>
  <link href="js/jquery.signaturepad.css" rel="stylesheet">
  <!--[if lt IE 9]><script src="js/flashcanvas.js"></script><![endif]-->
  <script src="js/jquery.min.js"></script>
  <script>
    $(document).ready(function(){

    });
  </script>
</head>
<body>
<?php

require_once 'signature-to-image.php';
//print_r($_POST);
/*$json = $_POST['output']; // From Signature Pad
$img = sigJsonToImage($json);*/


ob_start(); 
imagejpeg( $img, NULL, 100 ); 
imagedestroy( $img ); 
$i = ob_get_clean(); 






//imagedestroy($img);
?>
  <form method="post" action="" class="sigPad">
    <ul class="sigNav">      
      <li class="drawIt"><a href="#draw-it" class="current">Draw It</a></li>
      <li class="clearButton"><a href="#clear">Clear</a></li>
    </ul>
    <div class="sig sigWrapper drawIt" >
      <div class="typed"></div>
      <canvas class="pad" width="198" height="55"></canvas>      
      
      <input type="hidden" name="output" class="output">
    </div>
  

  <script src="js/jquery.signaturepad.js"></script>
  <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad();
    });
  </script>
  <script src="js/json2.min.js"></script>
</body>