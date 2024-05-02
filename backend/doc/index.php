<?php
    session_start();
    include('assets/inc/config.php');//get configuration file
    if(isset($_POST['doc_login']))
    {
        $doc_number = $_POST['doc_number'];
        //$doc_email = $_POST['doc_ea']
        $doc_pwd = sha1(md5($_POST['doc_pwd']));//double encrypt to increase security
        $stmt=$mysqli->prepare("SELECT doc_number, doc_pwd, doc_id FROM his_docs WHERE  doc_number=? AND doc_pwd=? ");//sql to log in user
        $stmt->bind_param('ss', $doc_number, $doc_pwd);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($doc_number, $doc_pwd ,$doc_id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['doc_id'] = $doc_id;
        $_SESSION['doc_number'] = $doc_number;//Assign session to doc_number id
        //$uip=$_SERVER['REMOTE_ADDR'];
        //$ldate=date('d/m/Y h:i:s', time());
        if($rs)
            {//if its sucessfull
                header("location:his_doc_view_patients.php");
            }

        else
            {
            #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
                $err = "Access Denied Please Check Your Credentials";
            }
    }
?>
<!--End Login-->
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Sinus Rhythm System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="MartDevelopers" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <!--Load Sweet Alert Javascript-->
        
        <script src="assets/js/swal.js"></script>
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed","<?php echo $err;?>","error");
                            },
                                100);
                </script>

        <?php } ?>



    </head>

    <style>
        .forgot-password-link:hover {
            text-decoration: underline;
        }

        .desc-home {
            text-align:left;
            width: 40%;
            margin-left: 50px;
            color: #fff;
            font-size: 30px;
            margin-top:-250px;
            margin-bottom: -6%;
            font-family: cursive;
        }
        
        .title-desc-home {
            color: #fff;
            font-size: 35px;
            font-style: bold;
            padding-bottom: 60px;
            font-family: cursive;
        }

        #nav-menu-container {
            display: flex;
            text-align: center;
            align-items: center;
            background-color: #282e34;
            height: 60px;
            width: 100%;
            padding-left: 70%;
        }

        .nav-menu {
            position: absolute;
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .nav-menu li {
            margin-right: 20px; /* Jarak antar item navigasi */
        }



        .nav-menu li a {
            background-color: #38414a;
            text-decoration: none;
            color: #fff; /* Warna teks */
            font-weight: bold;
            padding: 10px 15px; /* Padding untuk ruang di sekitar teks */
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-menu li a:hover {
            background-color: #252b31; /* Warna latar belakang saat dihover */
            color: #555; /* Warna teks saat dihover */
        }

        .nav-logo {
            max-height: 0;
            margin-right: 0;
        }

        .tw-pict-container {
            position: absolute;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .doctor-text {
            font-size: 35px;
            font-family: "Quicksand", sans-serif;
            color: #38414a;
        }
    </style>

    <body class="authentication-bg authentication-bg-pattern">

        <header>
            <div id="home">
                <div>
                    <nav id="nav-menu-container">
                        <div class="tw-pict-container">
                            <a href="#">
                                <img src="assets/images/title-web.png" style="height: 60px; display: block;">
                            </a>
                        </div>
                        <ul class="nav-menu">
                            <li><a href="../../index.php">Home</a></li>
                            <li><a href="index.php">Doctor's Login</a></li>
                            <li><a href="../admin/index.php">Administrator Login</a></li>
                        </ul>
                    </nav>   
                </div>
            </div>
        </header>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.php">
                                        <p class="doctor-text">DOCTOR LOGIN</p>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Masukkan alamat email dan kata sandi Anda untuk mengakses panel Dokter.</p>
                                </div>

                                <form method='post' >

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">ID Doctor</label>
                                        <input class="form-control" name="doc_number" type="text" id="emailaddress" required="" placeholder="Enter your id doctor">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input class="form-control" name="doc_pwd" type="password" required="" id="password" placeholder="Enter your password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" name="doc_login" type="submit"> Log In </button>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12 text-center" style="margin-bottom:-20px;">
                                            <p><a href="his_doc_reset_pwd.php" class="text-primary ml-1 forgot-password-link">Forgot your password?</a></p>
                                        </div>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <script>
            document.getElementById('togglePassword').addEventListener('click', function() {
                var passwordInput = document.getElementById('password');
                var passStatus = document.getElementById('togglePassword').querySelector('i');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passStatus.classList.remove('fa-eye');
                    passStatus.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    passStatus.classList.remove('fa-eye-slash');
                    passStatus.classList.add('fa-eye');
                }
            });
        </script>
        
    </body>

</html>