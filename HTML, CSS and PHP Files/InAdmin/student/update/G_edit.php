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
      if($_POST['gname']!=""){
        $query="update guardians set gname="."'".$_POST['gname']."'"." where gcnic=( SELECT gcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
      if($_POST['gcontact']!=""){
        $query="update guardians set gcontact="."'".$_POST['gcontact']."'"." where gcnic=( SELECT gcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
      if($_POST['ggender']!=""){
        $query="update guardians set ggender="."'".$_POST['ggender']."'"." where gcnic=( SELECT gcnic FROM students where id=".$row['id'].")";
        $result=$conn->query($query);
      }
      if($_POST['relation']!=""){
        $query="update guardians set relation="."'".$_POST['relation']."'"." where gcnic=( SELECT gcnic FROM students where id=".$row['id'].")";
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
  <form action="G_edit.php" method="post" class="all">
    <div class="personal" style="border: 10px solid black;">
      <div class="top">
        <h2>Update Guardian Information</h2>
      </div>
      <div class="table">
        <table>
          <tr>
            <th><p>Guardian Name</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="gname"  ></td>
          </tr>
          <tr>
            <th><p>Guardian Contact</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="gcontact" ></td>
          </tr>
          
          <tr>
            <th><p>Guardian Gender</p></th>
            <th>:</th>
            <td colspan="2">
              <input type="radio" id="m" name="ggender" value="Male" >
              <label for="m">Male || </label>
              <input type="radio" id="f" name="ggender" value="Female" >
              <label for="f">Female || </label>
              <input type="radio" id="o" name="ggender" value="Other" >
              <label for="o">Other</label>
            </td>
          </tr>
          <tr>
            <th><p>Relation</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="relation"></td>
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