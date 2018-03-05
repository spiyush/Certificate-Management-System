
<?php
  $conn = mysqli_connect("localhost", "root", "", "certificatemanagementsystem");  

  $keyword = "";  
  $queryCondition = "";
  if(!empty($_POST["keyword"])) {
    $keyword = $_POST["keyword"];
    $wordsAry = explode(" ", $keyword);
    $wordsCount = count($wordsAry);
    $queryCondition = " WHERE ";
    for($i=0;$i<$wordsCount;$i++) {
      $queryCondition .= "recepie_name LIKE '%" . $wordsAry[$i] . "%' OR recepie_desc LIKE '%" . $wordsAry[$i] . "%'";
      if($i!=$wordsCount-1) {
        $queryCondition .= " OR ";
      }
    }
  }
  $orderby = " ORDER BY recepie_id desc"; 
  $sql = "SELECT * FROM recepie " . $queryCondition;
  $result = mysqli_query($conn,$sql); 
?>
<?php 
  function highlightKeywords($text, $keyword) {
    $wordsAry = explode(" ", $keyword);
    $wordsCount = count($wordsAry);
    
    for($i=0;$i<$wordsCount;$i++) {
      $highlighted_text = "<span style='font-weight:bold;'>$wordsAry[$i]</span>";
      $text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
    }

    return $text;
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

  <title>Search Recepie | FOOD DECIDER</title>

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
        <center>  <h4>Search students certificate.</h4></center> 
        <br>
        <p>Certificates are the part of the institutions which will be provided to the students as a part of their excellence in the curriculum or co-curriculum. Certificates can be considered as an encouragement given to the students to achieve more in their curriculum or co-curriculum. The certificate management system will help the institutions to manage the work in a better way as possible. It will help in smooth functioning of the institutions. The institutions will be able to upload the certificates through this system and the students can access the certificates in an easy way. It will also help in transparency.</p>
        
      </div>

      <form name="frmSearch" method="post" action="">
       <div class="form-group">
          <label for="exampleInputhrname"> Search students certificate</label>
          <input type="text" name="keyword" value="<?php echo $keyword; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Enter Search Keyword">
          <br/>
           <input type="submit" name="go" class="btn btn-primary pull-right" value="Search">

        </div>

      </form> 

      <?php 
        while($row = mysqli_fetch_assoc($result)) { 
        $new_title = $row["recepie_name"];
        if(!empty($_POST["keyword"])) {
          $new_title = highlightKeywords($row["recepie_name"],$_POST["keyword"]);
        }
        $new_description = $row["recepie_desc"];
        if(!empty($_POST["keyword"])) {
          $new_description = highlightKeywords($row["recepie_desc"],$_POST["keyword"]);
        }
      ?>

      <h3> <?php echo $new_title; ?></h3>
      <p><?php echo $new_description; ?></p>
      
      <?php } ?>

    </main>
    <?php include 'footer.php';?>
  </div> <!-- /container -->
</body>
</html>
