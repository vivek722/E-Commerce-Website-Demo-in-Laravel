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

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include('include/connection.php');
    ?>

    <?php
    include('include/header.php');
    ?>

    <?php
    $searchtext = "";
    if (isset($_POST['eventsearchsubmit'])) {
        $searchtext = $_POST['eventserachtxt'];
    }
    ?>
    <main>
      
        <div class="main-container">
            <div class="page-heading">
                <h2>Manage Product</h2>
            </div>
            <div class="game-events">
                <a href="addproduct.php" class="button1">+ Add New</a>
                <div class="events-list">
                    <div class="search-container">
                        <div class="form-container">
                            <form action="" method="post" name="addnewgame">
                                <div class="form-wrapper">
                                    <div class="form-element-group">
                                      
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['eventsearchsubmit'])) {
                        $query = "select * from products where (name like '%$searchtext%' or price like '%$searchtext%') order by serial DESC";
                    } else {
                        $query = "select * from products";
                    }
                    $res = mysqli_query($conn, $query);
                    while ($eventsdata = mysqli_fetch_assoc($res)) {
                        $inactive = "";
                        if ($eventsdata['status'] != 'Y') {
                            $inactive = "past";
                        }
                    ?>
                        <a href="viewproduct.php?eventid=<?= $eventsdata['id'] ?>" class="event <?= $inactive ?>">
                            <div class="event-details">
                                <div class="event-head">
                                    <h3 class="event-image">
                                        <img src="./upload/<?= $eventsdata['img'] ?>" height="100px" alt="">
                                    </h3>
                                    <div>
                                        <h3>#<?= $eventsdata['id'] ?> <?= $eventsdata['name'] ?></h3>
                                        <span>Price &#8377;<?= $eventsdata['price'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="event-indicator">&#8250;</div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </main>

    <?php
    include('include/footer.php');
    ?>

    <script src="js/main.js"></script>

    <script>
        activateLink('manageproducts');
    </script>
</body>

</html>