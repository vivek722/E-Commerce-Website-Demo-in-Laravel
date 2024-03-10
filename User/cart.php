<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <?php
    include('include/head.php');
    ?>
    <style>
        #homeBanner {
            background: url('../user/image/img1.jpg');
            background-position: center;
            background-size: 100%;
            height: 500px;
        }
    </style>
</head>

<body>

    <?php
    include('include/header.php');
    ?>

    <?php
    include('include/connection.php');
    ?>


    <?php
    if (isset($_POST['pluspro'])) {
        $cartid = $_POST['pluspro'];
        $pluscartstr = "select * from cart where id = $cartid";
        $pluscartqry = mysqli_query($conn, $pluscartstr);
        $pluscart = mysqli_fetch_array($pluscartqry);

        $updatecart = "update cart set qty = qty+1 where id = $cartid";
        mysqli_query($conn, $updatecart);
    }

    if (isset($_POST['minpro'])) {
        $cartid = $_POST['minpro'];
        $mincartstr = "select * from cart where id = $cartid";
        $mincartqry = mysqli_query($conn, $mincartstr);
        $mincart = mysqli_fetch_array($mincartqry);


        if ($mincart['qty'] == 1) {
            $updatecart = "delete from  cart where id = $cartid";
        } else {
            $updatecart = "update cart set qty = qty-1 where id = $cartid";
        }
        mysqli_query($conn, $updatecart);
    }
    ?>


    <?php
    $str = "select * from cart where userid =" . $_SESSION['userid'] . " and  close <> 'Y'";
    $qry = mysqli_query($conn, $str);
    $ttlitem = mysqli_num_rows($qry);
    ?>

    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="products.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Shopping cart</p>
                                            <p class="mb-0">You have <?= $ttlitem ?> items in your cart</p>
                                        </div>
                                    </div>

                                    <?php
                                    $ttlprice = 0;

                                    while ($result = mysqli_fetch_assoc($qry)) {
                                        $prodetailsstr = "select a.* from products as a
                                        where a.id =" . $result['proid'];
                                        $prodetailsqry = mysqli_query($conn, $prodetailsstr);
                                        $prodetails = mysqli_fetch_array($prodetailsqry);
                                        $ttlprice = $ttlprice + ($result['qty'] * $prodetails['price']);
                                    ?>

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img src="../admin/upload/<?= $prodetails['img'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5><?= $prodetails['name'] ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 120px;">
                                                            <h5 class="fw-normal mb-0"><?= $result['qty'] ?></h5>
                                                        </div>
                                                        <div style="width: 80px;">
                                                            <h5 class="mb-0">&#8377;<?= $prodetails['price'] ?></h5>
                                                        </div>
                                                        <div style="width: 80px;">
                                                            <form action="" method="post">
                                                                <button value="<?= $result['id'] ?>" name="minpro" class="mb-0 btn btn-sm btn-danger">-</button>
                                                                <button value="<?= $result['id'] ?>" name="pluspro" class="mb-0 btn btn-sm btn-primary">+</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="col-lg-5">

                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Address details</h5>

                                            </div>
                                            <form class="mt-4" method="post" action="checkout.php">
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" name="addr1" class="form-control form-control-lg" siez="17" placeholder="House no." />
                                                    <label class="form-label" for="typeName">House No.</label>
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" name="addr2" class="form-control form-control-lg" siez="17" placeholder="Street" />
                                                    <label class="form-label" for="typeName">Street</label>
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" name="city" class="form-control form-control-lg" siez="17" placeholder="City / Pincode" />
                                                    <label class="form-label" for="typeName">City / Pincode</label>
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" name="state" class="form-control form-control-lg" siez="17" placeholder="State" />
                                                    <label class="form-label" for="typeName">State</label>
                                                </div>

                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Subtotal</p>
                                                    <p class="mb-2">&#8377;<?= $ttlprice ?></p>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Shipping</p>
                                                    <p class="mb-2">&#8377;40.00</p>
                                                </div>

                                                <div class="d-flex justify-content-between mb-4">
                                                    <p class="mb-2">Total(Incl. taxes)</p>
                                                    <p class="mb-2">&#8377;<?= $ttlprice + 40 ?></p>
                                                </div>

                                                <button name="checkoutbtn" value="<?= $ttlprice ?>" class="btn btn-info btn-block btn-lg">
                                                    <div class="d-flex justify-content-between">
                                                        <span>&#8377;<?= $ttlprice + 40 ?></span>
                                                        <span> Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                    </div>
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include('include/footer.php');
    ?>

    <script src="../user/bootstrap/js/bootstrap.min.js"></script>
    <script src="../user/js/main.js"></script>
    <script>
        activateLink('cart');
    </script>
</body>

</html>