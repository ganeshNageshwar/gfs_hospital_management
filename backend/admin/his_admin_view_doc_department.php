<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  if(isset($_GET[delid]))
		{
			$sql ="DELETE FROM his_doc_dept WHERE doc_dept_id='$_GET[delid]'";
			$qsql=mysqli_query($mysqli,$sql);
			if(mysqli_affected_rows($mysqli) == 1)
			{
				echo "<script>alert('doctor department record deleted successfully..');</script>";
			}
		}
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
                <?php include('assets/inc/nav.php');?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Department</a></li>
                                            <li class="breadcrumb-item active">View Doctor Department</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Doctor Department Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title"></h4>
                                    <!-- <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline" >
                                                <div class="form-group mr-2" style="display:none">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">Show all</option>
                                                        <option value="Discharged">Discharged</option>
                                                        <option value="OutPatients">OutPatients</option>
                                                        <option value="InPatients">InPatients</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                    <section class="container">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

      <thead>
      <tr>
          <th width="20%" height="36"><div align="center">Name</div></th>
          <th width="60%"><div align="center">Description</div></th>
          <th width="20%"><div align="center">Action</div></th>
        </tr>
      </thead>
      <tbody>
      <?php
       $sql ="SELECT * FROM his_doc_dept";
       $qsql = mysqli_query($mysqli,$sql);
       while($rs = mysqli_fetch_array($qsql))
       {
        echo "<tr>
        <td>$rs[doc_dept_name]</td>
		<td>$rs[doc_dept_description]</td>
        <td align='center'>Status - $rs[status] <br>";
         if(isset($_SESSION[ad_id]))
        {
          echo "<a href='his_admin_doc_department.php?editid=$rs[doc_dept_id]' class='btn btn-sm btn-success'>Edit</a><a href='his_admin_view_doc_department.php?delid=$rs[doc_dept_id]' class='btn btn-sm btn-danger ml-1'>Delete</a>";
        }
        echo "</td></tr>";
      }
      ?> 
    </tbody>
  </table>
</section>
                                    

                                    <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
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

        <!-- Footable js -->
        <script src="assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>