<?php
require_once "../config.php";
session_start();
if(!isset($_SESSION['rloggedin']) || $_SESSION['rloggedin']!= true){
    header("location: rlogin.php");
}
?>

<?php 
$cname=$cemail=$location1=$location2=$contact="";
$cemail=$_SESSION['remail'];
//$_SESSION['cid']=$cid;
if ($_SERVER['REQUEST_METHOD'] == "POST"){
         $cname=trim($_POST['cname']);
         $location1=trim($_POST['location1']);
         $location2=trim($_POST['location2']);
          $contact=trim($_POST['contact']) ; 
  
   // If there were no errors, go ahead and insert into the database
   $sql1= "SELECT Cid FROM company WHERE Cemail = '$cemail'";
   $stmt1 = $conn->prepare($sql1);
   if($stmt1){
       if($stmt1->execute()){
      //mysqli_stmt_store_result($stmt);
        if($stmt1->rowCount() > 0)
         {
          $sql2="UPDATE company SET CName='$cname',Cemail='$cemail',contact='$contact' where Cemail='$cemail'"; 
          $result=$conn->query($sql2);
          $sql3= "SELECT Cid FROM company WHERE Cemail = '$cemail'";
          $result1=$conn->query($sql3);
          $row=$result1->fetch(PDO::FETCH_ASSOC);
          $cid=$row["Cid"];
          $sql3="UPDATE company_location SET location1='$location1',location2='$location2' WHERE Cid='$cid'";
          $result2=$conn->query($sql3);


         }
      else if($stmt1->rowCount() == 0){
        $sql2="INSERT INTO company (CName,Cemail,contact) VALUES('$cname','$cemail','$contact') "; 
        $result=$conn->query($sql2);
        $sql3= "SELECT Cid FROM company WHERE Cemail = '$cemail'";
          $result1=$conn->query($sql3);
        $row=$result1->fetch(PDO::FETCH_ASSOC);
        $cid=$row["Cid"];
        $sql3="INSERT INTO company_location (Cid,location1,location2) VALUES('$cid','$location1','$location2')";
        $result2=$conn->query($sql3);
          
      }
    }
  }
 
}

      $sql4="SELECT * FROM company WHERE Cemail='$cemail'";
      $result4=$conn->query($sql4);
      if($result4->rowCount() > 0){
      $row4=$result4->fetch(PDO::FETCH_ASSOC);
      $cid4=$row4["Cid"];
      $_SESSION['cid']=$cid4;
      $cname=$row4["CName"];
      $contact=$row4["contact"];

      $sql5="SELECT * FROM company_location WHERE Cid='$cid4'";
      $result5=$conn->query($sql5);
      $row5=$result5->fetch(PDO::FETCH_ASSOC);
      $location1=$row5["location1"];
      $location2=$row5["location2"];

      }
  
  $conn=null;





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
    a{
      text-decoration: none;
      color:blue;
    }
    input{
      font-size:20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="box1">
    <img src="https://event.iitg.ac.in/icann2019/Proceedings_LaTeX/2019/IITG_White.png">
      <div class="content" style="font-size:30px; color:blue;">
        <p>Home</p>
        <!--<p>Registration</p>
        <p>preference List</p>
        <p>Job Application</p>
        <p>User Guide</p> -->
        <p><a href="job1.php">Post Job</a></p>
        <p><a href="job_details.php">Job Details</a></p>
        <p style="color:blue;"><a href="applied_stud.php">Applied Students</a></p>
        <!-- <a href="rlogout.php">LogOut</a> -->
      </div>

    </div>

    <div class="box2">
      <nav class="navbar">
        <!-- <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png"> -->
        <h1 style="font-size:30px; margin-left:20px;">Placement Portal</h1>
       <button style="background-color:aquamarine"><a href="rlogout.php">LogOut</a></button>
        <!-- <div class="logOut">
          <form action="rlogout.php" method="POST">
            <button type="submit" value="logout" style="font-size:18px; right-margin:30px background-color:aquamarine;">LogOut</button>
        </div> -->
        <!-- </form> -->
      </nav>
      <div class="profile">Company Information</div>
      <hr>

      <div class="info">
        <form action="" method="POST">
          <div>
            <div class="maindiv">
              <div><label for="cname">Company Name:</label>
                <input type="text" id="cname" name="cname" value="<?php echo $cname   ?>" >
              </div>
              <div><label for="cemail">Company Email:</label>
                <input type="email" id="cemail" name="cemail" value="<?php echo $cemail   ?> " readonly>
              </div>
            </div>

            <div class="maindiv">
              <div><label for="location1">Location1:</label>
                <input type="text" id="location1" name="location1" value="<?php echo $location1   ?>">
              </div>
              <div><label for="location2">Location 2:</label>
                <input type="text" id="location2" name="location2" value="<?php echo $location2   ?>">
              </div>
            </div>

            <div class="maindiv">
              <div><label for="conatct">Contact:</label>
                <input type="number" id="contact" name="contact" value="<?php echo $contact   ?>">
              </div>
            </div>
            <div class="maindiv">
              <div>
                <button type="submit" value="Submit">Save changes</button>
              </div>
              <div>

              </div>
            </div>


        </form>
      </div>
    </div>

  </div>
</body>

</html>