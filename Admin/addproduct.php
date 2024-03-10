<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Scoreboard</title>

    <?php
    include('include/head.php');
    ?>

</head>

<body>
    <?php
    include('include/connection.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $scoreboardstr = "select * from scoreboard where id = $id";
        $scoreboardqry = mysqli_query($conn, $scoreboardstr);
        $scoreboarddata = mysqli_fetch_array($scoreboardqry);

        $eventstr = "select * from participatepar where eventid =" . $scoreboarddata['eventid'];
        $eventqry = mysqli_query($conn, $eventstr);
        $eventqry2 = mysqli_query($conn, $eventstr);
    }
    ?>

    <?php


    if (isset($_POST['addnewpro'])) {

        $proname = $_POST['proname'];
        $price = $_POST['price'];

        $filename = $_FILES['proimage']['name'];
        $basename = substr($filename, 0, strripos($filename, '.'));
        $ext = substr($filename, strripos($filename, '.'));

        $tmpname = $_FILES['proimage']['tmp_name'];
        $allowed_type = array('.png', '.jpg');
        $size = $_FILES['proimage']['size'];

        if (in_array($ext, $allowed_type) && $size < 2000000) {
            $newfilename = md5($basename) . rand(10, 1000) . time() . $ext;

            if (file_exists('./upload/' . $newfilename)) {
                echo "<script>alert('file alrady exist')</script>";
            } else {
                move_uploaded_file($tmpname, './upload/' . $newfilename);

                $qry = "INSERT INTO products (name,price,img,status) 
                values ('$proname',$price,'$newfilename','Y')";
                $sql = mysqli_query($conn, $qry);

                echo "<script>window.location.href='manageproducts.php';</script>";
            }
        }
    }
    ?>
    <?php
    include('include/header.php');
    ?>
    <main>
       
        <div class="main-container">
            <div class="page-heading">
                <h2>Add New Product</h2>
            </div>
            <div class="form-container">
                <form action="" method="post" name="addnewpro" enctype="multipart/form-data">
                    <div class="form-wrapper">
                        <div class="form-element-group">
                            <label class="form-label" for="">Product Name</label>
                            <input type="text" name="proname" id="proname" class="form-input" placeholder="Enter Product Name" required>
                        </div>
                        <div class="form-element-group">
                            <label class="form-label" for="">Price</label>
                            <input type="text" name="price" id="price" class="form-input" placeholder="Enter Price" required>
                        </div>
                        <div class="form-element-group">
                            <label class="form-label" for="">Image</label>
                            <input type="file" name="proimage" id="proimage" class="form-input" placeholder="Select Image" required>
                        </div>
                        <button type="submit" name="addnewpro" class="button1">Save</button>
                        <a href="manageproducts.php" class="button1 button1-cancel">Cancel</a>
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
        activateLink('manageproducts');

        document.getElementById('gamelabel').focus();
    </script>
</body>

</html>