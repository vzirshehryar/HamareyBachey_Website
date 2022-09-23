<?php

$submit=$_POST['submit'];
if(isset($submit)){
  $cnic=$_POST['cnic'];
  $pass=$_POST['password'];
  
  $valid=1;
  session_start();
  $_SESSION['var1']=$valid;

  $db="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="practise";
  $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
  if($conn){
    $query="select * from form where cnic=".$cnic; 
    $result=$conn->query($query);
    if($result->num_rows>0){
      $row = $result->fetch_assoc();
      if($pass==$row['password']){
        header('Location: personal.html');
      }
      else{
        $valid=0;
        session_start();
        $_SESSION['var1']=$valid;
      }
    }
  }

  
}

?>