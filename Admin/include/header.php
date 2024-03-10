<?php
session_start();

include('include/connection.php');

if (!isset($_SESSION['adminid'])) {
    echo "<script>window.location.href='login.php';</script>";
} else {
    $userstr = "select * from admin where id = " . $_SESSION['adminid'];
    $userqry = mysqli_query($conn, $userstr);
    $userdata = mysqli_fetch_array($userqry);
}
?>

<header>
    <div class="logo">
        <h1><span style="color:var(--secondary)">Shiv</span>Aansh</h1>
    </div>
    <div class="menu">
        <div class="links">
            <a href="index.php" class="link" id="home">Home</a>
            <a href="manageproducts.php" class="link" id="manageproducts">Manage Products</a>
            <a href="orders.php" class="link" id="manageproducts">Orders</a>
            <a href="users.php" class="link" id="manageproducts">Users</a>
            <a href="logout.php" class="link" style="color:var(--secondary)" id="applications"><?= $userdata['name'] ?></a>
        </div>
    </div>
</header>