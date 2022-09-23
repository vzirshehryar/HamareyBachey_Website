<?php
  session_start();
  // $id=$_SESSION['id'];
  $name=$_SESSION['name'];
  $gname=$_SESSION['gname'];
  $gcnic=$_SESSION['gcnic'];
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
    Hamarey Bachey</br>Student Accompanying Form 
  </div>
  <form action="accompanying.php" method="post" class="all">
    
               <!-- Student Information  --  Start -->

    <div class="personal" style="border-top: 10px solid black;">
    <div class="top">
        <h2>Student Information</h2>
      </div>
      <div class="table">
        <table>
          <tr>
            <th><p>ID</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="id" required></td>
          </tr>
          <tr>
            <th><p>Name</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="name" value="<?php echo $name ?>" readonly></td>
          </tr>
          <tr>
            <th><p>CLass</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="class"></td>
          </tr>
        </table>
      </div>
    </div>

               <!-- Student Information  --  Start -->
               
               <!-- Accompanying Guardian Information  --  Start -->

    <div class="personal">
      <div class="top">
        <h2>Accompanying Guardian Information</h2>
      </div>
      <div class="table">
        <table>
          <tr>
            <th><p>ID</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" value="<?php echo $gcnic ?>" readonly></td>
          </tr>
          <tr>
            <th><p>Name</p></th>
            <th>:</th>
            <td colspan="2"><input type="text" name="name" value="<?php echo $name ?>" readonly></td>
          </tr>
          <tr>
            <th><p>Gender</p></th>
            <th>:</th>
            <td colspan="2">
              <input type="radio" id="male" name="pregnant" value="Yes"  required>
              <label for="male">Yes || </label>
              <input type="radio" id="female" name="pregnant" value="No" required>
              <label for="female">No</label>
            </td>
          </tr>
          <tr>
            <th><p>Reason for <br>Parents Absence</p></th>
            <th>:</th>
            <td colspan="2"><textarea type="text" name="area" style="border: 2px solid black;" cols="40" rows="5"></textarea></td>
          </tr>
        </table>
      </div>
    </div>

               <!-- Accompanying Guardian Information --  Finish -->    

    <div class="personal" style="border-bottom: 10px solid black;">
      <div class="arrange">
        <input type="submit" name="submit" value="Save and Next">
        <!-- <a href="accompanying.html"><input type="text" value="Next"></a> -->
      </div>  
    </div>
  </form>

</body>
</html>