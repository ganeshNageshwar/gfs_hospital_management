<?php
	session_start();
	include('assets/inc/config.php');


		if(isset($_GET[delid]))
		{
			$sql ="DELETE FROM his_opd_patient WHERE opdpatientid='$_GET[delid]'";
			$qsql=mysqli_query($mysqli,$sql);
			if(mysqli_affected_rows($mysqli) == 1)
			{
				echo "<script>alert('patient record deleted successfully..');</script>";
			}
		}


		// if(isset($_POST['add_doc']))
		// {
		// 	$doc_fname=$_POST['doc_fname'];
		// 	$doc_lname=$_POST['doc_lname'];
		// 	$doc_number=$_POST['doc_number'];
        //     $doc_email=$_POST['doc_email'];
        //     $doc_pwd=sha1(md5($_POST['doc_pwd']));
            
        //     //sql to insert captured values
		// 	$query="INSERT INTO his_docs (doc_fname, doc_lname, doc_number, doc_email, doc_pwd) values(?,?,?,?,?)";
		// 	$stmt = $mysqli->prepare($query);
		// 	$rc=$stmt->bind_param('sssss', $doc_fname, $doc_lname, $doc_number, $doc_email, $doc_pwd);
		// 	$stmt->execute();
		// 	/*
		// 	*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
		// 	*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
		// 	*/ 
		// 	//declare a varible which will be passed to alert function
		// 	if($stmt)
		// 	{
		// 		$success = "Employee Details Added";
		// 	}
		// 	else {
		// 		$err = "Please Try Again Or Try Later";
		// 	}
			
			
		// }
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
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Doctor's</a></li>
                                            <li class="breadcrumb-item active">Add Doctor</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">View OPD Patient Records</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <section class="container">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

      <thead>
        <tr>
          <th width="15%" height="36"><div align="center">Name</div></th>
          <th width="20%"><div align="center">Admission</div></th>
          <th width="28%"><div align="center">Address, Contact</div></th>    
          <th width="20%"><div align="center">Patient Profile</div></th>
          <th width="17%"><div align="center">Action</div></th>
        </tr>
      </thead>
      <tbody>
       <?php
       $sql ="SELECT * FROM his_opd_patient";
       $qsql = mysqli_query($mysqli,$sql);
       while($rs = mysqli_fetch_array($qsql))
       {
        echo "<tr>
        <td>$rs[opdpatientname]</td>
        <td>
        <strong>Date</strong>: &nbsp;$rs[opdpatientadmissiondate]<br>
        <strong>Time</strong>: &nbsp;$rs[opdpatientadmissiontime]</td>
        <td>$rs[opdpatientaddress]<br>$rs[opdpatientcity] -  &nbsp;$rs[opdpatientpincode]<br>
        <strong>Mob No.</strong> - $rs[opdpatientmobileno]</td>
        <td><strong>Blood group</strong> - $rs[opdpatientbloodgroup]<br>
        <strong>Gender</strong> - &nbsp;$rs[opdpatientgender]<br>
        <strong>DOB</strong> - &nbsp;$rs[opdpatientdob]</td>
        <td align='center'>Status - $rs[opdpatientstatus] <br>";
         if(isset($_SESSION[doc_id]))
        {
          echo "<a href='his_doc_opd_patient.php?editid=$rs[opdpatientid]' class='btn btn-sm btn-success'>Edit</a>
		  <a href='his_doc_view_opd_patientrecords.php?delid=$rs[opdpatientid]' class='btn btn-sm btn-danger ml-1'>Delete</a><hr><a href='his_doc_opd_patientreports.php?opdpatientid=$rs[opdpatientid]' class='btn btn-sm btn-info'>View Report</a>";
        }
        echo "</td></tr>";
      }
      ?> 
    </tbody>
  </table>
</section>
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
<!-- <?php
// include("adfooter.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmdoct.doctorname.value == "")
	{
		alert("Doctor name should not be empty..");
		document.frmdoct.doctorname.focus();
		return false;
	}
	else if(!document.frmdoct.doctorname.value.match(alphaspaceExp))
	{
		alert("Doctor name not valid..");
		document.frmdoct.doctorname.focus();
		return false;
	}
	else if(document.frmdoct.mobilenumber.value == "")
	{
		alert("Mobile number should not be empty..");
		document.frmdoct.mobilenumber.focus();
		return false;
	}
	else if(!document.frmdoct.mobilenumber.value.match(numericExpression))
	{
		alert("Mobile number not valid..");
		document.frmdoct.mobilenumber.focus();
		return false;
	}
	else if(document.frmdoct.select3.value == "")
	{
		alert("Department ID should not be empty..");
		document.frmdoct.select3.focus();
		return false;
	}
	else if(document.frmdoct.loginid.value == "")
	{
		alert("loginid should not be empty..");
		document.frmdoct.loginid.focus();
		return false;
	}
	else if(!document.frmdoct.loginid.value.match(alphanumericExp))
	{
		alert("loginid not valid..");
		document.frmdoct.loginid.focus();
		return false;
	}
	else if(document.frmdoct.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmdoct.password.focus();
		return false;
	}
	else if(document.frmdoct.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmdoct.password.focus();
		return false;
	}
	else if(document.frmdoct.password.value != document.frmdoct.cnfirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmdoct.password.focus();
		return false;
	}
	else if(document.frmdoct.education.value == "")
	{
		alert("Education should not be empty..");
		document.frmdoct.education.focus();
		return false;
	}
	else if(!document.frmdoct.education.value.match(alphaExp))
	{
		alert("Education not valid..");
		document.frmdoct.education.focus();
		return false;
	}
	else if(document.frmdoct.experience.value == "")
	{
		alert("Experience should not be empty..");
		document.frmdoct.experience.focus();
		return false;
	}
	else if(!document.frmdoct.experience.value.match(numericExpression))
	{
		alert("Experience not valid..");
		document.frmdoct.experience.focus();
		return false;
	}
	else if(document.frmdoct.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmdoct.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script> -->