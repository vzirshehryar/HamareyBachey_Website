<?php
  function display(){
    include '../student2.php';
   $row=get_row();
  
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    $query="select s.id, name, age, class, fname from students s inner join parents using(fcnic) where s.fcnic=".$row['fcnic'];
    $result=$conn->query($query);

    while($row=$result->fetch_assoc()){
      echo '<div class="row">
              <div><b>ID : </b>'.$row['id'].'</div>
              <div><b>Name : </b>'.$row['name'].'</div>
              <div><b>Age : </b>'.$row['age'].'</div>
              <div><b>Class : </b>'.$row['class'].'</div>
              <div><b>Father Name : </b>'.$row['fname'].'</div>
            </div>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../Images/logo.png" bigger>
  <link rel="stylesheet" href="siblings.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../student.php">Go Back</a>
  </div>
  <div class="out">
    <div class="head">List of Siblings</div>
    <div class="in">
      <?php display(); ?>
    </div>
  </div>
</body>
</html>