<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <?php
    include('include/head.php');
    ?>
</head>

<body>
    <?php
    include('include/header.php');
     include "include/connection.php"; 
    ?>

    <div class="main-container">
        <div class="page-heading">
            <h2>Users</h2>
        </div>

        </form>
        <div class="p-4">
            <table class="table table-striped">
                <tr>
                  
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    
                </tr>
                <?php
                    $sql="select * from `users`";
                    $result=mysqli_query($conn,$sql);
                    //$row=mysqli_fetch_assoc($result);
                    while($row=mysqli_fetch_assoc($result))
                    {
                ?>
                    <tr>
                        
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
               <?php
            }
            ?>

            </table>
        </div>
    </div>

    <?php
    include('include/footer.php');
    ?>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        activateLink('home');
    </script>

</body>

</html>