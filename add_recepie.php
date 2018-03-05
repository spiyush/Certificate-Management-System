<?php

// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}

// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
// Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Please enter a valid name.';
    } else{
        $name = $input_name;
    }

// Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = 'Please enter an address.';     
    } else{
        $address = $input_address;
    }

// Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = 'Please enter a positive integer value.';
    } else{
        $salary = $input_salary;
    }

// Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
// Prepare an insert statement
        $sql = "INSERT INTO recepie (recepie_name, recepie_desc, recepie_type) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);

// Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;

// Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
// Records created successfully. Redirect to landing page
                header("location: allrecepie.php");
                exit();
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
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://localhost/food/img/favicon.ico">

    <title> Add Recepie | FOOD DECIDER</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/food/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://localhost/food/css/bootstrap.min.cssnarrow-jumbotron.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <?php include 'header.php';?>

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Add Recepie</h2>
                        </div>
                        <p>Please fill this form and submit to add recipe</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label>Recepie Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                <span class="help-block"><?php echo $name_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                                <label>Recepie Description</label>
                                <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                                <span class="help-block"><?php echo $address_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                                <label>Recepie Type (1 - Veg 2 - Non Veg)</label>
                                <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                                <span class="help-block"><?php echo $salary_err;?></span>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="allrecepie.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>


        <?php include 'footer.php';?>


    </div> <!-- /container -->
</body>
</html>
