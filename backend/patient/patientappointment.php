<?php
  session_start();
  include('assets/inc/config.php');
 

  if(isset($_POST[submit]))
  {
      //$encrypt = sha1(md5($_POST['password']));
          if(isset($_SESSION[opdpatientid]))
      {
          $lastinsid =$_SESSION[opdpatientid];
      }
      else
      {
          $dt = date("Y-m-d");
          $tim = date("H:i:s");
          $sql ="INSERT INTO his_opd_patient(opdpatientname,opdpatientadmissiondate,opdpatientadmissiontime,opdpatientaddress,opdpatientcity,opdpatientpincode,opdpatientmobileno,opdpatientemailid,opdpatientpassword,opdpatientbloodgroup,opdpatientgender,opdpatientdob,opdpatientstatus) values('$_POST[patiente]','$dt','$tim','$_POST[textarea]','$_POST[city]','$_POST[pincode]','$_POST[mobileno]','$_POST[email]','$_POST[password]','$_POST[select2]','$_POST[select6]','$_POST[dob]','Active')";
          if($qsql = mysqli_query($mysqli,$sql))
          {
              echo "<script>alert('patient record inserted successfully...');</script>";
          }
          else
          {
              echo mysqli_error($mysqli);
          }
          $lastinsid = mysqli_insert_id($mysqli);
      }
  }


?>  
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

            <!-- Make an Appointment -->
            <div class="container mt-4 appointment-container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="appointment">
                            <!-- Heading -->
                            <div class="heading-block head-left mb-4">
                                <h2>Make an Appointment</h2>   
                            </div>
                            <form method="post" action="" name="frmpatapp" onSubmit="return validateform()" class="appointment-form">
                                <ul class="row" style="list-style-type:none;">
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="Patient's Name" type="text" class="form-control" name="patiente" id="patiente">
                                        </label>
                                    </li>

                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="Address" type="text" class="form-control" name="textarea" id="textarea">
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="City" type="text" class="form-control" name="city" id="city">
                                        </label>
                                    </li>

                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="Pincode" type="text" class="form-control" name="pincode" id="pincode">
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="Contact Number" type="text" class="form-control" name="mobileno" id="mobileno">
                                        </label>
                                    </li>

                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="Date of birth" type="text" class="form-control" name="dob" id="dob" onfocus="(this.type='date')">
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="Email ID" type="text" class="form-control" name="email" id="email" value="">
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="Password" type="password" class="form-control" name="password" id="password" value="">
                                        </label>
                                    </li>

                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <div class="btn-group bootstrap-select">
                                                    <!-- <button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" data-id="select6" title="Select Gender">
                                                        <span class="filter-option pull-left">Select Gender</span>
                                                        <span class="bs-caret">
                                                            <span class="caret"> </span>
                                                        </span>
                                                    </button> -->
                                                <div class="dropdown-menu open" role="combobox">
                                                        <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                                                        <li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Select Bloodgroup</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                        </ul>
                                                </div>
                                                <select class="form-control show-tick" name="select2" id="select2" class="selectpicker" tabindex="-98">
                                                    <option value="" selected="" hidden="">Select Bloodgroup</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>                                               
                                                </select>
                                            </div>
                                        </label>
                                    </li>
                                  
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <div class="btn-group bootstrap-select">
                                                    <!-- <button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" data-id="select6" title="Select Gender">
                                                        <span class="filter-option pull-left">Select Gender</span>
                                                        <span class="bs-caret">
                                                            <span class="caret"> </span>
                                                        </span>
                                                    </button> -->
                                                <div class="dropdown-menu open" role="combobox">
                                                        <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                                                        <li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Select Gender</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                        </ul>
                                                </div>
                                                <select class="form-control show-tick" name="select6" id="select6" class="selectpicker" tabindex="-98">
                                                    <option value="" selected="" hidden="">Select Gender</option>
                                                    <option value="Male">Male</option><option value="Female">Female</option>                                                
                                                </select>
                                            </div>
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="Appointment Date" type="text" class="form-control" min="" name="appointmentdate" onfocus="(this.type='date')" id="appointmentdate">
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <input placeholder="Appointment Time" type="text" onfocus="(this.type='time')" class="form-control" name="appointmenttime" id="appointmenttime">
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                            <select class="form-control show-tick" name="deptname" class="selectpicker" id="deptname">
                                                <option value="">Select Doc Department</option>
                                                <?php
                                                    $sqldept = "SELECT * FROM his_doc_dept WHERE status='Active'";
                                                    $qsqldept = mysqli_query($mysqli,$sqldept);
                                                    while($rsdept = mysqli_fetch_array($qsqldept))
                                                        {
                                                            echo "<option value='$rsdept[doc_dept_id]'>$rsdept[doc_dept_name]</option>";
                                                        }
                                                ?>
                                            </select>
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-6 mb-2">
                                        <label>
                                        <select class="form-control show-tick" name="doct" class="selectpicker" id="department">
                                                    <option value="">Select Doctor</option>
                                                    <?php
                                                    $sqldept = "SELECT * FROM his_docs WHERE doc_status='Active'";
                                                    $qsqldept = mysqli_query($mysqli,$sqldept);
                                                    while($rsdept = mysqli_fetch_array($qsqldept))
                                                    {
                                                        echo "<option value='$rsdept[doc_id]'>$rsdept[doc_name] (";
                                                        $sqldept = "SELECT * FROM his_doc_dept WHERE doc_dept_id='$rsdept[doc_dept_id]'";
                                                        $qsqldepta = mysqli_query($mysqli,$sqldept);
                                                        $rsdept = mysqli_fetch_array($qsqldepta);
                                                        echo $rsdept[doc_dept_name];

                                                        echo ")</option>";
                                                    }
                                                    ?>
                                                </select>
                                            
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-12 mb-2">
                                        <label>
                                            <textarea class="form-control" name="app_reason" placeholder="Appointment reason"></textarea>
                                        </label>
                                    </li>
                                        
                                    <li class="col-sm-12 mb-2">
                                        <button type="submit" class="btn btn-info btn-md" name="submit" id="submit">MAKE AN APPOINTMENT</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <?php 
            include('assets/inc/footer.php');
        ?>
               <!-- end Footer -->
    </body>
</html>