<?php
//This script will handle login
session_start();
// check if the user is already logged in
if(isset($_SESSION['email']))
{
    $email=$_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <link rel="stylesheet" href="styleinfo.css">
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
</style> 
</head>
<body>
<div class="container">
    <div class="box1" ><div class="content">
 <p>Home</p><p>Registration</p><p>preference List</p><p>Job Application</p><p>User Guide</p>
<a href="job_ap.php">Job Application</a>
<p><a href="got_offer.php">Get Job</a></p></div>
    </div>
    
    <div class="box2" >
        <nav class="navbar">
           <div> <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
            <h2 >Placement Portal</h2></div>
            <!-- <div class="logOut"> -->
            <a href="logout.php">LogOut</a>
</nav>
<form action="logout.php" method="POST">
<button type="submit">Log out</button>
</form>
<div class="Container">
    <?php
    require_once "../config.php";
    if(isset($_REQUEST['apply'])){
      $jobid1=$_REQUEST['applyId'];
      $rollno1=$_REQUEST['applyRoll'];
      $cid1=$_REQUEST['applyCid'];
    $sql3="INSERT INTO apply_for (jobid,rollno,Cid) VALUES ('$jobid1','$rollno1','$cid1')";
    $stm= $conn->query($sql3);
    $stm=null;
    }
    if(isset($_REQUEST['withdraw'])){
      $jobid=$_REQUEST['withdrawId'];
      $rollno=$_REQUEST['withdrawRoll'];
      $cid=$_REQUEST['withdrawCid'];
      $sql4="DELETE FROM apply_for WHERE jobid='$jobid' AND rollno='$rollno'";
      $stmt= $conn->query($sql4);
      $stmt=null;

    }
    
    $sql= "SELECT * FROM job";
    $result= $conn->query($sql);
    $ID=0;
    $display=true;
    if($result->rowCount() > 0){
        echo '<table class="table">';
        echo "<thead>";
        echo "<tr>";
         echo "<th>Job ID</th>";
         echo "<th>Company Name</th>";
         echo "<th>Job Profile</th>";
         echo "<th>Exam Details</th>";
         echo "<th>Apply</th>";
        //  echo "<th>Withdraw</th>";
         echo "</tr>";
         echo "</thead>";
         echo "<tbody>";
         while($row=$result->fetch(PDO::FETCH_ASSOC)){
            $jobid=$row['jobid'];
            $sql2 = "SELECT * FROM student WHERE Semail = '$email'";
            $st= $conn->query($sql2);
            if($dataStudent=$st->fetch()){ //for each result, do the following
              $roll=$dataStudent['rollno'];
              $dept=$dataStudent['dept'];
              $course=$dataStudent['course'];   
          }

          $sql3="SELECT eligible_dept FROM eligibledept WHERE jobid='$jobid' AND eligible_dept='$dept'";
           $stmt3=$conn->query($sql3);
           $sql4="SELECT eligible_course FROM eligiblecourse WHERE jobid='$jobid' AND eligible_course='$course'";
           $stmt4=$conn->query($sql4);
           if($stmt3->rowCount()==1 && $stmt4->rowCount()==1){
            $ID++;
            echo "<tr>";
             echo "<td>" . $ID . "</td>";
            $jobid=$row["jobid"];
            $cid=$row["Cid"];
            $sql1 = "SELECT CName FROM company WHERE Cid = '$cid'";
            $r= $conn->query($sql1);
            if($data=$r->fetch()){ //for each result, do the following
              $cname=$data['CName'];
              
          }
          
            echo "<td>" . $cname . "</td>";
            echo "<td>" . $row["job_title"] . "</td>";
            // echo "<td>" . $row["id"] . "</td>";
           $s="SELECT * FROM examination WHERE jobid='$jobid'";
           $s1=$conn->query($s);
           if($e=$s1->fetch()){
            $examDt=$e['exam_date'];
            $duration=$e['duration'];
            $examType=$e['Examtype'];
           }
           echo"<td>"."Examdate :". $examDt ."<br>" ."Exam Duration :". $duration . "<br>" ."Exam Type :" . $examType . "</td>";
           
           $stmt7=$conn->query("SELECT jobid,rollno FROM apply_for WHERE jobid='$jobid' AND rollno='$roll'");
           if($stmt7->rowCount()>0){
            $display=false;
           }
           else $display=true;
            if($display){echo '<td><form action="" method="POST"><input type="hidden" name="applyId" value=' . $row["jobid"] . '>
                            <input type="hidden" name="applyRoll" value=' . $roll . '>
                            <input type="hidden" name="applyCid" value=' . $cid . '>
                   <input type="submit" class="btn" name="apply" value="Apply"></form></td>';
            }
            else{echo '<td><form action="" method="POST"><input type="hidden" name="withdrawId" value=' . $row["jobid"] . '>
                     <input type="hidden" name="withdrawRoll" value=' . $roll . '>
                     <input type="hidden" name="withdrawCid" value=' . $cid . '>
                  <input type="submit" class="btn" name="withdraw" value="Withdraw"></form></td>';
            echo "</tr>";
            }
         }}
        echo "</tbody>";
        echo "</table>";
    }
    ?>
         
         
</body>
</html>
