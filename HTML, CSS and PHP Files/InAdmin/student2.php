<?php
  session_start();
  
  function get_row(){
    $id=$_SESSION['id']; 
     
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    $query="select * FROM students NATURAL join parents NATURAL JOIN guardians NATURAL JOIN fees where id=".$id;
    $result=$conn->query($query);
    $row=$result->fetch_assoc();

    return $row;
  }

?>