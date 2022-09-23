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
    $query="update students set class=".$_POST['class']." where id=".$row['id'];
    $result=$conn->query($query);
    
    $query="insert into class_history(oclass, nclass, reason, approvedby, id) values(". $row['class'] .", ". $_POST['class'] .", "."'". $_POST['reason'] ."'".", "."'". $_POST['approved'] ."'".", ". $row['id'] .");";
    $result=$conn->query($query);
    // echo $query;
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
  <link rel="stylesheet" href="class.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../student.php">Go Back</a>
  </div>
  <div class="bg">
    <div class="head">Class Change Form</div>
    <form action="class.php" method="post">
      <div class="box">
        <div><b>New Class : </b></div>
        <input type="number" name="class" required>
      </div>
      <div class="box">
        <div style="width: 140px; "><b>Reason for Change : </b></div>
        <textarea type="text" name="reason" cols="32" rows="5" required></textarea>
      </div>
      <div class="box">
        <div><b>Approved by : </b></div>
        <input type="text" name="approved" required>
      </div>
      <div class="box">
        <input type="submit" name="submit" id="submit">
      </div>
    </form>
    </div>
  </div>
</body>
</html>