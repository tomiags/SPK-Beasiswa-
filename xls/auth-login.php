<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SMK NURUL HUDA LOSARI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- App favicon -->
    <link rel="shortcut icon" href="admin/assets/images/logonuha.png">

    <!-- App css -->
    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="admin/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/assets/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body class="account-body">

    <!-- Log In page -->
    <div class="row vh-100">
        <div class="col  pr-0">
            <div class="card mb-0 shadow-none">
                <div class="card-body">

                    <div class="px-3">
                        <div class="media">
                            <a href="admin/index.html" class="logo logo-admin"><img src="admin/assets/images/logonuha.png" height="55" alt="logo" class="my-3"></a>

                            <div class="media-body ml-3 align-self-center">
                                <h4> <b>Sistem Pendukung Keputusan Penerima Beasiswa
                                        SMK Nurul Huda Losari </b></h4>

                            </div>
                        </div>

                        <form class="form-horizontal my-4" method="post" action="login.php">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">

                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="pages-recoverpw-2.html" class="text-muted font-13"><i class="mdi mdi-lock"></i> Lupa Password?</a>
                                </div>
                            </div>

                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"> Log In </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-9 p-0 d-flex justify-content-center">
            <div class="accountbg d-flex align-items-center">

            </div>

        </div>
    </div>
    <footer class="footer text-center text-sm-left">
        SMK Nurul Huda Losari &copy; 2020 <span class="text-by d-none d-sm-inline-block float-right">| Created by Muhammad Agus Tomi </span>
    </footer>
    </div>
    <!-- End Log In page -->


    <!-- jQuery  -->
    <script src="admin/assets/js/jquery.min.js"></script>
    <script src="admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/js/metisMenu.min.js"></script>
    <script src="admin/assets/js/waves.min.js"></script>
    <script src="admin/assets/js/jquery.slimscroll.min.js"></script>

    <!-- App js -->
    <script src="admin/assets/js/app.js"></script>

</body>

</html>