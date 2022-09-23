<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="student.css">
  <title>Hamarey Bachey</title>
</head>
<body>
  <div class="nav">
    Hamarey Bachey</br>Student Admission Form 
  </div>
  <div class="all">
    <div class="personal" style="border-top: 10px solid black;">
      <div class="top">
        <h2>Student Information</h2>
      </div>
      <div class="table">
        <table>
          <tr>
            <th><p>Name</p></th>
            <th>:</th>
            <?php
              session_start();
              $name=$_SESSION['var1'];
            ?>
            <td colspan="2"><input type="text" name="name" value="<?php echo $name ?>"></td>
          </tr>
          <tr>
            <th><p>Date of Birth</p></th>
            <th>:</th>
            <td colspan="2"><input type="date" name="date"></td>
          </tr>
          <tr>
            <th><p>Gender</p></th>
            <th>:</th>
            <td colspan="2">
              <input type="radio" id="male" name="gender" value="Male">
              <label for="male">Male || </label>
              <input type="radio" id="female" name="gender" value="Female">
              <label for="female">Female || </label>
              <input type="radio" id="other" name="gender" value="Other">
              <label for="other">Other</label>
            </td>
            
          </tr>
        </table>
      </div>
    </div>
    <div class="personal">
      <div class="top">
        <h2>Parent Information</h2>
      </div>
    </div>
  </div>  
</body>
</html>
