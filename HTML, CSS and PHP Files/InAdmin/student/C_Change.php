<?php
  function display(){
    include '../student2.php';
   $row=get_row();
  
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    $query="select id, name, oclass, nclass, date, approvedby from class_history c natural join students s where c.id=".$row['id'];
    // echo $query;
    $result=$conn->query($query);

    while($row=$result->fetch_assoc())
    echo '<div class="row">
            <div><b>ID : </b>'.$row['id'].'</div>
            <div><b>Name : </b>'.$row['name'].'</div>
            <div><b>Old Class : </b>'.$row['oclass'].'</div>
            <div><b>New Class : </b>'.$row['nclass'].'</div>
            <div><b>Date : </b>'.$row['date'].'</div>
            <div><b>Approve By : </b>'.$row['approvedby'].'</div>
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
  <style>
    .row div{
      padding: 5px 20px;
      font-size: 30px;
    }
  </style>
</head>
<body>
  <div id="right">
    <a href="../student.php">Go Back</a>
  </div>  
  <div class="out">
    <div class="head">Class Change History</div>
    <div class="in">
      <?php  display(); ?>
    </div>
  </div>
</body>
</html>