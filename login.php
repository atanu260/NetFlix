<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `sign_up` WHERE username = '$username' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
    
      $row = mysqli_fetch_assoc($select_users);
      
      if($row['user_type'] == 'user'){
      
         $_SESSION['username'] = $row['username'];
         $_SESSION['password'] = $row['password'];
         
         
         header('location:man_child - Copy.html');

        }
        
    }
   
   else{
    echo "<script>alert('woops you have entered wrong username or password')</script>";
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
        <div class="title">Login</div>
        <div class="content">
            <form action="" method="POST">

                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" name="username" required>
                    </div>


                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" placeholder="Enter your password" name="password" required>
                    </div>

                </div>

        </div>
        <div class="button">
            <input type="submit" value="submit" name="submit">
        </div>
        <p class="login-register-text">Don't have an account? <a href="signup.php">signup Here</a>.</p>
        </form>

    </div>
    

</body>

</html>