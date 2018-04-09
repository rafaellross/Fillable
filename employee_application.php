<?php
require_once 'config.php';
//ini_set('memory_limit','160M');
error_reporting(E_ALL);
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" type="image/x-icon" href="brand.ico" />
        <link rel="apple-touch-icon" href="brand.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="js/jquery.mask.js"></script>
        <script src="js/simpleUpload.min.js"></script>                
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
        <title>Employee Application Form</title>
        <script type="text/javascript">
            $(document).ready(function(){
                var date = new Date();
                var session = date.getYear().toString()
                        .concat(date.getMonth(),
                                date.getDate(),
                                date.getHours(),
                                date.getMinutes(),
                                date.getSeconds(),
                                date.getMilliseconds());

                var application_id;
                $("input[type=submit]").click(function(){
                    //e.preventDefault();
                    $.post( 'employee_application_submit.php', $('form#details').serialize(), function(data) {
                        application_id = data;                        
                    },
                        'json' // I expect a JSON response
                    ) .done(function() {
                        $( ".licenses" ).each(function() {
                            $.post( 'employee_application_submit.php?type=license&&application=' + application_id, $(this).serialize(), function(data) {
                                console.log(data);                        
                            },
                            'json' // I expect a JSON response
                            );
                        });                                                    
                        });                            
                    });                        
                

                

                //Initiate date-picker
                $('.date-picker').datepicker({
                    format: 'dd/mm/yyyy'
                });
                
                //If employee is apprentice, then show selection of year
                $('select[name=apprentice]').change(function(){
                    if ($(this).val() === "yes") {
                        $('#apprentice-year').show();
                    } else {
                        $('#apprentice-year').hide();
                    }
                });
                
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            
                            var destination = $(input).prop('name');
                            var preview = $("[id*='"+ destination +"']");
                            
                            preview.attr('src', e.target.result).show();
                            
                            var hidden = $("input[name*='" + destination + "'][type=hidden]");
                            hidden.val(e.target.result);
                            
                            //console.log(hidden);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                    
                }

                $(document).on("change", "input[type=file]", function(){
                    readURL(this);
                });
                
                $(document).on("click", ".btn-remove", function(){
                    if (confirm("Are you sure you want to remove this license?")) {
                        $(this).parent().fadeOut("slow");
                    }
                });
                
            var newLicense = function(description, code){
            return `
                  <div class="card-body">
              
                  <!-- Start Card -->
                  <h5 class="card-title">` + description + ` :</h5>
                  <form action="" class="licenses" method="post" enctype="multipart/form-data">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-row">
                        <div class="col-md-2 col-12 mb-3">
                          <label>
                        <strong>Issue Date:</strong>
                        </label>
                        <input type="text" class="form-control form-control-lg date-picker" name=license[` + code + `][date]" placeholder="dd/mm/yyyy" value=""  maxlength="10">
                      </div>
                        <div class="col-md-4 col-12 mb-3 ml-auto">
                          <label>
                        <strong>State / Issuer *:</strong>
                        </label>
                        <input type="text" class="form-control form-control-lg" name=license[` + code + `][issuer]" placeholder="Issued by" value="" >
                      </div>
                        <div class="col-md-4 col-12 ml-auto">
                          <label>
                        <strong>Card / Licence No *:</strong>
                        </label>
                        <input type="text" class="form-control form-control-lg" name=license[` + code + `][number]" placeholder="Issued by" value="" >
                    </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 col-12 mb-3">
                          <label>
                        <strong>Photo - Front *:</strong>
                        </label>
                          <div class="input-group mb-3">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" name="license[` + code + `][image][front]" accept="image/*" >
                            <label class="custom-file-label">Choose file</label>
                            <input type="hidden" name="license[` + code + `][image][front][img]"/>
                        </div>
                      </div>
                      </div>
                      <div class="col-md-2 col-12 mb-3">
                            <img id="license[` + code + `][image][front]" class="img-thumbnail" style="max-width: 35%;display: none;">
                      </div>
                      <div class="col-md-4 col-12 mb-3">
                        <label>
                          <strong>Photo - Back:</strong>
                        </label>
                        <div class="input-group mb-3">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="license[` + code + `][image][back]" accept="image/*" >
                            <label class="custom-file-label">Choose file</label>
                            <input type="hidden" name="license[` + code + `][image][back][img]"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-12 mb-3">
                        <img id="license[` + code + `][image][back]" class="img-thumbnail" style="max-width: 35%;display: none;">
                      </div>
                      </div>
                      </div>
                      <button type="button" class="btn btn-danger btn-remove">Remove</button>
                      <hr>
                      </form>
                    </div>

                    <!-- End Card -->

                `
            } ;
            //Add new license
            $('#addLicense').click(function(){
              var select = $('select[name=licenseId] :selected');
              $('#licenses-list').append(newLicense(select.text(), select.val()));
            });

               

          });
        </script>
        <style media="screen">
            .card-body {
                background-color: #e8e8e8;
            }

            @media only screen and (min-width: 569px){
                #content {
                    margin-left: 10%;
                }
            }

        </style>
    </head>
    <body>
        <?php
        include 'navbar.php';
        ?>
        <div class="container-fluid">
            <!-- Logo -->
            <div class="row" id="logo">
                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center">
                    <img src="images/logo.jpg" alt="Smart Plumbing Solutions" class="img-fluid" style="padding: 1em;">
                </div>
            </div>
            <br>
            <!-- Title -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center">
                    <h2>Employee Application Form</h2>
                </div>
            </div>
            <br>
            
                <div class="row "  style="padding: 0;">

                <div id="content" class="col-xs-12 col-sm-12 col-md-10 col-12" style="padding: 0;">
                <form action="" method="post" id="details">
                        <!-- Personal Details -->
                        <div class="card" style="padding: 0;"  id="personalDetails">
                            <h5 class="card-header">Personal Details</h5>
                            <div class="card-body">
                                <!-- Start Card -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>First Name:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="firstName" placeholder="Type your first name" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Last Name:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="lastName" placeholder="Type your last name" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 col-12 mb-3">
                                            <label>
                                                <strong>Date of Birth:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg date-picker" name="dateBirth" value="">
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Personal Details -->
                        <br>
                        <!-- Address Details -->
                        <div class="card" id="addressDetails">
                            <h5 class="card-header">Address Details</h5>
                            <div class="card-body">
                                <!-- Start Card -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Street Address:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="streetAddress" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-10 col-12 mb-3">
                                            <label>
                                                <strong>Suburb:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="suburb" value="" >
                                        </div>
                                        <div class="col-md-2 col-12 mb-3">
                                            <label>
                                                <strong>Post Code:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="postCode"  value="" maxlength="4">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>State:</strong>
                                            </label>
                                            <select class="form-control form-control-lg custom-select" name="state">
                                                <option value="Australia Capital Territory">Australia Capital Territory</option>
                                                <option value="New South Wales" selected>New South Wales</option>
                                                <option value="Northern Territory">Northern Territory</option>
                                                <option value="Queensland">Queensland</option>
                                                <option value="South Australia">South Australia</option>
                                                <option value="Tasmania">Tasmania</option>
                                                <option value="Western Australia">Western Australia</option>
                                                <option value="Victoria">Victoria</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Address Details -->
                        <br>
                        <!-- Contact Details -->
                        <div class="card" id="contactDetails">
                            <h5 class="card-header">Contact Details</h5>
                            <div class="card-body">
                                <!-- Start Card -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Mobile:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="mobile" value=""  maxlength="10">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Phone:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="phone" value=""  maxlength="20">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>E-mail:</strong>
                                            </label>
                                            <input type="email" class="form-control form-control-lg" name="email" value="" >
                                        </div>

                                    </div>


                                    <!-- End Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Contact Details -->
                        <br>
                        <!-- Emergency Contact -->
                        <div class="card" id="emergencyDetails">
                            <h5 class="card-header">Emergency Details</h5>
                            <div class="card-body">
                                <!-- Start Card -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Name:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="emergencyName" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Phone:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="emergencyPhone" value=""  maxlength="20">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Relationship:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="emergencyRelationship" value="" >
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Emergency Details -->


                        <br>
                        <div class="card" id="employmentDetails">
                            <h5 class="card-header">Employment Details</h5>
                            <div class="card-body">
                                <!-- Start Card -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Tax File Number:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="taxFileNumber" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Date Employment Commenced:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg date-picker" name="dateCommenced" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-12 mb-3">
                                            <label>
                                                <strong>Bank A/C Name:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="bankAccName" value="" >
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label>
                                                <strong>BSB Nº:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="bsb" value="">
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label>
                                                <strong>A/C Nº:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="accountNumber" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Superannuation Details:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="superannuation" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Redundancy Details:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="redundancy" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 col-12 mb-3">
                                            <label>
                                                <strong>Long Service Nº:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="longServiceNumber" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 col-12 mb-3">
                                            <label>
                                                <strong>Are you an apprentice?</strong>
                                            </label>
                                            <select class="form-control form-control-lg custom-select" name="apprentice">
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-3" id="apprentice-year" style="display:none;">
                                            <label>
                                                <strong>Which year?</strong>
                                            </label>
                                            <select class="form-control form-control-lg custom-select" name="apprenticeYear">
                                                <option value="1">1 st</option>
                                                <option value="2">2 nd</option>
                                                <option value="3">3 rd</option>
                                                <option value="4">4 th</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <br>
                        
                        <div class="card" style="padding: 0;" id="licenses-list">
                            <h5 class="card-header">Current Licenses</h5>
                            <div class="card-body">
                                <!-- Start Card -->
                                <h5 class="card-title">CIC Construction Induction Card () :</h5>
                                <form action="" class="licenses" method="post" enctype="multipart/form-data">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-2 col-12 mb-3">
                                            <label>
                                                <strong>Issue Date:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg date-picker" name="license[whiteCard][date]" placeholder="dd/mm/yyyy" value=""  maxlength="10">
                                        </div>
                                        <div class="col-md-4 col-12 mb-3 ml-auto">
                                            <label>
                                                <strong>State / Issuer *:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="license[whiteCard][issuer]" placeholder="Issued by" value="" >
                                        </div>
                                        <div class="col-md-4 col-12 ml-auto">
                                            <label>
                                                <strong>Card / Licence No *:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="license[whiteCard][number]" placeholder="License Number" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-12 mb-3">
                                            <label>
                                                <strong>Photo - Front *:</strong>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="license[whiteCard][image][front]" accept="image/*">                                                    
                                                    <label class="custom-file-label">Choose file</label>
                                                    <input type="hidden" name="license[whiteCard][image][front][img]"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-3">
                                            <img id="license[whiteCard][image][front][preview]" class="img-thumbnail" style="max-width: 35%;display: none;"/>
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label>
                                                <strong>Photo - Back:</strong>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="license[whiteCard][image][back]" accept="image/*">
                                                    <label class="custom-file-label">Choose file</label>
                                                    <input type="hidden" name="license[whiteCard][image][back][img]"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-3">
                                            <img class="img-thumbnail" id="license[whiteCard][image][back][preview]" style="max-width: 35%;display: none;"/>
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                                </form>
                                <hr>
                            </div>

                            <div class="card-body">

                                <!-- Start Card -->
                                <h5 class="card-title">DLPI Driver's Licence/Photo I.D () :</h5>
                                <form action="" class="licenses" method="post" enctype="multipart/form-data">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-2 col-12 mb-3">
                                            <label>
                                                <strong>Issue Date:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg date-picker" name="license[id][date]" placeholder="dd/mm/yyyy" value=""  maxlength="10">
                                        </div>
                                        <div class="col-md-4 col-12 mb-3 ml-auto">
                                            <label>
                                                <strong>State / Issuer *:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="license[id][issuer]" placeholder="Issued by" value="" >
                                        </div>
                                        <div class="col-md-4 col-12 ml-auto">
                                            <label>
                                                <strong>Card / Licence No *:</strong>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" name="license[id][number]" placeholder="License Number" value="" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-12 mb-3">
                                            <label>
                                                <strong>Photo - Front *:</strong>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="license[id][image][front]" accept="image/*" >
                                                    <label class="custom-file-label">Choose file</label>
                                                    <input type="hidden" name="license[id][image][front][img]"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-3">
                                            <img id="license[id][image][front][img]" class="img-thumbnail" style="max-width: 35%;display: none;">
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label>
                                                <strong>Photo - Back:</strong>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="license[id][image][back]" accept="image/*">
                                                    <label class="custom-file-label">Choose file</label>
                                                    <input type="hidden" name="license[id][image][back][img]"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-3">
                                            <img class="img-thumbnail" id="license[id][image][back][img]" style="max-width: 35%;display: none;">
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                    <hr>
                                </div>
                                </form>
                            </div>
                        </div>     
                        <br>                        
                        <!-- Additional Licenses Card-->
                        <div class="card" id="additionalLicenses">
                            <h5 class="card-header">Additional Licenses</h5>
                            <div class="card-body">
                                <!-- Start Card -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-5 col-12 mb-3">
                                            <select class="form-control" id="licenseId" name="licenseId"><option value="">Select License</option>
                                                <optgroup label="Licenses" value="0">
                                                    <option value="96d3d972-8d6d-e611-80d9-00155d7a4406">CIC Construction Induction Card</option>
                                                    <option value="583af4ac-6fc1-e411-9e0a-00155d7a4404">PB Concrete Placing Boom</option>
                                                    <option value="d83be738-c296-e711-8420-141877611993">A Class Electrician</option>
                                                    <option value="9910db38-3cde-e711-8422-141877611993">Construction Wiring</option>
                                                    <option value="a8c1cfb1-d914-e711-8417-141877611993">AGE A-Grade Electrical Licence</option>
                                                    <option value="e523ffa3-70c1-e411-9e0a-00155d7a4404">C1 Mobile Crane, Slewing to 100 tonne</option>
                                                    <option value="aaf9e38c-70c1-e411-9e0a-00155d7a4404">C2 Mobile Crane, Slewing to 20 tonne</option>
                                                    <option value="4e9be194-70c1-e411-9e0a-00155d7a4404">C6 Mobile Crane, Slewing to 60 tonne</option>
                                                    <option value="b0963d5e-70c1-e411-9e0a-00155d7a4404">CN Non-Slewing Mobile Crane (Over 3 Tonne)</option>
                                                    <option value="704d28b6-70c1-e411-9e0a-00155d7a4404">CO Mobile Crane, Open</option>
                                                    <option value="380b0117-c47b-e711-841f-141877611993">CPCCDE3014A Remove Non-Friable Asbestos</option>
                                                    <option value="de07998d-939d-e711-8420-141877611993">CS Self-Erecting Tower Crane</option>
                                                    <option value="201c0abc-6ec1-e411-9e0a-00155d7a4404">CT Tower Crane</option>
                                                    <option value="c664c52e-70c1-e411-9e0a-00155d7a4404">CV Vehicle Loading Crane</option>
                                                    <option value="76f3b54a-70c1-e411-9e0a-00155d7a4404">DG Dogging</option>
                                                    <option value="f455c58d-339f-e711-8420-141877611993">DLPI Driver's Licence/Photo I.D</option>
                                                    <option value="80532fdb-6fc1-e411-9e0a-00155d7a4404">HM Hoist, Materials</option>
                                                    <option value="b4ece0cf-6fc1-e411-9e0a-00155d7a4404">HP Hoist, Personnel and Materials</option>
                                                    <option value="e4ecd742-22c2-e411-9e0a-00155d7a4404">LE Excavator</option>
                                                    <option value="b66613d7-6ec1-e411-9e0a-00155d7a4404">LF Forklift Truck</option>
                                                    <option value="caf27370-15c2-e411-9e0a-00155d7a4404">LG Grader</option>
                                                    <option value="f0230c03-71c1-e411-9e0a-00155d7a4404">RA Advanced Rigging</option>
                                                    <option value="c68481ed-70c1-e411-9e0a-00155d7a4404">RB Basic Rigging</option>
                                                    <option value="be3ddbf6-70c1-e411-9e0a-00155d7a4404">RI Intermediate Rigging</option>
                                                    <option value="0cff25de-70c1-e411-9e0a-00155d7a4404">SA Advanced Scaffolding</option>
                                                    <option value="3854edc7-70c1-e411-9e0a-00155d7a4404">SB Basic Scaffolding</option>
                                                    <option value="d4fa7fd4-70c1-e411-9e0a-00155d7a4404">SI Intermediate Scaffolding</option>
                                                    <option value="ecd5bd5e-6fc1-e411-9e0a-00155d7a4404">WP Boom-type Elevating Work Platform</option>
                                                    <option value="f7ea7750-d914-e711-8417-141877611993">WP Elevating Work Platform (Over 11m)</option>
                                                </optgroup>
                                                <optgroup label="Certifications" value="2">
                                                    <option value="9e4c5296-b128-e811-8429-14187761617d">Bullying and Harassment Officer</option>
                                                    <option value="e4dfec3c-b228-e811-8429-14187761617d">Cert IV WHS</option>
                                                    <option value="e7d14a4a-b228-e811-8429-14187761617d">Dip WHS</option>
                                                    <option value="b8d33e2d-b228-e811-8429-14187761617d">Environmental Awareness &amp; Spill Kit Training</option>
                                                    <option value="47f65805-b228-e811-8429-14187761617d">Fire Attach Fire Fighting Training</option>
                                                    <option value="c95e7b16-b228-e811-8429-14187761617d">Fire Warden Training</option>
                                                    <option value="4b8d9553-b128-e811-8429-14187761617d">Health and Safety Committee Training</option>
                                                    <option value="8c8af73e-b128-e811-8429-14187761617d">HSR Training</option>
                                                    <option value="7aaa3b10-b128-e811-8429-14187761617d">Manual Handling Training</option>
                                                    <option value="4e7cef32-5794-e711-8420-141877611993">Plumbing Registration</option>
                                                    <option value="cae6b8cd-b128-e811-8429-14187761617d">Rescue Training - Crane Rescue</option>
                                                    <option value="7bc12ce9-b128-e811-8429-14187761617d">Rescue Training - Jumpform Rescue</option>
                                                    <option value="0ce78f82-b128-e811-8429-14187761617d">Return to Work Co-ordinator Training</option>
                                                    <option value="d5bd3b23-b128-e811-8429-14187761617d">Risk Management Supervisor Training</option>
                                                </optgroup>
                                                <optgroup label="Tickets" value="1">
                                                    <option value="73c1c7ba-d914-e711-8417-141877611993">Confined Spaces</option>
                                                    <option value="629925ab-a45b-e711-841d-141877611993">Delegate Training</option>
                                                    <option value="19b797a9-5f93-e711-8420-141877611993">Electrical Spotter</option>
                                                    <option value="efddad60-d914-e711-8417-141877611993">EWP Boom Lift (Under 11mtrs)</option>
                                                    <option value="b8bec868-d914-e711-8417-141877611993">EWP Scissor Lift</option>
                                                    <option value="14a4b370-d914-e711-8417-141877611993">EWP Vertical Lift</option>
                                                    <option value="34347a31-d914-e711-8417-141877611993">First Aid Advanced (Level 3)</option>
                                                    <option value="77a99a25-d914-e711-8417-141877611993">First Aid Intermediate (Level 2)</option>
                                                    <option value="0fb61383-b228-e811-8429-14187761617d">General VOC</option>
                                                    <option value="552874f5-c37b-e711-841f-141877611993">GOTCHA Rescue</option>
                                                    <option value="4f227d5d-b228-e811-8429-14187761617d">Impairment Assessor Training</option>
                                                    <option value="68af8574-b228-e811-8429-14187761617d">Impairment Training</option>
                                                    <option value="89eef095-b228-e811-8429-14187761617d">LV1 ASP Authorisation Card (Ausgrid work)</option>
                                                    <option value="d71486aa-b228-e811-8429-14187761617d">Prepare Workzone Traffic Management Plan</option>
                                                    <option value="20cf72e6-d914-e711-8417-141877611993">Traffic Implement</option>
                                                    <option value="8e31bddd-d914-e711-8417-141877611993">Traffic Stop Go</option>
                                                    <option value="79e767c8-d914-e711-8417-141877611993">Working at Heights (Harness)</option>
                                                    <option value="a922c75f-c57b-e711-841f-141877611993">HLTAID001 First Aid CPR </option>
                                                    <option value="5cbeaad0-4ccb-e711-8421-141877611993">LP Line Pump</option>
                                                    <option value="6f8e565e-3811-e711-8417-141877611993">LS Skid Steer Loader</option>
                                                    <option value="3994c598-3f94-e711-8420-141877611993">TMH Telescopic Materials Handler</option>
                                                </optgroup>
                                                <optgroup label="Assessments" value="3">
                                                    <option value="dee9a78b-a35b-e711-841d-141877611993">Delegates Training </option>
                                                </optgroup>
                                            </select>
                                            <groupedselectlistitem>
                                            </groupedselectlistitem>
                                        </div>
                                        <div class="col-md-5 col-12 mb-3">
                                            <button type="button" class="btn btn-success" id="addLicense">Add License</button>
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Additional Licenses Card-->   
                        <br>
                        <!-- Actions Card-->
                        <div class="card" id="actions">
                            <h5 class="card-header">Actions</h5>
                            <div class="card-body">
                                <!-- Start Card -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-5 col-12 mb-3">
                                            <input type="submit" class="btn btn-warning" value="Submit"/>
                                            <a href="index.php" class="btn btn-secondary">Cancel</a>                                    
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                            </div>
                        </div>                
                        <!-- End Actions Card-->                            
                        <br>
                    </div>
                </div>

        </div>        
    </body>
</html>
