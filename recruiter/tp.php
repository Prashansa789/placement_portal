<?php
//This script will handle login
session_start();

// check if the comapny is already logged in
if(isset($_SESSION['remail']))
{
    $email=$_SESSION['remail'];
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
<?php

    require_once "../config.php";


    if(isset($_REQUEST['give_job'])){
        $jobid1=$_REQUEST['jobid'];
        $rollno1=$_REQUEST['rollno'];
        $sql9="SELECT * FROM gets WHERE jobid='$jobid1' and rollno='$rollno1'";
        $res9=$conn->query($sql9);
        if($res9->rowCount() == 0){
      $sql3="INSERT INTO gets (jobid,rollno) VALUES ('$jobid1','$rollno1')";
      $stm= $conn->query($sql3);}
      $stm=null;
      }


    $cid="";
    $sql5= "SELECT * FROM company where Cemail='$email'";
    $s1=$conn->query($sql5);
    if($e=$s1->fetch()){
     $cid=$e["Cid"]; }

    $sql= "SELECT * FROM apply_for where Cid='$cid'";
    $result= $conn->query($sql);
    $ID=0;
    if($result->rowCount() > 0){
        echo '<table class="table">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
         echo "<th>Name</th>";
         echo "<th>Job Profile</th>";
         echo "<th>Email</th>";
         echo "<th>Contact-No</th>";
         echo "<th>Give Job</th>";
         echo "</tr>";
         echo "</thead>";
         echo "<tbody>";
         while($row=$result->fetch(PDO::FETCH_ASSOC)){
            $rollno=$row['rollno'];
            $jobid=$row['jobid'];
            // $cid=$row['Cid'];
            $sql2 = "SELECT * FROM student WHERE rollno = '$rollno'";
            $st= $conn->query($sql2);
            if($dataStudent=$st->fetch()){ //for each result, do the following
              $Fname=$dataStudent['Fname'];
              $Lname=$dataStudent['Lname'];
              $dept=$dataStudent['dept'];
              $course=$dataStudent['course'];
              $semail=$dataStudent['Semail'];
              $Scontact=$dataStudent['phNumber'];  
          }
          $sql3="SELECT * FROM job  WHERE jobid='$jobid'";
          $st=$conn->query($sql3);
          if($dataStudent=$st->fetch()){ //for each result, do the following
            $job_title=$dataStudent['job_title'];
         }
          if($st->rowCount()==1){
            $ID++;
            echo "<tr>";
             echo "<td>" . $ID . "</td>";
             echo "<td>" . $Fname ."\n".$Lname. "</td>";
             echo "<td>" . $job_title . "</td>";
             echo "<td>" . $semail . "</td>"; 
             echo"<td>".$Scontact. "</td>";
            //  echo"<td>".$examDt."\n".$duration."\n".$examType. "</td>";
             echo '<td><form action="" method="POST">
             <input type="hidden" name="jobid" value=' . $jobid . '>
                            <input type="hidden" name="rollno" value=' . $rollno . '>
                   <input type="submit" class="btn" name="give_job" value="Give Job"></form></td>'; 
          }
    }




    }


    ?>


















</body>
</html>