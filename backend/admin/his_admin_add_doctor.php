<?php
	session_start();
	include('assets/inc/config.php');


	if(isset($_POST[submit]))
    {
		// $pass = $_POST["password"];
		$encrypt = sha1(md5($_POST['password']));
            if(isset($_SESSION[doc_id]))
        {
            $lastinsid =$_SESSION[doc_id];
        }
        else
        {
            $sql ="INSERT INTO his_docs (doc_name, doc_mobnumber, doc_email, doc_pwd, doc_dept_id, doc_edu, doc_exp, doc_cunslt_charg, doc_status) values('$_POST[doctorname]','$_POST[mobilenumber]','$_POST[email]','$encrypt','$_POST[select3]','$_POST[education]','$_POST[experience]','$_POST[consultancy_charge]','$_POST[select]')";
            if($qsql = mysqli_query($mysqli,$sql))
            {
                echo "<script>alert('doctor record inserted successfully...');</script>";
            }
            else
            {
                echo mysqli_error($mysqli);
            }
            $lastinsid = mysqli_insert_id($mysqli);
        }
    }


	
		// if(isset($_POST['submit']))
		// {
		// 	$doc_name=$_POST['doctorname'];
		// 	$doc_mobilenumber=$_POST['mobilenumber'];
		// 	$doc_emailid=$_POST['email'];
		// 	$doc_dept=$_POST['select3'];
		// 	$doc_login=$_POST['loginid'];
		// 	$doc_pwd=sha1(md5($_POST['password']));
		// 	$doc_education=$_POST['education'];
		// 	$doc_experience=$_POST['experience'];
		// 	$doc_consultancy_charge=$_POST['consultancy_charge'];
		// 	$doc_status=$_POST['select'];
            
        //     //print_r($_POST['submit']);
        //     //sql to insert captured values
		// 	$query="INSERT INTO his_docs (doc_name, doc_mobnumber, doc_email, doc_pwd, doc_dept, doc_edu, doc_exp, doc_cunslt_charg, doc_status, doc_loginid, doc_dpic) values('$_POST[doctorname]','$_POST[mobilenumber]','$_POST[email]','$_POST[select3]','$_POST[loginid]','$_POST[password]','$_POST[education]','$_POST[experience]','$_POST[consultancy_charge]','$_POST[select]')";
		// 	$stmt = $mysqli->prepare($query);
		// 	$rc=$stmt->bind_param('ssssssssss', $doc_name, $doc_mobilenumber, $doc_emailid, $doc_dept, $doc_login, $doc_pwd, $doc_education, $doc_experience, $doc_consultancy_charge, $doc_status);
		// 	$rc->execute();
		// 	/*
		// 	*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
		// 	*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
		// 	*/ 
		// 	//declare a varible which will be passed to alert function
		// 	if($rc)
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
                                    <h4 class="page-title">Add Doctor Details</h4>
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
											<form method="post" action="" name="frmdoct" onSubmit="return validateform()" style="padding: 10px">


						
												<div class="form-group"><label>Doctor Name</label> 
												<div class="form-line">
												<input class="form-control" type="text" name="doctorname" id="doctorname" value="" />
												</div>
												</div>


												<div class="form-group"><label>Mobile Number</label> 
												<div class="form-line">
												<input class="form-control" type="text" name="mobilenumber" id="mobilenumber" value=""/>
												</div>
												</div>


												<div class="form-group"><label>Doctor Email</label> 
												<div class="form-line">
												<input class="form-control" type="email" name="email" id="email" value="" />
												</div>
												</div>

												<div class="form-group"><label>Password</label> 
												<div class="form-line">
												<input class="form-control" type="password" name="password" id="password" value=""/>
												</div>
												</div>

												<div class="form-group"><label>Department</label> 
													<div class="form-line">
														<select  name="select3" id="select3" class="form-control show-tick">
															<option value="">Select</option>
																<?php
																	$sqldepartment= "SELECT * FROM his_doc_dept WHERE status='Active'";
																	$qsqldepartment = mysqli_query($mysqli,$sqldepartment);
																	while($rsdepartment=mysqli_fetch_array($qsqldepartment))
																		{
																			if($rsdepartment[doc_dept_id] == $rsedit[doc_dept_id])
																			{
																				echo "<option value='$rsdepartment[doc_dept_id]' selected>$rsdepartment[doc_dept_name]</option>";
																			}
																			else
																			{
																				echo "<option value='$rsdepartment[doc_dept_id]'>$rsdepartment[doc_dept_name]</option>";
																			}

																		}
																?>
													</select>
												</div>
												</div>


												<div class="form-group"><label>Education</label> 
													<div class="form-line">
														<input class="form-control" type="text" name="education" id="education" value="" />
													</div>
												</div>


												<div class="form-group"><label>Experience</label> 
													<div class="form-line">
														<input class="form-control" type="text" name="experience" id="experience" value=""/>
													</div>
												</div>


												<div class="form-group"><label>Consultancy Charge</label> 
													<div class="form-line">
														<input class="form-control" type="text" name="consultancy_charge" id="consultancy_charge" value=""/>
													</div>
												</div>

												<div class="form-group">
													<label>Status</label> 
														<div class="form-line">
															<select class="form-control show-tick" name="select" id="select">
																<option value="" selected="" hidden>Select</option>
																	<?php
																		$arr= array("Active","Inactive");
																		foreach($arr as $val)
																		{
																			if($val == $rsedit[status])
																			{
																				echo "<option value='$val' selected>$val</option>";
																			}
																			else
																			{
																				echo "<option value='$val'>$val</option>";
																			}
																		}
																	?>
															</select>
														</div>
												</div>

												<input class="btn btn-info btn-default" type="submit" name="submit" id="submit" value="Submit" />

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