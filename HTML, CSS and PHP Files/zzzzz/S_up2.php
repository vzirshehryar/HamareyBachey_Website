<?php

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
    // echo "successfull";
    $query="insert into form values (".$name.",".$age.",".$fname.",".$cnic.",".$pass.")"; 
    echo "insert into form values (".$name.",".$age.",".$fname.",".$cnic.",".$pass.") <br>";
    if($conn->query($query)){
      echo "Successfull";
      header('Location: L_in.html');
    }
    else{
      echo "Account already exist";
      header('Location: S_up.html');
    }
  }
}
?>