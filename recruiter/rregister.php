<?php
require_once "../config.php";

$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "email cannot be blank";
    }
    else{
        
            $sql = "SELECT id FROM company_login WHERE Cemail = :Cemail";
            $stmt = $conn->prepare($sql);
            if($stmt)
            {
                $stmt->bindParam(":Cemail", $param_email);
    
                // Set the value of param email
                $param_email = trim($_POST['email']);
    
                // Try to execute this statement
                if($stmt->execute()){
                    //mysqli_stmt_store_result($stmt);
                    if($stmt->rowCount() == 1)
                    {
                        $email_err = "This email is already exist!!"; 
                    }
                    else{
                        $email = trim($_POST['email']);
                    }
                }
                else{
                    echo "Something went wrong";
                }
            }
           // mysqli_stmt_close($stmt);
        }

    


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 8){
    $password_err = "Password cannot be less than 8 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['cpassword'])){
    $confirm_password_err = "Password and confirm password should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($email_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO company_login (Cemail, Cpassword) VALUES (:Cemail, :Cpassword)";
    $stmt = $conn->prepare($sql);
    if ($stmt)
    {
        $stmt->bindParam(":Cemail", $param_email);
        $stmt->bindParam(":Cpassword", $param_password);

        // Set these parameters
        $param_email = $email;
        $param_password =password_hash($password,PASSWORD_DEFAULT);

        // Try to execute the query
        if ($stmt->execute())
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    //mysqli_stmt_close($stmt);
}
$conn=null;
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
   
</style>
</head>
<body>
   <div class="background-image"></div>
    <div class="all-content">
<nav class="navbar">
<img src="https://www.iitg.ac.in/ace/ACE/Assets/IITG_White.png">
<h3>Placement Portal</h3>
</nav>

 <h1 class="heading">Welcome To IITG Placement Portal</h1>
<div class="mainBox" style="height:50vh">
<h3 style="font-size:28px; margin-left:70px ">Please Register Here</h3>
<form action="" method ="POST">
  <div>
  <label for="email" style="margin-right:95px">Email:</label><br>
  <input type="email" id="email" name="email" required>
  <span> <?php echo "<br>"."<h5>$email_err</h5>"; ?></span></div>
  <div>
  <label for="password" style="margin-right:70px">Password:</label><br>
  <input type="password" id="password" name="password" required>
  <span> <?php echo "<br>"."<h5>$password_err</h5>"; ?></span></div>
  <div>
  <label for="cpassword" style="margin-right:3spx">Confirm Password:</label></br>
  <input type="password" id="cpassword" name="cpassword" required>
  <span> <?php echo "<br>". "<h5>$confirm_password_err</h5>"; ?></span></div>
 
  <button type="submit" name="submit" value="Register now" class="form-btn">Register</button>
  <p>Alredy have an account? <a href="rlogin.php">login now</a></p>
</form>

</div>

<footer class="footer">
contact</footer></div>
</body>