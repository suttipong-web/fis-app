<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>เข้าสู่ระบบ FIS System ENG </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800");
        @import url("https://fonts.googleapis.com/css?family=Kanit:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i");

        body {
            font-family: 'Kanit', sans-serif;
            font-size: 16px;
            color: #151516;
            font-weight: 400;
        }
    </style>
</head>
<?php
$rand = rand(1000, 9999);
?>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-3 px-4 px-sm-3">
                            <div class="brand-logo text-center">
                                <img src="images/logofis.png" alt="logo-" width="200" style="width: 250px;">
                            </div>
                            <h4>Finance Infomation System </h4>
                            <h6 class="font-weight-light">เข้าสู่ระบบระบบบริหารงบประมาณคณะวิศวกรรมศาสตร์ </h6>
                            <form class="pt-2" action="/login" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="username"
                                        name="username" placeholder="Username"  required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="re-pass"
                                        placeholder="ใส่รหัสที่ท่านเห็น => <?= 'fis' . $rand ?>" autocomplete="off"
                                        class="form-control form-control-lg">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn"
                                        >เข้าสู่ระบบ</button>

                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="#">เข้าสู่ระบบด้วย @cmu.ac.th</a>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">

                                    <a href="#" class="auth-link text-black">ลืมรหัสผ่าน ?</a>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    หากไม่มีบัญชีผู้ใช้ <a href="register.html"
                                        class="text-primary">ติดต่อผู้ดูแลระบบ</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    
</body>

</html>
