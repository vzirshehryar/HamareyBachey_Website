<?php

  function display(){
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    if($conn){
      $query="select class, count(id) from students group by class"; 
      $result1=$conn->query($query);

      while($row1 = $result1->fetch_assoc()){
        $query="select gender, count(id) from students WHERE class=".$row1['class']." group by gender"; 
        $result2=$conn->query($query);
        echo '<div class="inside">
                <div><b>Class : </b> '.$row1['class'].'</div>
                <div><b>No. of Students : </b> '.$row1['count(id)'].'</div>';                
        if($result2->num_rows==2){
          $row2=$result2->fetch_assoc();
          echo    '<div><b>No. of Males : </b> '.$row2['count(id)'].'</div>';
          $row2=$result2->fetch_assoc();  
          echo    '<div><b>No. of Females : </b> '.$row2['count(id)'].'</div>';
          echo    '</div>';
        }  
        else{
          $row2=$result2->fetch_assoc();
          if($row2['gender']=="Male"){
            echo '<div><b>No. of Males : </b>'.$row2['count(id)'].'</div>';
            echo '<div><b>No. of Females: </b> 0 </div>';
            echo    '</div>';
          }
          else{
            echo '<div><b>No. of Males : </b> 0 </div>';
            echo '<div><b>No. of Females: </b>'.$row2['count(id)'].'</div>';
            echo    '</div>';
          }  
        }
      }  
    }  
  }
  $error="";
  if(isset($_POST['submit'])){
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    if($conn){
      $query="select class from students where class=".$_POST['class']; 
      // echo $query;
      $result=$conn->query($query);
      if($result->num_rows>0){
        session_start();
        $_SESSION['class']=$_POST['class'];
        header('Location: classinfo2.php');
      }
      else
        $error="Invalid Class";
    }
    // header('Location: classinfo2.php'); 
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Images/logo.png" bigger>
  <link rel="stylesheet" href="classinfo.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../admin.php">Go Back</a>
  </div>
  <div class="head">Information of Classes</div>
  <div class="bg">
    <div class="box">
      <?php display(); ?>
    </div>
    <form action="classinfo.php" method="post">
      <div>  
        <div>Search by Class : </div>
        <input type="number" name="class" class="input" required>
      </div>
        <input type="submit" name="submit" value="Search" class="submit">
        <div class="error"><?php echo $error; ?></div>
    </form>
  </div>
  
</body>
</html>