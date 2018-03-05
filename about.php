<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
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
  <title>About | Certificate Management System</title>
  <!-- Bootstrap core CSS -->
  <link href="http://localhost/CertificateManagementSystem/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="http://localhost/CertificateManagementSystem/css/bootstrap.min.cssnarrow-jumbotron.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <?php include 'header.php';?>
    <main role="main">
      <div class="jumbotron">    
        <center>  <h4>About | Certificate Management System</h4></center> 
        <br>
        <p>Certificates are the part of the institutions which will be provided to the students as a part of their excellence in the curriculum or co-curriculum. Certificates can be considered as an encouragement given to the students to achieve more in their curriculum or co-curriculum. The certificate management system will help the institutions to manage the work in a better way as possible. It will help in smooth functioning of the institutions. The institutions will be able to upload the certificates through this system and the students can access the certificates in an easy way. It will also help in transparency.</p>
        <center>  <h4>Project Description</h4></center> 
        <p> <b>The features needed for this application are:</b></p> 
        <p><b>Students database management:</b> The database of the students present in the institution must be maintained in a well organized way. It is required to send the certificates to the particular students of the organization.</p>
        <p><b>Certificate access:</b> The students will be able to access the certificate online through the use of this system.</p>
        <p><b>Login id:</b> There will be separate login id that will provide to the people of the institutions to upload and access the certificates. Each web page must design .</p>
      </div>
    </main>
    <?php include 'footer.php';?>
  </div> <!-- /container -->
</body>
</html>
