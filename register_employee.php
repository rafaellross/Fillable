<?php
// Include config file

require_once 'config.php';

$con = $link;

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Define variables and initialize with empty values
$name = $phone = "";
$name_err = $phone_err = "";

//Get params
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

if ($action == 'delete') {
    $sql = "DELETE FROM EMPLOYEES WHERE id in (" . $id . ");";        
    mysqli_query($con, $sql);
    // Close connection
    mysqli_close ($con);    
    echo "<script>";
    echo " window.location.href='employees.php';
         </script>";               
} else if($action == 'update' && $_SERVER["REQUEST_METHOD"] != "POST") {
    $sql = "SELECT id, name, phone from employees where id=" . $id . ";";
    $query = mysqli_fetch_array(mysqli_query($con, $sql));
    $name = $query['name'];
    $phone = $query['phone'];    
} else if($action == 'update' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE employees Set Name = '" . $_POST['name'] . "', phone ='" . $_POST['phone'] . "' where id = " . $id . ";";
    
    if (mysqli_query($con, $sql)) {
        // Close connection
        mysqli_close ($con);    
        echo "<script>";
        echo " window.location.href='employees.php';
            </script>";               
        
    }
;
    
}




// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && $action != 'update'){

    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a Name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM employees WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $name_err = "This employee already exists.";
                } else{
                    $name = trim($_POST["name"]);                    
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }         
        // Close statement
        mysqli_stmt_close($stmt);
    }

        // Validate phone
            // Prepare a select statement
            $sql = "SELECT id FROM employees WHERE phone = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_phone);
                
                // Set parameters
                $param_phone = ($_POST["phone"] != "" ? $_POST["phone"] : "#||");
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $phone_err = "This phone is already in use.";
                    } else{
                        $phone = trim($_POST["phone"]);                    
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }         
            // Close statement
            mysqli_stmt_close($stmt);
 
    // Check input errors before inserting in database
    if(empty($name_err) && empty($phone_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, phone) VALUES (UPPER(?), ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_phone);
            
            // Set parameters
            $param_name = $name;
            $param_phone = $phone;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                //header("location: employees.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ 
            width: 25%; 
            padding: 20px; 
            margin-left: 37.5%;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <h2>Register Employee</h2>
        <p>Please fill this form to register or update employee.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?action=" . $action . "&id=" . $id; ?>" method="post">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="name"class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Phone</label>
                <input type="text" name="phone"class="form-control" value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>    
            
            <hr>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            
        </form>
    </div>    
</body>
</html>