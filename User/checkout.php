<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('include/connection.php');
    session_start();

    if (isset($_POST['checkoutbtn'])) {
        $addr1 = $_POST['addr1'];
        $addr2 = $_POST['addr2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $ttlprice = $_POST['checkoutbtn'];

        $maxserialstr = "SELECT max(serial) as serial from ordermast";
        $maxserialqry = mysqli_query($conn, $maxserialstr);
        $maxserial = mysqli_fetch_array($maxserialqry);

        $serial = $maxserial['serial'] + 1;

        $insertordstr = "INSERT into ordermast (userid,serial,date,amount,addr1,addr2,city,state)
        values(" . $_SESSION['userid'] . ", $serial, '" . date('Y-m-d') . "', $ttlprice, '$addr1', '$addr2', '$city', '$state')";
        $insertordqry = mysqli_query($conn, $insertordstr);

        $parid = mysqli_insert_id($conn);

        $cartdetailsstr = "SELECT * from cart where close <> 'Y' and userid =" . $_SESSION['userid'];
        $cartdetailsqry = mysqli_query($conn, $cartdetailsstr);

        while ($cartresult = mysqli_fetch_assoc($cartdetailsqry)) {
            $proid = $cartresult['proid'];
            $qty = $cartresult['qty'];
            $insorddet = "INSERT into oderdet (parid,proid,qty) values($parid,$proid,$qty)";
            mysqli_query($conn, $insorddet);

            $updatecart = "update cart set close = 'Y' where id =" . $cartresult['id'];
            mysqli_query($conn, $updatecart);
        }
    }
    ?>
    
    <center>
        <h1>Order Generated Successfully</h1>
        <h3>Your Order Number is : <?= $serial ?></h3>
        <a href="index.php">Go to Home Page</a>
    </center>
</body>

</html>