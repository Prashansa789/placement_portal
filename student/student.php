<?php
require_once "../config.php";
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("location: login.php");
}
if(isset($_SESSION['email']))
{
    $email=$_SESSION['email'];
}
?>

<?php 
$fname=$lname=$roll=$semail=$pemail=$dob=$cpi=$dept=$course=$phno=$gender="";
$fname_err=$lname_err=$roll_err=$semail_err=$pemail_err=$dob_err=$cpi_err=$dept_err=$course_err=$phno_err=$gender_err="";
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if email is empty
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $gender=$_POST["age"];
    $dob=$_POST["dob"];
    $cpi=$_POST["cpi"];
    $dept=$_POST["eligible_dept"];
    $course=$_POST["eligible_course"];
    $phno=$_POST["phnno"];
    


// Check for password
//rollno	Fname	Lname	Semail	gender	dob	cpi	dept	course	phNumber	appliNo

// If there were no errors, go ahead and insert into the data
$sql1= "SELECT rollno FROM student WHERE Semail = '$email'";
$stmt1 = $conn->prepare($sql1);
if($stmt1){
    if($stmt1->execute()){
   //mysqli_stmt_store_result($stmt);
     if($stmt1->rowCount() == 1)
      {
       $sql2="UPDATE student SET Fname='$fname',Lname='$lname',Semail='$email',gender='$gender',dob='$dob',cpi='$cpi',dept='$dept',course='$course',phNumber='$phno' where Semail='$email'"; 
       $result=$conn->query($sql2);
      


      }
   else if($stmt1->rowCount() == 0){
     $sql2="INSERT INTO student (Fname,Lname,Semail,gender,dob,cpi,dept,course,phNumber) VALUES('$fname','$lname','$email','$gender','$dob','$cpi','$dept','$course','$phno') "; 
     $result=$conn->query($sql2);
   }
  // $_SESSION['rollno']=; 
 }
}

}

   $sql4="SELECT * FROM student WHERE Semail='$email'";
   $result4=$conn->query($sql4);
   if($result4->rowCount() > 0){
   $row4=$result4->fetch(PDO::FETCH_ASSOC);
   $fname=$row4["Fname"];
   $lname=$row4["Lname"];
   $Semail=$row4["Semail"];
   $gender=$row4["gender"];
   $dob=$row4["dob"];
   $cpi=$row4["cpi"];
   $dept=$row4["dept"];
   $course=$row4["course"];
   $phno=$row4["phNumber"];
   $_SESSION['rollno']=$row4["rollno"] ;
   $_SESSION['eligible_dept']=$dept;
   $_SESSION['eligible_course']=$course; 
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
    <link rel="stylesheet" href="styleinfo.css"> 
    <style>
input{
    font-size:18px;
}
a{ font-size:30px;
    text-decoration: none;
    color:blue;
}
        </style>
</head>
<body>
    <div class="container">
    <div class="box1" >
    <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png"><div class="content">
 <!-- <p>Home</p> -->
<p><a href="job_app1.php">Job Application</a></p>
<p><a href="got_offer.php">Got Offer</a></p>

</div>
    </div>


    <div class="box2" >
        <nav class="navbar">
           <div>
            <h1>Placement Portal</h1></div>
            <!-- <div class="logOut"> -->
            <button style="background-color:aquamarine"><a href="logout.php">LogOut</a></button>
            <!-- <a href="logout.php">LogOut</a> -->
</nav>
            <div class="profile"  >Profile</div>
            <div class="basicinfo">Basic Information</div><hr>
                <div class="info">
                <form action="" method="POST">
                    <div>
  <div class="maindiv"> <div><label for="fname">First Name:</label>
  <input type="text" id="fname" name="fname" value="<?php echo $fname   ?> "></div>
  <div><label for="lname">Last Name:</label>
  <input type="text" id="lname" name="lname" value="<?php echo $lname   ?> "></div></div>

  <div class="maindiv"><div><label for="iitgmail">IITG Email:</label>
  <input type="email" id="email1" name="email1" value="<?php echo $email   ?> " readonly></div>
  <!-- //<div><label for="personalemail">Personal Email:</label>
  <input type="email" id="email2" name="email2"></div></div> -->

  
  <div><label for="phoneNo">Mobile Number:</label>
  <input type="text" id="phoneNo" name="phnno" value="<?php echo $phno   ?> "></div></div>

 <div class="maindiv"> <div><span>Gender:</span>
  <input type="radio" id="male" name="age" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="age" value="female">
  <label for="female">Female</label>
  <input type="radio" id="others" name="age" value="others">
  <label for="others">Others</label></div>
  <div><label for="dob">Date of birth:</label>
  <input type="date" id="dob" name="dob"></div></div>


  <div class="multivalued" >
  <div class="eligibledept_course" style="display:flex;">
                            <div class="eligible_dept">
                                <label><div>Eligible Departments</div></label>
                                <!-- <input type="text" name="eligible_dept" placeholder="Enter Eligible Departments" required> -->
                                <select name="dept" class="multiselect" style="font-size:18px;" required >
                                    <!-- <option value="" disabled selected>Select Eligible Departments</option> -->
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                                    <option value="Physics">Physics</option>
                                    <option value="Chemistry">Chemistry</option>
                                    <option value="Electronics & Electrical Engineering">Electronics & Electrical Engineering</option>
                                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                                    <option value="Civil Engineering">Civil Engineering</option>
                                    <option value="Design">Design</option>
                                    <option value="Chemical Engineering">Chemical Engineering</option>
                                </select>
                            </div>
                            <div class="eligible_course" style="padding-left:200px;" >
                                <label><div>Eligible Courses</div></label>
                                <!-- <input type="text" name="eligible_course" placeholder="Enter Eligible Courses" required> -->
                                <select name="course" class="multiselect" style="font-size:18px;" required >
                                    <!-- <option value="" disabled selected>Select Eligible Course</option> -->
                                    <option value="MSc Mathematics & Computing">MSc Mathematics & Computing</option>
                                    <option value="MSc Physics">MSc Physics</option>
                                    <option value="MSc Chemistry">MSc Chemistry</option>
                                    <option value="BTech CSE">BTech CSE</option>
                                    <option value="BTech EEE">BTech EEE</option>
                                    <option value="BTech Mechanical Engineering">BTech Mechanical Engineering</option>
                                    <option value="BTech Civil Engineering">BTech Civil Engineering</option>
                                    <option value="Design (BDes)">Design (BDes)</option>
                                    <option value="BTech Chemical Engineering">BTechChemical Engineering</option>
                                    <option value="MTech CSE">MTech CSE</option>
                                    <option value="MTech EEE">MTech EEE</option>
                                </select>
                            </div>
                        </div></div>


 <div class="maindiv"> <div><label for="cpi" value="<?php echo $cpi   ?> ">CPI:</label>
  <input type="text" id="cpi" name="cpi">
  </div>
  <button type="submit" value="Submit">Save changes</button></div>


</form>  
                </div>
         </div>
         </div>
</body>
</html>