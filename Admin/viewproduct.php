<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Event</title>

    <?php
    include('include/head.php');
    ?>

</head>

<body>
    <?php
    include('include/connection.php');

    if (isset($_GET['eventid'])) {
        $disabled = "";
        if (isset($_GET['disabled'])) {
            $disabled = "disabled";
        }

        $id = $_GET['eventid'];

        if (isset($_POST['updategamesubmit'])) {
            $proname = $_POST['proname'];
            $price = $_POST['price'];
            $status = $_POST['status'];


            if (!empty($_FILES['proimage']['tmp_name'])) {
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

                        $qry = "UPDATE products set name = '$proname', price = '$price', status = '$status', img = '$newfilename' where id = $id";
                        $sql = mysqli_query($conn, $qry);

                        echo "<script>window.location.href='manageproducts.php';</script>";
                    }
                }
            } else {
                $qry = "UPDATE products set name = '$proname', price = '$price', status = '$status' where id = $id";
                $sql = mysqli_query($conn, $qry);

                echo "<script>window.location.href='manageproducts.php';</script>";
            }
        } else if (isset($_POST['deletegamesubmit'])) {
            $str = "delete from products where id  = $id";
            $qry = mysqli_query($conn, $str);
            echo "<script>window.location.href='manageproducts.php';</script>";
        }

        $qry = "select * from products where id = $id";
        $sql = mysqli_query($conn, $qry);
        $data = mysqli_fetch_array($sql);

        if (count($data) == 0) {
            echo "<script>window.location.href='manageproducts.php';</script>";
        }
    } else {
        echo "<script>window.location.href='manageproducts.php';</script>";
    }
    ?>
    <?php
    include('include/header.php');
    ?>
    <main>
       
        <div class="main-container">
            <div class="page-heading">
                <h2>Update Product</h2>
            </div>
            <div class="form-container">
                <form action="" method="post" name="addnewgame" enctype="multipart/form-data">
                    <div class="form-wrapper">
                        <div class="form-element-group">
                            <label class="form-label" for="">Status</label>
                            <select class="form-input" name="status">
                                <?php
                                $status = $data['status'];
                                if ($status == 'Y') {
                                ?>
                                    <option value="Y">Active</option>
                                    <option value="N">Inactive</option>
                                <?php
                                } else {
                                ?>
                                    <option value="N">Inactive</option>
                                    <option value="Y">Active</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-element-group">
                            <label class="form-label" for="">Product Name *</label>
                            <input type="text" name="proname" id="proname" class="form-input" value="<?= $data['name'] ?>" placeholder="Enter The Game Label" required>
                        </div>
                        <div class="form-element-group">
                            <label class="form-label" for="">Price *</label>
                            <input type="text" name="price" class="form-input" value="<?= $data['price'] ?>" placeholder="Enter Price" required>
                        </div>
                        <div class="form-element-group">
                            <label class="form-label" for="">Image *</label>
                            <input type="file" name="proimage" class="form-input">
                        </div>
                        <button type="submit" name="updategamesubmit" class="button1" <?= $disabled ?>>Update</button>
                        <button type="submit" name="deletegamesubmit" class="button1" <?= $disabled ?>>Delete</button>
                        <a href="managegames.php" class="button1 button1-cancel">Cancel</a>
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

        document.getElementById('proname').focus();
    </script>
</body>

</html>