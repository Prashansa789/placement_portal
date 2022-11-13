<?php
require_once "../config.php";
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("location: login.php");
}
?>

<?php 
$fname=$lname=$roll=$semail=$pemail=$dob=$cpi=$dept=$course=$phno=$gender="";
$fname_err=$lname_err=$roll_err=$semail_err=$pemail_err=$dob_err=$cpi_err=$dept_err=$course_err=$phno_err=$gender_err="";
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if email is empty
    if(empty(trim($_POST["fname"]))){
        $fname_err = "First name cannot be blank";
    }

    else{
        $fname=trim($_POST['fname']);
    }
    $lname=trim($_POST['lname']);

    if(empty(trim($_POST["email1"]))){
        $semail_err = "Email name cannot be blank";
    }

    else{
        $semail=trim($_POST['email1']);
    }

    if(empty(trim($_POST["email2"]))){
        $pemail_err = "There should be an alternative mail";
    }

    else{
        $pemail=trim($_POST['email2']);
    }
    if(empty(trim($_POST["rollno"]))){
        $roll_err = "Roll No cannot be blank";
    }

    else{
        $roll=trim($_POST['rollno']);
    }
    if(empty(trim($_POST["phnno"]))){
        $phno_err = "Contact No cannot be blank";
    }

    else{
        $phno=trim($_POST['phnno']);
    }
    if(empty(trim($_POST["age"]))){
        $gender_err = "Gender cannot be blank";
    }

    else{
        $gender=trim($_POST['age']);
    }
    if(empty(trim($_POST["dob"]))){
        $dob_err = "Date Of Birth cannot be blank";
    }

    else{
        $dob=trim($_POST['dob']);
    }



    if(empty(trim($_POST["dept"]))){
        $dept_err = "Department cannot be blank";
    }

    else{
        $dept=trim($_POST['dept']);
    }

    if(empty(trim($_POST["cpi"]))){
        $cpi_err = "cpi cannot be blank";
    }

    else{
        $cpi=trim($_POST['cpi']);
    }
    if(empty(trim($_POST["course"]))){
        $course_err = "course cannot be blank";
    }

    else{
        $course=trim($_POST['course']);
    }


    


// Check for password


// If there were no errors, go ahead and insert into the database

if(empty($fname_err) && empty($lname_err) && empty($roll_err) && empty($semail_err) && empty($pemail_err) && empty($dob_err) && empty($cpi_err) && empty($dept_err) && empty($course_err) && empty($phno_err) && empty($gender_err)  )
{
    $sql = "INSERT INTO student (Fname, Lname,rollno,Semail,dob,cpi,dept,course,phNumber,gender) VALUES ('$fname','$lname','$roll','$semail','$dob','$cpi','$dept','$course','$phno','$gender')";
    $stmt = $conn->prepare($sql);
    if ($stmt)
    {
        
       $stmt->execute();

    }
   // mysqli_stmt_close($stmt);
}
$conn=null;

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

        </style>
</head>
<body>
    <div class="container">
    <div class="box1" ><div class="content">
 <p>Home</p><p>Registration</p><p>preference List</p><p>Job Application</p><p>User Guide</p>
<a href="job_ap.php">Job Application</a></div>
    </div>


    <div class="box2" >
        <nav class="navbar">
           <div> <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
            <h2 >Placement Portal</h2></div>
            <!-- <div class="logOut"> -->
            <a href="logout.php">LogOut</a>
</nav>
            <div class="profile"  >Profile</div>
            <div class="basicinfo">Basic Information</div><hr>
                <div class="info">
                <form action="" method="POST">
                    <div>
  <div class="maindiv"> <div><label for="fname">First Name:</label>
  <input type="text" id="fname" name="fname"></div>
  <div><label for="lname">Last Name:</label>
  <input type="text" id="lname" name="lname"></div></div>

  <div class="maindiv"><div><label for="iitgmail">IITG Email:</label>
  <input type="email" id="email1" name="email1"></div>
  <div><label for="personalemail">Personal Email:</label>
  <input type="email" id="email2" name="email2"></div></div>

  <div class="maindiv"><div><label for="roolno">Roll No:</label>
  <input type="text" id="rollno" name="rollno"></div>
  <div><label for="phoneNo">Mobile Number:</label>
  <input type="text" id="phoneNo" name="phnno"></div></div>

 <div class="maindiv"> <div><span>Gender:</span>
  <input type="radio" id="male" name="age" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="age" value="female">
  <label for="female">Female</label>
  <input type="radio" id="others" name="age" value="others">
  <label for="others">Others</label></div>
  <div><label for="dob">Date of birth:</label>
  <input type="date" id="dob" name="dob"></div></div>

  <div class="maindiv"><div><label for="dept">Department:</label>
  <input type="text" id="dept" name="dept"></div>
  <div><label for="course">Course:</label>
  <input type="text" id="course" name="course"></div></div>

 <div class="maindiv"> <div><label for="cpi">CPI:</label>
  <input type="real" id="cpi" name="cpi">
  </div>
  <button type="submit" value="Submit">Save changes</button></div>


</form>  
                </div>
         </div>
         </div>
</body>
</html>