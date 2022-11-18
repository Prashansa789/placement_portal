<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['role']) && ($_POST['role'])=="student"){
    header("Location: student/student.php");
    }

elseif(isset($_POST['role']) && ($_POST['role'])=="recruiter"){
     header("Location: recruiter/recruiter.php");
}
else {
     header("Location: index.php");
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PlacementPortal</title>
   <link rel="stylesheet" href="student/styles.css">

<style>
.heading{ font-size:26px;
     margin-right:700px;
}
</style>

</head>
<body>
<div class="all-content">
<nav class="navbar">
<img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
<h1 class="heading" style="margin-left:5px">Placement Portal</h1>


</nav>
 <h1 class="heading">Welcome To IITG Placement Portal</h1>
<div class="mainBox">
<h3 style="font-size:28px; margin-left:5px;">Select a role</h3>
<form action="" method="POST">
  <input type="radio" id="student" name="role" value="student">
  <label for="student" style="font-size:22px;">Student</label><br>
  <input type="radio" id="recruiter" name="role" value="recruiter">
  <label for="recruiter" style="font-size:22px;">Recruiter</label><br>
  <button type="submit"  >Continue</button>
 
</form>

</div>

<footer class="footer">
<h4>Contact :admin@iitg.ac.in<br> Phone No: XXX</h></footer>
</div>
</body>
