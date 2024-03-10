<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <?php
    include('include/head.php');
    ?>
</head>

<body>
    <?php include "include/header.php"; ?>
    <?php include "include/connection.php"; ?>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $mststr = "SELECT * from ordermast where id = $id";
        $mstqry = mysqli_query($conn, $mststr);
        $mstdata = mysqli_fetch_array($mstqry);

        $userdata = mysqli_fetch_array(mysqli_query($conn, "select * from users where id =" . $mstdata['userid']));
    } else {
        echo "<script>window.location.href='orders.php'</script>";
    }

    if (isset($_POST['cancelbtn'])) {
        $cancelstr = "update ordermast set status = 2 where id = $id";
        mysqli_query($conn, $cancelstr);
        echo "<script>window.location.href='orders.php'</script>";
    }

    if (isset($_POST['donebtn'])) {
        $donestr = "update ordermast set status = 1 where id = $id";
        mysqli_query($conn, $donestr);
        echo "<script>window.location.href='orders.php'</script>";
    }
    ?>
    <main>
        
        <div class="p-4">
            <table class="table table-striped">
                <tr>
                    <th>Date</th>
                    <td><?= $mstdata['date'] ?></td>
                </tr>
                <tr>
                    <th>Serial</th>
                    <td><?= $mstdata['serial'] ?></td>
                </tr>
                <tr>
                    <th>User</th>
                    <td><?= $userdata['fname'] . ' ' . $userdata['lname'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $userdata['email'] ?></td>
                </tr>
                <tr>
                    <th>House No</th>
                    <td><?= $mstdata['addr1'] ?></td>
                </tr>
                <tr>
                    <th>Street</th>
                    <td><?= $mstdata['addr2'] ?></td>
                </tr>
                <tr>
                    <th>City / Pincode</th>
                    <td><?= $mstdata['city'] ?></td>
                </tr>
                <tr>
                    <th>State</th>
                    <td><?= $mstdata['state'] ?></td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td class='text-success'>&#8377;<?= $mstdata['amount'] ?>.00</td>
                </tr>
            </table>
        </div>

        <div class="p-4">
            <table class="table table-striped">
                <tr>
                    <th class="text-center">Srl</th>
                    <th class="text-center">Product</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Rate</th>
                    <th class="text-center">Amount</th>
                </tr>
                <?php
                $orddetstr = "select * from oderdet where parid = $id";
                $orddetqry = mysqli_query($conn, $orddetstr);
                $i = 0;
                $ttlqty = 0;
                while ($orddetdata = mysqli_fetch_assoc($orddetqry)) {
                    $i++;
                    $ttlqty = $ttlqty + $orddetdata['qty'];
                    $prostr = "select * from products where id =" . $orddetdata['proid'];
                    $proqry = mysqli_query($conn, $prostr);
                    $prodata = mysqli_fetch_array($proqry);
                ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td><?= $prodata['name'] ?></td>
                        <td class="text-center"><?= $orddetdata['qty'] ?></td>
                        <td style="text-align:right">&#8377;<?= $prodata['price'] ?>.00</td>
                        <td style="text-align:right">&#8377;<?= $orddetdata['qty'] * $prodata['price'] ?>.00</td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <th class="text-center" colspan="2">Total</th>
                    <th style="text-align:center"><?= $ttlqty ?></th>
                    <th class="text-center"></th>
                    <th style="text-align:right">&#8377;<?= $mstdata['amount'] ?>.00</th>
                </tr>
            </table>
        </div>
        <div class="p-4">
            <form action="" method="post">
                <button class="btn btn-danger" name="cancelbtn">Cancel</button>
                <button class="btn btn-success" name="donebtn">Done</button>
            </form>
        </div>
    </main>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
    <script>
        activateLink('orders');
    </script>
</body>

</html>