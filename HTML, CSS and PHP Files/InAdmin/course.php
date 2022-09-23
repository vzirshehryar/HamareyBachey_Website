<?php
  // echo $_POST['submit'];
  session_start();
  // echo $_SESSION['id'];
  $success="";
  if(isset($_POST['submit'])){
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    if($conn){
      
      $query="update students set course="."'". $_POST['course'] ."'".", time="."'". date('Y-m-d h.m.s') ."'"." where id=".$_SESSION['id'];
      // echo $query;
      $result=$conn->query($query); 
      header('Location: ../admin.php');
    } 
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Images/logo.png" bigger>
  <link rel="stylesheet" href="course.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div class="bg">
    <div class="success">
      <h2><?php echo $success ?></h2>
    </div>
    <div class="box">
      <form action="course.php" method="post">
        <label for="course">Select a Course : </label>
        <select name="course" id="course">
          <option value="Programing Fundamentals">Programing Fundamentals</option>
          <option value="Database Management">Database Management</option>
          <option value="Operating System">Operating System</option>
          <option value="Designing of Algorithms">Designing of Algorithms</option>
        </select><br>
        <input type="submit" name="submit" value="Register">
      </form>
    </div>
  </div>
</body>
</html>

<?php
  // echo $_POST['submit'];
  // if(isset($_POST['submit'])){
  //   sleep(2);
  //   header('Location: admin.php');
  // }

?>