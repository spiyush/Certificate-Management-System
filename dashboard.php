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
  <link rel="icon" href="http://localhost/CertificateManagementSystem/img/favicon.ico">
  <title>  Dashboard | Certificate Management System </title>
  <!-- Bootstrap core CSS -->
  <link href="http://localhost/CertificateManagementSystem/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="http://localhost/CertificateManagementSystem/css/bootstrap.min.cssnarrow-jumbotron.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <?php include 'header.php';?>
    <main role="main">
      <div class="alert alert-primary" role="alert">
        Dashboard | Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to Certificate Management System site.
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Upload Students Certificate</h4>
              <h6 class="card-subtitle mb-2 text-muted">The institution can upload the certificates of students. </h6>
              <p class="card-text"></p>
              <a href="allrecepie.php" class="card-link">Upload Students Certificate</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card" >
            <div class="card-body">
              <h4 class="card-title">Admin Profile </h4>
              <h6 class="card-subtitle mb-2 text-muted"> Can update Admin Profile at ay time.</ </h6>
              <p class="card-text"></p>
              <a href="Admin.php" class="card-link"> Admin Profile </</a>
            </div>
          </div>

        </div>

      </div>
    </main>


    <?php include 'footer.php';?>


  </div> <!-- /container -->
</body>
</html>
