<?php
  function display(){
    include '../student2.php';
   $row=get_row();
  
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    $query="select * from students s join parents using(fcnic) where id=".$row['id'];
    $result=$conn->query($query);
    $row=$result->fetch_assoc();
      echo '<div class="row">
              <div><b>ID : </b>'.$row['id'].'</div>
              <div><b>Name : </b>'.$row['name'].'</div>
            </div>';
      echo '<div class="row">
            <div><b>Father Name : </b>'.$row['fname'].'</div>
            <div><b>Father CNIC : </b>'.$row['fcnic'].'</div>
          </div>';    
      echo '<div class="row">
          <div><b>Mother Name : </b>'.$row['mname'].'</div>
          <div><b>Mother CNIC : </b>'.$row['mcnic'].'</div>
        </div>'; 
      $query="select * from students s join guardians using(gcnic) where id=".$row['id'];
    $result=$conn->query($query);
    $row=$result->fetch_assoc();  
      echo '<div class="row">
        <div><b>Guardian Name : </b>'.$row['gname'].'</div>
        <div><b>Guardian CNIC : </b>'.$row['gcnic'].'</div>
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
  <link rel="stylesheet" href="parent.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../student.php">Go Back</a>
  </div>
  <div class="out">
    <div class="head">Parents And Guardians</div>
    <div class="in">
      <?php display(); ?>
    </div>
  </div>
</body>
</html>