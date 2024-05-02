<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['reset_pwd']))
		{
            //generate random password and a token 
            

            $email=$_POST['email'];
            $token = sha1(md5($_POST['token']));
            $status = $_POST['status'];
            $pwd = $_POST['pwd'];

			$query="INSERT INTO his_pwdresets (email, token, status, pwd) VALUES(?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssss', $email, $token, $status, $pwd);
			$stmt->execute();

			if($stmt)
			{
				$success = "Check your inbox for password reset instructions";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
        }
        $length_pwd = 10;
        $length_token = 30;
        $temp_pwd = substr(str_shuffle('0123456789QWERTYUIOPPLKJHGFDSAZCVBNMqwertyuioplkjhgfdsazxcvbnm'),1,$length_pwd);
        $_token = substr(str_shuffle('0123456789QWERTYUIOPPLKJHGFDSAZCVBNMqwertyuioplkjhgfdsazxcvbnm'),1,$length_token);       
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sinus Rhythm System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!--Load Sweet Alert Javascript-->
    <script src="assets/js/swal.js"></script>
    <!--Inject SWAL-->
    <?php if(isset($success)) {?>
    <!--This code for injecting an alert-->
    <script>
    setTimeout(function() {
            swal("Success", "<?php echo $success;?>", "success");
        },
        100);
    </script>

    <?php } ?>

    <?php if(isset($err)) {?>
    <!--This code for injecting an alert-->
    <script>
    setTimeout(function() {
            swal("Failed", "<?php echo $err;?>", "Failed");
        },
        100);
    </script>

    <?php } ?>



</head>

<style>
.back-link:hover {
    text-decoration: underline;
}

.desc-home {
    text-align: left;
    width: 40%;
    margin-left: 50px;
    color: #fff;
    font-size: 30px;
    margin-top: -250px;
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
    margin-right: 20px;
    /* Jarak antar item navigasi */
}



.nav-menu li a {
    background-color: #38414a;
    text-decoration: none;
    color: #fff;
    /* Warna teks */
    font-weight: bold;
    padding: 10px 15px;
    /* Padding untuk ruang di sekitar teks */
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.nav-menu li a:hover {
    background-color: #252b31;
    /* Warna latar belakang saat dihover */
    color: #555;
    /* Warna teks saat dihover */
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
                                <a href="his_doc_reset_pwd.php">
                                    <span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Enter your email address and we'll send you an email
                                    with instructions to reset your password.</p>
                            </div>

                            <form method="post">

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" name="email" type="email" id="emailaddress" required=""
                                        placeholder="Enter your email">
                                </div>
                                <div class="form-group mb-3" style="display:none">
                                    <label for="emailaddress">Reset Token</label>
                                    <input class="form-control" name="token" type="text" value="<?php echo $_token;?>">
                                </div>
                                <div class="form-group mb-3" style="display:none">
                                    <label for="emailaddress">Reset Temp Pwd</label>
                                    <input class="form-control" name="pwd" type="text" value="<?php echo $temp_pwd;?>">
                                </div>
                                <div class="form-group mb-3" style="display:none">
                                    <label for="emailaddress">Status</label>
                                    <input class="form-control" name="status" type="text" id="emailaddress" required=""
                                        value="Pending">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button name="reset_pwd" class="btn btn-primary btn-block" type="submit"> Reset
                                        Password </button>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p class="text-primary ml-1">Back to <a href="index.php"
                                                class="text-primary ml-1 back-link"><b>Log in</b></a></p>
                                    </div> <!-- end col -->
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <?php include("assets/inc/footer1.php");?>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>