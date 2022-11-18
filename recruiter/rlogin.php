<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['remail']))
{
    header("location: recruiter.php");
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
    $sql = "SELECT id, Cemail, Cpassword FROM company_login WHERE Cemail = '$email'";
    $stmt = $conn->prepare($sql);
    
    
    // Try to execute this statement
    if($stmt->execute()){
        // mysqli_stmt_store_result($stmt);
        if($stmt->rowCount() == 1)
                {
                    // mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if($row = $stmt->fetch()){
                        $id = $row['id'];
                        $email = $row['Cemail'];
                        $hashed_password = $row['Cpassword'];
                    }
                    
                    if($stmt->fetch())
                    $param_password = password_hash($password, PASSWORD_DEFAULT);
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["remail"] = $email;
                            $_SESSION["rid"] = $id;
                            $_SESSION["rloggedin"] = true;

                            //Redirect user to welcome page
                            header("location: recruiter.php");
                            
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
    <link rel="stylesheet" href="rstyles.css">

    <style>
form{
    text-align:center;
    font-size:20px;
}

button{
    margin-top:20px;
    margin-right:110px;
}
img{ width:80px;
    height:80px;
    }
</style>    


</head>
<body>
    <div class="background-image"></div>
    <div class="all-content">
<nav class="navbar">
<img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
<h1 class="heading" style="justify-content:center;">Placement Portal</h1>


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
  <p>New User? <a href="rregister.php">Register</a> </p>
  <p>Trouble Logging in ? <a href="mailto:admin@iitg.ac.in">Contact Admin</a> </p>
  
 
</form>

</div>

<footer class="footer">
<h4>Contact :admin@iitg.ac.in<br> Phone No: XXX</h></footer>
    </div>
</body>