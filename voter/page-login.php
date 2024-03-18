<?php
session_start();
if(isset($_SESSION["loged_in"])){
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Log In | NC</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./asset/images/nc_logo.png">
    <link href="./asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="./asset/images/nc_logo.png" class="w-25" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <form action="login_post.php" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Name</strong></label>
                                            <input type="text" name="name" class="form-control" value="<?=(isset($_SESSION["old_name"])?$_SESSION["old_name"]:'')?>">
                                            <?php if(isset($_SESSION['name_exist_err'])){ ?>
                                                <div class="alert alert-danger mt-2 text-capitalize"><?=$_SESSION['name_exist_err']?></div>
                                            <?php } ;unset($_SESSION['name_exist_err'])?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Phone</strong></label>
                                            <input type="number" name="phone" class="form-control">
                                            <?php if(isset($_SESSION['wrong_number'])){ ?>
                                                <div class="alert alert-danger mt-2 text-capitalize"><?=$_SESSION['wrong_number']?></div>
                                            <?php } ;unset($_SESSION['wrong_number'])?>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="./page-register.php">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./asset/vendor/global/global.min.js"></script>
	<script src="./asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./asset/js/custom.min.js"></script>
    <script src="./asset/js/deznav-init.js"></script>

</body>

</html>

<?php
unset($_SESSION["old_name"]);
unset($_SESSION["old_number"]);
?>