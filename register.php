
<!DOCTYPE html>
<html lang="en">
    <?php include 'config.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>REGISTER PAGE</title>
</head>

    <?php 
    if(isset($_POST['submited'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmed_password = $_POST['confirmed_password'];
        
        $name_error ='';
        $email_error ='';
        $password_error ='';
        $confirmed_error ='';
        $confirmed_password_not_match = '';

        if (empty($name)) {
            $name_error = 'This field name is required!';
        }
        if(empty($email)){
            $email_error = 'This field email is required!';
        }
        if(empty($password)){
            $password_error = 'This field password is required!';
        }
        if(empty($confirmed_password)){
            $confirmed_error = 'confirmed is required!';
        }
        if($confirmed_password !== $password){
                $confirmed_password_not_match = 'confirmed password does not match!';
        }
        if (!empty($name) && !empty($email) && !empty($password) && !empty($confirmed_password) && $password === $confirmed_password) {            
            $sql = "INSERT INTO real_login_system (name,email,password,Date) VALUES ('$name','$email','$password',Now())";
            $reslut = mysqli_query($conn,$sql);
            if (!$result) {
                die('Data inserts is error......');
            }else{
                header('location:login.php');
            }
        }
    }
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header bg-secondary">
                    Registration Form
                    <button type="button" class="btn btn-dark position-relative float-end">
                        <a href="index.php">Home</a>
                    </button>
                </div>
                <div class="card-body">
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputText1" class="form-label">Name</label>
                            <input type="text" class="form-control <?php if($name_error != ''){?>is-invalid<?php } ?>"
                                id="exampleInputText1" name="name" value="<?php echo $name ?>">
                            <i class="text-danger"><?php echo $name_error ?></i>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control <?php if($email_error != ''){?>is-invalid<?php } ?>"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                value="<?php echo $email ?>">
                            <i class="text-danger"><?php echo $email_error ?></i>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password"
                                class="form-control <?php if($password_error != ''){?>is-invalid<?php } ?>"
                                id="exampleInputPassword1" name="password" value="<?php echo $password ?>">
                            <i class="text-danger"><?php echo $password_error ?></i>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Comfirmed Password</label>
                            <input type="password"
                                class="form-control <?php if($confirmed_error != ''){?>is-invalid<?php } ?>"
                                id="exampleInputPassword2" name="confirmed_password"
                                value="<?php echo $confirmed_password ?>">
                            <i
                                class="text-danger"><?php echo $confirmed_error ?><?php echo $confirmed_password_not_match ?></i>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="submited">Submit</button>
                    </form>
                    <div>
                        <span class="text-secondary">If you have already account!</span><a href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>