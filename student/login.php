<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['email']))
{
    header("location: student.php");
    exit;
}
require_once "../config.php";

$email = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter email + password</br>";
    }
    else{
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT sid, Semail, Spassword FROM student_login WHERE Semail = '$email'";
    $stmt = $conn->prepare($sql);
    
    
    // Try to execute this statement
    if($stmt->execute()){
        
        if($stmt->rowCount() == 1)
                {
                    if($row=$stmt->fetch()){ //for each result, do the following
                        $id=$row['id'];
                        $email=$row['Semail'];
                        $hashed_password=$row['Spassword'];
                    }
                    
                    $param_password = password_hash($password, PASSWORD_DEFAULT);
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["email"] = $email;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: student.php");
                            
                        }
                        else {
                          $err = "Wrong Password Please try again.</br>";
                        }
                    }

                }
                else{
                  $err = "No such user exist</br>";
                }

    }
}    


}


?>
<!DOCTYPE html>
<html>
<head>
    <title>PlacementPortal</title>
    <link rel="stylesheet" href="styles.css">

    <style>
form{
    text-align:center;
    font-size:20px;
}

button{
    margin-top:20px;
    margin-right:110px;
}

</style>    


</head>
<body>
    <div class="background-image"></div>
    <div class="all-content">
<nav class="navbar">
<img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
<h3 class="heading">Placement Portal</h3>


</nav>
 <h1 class="heading">Welcome To IITG Placement Portal</h1>
<div class="mainBox" style="height:50vh ">
<h3 style="font-size:28px; margin-left:70px ">Please login Here:</h3>
<form action="" method ="POST">
  <div>
    <label for="email" style="margin-right:95px">Email: </label><br>
    <input type="email" id="email" name="email">
  </div>
  <div>
    <label for="password"style="margin-right:70px">Password: </label><br>
    <input type="password" id="password" name="password">
  </div>
  <button type="submit">Submit</button>
  <span> <?php echo"<br>". "<h5>$err</h5>"?></span>
  <p>New User? <a href="register.php">Register</a> </p>
  <p>Trouble Logging in ? <a href="mailto:admin@iitg.ac.in">Contact Admin</a> </p>
  
  
 
</form>

</div>

<footer class="footer">
<h4>Contact :admin@iitg.ac.in<br> Phone No: XXX</h></footer>
    </div>
</body>