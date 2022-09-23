<?php
$error="";
$success="";
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $pass=$_POST['password'];

  $db="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="project";
  $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
  if($conn){
    $query="select * from admin where username=".'"'.$username.'"'; 
    // echo "select * from form where username=".$username; 
    $result=$conn->query($query);
    if($result->num_rows){
      $row = $result->fetch_assoc();
      if($pass!=$row['password']){
        // header('Location: personal.html');
        $error="Invalid Username or Password";
      }
      else{
        header('Location: admin.php');
      }
    }
    else
      $error="Invalid Username or Password";
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
    <link rel="stylesheet" href="nav_back.css">
    <link rel="stylesheet" href="L_in.css">
    <title>Hamare Bachey</title>
</head>
<body>
  <div class="bg">
    <div class="navbar">
      <ul>
        <div class="lefty">
          <li><a href="front.html"><b>Hamarey Bachey</b></a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#Contact">Contact</a></li>
        </div>
        <div class="righty"> 
          <!-- <li><a href="S_up.php">Sign up</a></li> -->
          <li><a href="L_in.php" class="login">Log in</a></li>
        </div>  
      </ul>
    </div>  
      <div class="form">
        <form action="L_in.php" method="post">
          <h2>Log in to Your Account</h2>
          <p class="error"><?php echo $error; ?></p>
          <input type="text" name="username" id="username" placeholder="Username" required>
          <input type="password" name="password" id="Password" placeholder="Password" required>
          <input type="submit" name="submit" id="submit" >
          <p>Does not have an account. <a href="S_up.html">Create an Account!</a></p>
        </form>
      </div>
  </div>  
</body>
</html>
