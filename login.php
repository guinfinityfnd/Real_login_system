<?php session_start(); ?>
<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>LOGIN PAGE</title>
</head>
<?php 
    if (isset($_POST['login'])) {
       $email = $_POST['email'];
       $password = $_POST['password'];

       $sql = "SELECT * FROM real_login_system WHERE email='$email' AND password='$password'";
       $result = mysqli_query($conn,$sql);
       $result_count = mysqli_num_rows($result);
       $login_error = '';
       if ($result_count === 1) {
        $users = mysqli_fetch_assoc($result);
           $_SESSION['key'] = $users;
            header('location:admin.php');
        }else{
           $login_error = 'Email or Password is invalid!';
        }
    }
?>
<body>
    <div class="container-fluid ml">
        <div class="card">
            <div class="card-header">
            <span class="text-danger">Login Form</span>
               <button type="button" class="btn btn-dark position-relative float-end">
                   <a href="register.php">Register Now</a> 
               </button>
            </div>
            <div class="card-body">
                <form action="login.php" method="POST">
                    <b class="text-warning"><?php echo $login_error ?></b>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="login">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>