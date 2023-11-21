<?php
	session_start();
	include('assets/inc/config.php');


    if(isset($_POST[submit]))
    {
        $encrypt = sha1(md5($_POST['password']));
        if(isset($_GET[editid]))
        {
            $sql ="UPDATE his_opd_patient SET opdpatientname='$_POST[patiente]', opdpatientaddress='$_POST[textarea]',
            opdpatientcity='$_POST[city]', opdpatientmobileno='$_POST[mobileno]', opdpatientemailid='$_POST[email]',opdpatientpassword='$encrypt', opdpatientgender='$_POST[select6]',opdpatientdob='$_POST[dob]' WHERE opdpatientid='$_GET[editid]'";
            if($qsql = mysqli_query($mysqli,$sql))
            {
                echo "<script>alert('patient record updated successfully...');</script>";
            }
            else
            {
                echo mysqli_error($mysqli);
            }	
        }
        else
        {
            $dt = date("Y-m-d");
            $tim = date("H:i:s");
            $sql ="INSERT INTO his_opd_patient(opdpatientname,opdpatientadmissiondate,opdpatientadmissiontime,opdpatientaddress,opdpatientcity,opdpatientmobileno,opdpatientloginid,opdpatientpassword,opdpatientgender,opdpatientdob,opdpatientstatus) values('$_POST[patiente]','$dt','$tim','$_POST[textarea]','$_POST[city]','$_POST[mobileno]','$_POST[loginid]','$_POST[password]','$_POST[select6]','$_POST[dob]','Active')";
            if($qsql = mysqli_query($mysqli,$sql))
            {
                echo "<script>alert('patients record inserted successfully...');</script>";
                $insid= mysqli_insert_id($mysqli);
                if(isset($_SESSION[ad_id]))
                {
                    echo "<script>window.location='appointment.php?patid=$insid';</script>";	
                }
                else
                {
                    echo "<script>window.location='patientlogin.php';</script>";	
                }		
            }
            else
            {
                echo mysqli_error($mysqli);
            }
        }
    }
    if(isset($_GET[editid]))
    {
        $sql="SELECT * FROM his_opd_patient WHERE opdpatientid='$_GET[editid]' ";
        $qsql = mysqli_query($mysqli,$sql);
        $rsedit = mysqli_fetch_array($qsql);
        
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patient</a></li>
                                            <li class="breadcrumb-item active">Edit Patient</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Edit Patient Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!--Add Patient Form-->
										

                                    <form method="post" action="" name="frmpatapp" onSubmit="return validateform()" class="appointment-form" style="padding: 10px">



<div class="form-group"><label>Patient Name</label>
    <div class="form-line">
        <input class="form-control" type="text" name="patiente" id="patiente"
            value="<?php echo $rsedit[opdpatientname]; ?>" />
    </div>
</div>

<?php
if(isset($_GET[editid]))
{
    ?>

<div class="form-group"><label>Appointment Date</label>
    <div class="form-line">
    <input type="date" class="form-control" min="" name="appointmentdate" id="appointmentdate" value="<?php echo $rsedit[opdpatientadmissiondate]; ?>" readonly>
    </div>
</div>


<div class="form-group"><label>Appointment Time</label>
    <div class="form-line">
    <input type="time" class="form-control" name="appointmenttime" id="appointmenttime" value="<?php echo $rsedit[opdpatientadmissiontime]; ?>" readonly>
    </div>
</div>

<?php
}
?>
<div class="form-group">
    <label>Address</label>
    <div class="form-line">
        <input class="form-control " name="textarea" id="textarea" value="<?php echo $rsedit[opdpatientaddress]; ?>">
    </div>
</div>

<div class="form-group"><label>City</label>
    <div class="form-line">
        <input class="form-control" type="text" name="city" id="city"
            value="<?php echo $rsedit[opdpatientcity]; ?>" />
    </div>
</div>

<div class="form-group"><label>Mobile Number</label>
    <div class="form-line">
        <input class="form-control" type="text" name="mobileno" id="mobileno"
            value="<?php echo $rsedit[opdpatientmobileno]; ?>" />
    </div>
</div>

<div class="form-group"><label>PIN Code</label>
    <div class="form-line">
        <input class="form-control" type="text" name="pincode" id="pincode"
            value="<?php echo $rsedit[opdpatientpincode]; ?>" />
    </div>
</div>


<div class="form-group"><label>Email ID</label>
    <div class="form-line">
        <input class="form-control" type="email" name="email" id="email"
            value="<?php echo $rsedit[opdpatientemailid]; ?>" />
    </div>
</div>


<div class="form-group"><label>Password</label>
    <div class="form-line">
        <input class="form-control" type="password" name="password" id="password"
            value="<?php echo $rsedit[opdpatientpassword]; ?>" />
    </div>
</div>

<div class="form-group"><label>Blood Group</label>
    <div class="form-line"><select class="form-control show-tick" name="select2" id="select2">
            <option value="<?php echo $rsedit[opdpatientbloodgroup]; ?>">Select</option>
            <?php
        $arr = array("A+","A-","B+","B-","O+","O-","AB+","AB-");
        foreach($arr as $val)
        {
            if($val == $rsedit[opdpatientbloodgroup])
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


<div class="form-group"><label>Gender</label>
    <div class="form-line"><select class="form-control show-tick" name="select6" id="select6">
            <option value="<?php echo $rsedit[opdpatientgender]; ?>">Select</option>
            <?php
    $arr = array("MALE","FEMALE");
    foreach($arr as $val)
    {
        if($val == $rsedit[opdpatientgender])
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


<div class="form-group"><label>Date Of Birth</label>
    <div class="form-line">
        <input class="form-control" type="date" name="dob" max="<?php echo date("Y-m-d"); ?>"
            id="dob" value="<?php echo $rsedit[opdpatientdob]; ?>" />
    </div>
</div>





<input class="btn btn-info btn-md" type="submit" name="submit" id="submit" value="Submit" />




</form>       


                                    <!--End Patient Form-->
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