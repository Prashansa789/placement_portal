<?php
require_once "../config.php";
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("location: rlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <link rel="stylesheet" href="styleCinfo.css"> 
    <style>

        </style>
</head>
<body>
    <div class="container">
    <div class="box1" ><div class="content">
 <p>Home</p><p>Registration</p><p>preference List</p><p>Job Application</p><p>User Guide</p>
<p><a href="job.php">Post Job</a></p></div>
 
    </div>

    <div class="box2" >
        <nav class="navbar">
            <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
            <h3 >Placement Portal</h3><div class="logOut"><form action="rlogout.php" method="POST">
            <button type="submit"  value="logout" style="font-size:18px; background-color:aquamarine;" >LogOut</button></div>
</form> </nav>
            <div class="profile"  >Company Information</div><hr>
           
                <div class="info">
                <form action="" method="POST">
                    <div>
<div class="maindiv"> 
  <div><label for="fname">Company Name:</label>
  <input type="text" id="cname" name="cname"></div>
  <div><label for="cemail">Company Email:</label>
  <input type="email" id="cemail" name="cemail"></div>
</div>

  <div class="maindiv"><div><label for="location1">Location1:</label>
  <input type="text" id="location1" name="location1"></div>
  <div><label for="location2">Location 2:</label>
  <input type="text" id="location2" name="location2"></div></div>

  <div class="maindiv"><div><label for="conatct">Contact:</label>
  <input type="number" id="contact" name="contact"></div></div>
<div class="maindiv"><div>
  <button type="submit" value="Submit">Save changes</button></div><div>
  
</div>
</div>


</form>  
                </div>
         </div>










         </div>
</body>
</html>