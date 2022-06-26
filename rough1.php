<?php 

//include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: signup.php");
}
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
    $fullname=$_POST['fullname'];
    $phonenumber=$_POST['phonenumber'];
    $gender=$_POST['gender'];

    if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (fullname,username, email,phonenumber, password,cpassword)
					VALUES ('$fullname','$username', '$email','$phonenumber', '$password','$cpassword')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script>alert('Congrats.... Welcome to NetFlix')</script>";
                        $username = "";
                        $email = "";
                        $_POST['password'] = "";
                        $_POST['cpassword'] = "";
                    } else {
                        echo "<script>alert('Woops! Something Wrong Went.')</script>";
                    }
                } else {
                    echo "<script>alert('Woops! Email Already Exists.')</script>";
                }
                
            } else {
                echo "<script>alert('Password Not Matched.')</script>";
            }
        }

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="singup.css">
    <link>
</head>

<body>
    <div class="container">
        <div class="title">singup</div>
        <div class="content">
            <form action="signup.php" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" name="fullname"
                            value="<?php echo $fullname; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" name="username"
                            value="<?php echo $username; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email" name="email" value="<?php echo $email; ?>"
                            required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" name="phonenumber"
                            value="<?php echo $phonenumber; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" placeholder="Enter your password" name="password"
                            value="<?php echo $_POST['$password']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="text" placeholder="Confirm your password" name="cpassword"
                            value="<?php echo $_POST['$cpassword;'] ?>" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" value="<?php echo $gender; ?>" id="dot-1">
                    <input type="radio" name="gender" value="<?php echo $gender; ?>" id="dot-2">
                    <input type="radio" name="gender" value="<?php echo $gender; ?>" id="dot-3">
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
                    <input type="submit" name="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</body>

</html>