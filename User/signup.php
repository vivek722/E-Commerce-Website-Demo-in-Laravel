<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <?php
        include('include/head.php');
    ?>
</head>
<body>
    <?php
        include('include/header.php');
        include('include/connection.php');

        if(isset($_POST['signupbutton'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            $str = "select * from users where email = '$email'";
            $qry = mysqli_query($conn,$str);

            if(mysqli_num_rows($qry) > 0) {
                echo "<script>alert('Email address is already exists!');</script>";
            } else if($password != $cpassword) {
                echo "<script>alert('Password does not match!');</script>"; 
            } else {
                $str = "INSERT INTO users (fname,lname,email,password) values('$fname','$lname','$email','$password')";
                $qry = mysqli_query($conn,$str);
                $userid = mysqli_insert_id($conn);
                session_start();
                $_SESSION['userid'] = $userid;
                echo "<script>window.location.href='index.php';</script>"; 
            }
        }
    ?>
    <main>
        <div class="main-container">
            <div class="page-heading">
                <h2>Sign Up</h2>
            </div>
            <div class="login-form-container">
                <form action="" method="post" name="signupform">
                    <div class="login-form-wrapper">
                        <div class="login-form-element-group">
                            <label class="login-form-label" for="">First Name</label>
                            <input type="text" name="fname" class="login-form-input" placeholder="Enter Your First Name" required>
                        </div>
                        <div class="login-form-element-group">
                            <label class="login-form-label" for="">Last Name</label>
                            <input type="text" name="lname" class="login-form-input" placeholder="Enter Your Last Name" required>
                        </div>
                        <div class="login-form-element-group">
                            <label class="login-form-label" for="">Email</label>
                            <input type="email" name="email" id="email" class="login-form-input" placeholder="Enter The Email Address" required>
                        </div>
                        <div class="login-form-element-group">
                            <label class="login-form-label" for="">Password</label>
                            <input type="password" name="password" class="login-form-input" placeholder="Enter The Password" required>
                        </div>
                        <div class="login-form-element-group">
                            <label class="login-form-label" for="">Confirm Password</label>
                            <input type="password" name="cpassword" class="login-form-input" placeholder="Enter The Password" required>
                        </div>
                        <div class="login-form-element-group">
                            <button name="signupbutton" class="button1">Sign Up</button>
                            <a href="login.php" style="color:#fff;text-decoration:none;font-family:verdana;margin-top:10px; color:var(--black)">Already Registered? <span style="color:var(--black)">Login</span></a>
                        </div>
                    </div>
                </form>
            </div>          
        </div>
    </main>

    <?php
        include('include/footer.php');
    ?>
    <script src="js/main.js"></script>

    <script>
        
    </script>
</body>
</html>