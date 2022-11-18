<?php
session_start();

if(!isset($_SESSION['rloggedin']) || $_SESSION['rloggedin']!= true){
    header("location: rlogin.php");
}

require_once "../config.php";
$login_email = $_SESSION['remail'];
$companyID = $_SESSION['cid'];
echo"$companyID";

$jobtitle = "";
$jobdesc = "";
$salary = "";
$vacancy = "";
$eligiblecourse; $eligibledept;
$cpicriteria = "";
$examdate = "";
$examduration = "";
$examtype = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $jobtitle = trim($_POST["jobtitle"]);
    $jobdesc = trim($_POST["jobDescription"]);
    $salary = trim($_POST["salary"]);
    $vacancy = trim($_POST["vacancy"]);
    $eligiblecourse = ($_POST["eligible_course"]); 
    $eligibledept = ($_POST["eligible_dept"]);
    $cpicriteria = trim($_POST["Ecpi"]);
    $examdate = trim($_POST["ExamDate"]);
    $examduration = trim($_POST["ExamDuration"]);
    $examtype = trim($_POST["Exam_type"]);
    
    $sql = "INSERT INTO job (Cid, job_title, job_description, vacancy, salary, eligible_cpi) VALUES ('$companyID', '$jobtitle', '$jobdesc', '$vacancy', '$salary', '$cpicriteria')";
    $stmt = $conn->prepare($sql);
    if ($stmt){
        $stmt->execute();
        $jobID = "";
        $sql1 = "SELECT jobid FROM job WHERE Cid = '$companyID' and job_title='$jobtitle'";
        $stmt1 = $conn->prepare($sql1);
        if($stmt1){
            $stmt1->execute();
            if($row = $stmt1->fetch()){
                $jobID = $row['jobid'];
            }

            $sql2 = "INSERT INTO examination VALUES ( '$jobID','$companyID', '$examdate', '$examduration', '$examtype')";
            $conn->exec($sql2);
            foreach($eligibledept as $dept){
                $sql3 = "INSERT INTO eligibledept (jobid, eligible_dept) VALUES ('$jobID', '$dept')";
                $conn->exec($sql3);
            }
            
            foreach($eligiblecourse as $course){
                $sql3 = "INSERT INTO eligiblecourse (jobid, eligible_course) VALUES ('$jobID', '$course')";
                $conn->exec($sql3);
            }
        }
        $stmt1 = null;
    }
    $stmt = null;
} 
$conn = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement-Portal</title>
    <link rel="stylesheet" href="styleCinfo.css"> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <style> 
    ul li a{
        text-decoration: none;
        color:blue;
    }
</style>
</head>
<body>
    <div class="container">
    <div class="box1" ><img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
        <div class="content" style="color:blue;">
        <ul class="left_list">
 <li><a href="recruiter.php">Home</a></li>
 <li> <a href="job_details.php">Job Details</a></li>
<!-- <li><a href="#">preference List</a></li> -->
 <li><a href="applied_stud.php">Applied Students</a></li>
 <!-- <li> <a href="#">User Guide</a></li> -->
 <!-- <li> <a href="rlogout.php">LogOut</a></li> -->
</ul>
</div>
    </div>


    <div class="box2" >
        <nav class="navbar">
            <!-- <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png"> -->
            <h1 style="font-size:27px;">Placement Portal</h1>
            <div class="logOut">
            <button><a href="rlogout.php">LogOut</a></button></div>
            </nav>
            <div class="profile"  >JOB</div><hr>
                <div class="info">
                <form action="" method="POST">
                    <div>
<div class="maindiv"> <div><label for="fname">Job Title:</label>
  <input type="text" id="jobtitle" name="jobtitle"></div><div>
    <label for="">Salary:</label>
  <input type="number" id="salary" name="salary"></div>
</div>
  <div class="maindiv"><div><label for="jobDescription">Description:</label>
  <input type="text" id="jobDescription" name="jobDescription"></div>
  <div><label for="vacancy">Vacancy:</label>
  <input type="number" id="vacancy" name="vacancy"></div></div>

  <div class="maindiv">
  <div class="eligible_dept">
                                <label>Eligible Departments</label>
                                <!-- <input type="text" name="eligible_dept" placeholder="Enter Eligible Departments" required> -->
                                <select name="eligible_dept[]" class="multiselect" required multiple>
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
                            <div class="eligible_course">
                                <label>Eligible Courses</label>
                                <!-- <input type="text" name="eligible_course" placeholder="Enter Eligible Courses" required> -->
                                <select name="eligible_course[]" class="multiselect" required multiple>
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
  </div>

  <div class="maindiv"> <div><label for="Ecpi">Cpi Criteria:</label>
  <input type="text" id="Ecpi" name="Ecpi"></div></div>

  <div class="Examination" style="font-size:26px;">Examination</div><hr>
  <div class="maindiv"> <div><label for="ExamDate">Exam Date:</label>
  <input type="date" id="ExamDate" name="ExamDate"></div>
  <div><label for="ExamDuration">Exam Duration:</label>
  <input type="text" id="ExamDuration" name="ExamDuration"></div>
</div>

<div class="maindiv"> 
    <div style="display:block;"><span>Exam Type:</span>
  <input type="radio" id="online" name="Exam_type" value="online">
  <label for="online">Online</label>
  <input type="radio" id="offline" name="Exam_type" value="offline">
  <label for="offline">Offline</label></div>
  <div>
  <button type="submit" value="Submit">Save changes</button></div>
</div>

</form>  
                </div>
         </div>
         
         </div>

         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script>
    function openNav() {
    document.querySelector(".left").style.width = "200px";
    }
    function closeNav() {
    document.querySelector(".left").style.width = "0";
    }
    $(document).ready(function(){
    $(".multiselect").select2({
    // maximumSelectionLength: 2
    }); });
    </script>  -->
</body>
</html>
