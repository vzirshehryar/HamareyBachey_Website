<?php
  session_start();
  $cnic=$_SESSION['id'];
  $name=$_SESSION['name'];
if(isset($_POST['submit'])){
  // $db="localhost";
  // $dbuser="root";
  // $dbpass="";
  // $dbname="practise";
  // $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
  // if($conn){
          // Student Information
      $date=$_POST['date'];
      $gender=$_POST['gender'];
          // Parent Information
      $mname=$_POST['mname'];   $fname=$_POST['fname'];
      $mcontact=$_POST['mcontact'];   $fcontact=$_POST['fcontact'];
      $mcnic=$_POST['mcnic'];   $fcnic=$_POST['fcnic'];
      $memail=$_POST['memail'];   $femail=$_POST['femail'];
      $maddress=$_POST['maddress'];   $faddress=$_POST['faddress'];
          // Guardian Information
      $gname=$_POST['gname'];
      $contact=$_POST['gcontact'];
      $gcnic=$_POST['gcnic'];
      $ggender=$_POST['ggender'];
      $relation=$_POST['relation'];
          // Guardian Information
      $fee=$_POST['fee'];
      $discount=$_POST['discount'];
      $fammount=$_POST['fammount'];
      $paid=$_POST['paid'];
      $date=$_POST['relation'];
     echo $date." ".$gender." ".$fname." ".$mname."<br>";
  // }
  // header('Location: front.html');
  }
      // SESSIONs
  $_SESSION['gname']=$gname;
  $_SESSION['gcnic']=$gcnic;
?>