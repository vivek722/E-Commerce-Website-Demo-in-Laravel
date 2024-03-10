<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
    <?php
        include('include/head.php');
    ?>
</head>
<body>
    <?php
    include('include/header.php');
        include('include/connection.php');

        if(isset($_POST['loginbutton'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $str = "select * from users where email = '$email' and password = '$password'";
            $qry = mysqli_query($conn,$str);
            
            if(mysqli_num_rows($qry) > 0) {
                session_start();
                $logindata = mysqli_fetch_array($qry);
                $_SESSION['userid'] = $logindata['id'];
                echo "<script>window.location.href='index.php';</script>"; 
            } else {
                echo "<script>alert('Wrong Email or Password!');</script>";
            }
            
        }
    ?>
    <main>
        <div class="main-container">
            <div class="page-heading">
                <h2>Login</h2>
            </div>
            <div class="login-form-container">
                <form action="" method="post" name="signupform">
                    <div class="login-form-wrapper">
                        <div class="login-form-element-group">
                            <label class="login-form-label" for="">Email</label>
                            <input type="email" name="email" id="email" class="login-form-input" placeholder="Enter The Email Address" required>
                        </div>
                        <div class="login-form-element-group">
                            <label class="login-form-label" for="">Password</label>
                            <input type="password" name="password" class="login-form-input" placeholder="Enter The Password" required>
                        </div>
                        <div class="login-form-element-group">
                            <button name="loginbutton" class="button1">Login</button>
                            <a href="signup.php" style="color:#fff;text-decoration:none;font-family:verdana;margin-top:10px; color:var(--black)">Not Registered Yet? <span style="color:var(--black)">Sign Up</span></a>
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