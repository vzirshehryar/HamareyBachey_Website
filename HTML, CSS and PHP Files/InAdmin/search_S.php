<?php
  // echo $_POST['submit'];
  $error="";
  if(isset($_POST['submit'])){
    $id=$_POST['id'];

    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    if($conn){
      $query="select id from students where id="."'".$id."'";
      $result=$conn->query($query);
      $row=$result->fetch_assoc();
      if($row['id']==$id){
        session_start();
        $_SESSION['id']=$id;
        header('Location: student.php');  
      }
      else{
        $error="Invalid ID";
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
  <link rel="stylesheet" href="search.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div id="right">
    <a href="../admin.php">Go Back</a>
  </div>
  <div class="bg">
    <div class="error">
      <h2><?php echo $error ?></h2>
    </div>
    <div class="box">
      <form action="search_S.php" method="post">
        <div>
          <label for="id">Enter ID of Student : </label>
          <input type="text" name="id" id="id" required>
        </div>  
        <input type="submit" name="submit" value="Search" id="input">
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