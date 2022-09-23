<?php
  include '../student2.php';
  function display(){
    
   $row=get_row();
  
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    $query="select id, name, class, course, time as 'enrolled date' from students where id=".$row['id'];
    $result=$conn->query($query);

    $row=$result->fetch_assoc();
    echo '<div class="row">
            <div><b>ID : </b>'.$row['id'].'</div>
            <div><b>Name : </b>'.$row['name'].'</div>
            <div><b>Class : </b>'.$row['class'].'</div>
            <div><b>Course : </b>'.$row['course'].'</div>
            <div><b>Enrolled Date : </b>'.$row['enrolled date'].'</div>
          </div>';
  }
  $row=get_row();
  $check="";
  $limit="";
  if($row['course']!=""){
    $check="disabled";
    $limit="Course Limit Reached";
  }
  if(isset($_POST['submit'])){
    
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    if($conn){
      
      $query="update students set course="."'". $_POST['course'] ."'".", time="."'". date('Y-m-d h.m.s') ."'".", dormant=null where id=".$row['id'];
      // echo $query;
      $result=$conn->query($query); 
      header('Location: ../student.php');
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
  <link rel="stylesheet" href="status.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../student.php">Go Back</a>
  </div>  
  <div class="out">
    <div class="head">Registered Course</div>
    <div class="in">
      <?php  display(); ?>
    </div>
    <form action="register.php" method="post">
      <label for="course">Select a Course : </label>
      <select name="course" id="course">
        <option value="Programing Fundamentals">Programing Fundamentals</option>
        <option value="Database Management">Database Management</option>
        <option value="Operating System">Operating System</option>
        <option value="Designing of Algorithms">Designing of Algorithms</option>
      </select><br>
      <div class="limit"> <?php echo $limit ?> </div>
      <input type="submit" name="submit" value="Register" <?php echo $check ?> >
    </form>
  </div>
</body>
</html>