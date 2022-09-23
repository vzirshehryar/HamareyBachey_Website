<?php
   include '../student2.php';
   $row=get_row();
  if(isset($_POST['yes'])){
    // echo "Yes" ;
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);

              // Parents Check
    $query="select fcnic from students where id=".$row['id'];
    $result=$conn->query($query);   $fr=$result->fetch_assoc();
    // echo $fr['fcnic']."<br>";
    $query="select count(id) from students where fcnic=".$fr['fcnic'];
    $result=$conn->query($query);   $fr2=$result->fetch_assoc();
    // echo $fr2['count(id)']."<br>";
    if($fr2['count(id)']<2){
      $query="delete from parents where fcnic="."'". $fr['fcnic'] ."'";
      // echo $query."<br>";
      $result=$conn->query($query);
    }

            // Guardians Check
    $query="select gcnic from students where id=".$row['id'];
    $result=$conn->query($query);   $fr=$result->fetch_assoc();
    // echo $fr['gcnic']."<br>";
    $query="select count(id) from students where gcnic=".$fr['gcnic'];
    $result=$conn->query($query);   $fr2=$result->fetch_assoc();
    // echo $fr2['count(id)']."<br>";
    if($fr2['count(id)']<2){
      $query="delete from guardians where gcnic="."'". $fr['gcnic'] ."'";
      // echo $query. "<br>";
      $result=$conn->query($query);
    }
          // Fee Challan 
    $query="select challan from students where id=".$row['id'];
    $result=$conn->query($query);   $fr=$result->fetch_assoc();
    $query="delete from fees where challan=". $fr['challan'];
    // echo $query. "<br>";
    $result=$conn->query($query);

          // Student Itself
    $query="delete from students where id=".$row['id'];
    // echo $query;
    $result=$conn->query($query);
    header('Location: ../../admin.php');
  }
  else if(isset($_POST['no'])){ 
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
  <link rel="stylesheet" href="delete.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div class="out">
    <form class="in" method="post" action="delete.php">
      <div>You want to Delete this Data</div>
      <div>
        <input type="submit" name="yes" value="Yes">
        <input type="submit" name="no" value="No">
      </div>
    </form>
  </div>
</body>
</html>