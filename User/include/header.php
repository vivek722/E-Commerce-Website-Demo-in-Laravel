<header>
    <div class="logo">
        <h1><span style="color:var(--secondary)">Shiv</span>Aansh</h1>
    </div>
    <div class="menu">
        <div class="links">
            <a href="index.php" class="link" id="home">Home</a>
            <a href="products.php" class="link" id="products">Products</a>
            <a href="aboutus.php" class="link" id="aboutus">About Us</a>
            <a href="contact.php" class="link" id="contact">Contact</a>
            
        </div>
    </div>
    <div class="menu">
        <?php
        include('include/connection.php');
        session_start();
        if (!isset($_SESSION['userid'])) {
        ?>
            <div class="links">
                <a href="signup.php" class="link">Sign Up</a>
                <a href="login.php" class="link">Login</a>
            </div>
        <?php
        } else {
            $userstr = "select * from users where id =" . $_SESSION['userid'];
            $userqry = mysqli_query($conn, $userstr);
            $userdata = mysqli_fetch_array($userqry);
        ?>
            <div class="links">
                <a href="account.php" class="link">Welcome, <?= $userdata['fname'] ?> <?= $userdata['lname'] ?></a>
                <a href="cart.php" class="link">Cart</a>
            </div>
        <?php
            $conn->close();
        }
        ?>
    </div>
</header>