<?php
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleinfo.css"> 
</head>
<body>
<div class="container">
    <div class="box1" >
    <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png"><div class="content">
 <!-- <p>Home</p><p>Registration</p><p>preference List</p><p>Job Application</p><p>User Guide</p> -->
<a href="student.php">Home</a>
<!-- <p><a href="got_offer.php">Got Offer</a></p></div> -->
<p><a href="job_app1.php">Job Application</a></p></div>
    </div>
    
    <div class="box2" >
        <nav class="navbar">
           <div> 
            <h1>Placement Portal</h1></div>
            <button style="background-color:aquamarine"><a href="logout.php">LogOut</a></button>
            <!-- <div class="logOut"> -->
            <!-- <a href="logout.php">LogOut</a> -->
</nav><br>
<div>
    <?php
    require_once "../config.php";
    $roll=$_SESSION['rollno'];
    $stmt="SELECT * FROM gets WHERE rollno='$roll'";
    $result=$conn->query($stmt);
    
    if($result->rowCount() > 0){
        echo "<div>";
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            
                $jobid=$row['jobid'];
                $stmt1="SELECT Cid,job_title FROM job WHERE jobid='$jobid'";
                $result1=$conn->query($stmt1);
                if($row1=$result1->fetch()){
                    $cid=$row1['Cid'];
                    $jobtitle=$row1['job_title'];
                }
                    $stmt2="SELECT CName FROM company WHERE Cid='$cid'";
                    $result2=$conn->query($stmt2);
                    if($row2=$result2->fetch()){
                        $cname=$row2['CName'];
                    
                    
                }
            
        
echo "<h2 style=text_allign:center;>"."  Congratulations to you for getting a job in ".$cname." for " .$jobtitle. " profile ."."<h2>" ;
    }}
?>
</div>
</body>
</html>