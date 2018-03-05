<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
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

  <title> Admin Details | FOOD DECIDER</title>

  <!-- Bootstrap core CSS -->
  <link href="http://localhost/food/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="http://localhost/food/css/bootstrap.min.cssnarrow-jumbotron.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <?php include 'header.php';?>

    <main role="main">
      <div class="alert alert-primary" role="alert">
        Admin Details
      </div>
      <form>
        <div class="form-group">
          <label for="exampleInputhrname">Admin name</label>
          <input type="Adminname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter hrname">

        </div>


        <div class="form-group">
          <label for="exampleInputhrname">Admin  email</label>
          <input type="Adminname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

        </div>



        <div class="form-group">
          <label for="exampleInputPassword1">Admin Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>



        <a  href="dashboard.php" type="submit" class="btn btn-primary">Update</a>
        <a  href="dashboard.php" type="submit" class="btn btn-danger">Cancel</a>
      </form>

    </main>


    <?php include 'footer.php';?>


  </div> <!-- /container -->
</body>
</html>
