<?php 

include 'config.php';

error_reporting(0);

session_start();


if (isset($_POST['submit']))
{

    $username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);  
	$cpassword = md5($_POST['cpassword']);
    $fullname=$_POST['fullname'];
    $phonenumber=$_POST['phonenumber'];
    $gender=$_POST['gender'];
    $user_type = $_POST['user_type'];
    
    if ($password == $cpassword)
    {

        $sql = "SELECT * FROM sign_up WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

        if (($result)>0) {
            # code...
            echo "<script>alert('User already exist')</script>";
        }
        if (!$result->num_rows > 0)
        {
            $sql = "INSERT INTO sign_up (fullname,username, email,phonenumber, password,cpassword,user_type)
			VALUES ('$fullname','$username', '$email','$phonenumber', '$password','$cpassword','$user_type')";
            $result = mysqli_query($conn, $sql);
        }
        if ($result)
        {
            echo "<script>alert('Congrats.... Welcome to NetPrime')</script>";
             $username = "";
             $email = "";
             $fullname="";
             $phonenumber="";
             $_POST['password'] = "";
             $_POST['cpassword'] = "";
            
            
            header('Location:login.php');
        }
        else
        {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
       

    }
    else
    {
            echo "<script>alert('Password Not Matched.')</script>";
     }
}
    

?>   
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="singup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Sign-Up</div>
        <div class="content">
            <form action="signup.php" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" name="fullname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" name="username"  required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email" name="email"  required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" name="phonenumber"  required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" placeholder="Enter your password" name="password"  required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="text" placeholder="Confirm your password" name="cpassword" required>
                    </div>
                    <select name="user_type" class="box">
                    <option value="user">user</option>
                    
                     </select>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <input type="radio" name="gender" id="dot-3">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit"  value="submit" name="submit">
                </div>
                <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
            </form>
        </div>
    </div>

</body>

</html>



