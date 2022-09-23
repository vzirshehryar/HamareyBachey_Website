<?php
  function display(){
    include '../student2.php';
   $row=get_row();
  
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    $query="select name, class, status, f.challan, fee from students natural join fees f where id=".$row['id'];
    $result=$conn->query($query);

    $row=$result->fetch_assoc();
    echo '<div class="row">
            <div><b>Challan : </b>'.$row['challan'].'</div>
            <div><b>Name : </b>'.$row['name'].'</div>
            <div><b>Class : </b>'.$row['class'].'</div>
            <div><b>Fee Status : </b>'.$row['status'].'</div>
            <div><b>Fee Paid : </b>'.$row['fee'].'</div>
          </div>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../Images/logo.png" bigger>
  <link rel="stylesheet" href="status.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../student.php">Go Back</a>
  </div>  
  <div class="out">
    <div class="head">Fee Status</div>
    <div class="in">
      <?php  display(); ?>
    </div>
  </div>
</body>
</html>