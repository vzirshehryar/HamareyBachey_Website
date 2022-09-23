<?php
  if(isset($_POST['submit'])){
    $db="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="project";
    $conn=mysqli_connect($db, $dbuser, $dbpass, $dbname);
    if($conn){
            // Student Information
        // $name=$_POST['name'];  
        // $age=$_POST['age'];
        // $date=$_POST['date'];
        // $gender=$_POST['gender'];  
        // $query="insert into students(name, age, dob, gender) VALUES ("."'". $name ."'".", ". $age .", "."'". $date ."'".", "."'". $gender ."'".");";
        // $conn->query($query);

            // Parent Information
        $mname=$_POST['mname'];   $fname=$_POST['fname'];
        $mcontact=$_POST['mcontact'];   $fcontact=$_POST['fcontact'];
        $mcnic=$_POST['mcnic'];   $fcnic=$_POST['fcnic'];
        $memail=$_POST['memail'];   $femail=$_POST['femail'];
        $maddress=$_POST['maddress'];   $faddress=$_POST['faddress'];
        $query="insert into parents VALUES ("."'". $mname ."'".", "."'". $mcontact ."'".", "."'". $mcnic ."'".", "."'". $memail ."'".", "."'". $maddress ."'".", "."'". $fname ."'".", "."'". $fcontact ."'".", "."'". $fcnic ."'".", "."'". $femail ."'".", "."'". $faddress ."'". ");";
        $conn->query($query);

            // Guardian Information
        $gname=$_POST['gname'];
        $gcontact=$_POST['gcontact'];
        $gcnic=$_POST['gcnic'];
        $ggender=$_POST['ggender'];
        $relation=$_POST['relation'];
        $query="insert into guardians VALUES ("."'". $gname ."'".", "."'". $gcontact ."'".", "."'". $gcnic ."'".", "."'". $ggender ."'".", "."'". $relation ."'".");";
        $conn->query($query);

        // SESSIONs
        // $_SESSION['gname']=$gname;
        // $_SESSION['gcnic']=$gcnic;

            // Staff Information
        $tfee=$_POST['fee'];
        $discount=$_POST['discount'];
        $fee=$tfee-$discount;
        $paid=$_POST['paid'];
        $query="insert into fees(tfee, discount, fee, status) VALUES (". $tfee .", ". $discount .", ". $fee .", "."'". $paid ."'".");";
        $conn->query($query);

            // Student Information
        $result=$conn->query("select max(challan) from fees");
        $row=$result->fetch_assoc();
        // echo $row['max(challan)'];
        $name=$_POST['name'];  
        $age=$_POST['age'];
        $class=0;
        if($age<5) $class=1;
        else if($age<8) $class=2;
        else if($age<11) $class=3;
        else if($age<14) $class=4;
        else if($age<17) $class=5;
        else if($age<20) $class=6;
        else if($age<21) $class=7;
        else if($age>=21) $class=10;
        $date=$_POST['date'];
        $gender=$_POST['gender'];  
        $query="insert into students(name, age, class, dob, gender, fcnic, gcnic, challan) VALUES ("."'". $name ."'".", ". $age .", ". $class .", "."'". $date ."'".", "."'". $gender ."'".", "."'". $fcnic ."'".", "."'". $gcnic ."'".", ". $row['max(challan)'] .");";
        $conn->query($query);

                // getting id
        $result=$conn->query("select max(id) from students");
        $row=$result->fetch_assoc();    
        session_start();
        $_SESSION['id']=$row['max(id)'];    

        // echo "hello";
        header('Location: course.php');
        // echo $date." ".$gender." ".$fname." ".$mname."<br>";
    }
    // header('Location: front.html');
    }
?>