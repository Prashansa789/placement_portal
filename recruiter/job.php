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
 <p>Home</p><p>Registration</p><p>preference List</p><p>Job Application</p><p>User Guide</p></div>
    </div>


    <div class="box2" >
        <nav class="navbar">
            <img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
            <h3 >Placement Portal</h3><div class="logOut">
            <button type="submit"  value="logout" style="font-size:18px; background-color:aquamarine;" >LogOut</button></div>
            </nav>
            <div class="profile"  >JOB</div><hr>
            <!-- <div class="basicinfo">Basic Information</div><hr> -->
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

  <div class="maindiv"><div><label for="Ecpi">Cpi Criteria:</label>
  <input type="text" id="Ecpi" name="Ecpi"></div>
  <div><label for="EligibleDept">Eligible Department:</label>
  <input type="text" id="EligibleDept" name="EligibleDept"></div></div>

  <div class="maindiv"> <div><label for="EligibleCourse">Eligible Course:</label>
  <input type="text" id="EligibleCourse" name="EligibleCourse"></div></div>

  <div class="Examination" style="font-size:26px;"  >Examination</div><hr>
  <div class="maindiv"> <div><label for="ExamDate">Exam Date:</label>
  <input type="date" id="ExamDate" name="ExamDate"></div>
  <div><label for="ExamDuration">Exam Duration:</label>
  <input type="text" id="ExamDuration" name="ExamDuration"></div>
</div>

<div class="maindiv"> 
    <div style="display:block;"><span>Exam Type:</span>
  <input type="radio" id="online" name="online" value="online">
  <label for="online">Online</label>
  <input type="radio" id="offline" name="offline" value="offline">
  <label for="offline">Offline</label></div>
  <div>
  <button type="submit" value="Submit">Save changes</button></div>
</div>


</form>  
                </div>
         </div>
         
         </div>
</body>
</html>
