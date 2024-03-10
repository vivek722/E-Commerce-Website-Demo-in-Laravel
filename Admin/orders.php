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
    $searchtext = "";
    if (isset($_POST['searchbtn'])) {
        $searchtext = $_POST['searchtxt'];
    }
    ?>

    <main>
        
        <div class="main-container">
            <div class="page-heading">
                <h2>Order</h2>
            </div>
           
            </form>
            <div class="p-4">
                <table class="table table-striped">
                    <tr>
                        <th class="text-center">View</th>
                        <th class="text-center">Serial</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">User</th>
                        <th class="text-center">City</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Status</th>
                    </tr>
                    <?php
                    if ($searchtext == "") {
                        $str = "select * from ordermast order by id DESC";
                    } else {
                        $str = "select * from ordermast where
                    (serial like '%$searchtext%') or (date like '%$searchtext%') or
                    (city like '%$searchtext%') or (state like '%$searchtext%') or 
                    (amount like '%$searchtext%') order by id DESC";
                    }
                    $qry = mysqli_query($conn, $str);

                    while ($result = mysqli_fetch_assoc($qry)) {
                        $userdata = mysqli_fetch_array(mysqli_query($conn, "select * from users where id =" . $result['userid']));
                        $status = "";
                        if ($result['status'] == 0) {
                            $status = "<b class='text-primary'>Pending</b>";
                        } else if ($result['status'] == 1) {
                            $status = "<b class='text-success'>Done</b>";
                        } else if ($result['status'] == 2) {
                            $status = "<b class='text-danger'>Cancelled</b>";
                        }
                    ?>
                        <tr>
                            <td class="text-primary text-center">
                                <a href="./vieworder.php?id=<?= $result['id'] ?>">
                                    View
                                </a>
                            </td>
                            <td>#<?= $result['serial'] ?></td>
                            <td><?= $result['date'] ?></td>
                            <td><?= $userdata['fname'] . ' ' . $userdata['lname'] ?></td>
                            <td><?= $result['city'] ?>, <?= $result['state'] ?></td>
                            <td>&#8377;<?= $result['amount'] ?>.00</td>
                            <td><?= $status ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </main>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
    <script>
        activateLink('orders');
    </script>
</body>

</html>