<?php

  session_start(); 
  session_unset();
  session_destroy();

  session_start();
  function name(){
    $name=$_SESSION['name'];
    echo $name;
  }
  function cnic(){
    $cnic=$_SESSION['id'];
    echo $cnic;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Images/logo.png" bigger>
  <link rel="stylesheet" href="admin.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div class="bg">
    <div class="navbar">
      <div class="box">
        <a href="InAdmin/admission.php">ADD Student</a>
      </div>
      <div class="box" id="right">
        <a href="L_out.php">Log out</a>
      </div>
      <div class="box">
        <a href="InAdmin/list.php">LIST of Students</a>
      </div>
      <div class="box">
        <a href="InAdmin/search_S.php">SEARCH for Student</a>
      </div>
      <div class="box">
        <a href="InAdmin/dormant.php">LIST of Dormant Students</a>
      </div>
      <div class="box">
        <a href="InAdmin/classinfo.php">INFORMATION of Classes</a>
      </div>
      <div class="box">
        <a href="InAdmin/guardian.php">LIST of Student's Guardian</a>
      </div>
      <div class="box">
        <a href="InAdmin/search_P.php">SEARCH by Student's Parent</a>
      </div>
    </div>
  </div>
</body>
</html>