<?php
  // echo $_POST['submit'];
  $error="";
  if(isset($_POST['submit'])){
    $fcnic=$_POST['fcnic'];

    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    if($conn){
      $query="select fcnic, fname, mname from parents where fcnic="."'".$fcnic."'";
      // echo $query;
      $result=$conn->query($query);
      $row=$result->fetch_assoc();
      if($row['fcnic']==$fcnic){
        session_start();
        $_SESSION['cnic']=$fcnic;
        $_SESSION['fname']=$row['fname'];
        $_SESSION['mname']=$row['mname'];
        header('Location: parent.php');  
      }
      else{
        $error="Invalid CNIC";
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
  <link rel="icon" href="Images/logo.png" bigger>
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
      <form action="search_P.php" method="post">
        <div>
          <label for="id">Enter CNIC of Parent : </label>
          <input type="text" name="fcnic" id="id" required>
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