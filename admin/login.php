<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login Form Starts Here -->
            <form action="" method="POST" class="text-center">
                <p class="text-left">Username:</p> 
                <input type="text" name="username" placeholder="Enter Username" required><br><br>
                <p class="text-left">Password:</p> 
                <input type="password" name="password" placeholder="Enter Password" required><br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>
            </form>
            <!-- Login Form Ends Here -->

            <p class="text-center">Created By - <a href="www.vijaythapa.com">Yash Gangan</a></p>
        </div>

    </body>
</html>

<?php 

    // Check whether the Submit Button is Clicked or Not
    if(isset($_POST['submit'])) {
        // Process for Login
        // 1. Get the Data from Login form
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password = md5($_POST['password']); // Encrypting password with MD5
        $password = mysqli_real_escape_string($conn, $raw_password);

        // 2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        // 3. Execute the Query
        $res = mysqli_query($conn, $sql);

        // 4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count == 1) {
            // User Available and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; // To check whether the user is logged in or not and logout will unset it

            // Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/');
        } else {
            // User not Available and Login Fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match. $count</div>";

            // Redirect to Login Page
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>
