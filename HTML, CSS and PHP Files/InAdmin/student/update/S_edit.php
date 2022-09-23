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
      if($_POST['name']!=""){
        $query="update students set name="."'".$_POST['name']."'"." where id=".$row['id'];
        $result=$conn->query($query);
      }
      if($_POST['age']!=""){
        $query="update students set age=".$_POST['age']." where id=".$row['id'];
        $result=$conn->query($query);
      }
      if($_POST['gender']!=""){
        $query="update students set gender="."'".$_POST['gender']."'"." where id=".$row['id'];
        $result=$conn->query($query);
      }
      if($_POST['date']!=""){
        $query="update students set dob="."'".$_POST['date']."'"." where id=".$row['id'];
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
  <form action="S_edit.php" method="post" class="all">
    <div class="personal" style="border: 10px solid black;">
      <div class="top">
        <h2>Update Student Information</h2>
      </div>
      <div class="table">
        <table>
          <tr>
            <th><p>Name</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="name"></td>
          </tr>
          <tr>
            <th><p>Age</p></th>
            <th>:</th>
            <td colspan="2"><input type="number" name="age"></td>
          </tr>
          <tr>
            <th><p>Date of Birth</p></th>
            <th>:</th>
            <td colspan="2"><input type="date" name="date" ></td>
          </tr>
          <tr>
            <th><p>Gender</p></th>
            <th>:</th>
            <td colspan="2">
              <input type="radio" id="male" name="gender" value="Male"  >
              <label for="male">Male || </label>
              <input type="radio" id="female" name="gender" value="Female" >
              <label for="female">Female || </label>
              <input type="radio" id="other" name="gender" value="Other"  >
              <label for="other">Other</label>
            </td>
          </tr>
        </table>
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