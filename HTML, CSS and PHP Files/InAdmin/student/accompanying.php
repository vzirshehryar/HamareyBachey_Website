<?php
  include '../student2.php';
  $row=get_row();
  $id=$row['id'];

    //update in student table (fk references to accompany)
  if(isset($_POST['submit'])){
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    $query="insert into accompany VALUES ("."'". $_POST['cnic'] ."'".", "."'". $_POST['name'] ."'".", "."'". $_POST['pregnant'] ."'".", "."'". $_POST['reason'] ."'".", ". $row['id'] .");";
    // echo $query;
    $result=$conn->query($query);
    header('Location: ../student.php');
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../Images/logo.png" bigger>
  <link rel="stylesheet" href="accompanying.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../student.php">Go Back</a>
  </div>
  <div class="bg">
    <div class="head">
      Hamarey Bachey</br>Student Accompanying Form 
    </div>
    <form action="accompanying.php" method="post">
      <div class="box">
        <div><b>CNIC : </b></div>
        <input type="text" name="cnic" required>
      </div>
      <div class="box">
        <div><b>Name : </b></div>
        <input type="text" name="name" required>
      </div>
      <div class="box">
        <div><b>Pregnant : </b></div>
        <input type="radio" name="pregnant" value="Yes" id="yes" required><label for="yes">Yes</label>
        <input type="radio" name="pregnant" value="Yes" id="no" required><label for="no">No</label>
      </div>
      <div class="box">
        <div style="width: 140px; "><b>Reason for Absence : </b></div>
        <textarea type="text" name="reason" cols="32" rows="5" required></textarea>
      </div>
      <div class="box">
        <input type="submit" name="submit" id="submit">
      </div>
    </form>
    </div>
  </div>
</body>
</html>