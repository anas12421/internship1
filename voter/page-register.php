<?php
session_start();

// if(isset($_SESSION["loged_in"])){
//     header('location:dashboard.php');
// }
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register | NC</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./asset/images/nc_logo.png">
    <link href="./asset/css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

            }
        </style>
</head>

<body class="h-100">
    <div class="authincation h-100 mt-3">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="#"><img src="./asset/images/nc_logo.png" class="w-25" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                    <?php if(isset($_SESSION["exists"])){ ?>
                                    <div class="alert alert-danger mt-3 text-capitalize"><?=$_SESSION["exists"]?></div>
                                    <?php } ?>
                                    <?php if(isset($_SESSION["activity_exists"])){ ?>
                                    <div class="alert alert-danger mt-3 text-capitalize"><?=$_SESSION["activity_exists"]?></div>
                                    <?php } ?>
                                    <form action="register_post.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>Name</strong></label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="<?=(isset($_SESSION["old_name"])?$_SESSION["old_name"]:'')?>">
                                                    <?php if(isset($_SESSION["name_err"])){ ?>
                                                    <div class="alert alert-warning mt-3 text-capitalize ">
                                                        <?= $_SESSION["name_err"]?>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>Email</strong></label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="<?=(isset($_SESSION["old_email"])?$_SESSION["old_email"]:'')?>">
                                                    <?php if(isset($_SESSION["email_err"])){ ?>
                                                    <div class="alert alert-warning mt-3 text-capitalize ">
                                                        <?= $_SESSION["email_err"]?>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>Phone</strong></label>
                                                    <input type="number" placeholder="01XXXXXXXXX" class="form-control"
                                                        name="phone"
                                                        value="<?=(isset($_SESSION["old_phone"])?$_SESSION["old_phone"]:'')?>">
                                                    <?php if(isset($_SESSION["phone_err"])){ ?>
                                                    <div class="alert alert-warning mt-3 text-capitalize ">
                                                        <?= $_SESSION["phone_err"]?>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>NID</strong></label>
                                                    <input type="number" placeholder="XXXXXXXXXX" class="form-control nid_input" name="nid"
                                                        value="<?=(isset($_SESSION["old_nid"])?$_SESSION["old_nid"]:'')?>">
                                                    <?php if(isset($_SESSION["nid_err"])){ ?>
                                                    <div class="alert alert-warning mt-3 text-capitalize ">
                                                        <?= $_SESSION["nid_err"]?>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>Date of
                                                            Birth</strong></label>
                                                    <input type="date" class="form-control" name="date"
                                                        value="<?=(isset($_SESSION["old_date"])?$_SESSION["old_date"]:'')?>">
                                                    <?php if(isset($_SESSION["date_err"])){ ?>
                                                    <div class="alert alert-warning mt-3 text-capitalize ">
                                                        <?= $_SESSION["date_err"]?>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php 
                                                        $gender = "";
                                                        if(isset($_SESSION["old_gender"])){
                                                        $gender = $_SESSION["old_gender"];
                                                    }
                                                    ?>
                                                    <label class="mb-1 text-white"><strong>Gender</strong></label>
                                                    <select name="gender" class="form-control" id="">
                                                        <option value="">Select Your Gender</option>
                                                        <option value="male" <?=($gender == 'male' ? 'selected':'')?>>
                                                            Male</option>
                                                        <option value="female"
                                                            <?=($gender == 'female' ? 'selected':'')?>>Female</option>
                                                    </select>
                                                    <?php if(isset($_SESSION["gender_err"])){ ?>
                                                    <div class="alert alert-warning mt-3 text-capitalize ">
                                                        <?= $_SESSION["gender_err"]?>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>Division</strong></label>
                                                    <input type="text" class="form-control" name="division"
                                                        value="<?=(isset($_SESSION["old_division"])?$_SESSION["old_division"]:'')?>">
                                                    <?php if(isset($_SESSION["division_err"])){ ?>
                                                    <div class="alert alert-warning mt-3 text-capitalize ">
                                                        <?= $_SESSION["division_err"]?>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>District</strong></label>
                                                    <input type="text" class="form-control" name="district"
                                                        value="<?=(isset($_SESSION["old_district"])?$_SESSION["old_district"]:'')?>">
                                                    <?php if(isset($_SESSION["district_err"])){ ?>
                                                    <div class="alert alert-warning mt-3 text-capitalize ">
                                                        <?= $_SESSION["district_err"]?>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>Sub District</strong></label>
                                                    <input type="text" class="form-control" name="subdistrict"
                                                        value="<?=(isset($_SESSION["old_subdistrict"])?$_SESSION["old_subdistrict"]:'')?>">
                                                    <?php if(isset($_SESSION["subdistrict_err"])){ ?>
                                                    <div class="alert alert-warning mt-3 text-capitalize ">
                                                        <?= $_SESSION["subdistrict_err"]?>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>Photo</strong></label>
                                                    <input type="file" name="image" class="form-control"
                                                        onchange="document.getElementById('profile').src = window.URL.createObjectURL(this.files[0])">
                                                    <img src="" width="150" class="mt-3" id="profile" alt="">
                                                </div>
                                                <?php if(isset($_SESSION["photo_err"])){ ?>
                                                <div class="alert alert-warning mt-3 text-capitalize ">
                                                    <?= $_SESSION["photo_err"]?>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign
                                                me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white"
                                                href="page-login.php">Sign in</a>
                                        </p>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./asset/js/custom.min.js"></script>
    <script src="./asset/js/deznav-init.js"></script>

    <?php if(isset($_SESSION["register_success"])){ ?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<?=$_SESSION["register_success"]?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php } ?>

</body>

</html>

<?php
unset($_SESSION["activity_exists"]);
unset($_SESSION["exists"]);
unset($_SESSION["register_success"]);
unset($_SESSION["name_err"]);
unset($_SESSION["old_name"]);
unset($_SESSION["email_err"]);
unset($_SESSION["old_email"]);
unset($_SESSION["password_err"]);
unset($_SESSION["old_password"]);
unset($_SESSION["phone_err"]);
unset($_SESSION["old_phone"]);
unset($_SESSION["nid_err"]);
unset($_SESSION["old_nid"]);
unset($_SESSION["date_err"]);
unset($_SESSION["old_date"]);
unset($_SESSION["gender_err"]);
unset($_SESSION["old_gender"]);
unset($_SESSION["division_err"]);
unset($_SESSION["old_division"]);
unset($_SESSION["district_err"]);
unset($_SESSION["old_district"]);
unset($_SESSION["subdistrict_err"]);
unset($_SESSION["old_subdistrict"]);
unset($_SESSION["photo_err"]);
?>