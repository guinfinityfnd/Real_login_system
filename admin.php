<?php session_start();
   if (!isset($_SESSION['key'])) {
      header('location:login.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'config.php' ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>Admin Page</title>
</head>
<style>
    a{
        text-decoration: none;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="card-header">
                <p class="text-danger text-center display-1">Admin Dashboard
                    <button class="badge"><a href="logout.php" class="display-6 text-info">LOGOUT</a></button>
                </p>
            </div>
            <div class="card">
                <div class="card text-center">
                        <span class="text-danger">Admin:<?php echo $_SESSION['key']['name']?></span>
                        <span class="text-danger">Email:<?php echo $_SESSION['key']['email']?></span>
                        <span class="text-danger">Password:<?php echo $_SESSION['key']['password']?></span>
                        <span class="text-danger">Date:<?php echo $_SESSION['key']['Date']?></span>
                </div>
            <h3 class="text-success">Users List</h3>    
                <table class="table table-success table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>NAME</td>
                            <td>EMAIL</td>
                            <td>PASSWORD</td>
                            <td>Date</td>
                        </tr>
                            <?php 
                                $sql = "SELECT * FROM real_login_system";
                                $result = mysqli_query($conn,$sql);
                                foreach($result as $x){
                            ?>
                        <tr>
                            <td><?php echo $x['id'] ?></td>
                            <td><?php echo $x['name'] ?></td>
                            <td><?php echo $x['email'] ?></td>
                            <td><?php echo $x['password'] ?></td>
                            <td><?php echo $x['Date'] ?></td>
                        </tr>
                            <?php 
                            }
                            ?>                            
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>

</html>