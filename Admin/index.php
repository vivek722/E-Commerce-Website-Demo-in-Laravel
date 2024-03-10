<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php
    include('include/head.php');

    ?>
</head>

<body>
    <?php
    include('include/header.php');
    ?>
    <section class="dashboard">
        <div class="box">
            <?php
            $sql = "SELECT * FROM `ordermast`";
            $result = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($result)
            ?>
            <h3><?= $total ?></h3>
            <p>Total orders</p>
            <a href="vieworder.php" class="btn">see orders</a>
        </div>

        <div class="box">
            <?php
            $sql = "SELECT * FROM `products`";
            $result = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($result)
            ?>
            <h3><?= $total ?></h3>
            <p>Total products</p>
            <a href="manageproducts.php" class="btn">see products</a>
        </div>

        <div class="box">
            <?php
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($result)
            ?>
            <h3><?= $total ?></h3>
            <p>Total users</p>
            <a href="users.php" class="btn">see users</a>
        </div>
    </section>
    <?php
    include('include/footer.php');
    ?>



    <script src="js/main.js"></script>

    <script>
        activateLink('home');
    </script>
</body>

</html>