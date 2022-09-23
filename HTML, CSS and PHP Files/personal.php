<?php
  include 'personal2.php';
  // session_start();
  // $cnic=$_SESSION['id'];
  // $name=$_SESSION['name'];
//  if(isset($_POST['save']))
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Images/logo.png" bigger>
  <link rel="stylesheet" href="personal.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div class="nav">
    Hamarey Bachey</br>Student Admission Form 
  </div>
  <form action="" method="post" class="all">

                  <!-- Student Information   --  Start -->

    <div class="personal" style="border-top: 10px solid black;">
      <div class="top">
        <h2>Student Information</h2>
      </div>
      <div class="table">
        <table>
          <tr>
            <th><p>Name</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="name" value="<?php echo $name ?>" readonly></td>
          </tr>
          <tr>
            <th><p>CNIC</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="cnic" value="<?php echo $cnic ?>" readonly></td>
          </tr>
          <tr>
            <th><p>Date of Birth</p></th>
            <th>:</th>
            <td colspan="2"><input type="date" name="date" required></td>
          </tr>
          <tr>
            <th><p>Gender</p></th>
            <th>:</th>
            <td colspan="2">
              <input type="radio" id="male" name="gender" value="Male"  required>
              <label for="male">Male || </label>
              <input type="radio" id="female" name="gender" value="Female" required>
              <label for="female">Female || </label>
              <input type="radio" id="other" name="gender" value="Other"  required>
              <label for="other">Other</label>
            </td>
          </tr>
        </table>
      </div>
    </div>

                  <!-- Student Information   --  Finsish -->

                  <!-- Parent Information   --  Start -->

    <div class="personal">
      <div class="top">
        <h2>Parent Information</h2>
      </div>
      <div class="table" id="responsive">
        <div class="inside">
          <div class="mother">  
            <div class="side">
              <p>Mother Name : </p>
              <input type="text" name="mname"  required>
            </div>
            <div class="side">
              <p>Mother Contact : </p>
              <input type="text" name="mcontact" required>
            </div>
            <div class="side">
              <p>Mother CNIC : </p>
              <input type="text" name="mcnic" required>
            </div>          
            <div class="side">
              <p>Mother Email : </p>
              <input type="text" name="memail" required>
            </div>
            <div class="side">
              <p>Mother Address : </p>
              <input type="text" name="maddress" required>
            </div>
          </div >  
          <div class="father">
            <div class="side">
              <p>Father Name : </p>
              <input type="text" name="fname" required>
            </div>
            <div class="side">
              <p>Father Contact : </p>
              <input type="text" name="fcontact" required>
            </div>
            <div  class="side">
              <p>Father CNIC : </p>
              <input type="text" name="fcnic" required>
            </div>
            <div class="side">
              <p>Father Email : </p>
              <input type="text" name="femail" required>
            </div>
            <div class="side">
              <p>Father Address : </p>
              <input type="text" name="faddress" required>
            </div>
          </div>  
        </div>
      </div>
    </div>  

                  <!-- Parent Information   --  Finish -->                  
    
                  <!-- Guardian Information   --  Start -->

    <div class="personal">
      <div class="top">
        <h2>Guardian Information</h2>
      </div>
      <div class="table">
        <table>
          <tr>
            <th><p>Guardian Name</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="gname"  required></td>
          </tr>
          <tr>
            <th><p>Guardian Contact</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="gcontact" required></td>
          </tr>
          <tr>
            <th><p>Guardian CNIC</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="gcnic" required></td>
          </tr>
          <tr>
            <th><p>Guardian Gender</p></th>
            <th>:</th>
            <td colspan="2">
              <input type="radio" id="male" name="ggender" value="Male" required>
              <label for="male">Male || </label>
              <input type="radio" id="female" name="ggender" value="Female" required>
              <label for="female">Female || </label>
              <input type="radio" id="other" name="ggender" value="Other" required>
              <label for="other">Other</label>
            </td>
          </tr>
          <tr>
            <th><p>Relation</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="relation"></td>
          </tr>
        </table>
      </div>
    </div>

                  <!-- Guardian Information   --  Finish -->

                  <!-- For Staff Only   --  Start -->

    <div class="personal">
      <div class="top">
        <h2>For Staff Only</h2>
      </div>
      <div class="table">
        <table style="margin-bottom: 20px;">
          <tr>
            <th><p>Fee Ammount</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="fee"  required></td>
          </tr>
          <tr>
            <th><p>Discount</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="discount" required></td>
          </tr>
          <tr>
            <th><p>Final Ammount</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="fammount" required></td>
          </tr>
          <tr>
            <th><p>Fee Fully Paid</p></th>
            <th>:</th>
            <td colspan="2">
              <input type="radio" id="yes" name="paid" value="Yes" required>
              <label for="yes">Yes || </label>
              <input type="radio" id="no" name="paid" value="No" required>
              <label for="no">No</label>
            </td>
          </tr>
          <tr>
            <th><p>Chalan #</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="chalan" required></td>
          </tr>
        </table>
      </div>
    </div>

                 <!-- For Staff Only   --  Finish -->
                 
    <div class="personal" style="border-bottom: 10px solid black;">
      <div class="arrange">
        <input type="submit" name="submit" value="Save and Next">
        <!-- <a href="accompanying.html"><input type="text" value="Next"></a> -->
      </div>  
    </div>
  </form>  
</body>
</html>
