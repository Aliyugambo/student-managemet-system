<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']) && isset($_FILES['my_image']))
{ 

 $img_name = $_FILES['my_image']['name'];
 $img_size =  $_FILES['my_image']['size'];
$tmp_name =  $_FILES['my_image']['tmp_name'];
 $error =  $_FILES['my_image']['error'];
if($error ==0 ){

                     if($img_size >1250000){

                          echo "Sorry, your file is to large.";
                          // header("Location: add-students.php?error=$em");

                     }else{
                       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                       $img_ex_lc = strtolower($img_ex);

                       $allowed_exs = array("jpg","jpeg","png");

                       if(in_array( $img_ex_lc, $allowed_exs)){

                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);


                    }else{
                     echo "You cant Upload file of this type";
                       }
                }
            }else{
                echo "unknown error occured!";
             }


$studentname=$_POST['fullanme'];
$studentname2=$_POST['lname'];
$roolid=$_POST['rollid']; 
$studentemail=$_POST['emailid']; 
$gender=$_POST['gender']; 
$classid=$_POST['class']; 
$Section=$_POST['section'];
$State=$_POST['state'];
$LGA=$_POST['lga'];
$dob=$_POST['dob']; 
$status=1;
$studentname3=$_POST['fname'];
$studentname4=$_POST['addresses'];
$studentname5=$_POST['phone'];
$studentname6=$_POST['role'];
$sql="INSERT INTO  tblstudents(
StudentName,LastName,RollId,StudentEmail,Gender,ClassId,SectionName,StateOrigin,LocalGA,DOB,Status,FName,Address,PHONE,Occopation,Studentimage_url) VALUES(:studentname,:studentname2,:roolid,:studentemail,:gender,:classid,:Section,:State,:LGA,:dob,:status,:studentname3,:studentname4,:studentname5,:studentname6,:new_img_name)";
$query = $dbh->prepare($sql);
$query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
$query->bindParam(':studentname2',$studentname2,PDO::PARAM_STR);
$query->bindParam(':roolid',$roolid,PDO::PARAM_STR);
$query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query->bindParam(':Section',$Section,PDO::PARAM_STR);
$query->bindParam(':State',$State,PDO::PARAM_STR);
$query->bindParam(':LGA',$LGA,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':studentname3',$studentname3,PDO::PARAM_STR);
$query->bindParam(':studentname4',$studentname4,PDO::PARAM_STR);
$query->bindParam(':studentname5',$studentname5,PDO::PARAM_STR);
$query->bindParam(':studentname6',$studentname6,PDO::PARAM_STR);
$query->bindParam(':new_img_name', $new_img_name,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Student info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Admin| Student Admission </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('includes/leftbar.php');?>
                <!-- /.left-sidebar -->

                <div class="main-page">

                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Student Admission</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                    <li class="active">Student Admission</li>
                                </ul>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Fill the Student info</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong>
                                            <?php echo htmlentities($msg); ?>
                                        </div>
                                        <?php } 
else if($error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong>
                                            <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
  
<!-- <form class="form-horizontal" method="post" enctype="multipart/form-data" >

<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Upload Passport</label>
    <div class="col-sm-4">
 <input type="file" name="my_image" class="form-control" id="my_image" required="required" autocomplete="off">
     </div>
    </div>
    <div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="submit2" class="btn btn-primary">upload</button>
</div>
</div>
</form> -->

<form class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Upload Passport</label>
    <div class="col-sm-4">
 <input type="file" name="my_image" class="form-control" id="my_image" required="required" autocomplete="off">
     </div>
    </div>

 
                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">First Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="fullanme" class="form-control" id="fullanme" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Last Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="lname" class="form-control" id="lname" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Admission Nummber</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="rollid" class="form-control" id="rollid" maxlength="5" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Email id)</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="emailid" class="form-control" id="email" required="required" autocomplete="off">
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
                                                </div>
                                            </div>

<div class="form-group">
 <label for="default" class="col-sm-2 control-label">Class</label>
<div class="col-sm-10">
 <select name="class" class="form-control" id="default" required="required">
    <option value="">Select Class</option>
 <?php $sql = "SELECT * from tblclasses";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>">
 <?php echo htmlentities($result->ClassName); ?>&nbsp; Section-
     <?php echo htmlentities($result->Section); ?>
     </option>
     <?php }} ?>
 </select>
</div>
</div>

<div class="form-group">
 <label for="default" class="col-sm-2 control-label">Session</label>
<div class="col-sm-10">
 <select name="section" class="form-control" id="default" required="required">
    <option value="">Select Session</option>
 <?php $sql1 = "SELECT * from tblsession";
$query1 = $dbh->prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results1 as $result1)
{   ?>
<option value="<?php echo htmlentities($result1->id); ?>">
 <?php echo htmlentities($result1->SectionName); ?>
     </option>
     <?php }} ?>
 </select>
</div>
</div>
 <div class="form-group">
                <label for="default" class="col-sm-2 control-label">State of Origin</label>
                <div class="col-sm-10">
                <select 
                  onchange="toggleLGA(this);" name="state"id="state"class="form-control"required="required" >
                  <option value="" selected="selected">- Select -</option>
                  <option value="Abia">Abia</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="AkwaIbom">AkwaIbom</option>
                  <option value="Anambra">Anambra</option>
                  <option value="Bauchi">Bauchi</option>
                  <option value="Bayelsa">Bayelsa</option>
                  <option value="Benue">Benue</option>
                  <option value="Borno">Borno</option>
                  <option value="Cross River">Cross River</option>
                  <option value="Delta">Delta</option>
                  <option value="Ebonyi">Ebonyi</option>
                  <option value="Edo">Edo</option>
                  <option value="Ekiti">Ekiti</option>
                  <option value="Enugu">Enugu</option>
                  <option value="FCT">FCT</option>
                  <option value="Gombe">Gombe</option>
                  <option value="Imo">Imo</option>
                  <option value="Jigawa">Jigawa</option>
                  <option value="Kaduna">Kaduna</option>
                  <option value="Kano">Kano</option>
                  <option value="Katsina">Katsina</option>
                  <option value="Kebbi">Kebbi</option>
                  <option value="Kogi">Kogi</option>
                  <option value="Kwara">Kwara</option>
                  <option value="Lagos">Lagos</option>
                  <option value="Nasarawa">Nasarawa</option>
                  <option value="Niger">Niger</option>
                  <option value="Ogun">Ogun</option>
                  <option value="Ondo">Ondo</option>
                  <option value="Osun">Osun</option>
                  <option value="Oyo">Oyo</option>
                  <option value="Plateau">Plateau</option>
                  <option value="Rivers">Rivers</option>
                  <option value="Sokoto">Sokoto</option>
                  <option value="Taraba">Taraba</option>
                  <option value="Yobe">Yobe</option>
                  <option value="Zamfara">Zamafara</option>
                </select>
              </div>
          </div>

              <div class="form-group">
                <label for="default" class="col-sm-2 control-label">LGA of Origin</label>
                <div class="col-sm-10">
                <select
                  name="lga"id="lga" class="form-control select-lga" required>
                </select>
              </div>
          </div>



                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label">DOB</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" class="form-control" id="date">
                                                </div>
                                            </div>
 <div class="panel-heading">
 <div class="panel-title">
 <h5>Parent/Giudian Infomation</h5>
</div>
</div>

 <div class="form-group">
 <label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="fname" class="form-control" id="fname" required="required" autocomplete="off">
</div>
</div>
 <div class="form-group">
 <label for="default" class="col-sm-2 control-label">Home Address</label>
<div class="col-sm-10">
<input type="text" name="addresses" class="form-control" id="addresses" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
 <label for="default" class="col-sm-2 control-label">Phone Number</label>
<div class="col-sm-10">
<input type="Number" name="phone" class="form-control" id="phone" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
 <label for="default" class="col-sm-2 control-label">Occopation</label>
<div class="col-sm-10">
<input type="text" name="role" class="form-control" id="role" required="required" autocomplete="off">
</div>
</div>



                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="js/lga.min.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });

        </script>
</body>

</html>
<?PHP } ?>
