<!--Server side code to handle  Patient Registration-->
<?php
    session_start();
    include('assets/inc/config.php');

    if(isset($_POST['add_patient']))
    {
        $pat_fname=$_POST['pat_fname'];
        $pat_gender=$_POST['pat_gender'];
        $pat_age = $_POST['pat_age'];
        $pat_diagnose=$_POST['pat_diagnose'];

        //sql to insert captured values
        $query="insert into his_patients (pat_fname, pat_gender, pat_age, pat_diagnose) values(?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('ssss', $pat_fname, $pat_gender, $pat_age, $pat_diagnose);
        $stmt->execute();

        if($stmt)
        {
            $success = "Patient Details Added";
        }
        else {
            $err = "Please Try Again Or Try Later";
        }
    }
?>

<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a>Patients</a></li>
                                            <li class="breadcrumb-item active">Add Patient</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Patient Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputName" class="col-form-label">Name</label>
                                                <input type="text" required="required" name="pat_fname" class="form-control" id="inputName" placeholder="Patient's First Name">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAge" class="col-form-label">Age</label>
                                                <input required="required" type="text" name="pat_age" class="form-control"  id="inputAge" placeholder="Patient's Age">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputGender" class="col-form-label">Gender</label>
                                                <select required="required" name="pat_gender" class="form-control" id="inputGender">
                                                    <option value="Laki-laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDiagnose" class="col-form-label">Diagnose</label>
                                                <input type="text" required="required" name="pat_diagnose" class="form-control" id="inputDiagnose" placeholder="Patient's Diagnosis">
                                            </div>
                                        </div>



                                            <button type="submit" name="add_patient" class="ladda-button btn btn-primary" data-style="expand-right">Add Patient</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>