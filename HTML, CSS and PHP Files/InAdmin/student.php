<?php
  include 'student2.php';
  $row=get_row();
  function display(){
    $row=get_row();
    echo '<div class="in">
            <div><b>ID :</b> '.$row['id'].'</div>
            <div><b>Name :</b> '.$row['name'].'</div>
            <div><b>Age :</b> '.$row['age'].'</div>
            <div><b>Class :</b> '.$row['class'].'</div>
            <div><b>Father Name :</b> '.$row['fname'].'</div>
          </div>';
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Images/logo.png" bigger>
  <link rel="stylesheet" href="student.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../admin.php">Go Back</a>
  </div>
  <div class="bg">
    <div class="inner">
      <div class="box">
        <a href="">All Information</a>
      </div>
      <div class="box">
        <a href="student/update.php">Update</a>
      </div>
      <div class="box">
        <a href="student/delete.php">Delete</a>
      </div>
      <div class="box">
        <a href="student/register.php">Register a Courses</a>
      </div>
    </div>
    <div class="inner">  
      <div class="box">
        <a href="student/accompanying.php">Accompanying Form</a>
      </div>
      <div class="box">
        <a href="student/siblings.php">List of Siblings</a>
      </div>
      <div class="box">
        <a href="student/parent.php">Parents and Guardian</a>
      </div>
    </div>  
    <div class="inner">
      <div class="box">
        <a href="student/class.php">Change Class</a>
      </div>
      <div class="box">
        <a href="student/C_Change.php">Class Change History</a>
      </div>
      <div class="box">
        <a href="student/status.php">Fee Status</a>
      </div>
    </div>  
    <div class="info">
      <div class="head">The Student</div>
      <div class="inside">
        <?php display(); ?>
      </div>
    </div>
  </div>
  
</body>
</html>