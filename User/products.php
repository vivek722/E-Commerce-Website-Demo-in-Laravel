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
    <link rel="stylesheet" href="css/events.css">
</head>

<body>
    <?php
    include('include/header.php');
    ?>

    <?php
    include('include/connection.php');
    ?>

    <?php
    if (isset($_POST['addtocartbtn'])) {
        $proid = $_POST['addtocartbtn'];

        if (isset($_SESSION['userid'])) {
            $cartstr = "select * from cart where proid = $proid and userid =" . $_SESSION['userid'] . " and  close <> 'Y'";
            $cartqry = mysqli_query($conn, $cartstr);
            if (mysqli_num_rows($cartqry) > 0) {
                $updatecartstr = "update cart set qty = qty+1 where proid = $proid and userid =" . $_SESSION['userid'] . " and  close <> 'Y'";
                $updatecartqry = mysqli_query($conn, $updatecartstr);
            } else {
                $insertcartstr = "INSERT into cart (proid,userid,qty) values ($proid," . $_SESSION['userid'] . ",1)";
                $insertcartqry = mysqli_query($conn, $insertcartstr);
            }
        } else {
            echo "<script>window.location.href='login.php'</script>";
        }
    }
    ?>

    <main>
        <div class="main-container">
            <div class="events-container">

                <?php
                $qry = "select * from products where status = 'Y' order by id DESC";
                $sql = mysqli_query($conn, $qry);
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <div class="event-card">
                        <div class="event-image" style="text-align:center">
                            <span class="event-serial">#<?= $data['id'] ?></span>
                            <img src="../Admin/upload/<?= $data['img'] ?>" alt="">
                        </div>
                        <div class="event-details">
                            <div class="event-header">
                                <h4><?= $data['name'] ?></h4>
                            </div>
                            <div class="event-game">
                                <span>&#8377;<?= $data['price'] ?>.00</span>
                            </div>
                            <div class="event-more">
                                <form action="" method="post">
                                    <div class="text-center"><button class="button1" name="addtocartbtn" value="<?= $data['id'] ?>">Add to cart</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>

    <?php
    include('include/footer.php');
    ?>

    <script src="js/main.js"></script>

    <script>
        activateLink('products');
    </script>
</body>

</html>