<?php

if(isset($_POST['submit'])){
  // if(empty($_POST['name'])){
  //     $errMsg = "Error! Missing some fieds.";
  //     header('Location: S_up.html');
  //     echo '<p class="valid">'. $errMsg . '</p>';
  //     return 0;
  // }
  // else
  $name=$_POST['name'];
  $age=$_POST['age'];
  $fname=$_POST['fname'];
  $uname=$_POST['username'];
  $pass=$_POST['password'];
  if($name=="shehryar"){
    header('Location: L_out.html');
  }
  else{
    echo $name . " " . $fname . " " . $age;
  }

}


?>