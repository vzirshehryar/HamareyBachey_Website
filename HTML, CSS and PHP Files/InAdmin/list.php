<?php

  function display(){
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    if($conn){
      $query="select id, name, age, class, course from students order by class asc"; 
      // echo "select name, fname, age, class, fname from form where username=".$username; 
      $result=$conn->query($query); 
      while($row = $result->fetch_assoc()){
        echo '<div class="inside">
                <div><b>ID :</b> '.$row['id'].'</div>
                <div><b>Name :</b> '.$row['name'].'</div>
                <div><b>Age :</b> '.$row['age'].'</div>
                <div><b>Class :</b> '.$row['class'].'</div>
                <div><b>Course Taken :</b> '.$row['course'].'</div>
              </div>';    
      }  
    }  
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Images/logo.png" bigger>
  <link rel="stylesheet" href="list.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../admin.php">Go Back</a>
  </div>
  <div class="head">List of all Students</div>
  <div class="bg">
    <div class="box">
      <?php display(); ?>
    </div>
  </div>
</body>
</html>