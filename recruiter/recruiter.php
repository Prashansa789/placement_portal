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
if ($_SERVER['REQUEST_METHOD'] == "POST"){
         $cname=trim($_POST['cname']);
         $location1=trim($_POST['location1']);
         $location2=trim($_POST['location2']);
          $contact=trim($_POST['contact']); 
  
   // If there were no errors, go ahead and insert into the database

    $sql = "INSERT INTO company (CName,Cemail,contact) VALUES ('$cname','$cemail','$contact')";
    $stmt = $conn->prepare($sql);
    if ($stmt){
       $stmt->execute();
       $cid="";
    $sql2="SELECT Cid FROM company where Cemail='$cemail' ";
    $stmt1=$conn->prepare($sql2);
       if($stmt1)
       {
        $stmt1->execute();
        if($row=$stmt1->fetch())
        {
          $cid=$row['Cid'];
        }
       
    $sql1="INSERT INTO company_location(Cid,location1,location2) VALUES ('$cid','$location1','$location2')";
    $stmt4 = $conn->prepare($sql1);
    if ($stmt4){
      $stmt4->execute();}
       }
  }
   // mysqli_stmt_close($stmt);
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
  </style>
</head>

<body>
  <div class="container">
    <div class="box1">
      <div class="content">
        <p>Home</p>
        <p>Registration</p>
        <p>preference List</p>
        <p>Job Application</p>
        <p><a href="applied_stud.php">Applied Students</a></p>
        <p><a href="job1.php">Post Job</a></p>
        <a href="rlogout.php">LogOut</a>
      </div>

    </div>

    <div class="box2">
      <nav class="navbar">
        <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
        <h3>Placement Portal</h3>
        <a href="rlogout.php">LogOut</a>
      </nav>
      <div class="profile">Company Information</div>
      <hr>

      <div class="info">
        <form action="" method="POST">
          <div>
            <div class="maindiv">
              <div><label for="cname">Company Name:</label>
                <input type="text" id="cname" name="cname">
              </div>
              <div><label for="cemail">Company Email:</label>
                <input type="email" id="cemail" name="cemail" value="<?php echo $cemail   ?> " readonly>
              </div>
            </div>

            <div class="maindiv">
              <div><label for="location1">Location1:</label>
                <input type="text" id="location1" name="location1">
              </div>
              <div><label for="location2">Location 2:</label>
                <input type="text" id="location2" name="location2">
              </div>
            </div>

            <div class="maindiv">
              <div><label for="conatct">Contact:</label>
                <input type="number" id="contact" name="contact">
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