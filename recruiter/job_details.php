<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <link rel="stylesheet" href="styleInfo.css">
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
a{
  text-decoration: none;
  color:blue;
}
</style> 
</head>
<body>
<div class="container">
    <div class="box1" ><div class="content">
    <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
 <p><a href="recruiter.php">Home</a>

 <p><a href="job1.php">Post Job</a></p>
 <p><a href="applied_stud.php">Applied Students</a></p> 
<!-- <a href="job_ap.php">Applied Students</a> -->
</div>
    </div>
    
    <div class="box2" >
        <nav class="navbar">
           <div>
            <h1 >Placement Portal</h1></div>
            <!-- <div class="logOut"> -->
            <!-- <a href="logout.php">LogOut</a> -->
            <button style="background-color:aquamarine"><a href="rlogout.php">LogOut</a></button>


</nav>
<br>
<h1 style="padding-left:450px;">Job Details</h1>
<br>
<form action="logout.php" method="POST">
<!-- <button type="submit">Log out</button> -->
</form>
<?php
session_start();

if(!isset($_SESSION['rloggedin']) || $_SESSION['rloggedin']!= true){
    header("location: rlogin.php");
}
require_once "../config.php";
$email=$_SESSION["remail"];
$stmt0="SELECT Cid from company WHERE Cemail='$email'";
$result0=$conn->query($stmt0);
if($data0=$result0->fetch()){
    $cid=$data0['Cid'];
}
//echo"$cid";
$ID=0;
$stmt="SELECT * FROM job";
$result=$conn->query($stmt);
if($result->rowCount() > 0){
    echo '<table class="table">';
    echo "<thead>";
    echo "<tr>";
     echo "<th>Job ID</th>";
     echo "<th>Job Profile</th>";
     echo "<th>Salary</th>";
     echo "<th>Vacancy</th>";
     echo "</tr>";
     echo "</thead>";
     echo "<tbody>";
     while($row=$result->fetch(PDO::FETCH_ASSOC)){
    
        if($row['Cid']==$cid){
            $ID++;
            echo"<tr>";
            echo "<td>" . $ID . "</td>";
            echo "<td>" . $row['job_title'] . "</td>";
            echo "<td>" . $row['salary'] . "</td>";
            echo "<td>" . $row['vacancy'] . "</td>";  
            echo "</tr>";
        }
     }
     echo "</tbody>";
     echo "</table>";
 
}
?>
</body>
</html>
