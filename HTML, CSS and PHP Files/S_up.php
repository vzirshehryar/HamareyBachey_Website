<?php
$error="";
$success="";
if(isset($_POST['submit'])){
  $name='"'.$_POST['name'].'"';
  $age=$_POST['age'];
  $fname='"'.$_POST['fname'].'"';
  $cnic='"'.$_POST['cnic'].'"';
  $pass='"'.$_POST['password'].'"';
  
  $db="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="practise";
  $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
  if($conn){
    $query="select * from form where cnic=".$cnic; 
    $result=$conn->query($query);
    if($result->num_rows>0){
      $error="Account already exist";  
    }
    else{
      $query="insert into form values (".$name.",".$age.",".$fname.",".$cnic.",".$pass.")"; 
      echo "insert into form values (".$name.",".$age.",".$fname.",".$cnic.",".$pass.") <br>";
      $conn->query($query);
      header('Location: L_in.php');
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
    <link rel="stylesheet" href="nav_back.css">
    <link rel="stylesheet" href="S_up.css">
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
          <li><a href="S_up.php">Sign up</a></li>
          <li><a href="L_in.php">Log in</a></li>
        </div>  
      </ul>
    </div>  
    <div class="form">
      <form action="S_up.php" method="post">
        <h2>Create Your Account</h2>
        <p class="error"><?php echo $error; ?></p>
        <input type="text" name="name" id="name" placeholder="Your Name" required>
        <input type="number" name="age" id="age" placeholder="Your Age"  required>
        <input type="text" name="fname" id="fname" placeholder="Father's Name" required>
        <input type="text" name="cnic" id="cnic" placeholder="CNIC" required>
        <input type="password" name="password" id="password" placeholder="Make a Password" required>  
        <input type="submit" name="submit" id="submit">
      </form>
    </div>
  </div>  
</body>
</html>
