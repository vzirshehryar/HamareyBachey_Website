<?php
  session_start();
  function display(){
    $fname="";  $mname="";
    $fcnic=$_SESSION['cnic'];
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    $query="select id, name, class, gname, fcnic, fname, mname from students inner join parents p using(fcnic) JOIN guardians using(gcnic) where p.fcnic=".$fcnic;
    $result=$conn->query($query);
    while($row=$result->fetch_assoc()){
      // $_SESSION['fname']=$row['fname'];  $_SESSION['mname']=$row['mname'];  
      echo '<div class="row">
              <div><b>ID : </b>'.$row['id'].'</div>
              <div><b>Name : </b>'.$row['name'].'</div>
              <div><b>Class : </b>'.$row['class'].'</div>
              <div><b>Guardian Name : </b>'.$row['gname'].'</div>
              <div><b>Father CNIC : </b>'.$row['fcnic'].'</div>
            </div>';
    }
    // echo '</div>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../Images/logo.png" bigger>
  <link rel="stylesheet" href="student/siblings.css">
  <title>Hamarey Bachey</title>
  <style>
    .row div{
      font-size: 30px;
    }
    .parent{
      display: flex;
    }
    .parent div{
      padding: 10px 40px 30px 40px;
      font-size: 35px;
    }
  </style>
</head>
<body>
  <div id="right">
    <a href="../admin.php">Go Back</a>
  </div>
  <div class="out">
    <div class="head">List of Childrens</div>
    <div class="parent">
      <div><b>Father Name : </b><?php  echo $_SESSION['fname'] ?></div>
      <div><b>Mother Name : </b><?php  echo $_SESSION['mname'] ?></div>
    </div>
    <div class="in">
      <?php display(); ?>
    </div>
  </div>
</body>
</html>