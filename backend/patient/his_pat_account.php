
<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $pat_id = $_SESSION['opdpatientid'];
  //$doc_email=$_POST['email'];
    //$doc_email = $_SESSION['doc_email'];
?>

<!DOCTYPE html>
    <html lang="en">

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

            <!--Get Details Of A Single User And Display Them Here-->
            <?php
                $pat_email=$_SESSION['opdpatientid'];
                $ret="SELECT  * FROM his_opd_patient WHERE opdpatientid=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$pat_email);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
            {
            ?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                            <li class="breadcrumb-item active">View My Profile</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo $row->opdpatientname;?>'s Profile</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card-box text-center">
                                    <img src="../doc/assets/images/users/<?php echo $row->pat_pic;?>" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                    
                                    <div class="text-centre mt-3">
                                        
                                        <p class="text-muted mb-2 font-13"><strong>Patient Full Name :</strong> <span class="ml-2"><?php echo $row->opdpatientname;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Patient Contact :</strong> <span class="ml-2"><?php echo $row->opdpatientmobileno;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Patient Email :</strong> <span class="ml-2"><?php echo $row->opdpatientemailid;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Patient Gender :</strong> <span class="ml-2"><?php echo $row->opdpatientgender;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Patient DOB :</strong> <span class="ml-2"><?php echo $row->opdpatientdob;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Patient Bloodgroup :</strong> <span class="ml-2"><?php echo $row->opdpatientbloodgroup;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Patient Address :</strong> <span class="ml-2"><?php echo $row->opdpatientaddress;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Patient City :</strong> <span class="ml-2"><?php echo $row->opdpatientcity;?></span></p>

                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col-->
                            <!--Vitals-->
                            <div class="col-lg-6 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Body Temperature</th>
                                                <th>Heart Rate/Pulse</th>
                                                <th>Respiratory Rate</th>
                                                <th>Blood Pressure</th>
                                                <th>Date Recorded</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $vit_pat_number =$_SESSION['opdpatientid'];
                                            $ret="SELECT  * FROM his_vitals WHERE vit_pat_number =?";
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->bind_param('i',$vit_pat_number );
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            //$cnt=1;
                                            
                                            while($row=$res->fetch_object())
                                                {
                                            $mysqlDateTime = $row->vit_daterec; //trim timestamp to date

                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row->vit_bodytemp;?>°C</td>
                                                    <td><?php echo $row->vit_heartpulse;?>BPM</td>
                                                    <td><?php echo $row->vit_resprate;?>bpm</td>
                                                    <td><?php echo $row->vit_bloodpress;?>mmHg</td>
                                                    <td><?php echo date("Y-m-d", strtotime($mysqlDateTime));?></td>
                                                </tr>
                                            </tbody>
                                        <?php }?>
                                    </table>
                                    </div>
                                </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>
            <?php }?>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>


</html>