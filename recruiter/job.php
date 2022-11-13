<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <link rel="stylesheet" href="styleCinfo.css"> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>

        </style>
</head>
<body>
    <div class="container">
    <div class="box1" ><div class="content">
 <p>Home</p><p>Registration</p><p>preference List</p>
    <p>Job Application</p><p>User Guide</p></div>
 <a href="rlogout.php">LogOut</a>
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
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script >
      $(document).ready(function(){
    $(".multiselect").select2({
    // maximumSelectionLength: 2
});});
    </script>
</body>
</html>
