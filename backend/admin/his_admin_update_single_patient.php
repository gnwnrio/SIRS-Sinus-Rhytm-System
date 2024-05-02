<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_patient']))
		{
            $pat_id = $_GET['pat_id'];
			$pat_fname=$_POST['pat_fname'];
			$pat_age=$_POST['pat_age'];
			$pat_gender=$_POST['pat_gender'];
            $pat_diagnose=$_POST['pat_diagnose'];
            //sql to insert captured values
			$query="UPDATE  his_patients  SET pat_fname=?, pat_age=?, pat_gender=?, pat_diagnose=? WHERE pat_id = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssi', $pat_fname, $pat_age, $pat_gender, $pat_diagnose, $pat_id);
			$stmt->execute();

			if($stmt)
			{
				$success = "Data pasien berhasil di-Update";
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
    <style>
        .btn-danger:hover {
            background-color: #9e0000; /* Ganti dengan warna yang Anda inginkan */
        }
    </style>
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
                                            <li class="breadcrumb-item active">Manage Patients</li>
                                        </ol>
                                    </div>
                                    <div class="d-flex">
                                        <a href="his_admin_manage_patient.php" class="btn btn-danger ml-2" style="width: 80px; height: 40px; margin-top: 20px; margin-right: 20px">Back</a>
                                        <h4 class="page-title">Update Patient Details</h4>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                        <?php
                            $pat_id=$_GET['pat_id'];
                            $ret="SELECT  * FROM his_patients WHERE pat_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$pat_id);
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            //$cnt=1;
                            while($row=$res->fetch_object())
                            {
                        ?>
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
                                                    <input type="text" required="required" value="<?php echo $row->pat_fname;?>" name="pat_fname" class="form-control" id="inputName" placeholder="Patient's First Name">
                                                </div>
                                            </div>                                        

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAge" class="col-form-label">Age</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_age;?>" name="pat_age" class="form-control"  id="inputAge" placeholder="Patient`s Age">
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
                                                    <input required="required" type="text" value="<?php echo $row->pat_diagnose;?>" class="form-control" name="pat_diagnose" id="inputDiagnose" placeholder="Patient's Diagnosis">
                                                </div>
                                            </div>

                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Patient Number</label>
                                                    <input type="text" name="pat_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>

                                            <button type="submit" name="update_patient" class="ladda-button btn btn-success" data-style="expand-right"  >Add Patient</button>

                                        </form>

                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <?php  }?>
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