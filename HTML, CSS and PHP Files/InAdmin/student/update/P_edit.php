<?php
  include '../../student2.php';
  $row=get_row();
  if(isset($_POST['submit'])){
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    if($conn){
            // Mother
      if($_POST['mname']!=""){
        $query="update parents set mname="."'".$_POST['mname']."'"." where fcnic=( SELECT fcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
      if($_POST['mcontact']!=""){
        $query="update parents set mcontact="."'".$_POST['mcontact']."'"." where fcnic=( SELECT fcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
      if($_POST['memail']!=""){
        $query="update parents set memail="."'".$_POST['memail']."'"." where fcnic=( SELECT fcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
      if($_POST['maddress']!=""){
        $query="update parents set maddress="."'".$_POST['maddress']."'"." where fcnic=( SELECT fcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
              //Father
      if($_POST['fname']!=""){
        $query="update parents set fname="."'".$_POST['fname']."'"." where fcnic=( SELECT fcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
      if($_POST['fcontact']!=""){
        $query="update parents set fcontact="."'".$_POST['fcontact']."'"." where fcnic=( SELECT fcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
      if($_POST['femail']!=""){
        $query="update parents set femail="."'".$_POST['femail']."'"." where fcnic=( SELECT fcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
      if($_POST['faddress']!=""){
        $query="update parents set faddress="."'".$_POST['faddress']."'"." where fcnic=( SELECT fcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }


      header('Location: ../update.php');
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../../Images/logo.png" bigger>
  <link rel="stylesheet" href="edit.css" bigger>
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../update.php">Go Back</a>
  </div>
  <form action="P_edit.php" method="post" class="all">
    <div class="personal" style="border: 10px solid black;">
      <div class="top">
        <h2>Update Parent Information</h2>
      </div>
      <div class="table" id="responsive">
        <div class="inside">
          <div class="mother">  
            <div class="side">
              <p>Mother Name : </p>
              <input type="text" name="mname"  >
            </div>
            <div class="side">
              <p>Mother Contact : </p>
              <input type="text" name="mcontact" >
            </div>
            <div class="side">
              <p>Mother Email : </p>
              <input type="text" name="memail">
            </div>
            <div class="side">
              <p>Mother Address : </p>
              <input type="text" name="maddress">
            </div>
          </div >  
          <div class="father">
            <div class="side">
              <p>Father Name : </p>
              <input type="text" name="fname" >
            </div>
            <div class="side">
              <p>Father Contact : </p>
              <input type="text" name="fcontact" >
            </div>
            <div class="side">
              <p>Father Email : </p>
              <input type="text" name="femail" >
            </div>
            <div class="side">
              <p>Father Address : </p>
              <input type="text" name="faddress" >
            </div>
          </div>  
        </div>
      </div>
      <div class="arrange">
        <input type="submit" name="submit" value="Update">
      </div>
    </div>
    <!-- <div class="personal">
      <div class="arrange">
        <input type="submit" name="submit" value="Save and Next">
      </div>  
    </div> -->
  </form>
</body>
</html>