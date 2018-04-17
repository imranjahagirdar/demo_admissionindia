<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .upper_most_menu a{color:white;}
    .uppermenu a{
        color:white; 
        font-weight: 500;}

    .collegemenu a{color:gray; 
        font-weight:500;}  

ul.breadcrumb li {
    display: inline;
    font-size: 10px;


}
ul.breadcrumb li+li:before {
    padding: 2px;
    color: white;
    content: "/\00a0";
}

ul.breadcrumb li a {
    color: white;
    text-decoration: none;
    
}
ul.breadcrumb li a:hover {
    color: gray;
    text-decoration: underline;
}


</style>
            <title>AdmissionIndia</title>
            <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="AdmissionIndia"/>
        <meta name="keywords" content="AdmissionIndia"/>
        <link rel="icon" href="hat.png" type="image/gif" sizes="30x30">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">


<!-- college detail page header menu -->
  <?php
 if (isset($_POST['submit'])) {

            $param = $_POST["name"];
        } else {
            $param = $_GET["q"];
        }
//connect  to the database
        include "db.php"; 
// Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
//-query  thed database table
        $sql = "SELECT DISTINCT company_information.*,college_information.university_id, college_information.universityname,college_information.imagelink, college_details.address,college_details.full_name, engg_branches.*, engineering_fees.*, facilities_available.* FROM college_information,college_details, company_information,engg_branches, engineering_fees, facilities_available WHERE universityname LIKE '%" . $param . "%' AND college_information.university_id=college_details.s_id AND company_information.s_id=college_information.university_id AND college_information.university_id=engg_branches.s_id AND
		college_information.university_id=facilities_available.u_id	AND college_information.university_id=engineering_fees.u_id";
$result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row

            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                
                <div class="col-sm-12"  style="background-image:url('<?php echo $row['imagelink']; ?>');background-size:100% 100%;height:200px;width:100%;">
                </div>
                        <div class="col-sm-12" style="background-color: black;margin-top:-200px;opacity:0.6;height:200px;width:100%;">
                        </div>
                        <nav class="navbar navbar-fixed-top" style="background-color: none; height:100px;">
                                <div class="container-fluid">
                                <div class="navbar-header">
                                <div class="col-md-4">
                <a class="navbar-brand" style="margin-left: 50px; margin-top:-40px" href="index.php"><img src="logo.jpg" alt="admissionindia" width="250px" height="110px;"></a>
    </div></div>
    <div class="col-sm-4" style="margin-top:10px; margin-left: 40px; ">
    <input type="text" class="form-control" placeholder="Search" style="background-color:#d0d3d8">
</div>
<div class="upper_most_menu">
    <ul class="nav navbar-nav" style="font-family: IBM Plex Sans, sans-serif; font-size:12px; font-weight: 400;padding:10px; float:right;margin-left:0px; padding:0px">
      <li><a href="index.php" >Home</a></li>
      <li><a href="#">Faqs</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">Sign Up</a></li>
      <li><a href="#">Sign In</a></li>
    </ul>
  </div>
</div>
<div class="uppermenu">
          <ul class="nav navbar-nav" style=" font-family: IBM Plex Sans, sans-serif; font-size:11px; font-weight: 400;margin-left:50px; padding:0px;" >
                 <li><p style="color:white;padding-top:15px;font-size: 15px">QUICK LINKS 
               <i style="border: solid white; border-width: 0 3px 3px 0; display: inline-block; padding: 3px; transform: rotate(-45deg);-webkit-transform: rotate(-45deg)" class="arrow right"></i>
    <i style="border: solid white;border-width: 0 3px 3px 0; display: inline-block; padding: 3px; transform: rotate(-45deg);-webkit-transform: rotate(-45deg)" class="arrow right"></i></p></li>
        <li ><a href="#">MANAGEMENT</a></li>
        <li><a href="#">MEDICAL</a></li>
        <li><a href="#">ACCOUNTS</a></li>
        <li><a href="#">ENGINEERING</a></li>
        <li><a href="#">UNIVERSITIES</a></li>
        <li><a href="#">COLLEGES</a></li>
        <li><a href="#">OTHER STREAMS</a></li>
        <li><a href="#">RESOURCES</a></li>

</div>
                    <div class="col-md-12">
                            <div class="col-md-1 col-sm-2 col-xs-2" style="margin-left:10px;">
                                <img class ="brightness" src="<?php echo $row['logo']; ?>" height="70" width="70">
                            </div>
                            <div class="col-sm-3">
                                <div class='transparent'>
                                     <ul class="breadcrumb" style="background-color: transparent;text-transform: uppercase;margin-top:-10px;margin-left: -30px">
                                        <li><a class="breadcrumb-item" href="index.php">HOME</a></li>
                                        <li><a class="breadcrumb-item" href="#"><?php echo $row['universityname'];?></a></li>
                                     </ul>
                                </div>
                            </div>
                    </div>
                    <div class="collegename col-md-12" style="text-transform: uppercase; color:white;margin-left:110px;margin-top: -70px">
                        <h2><?php echo $row['universityname'];?></h2>                        
                    </div>
                    <div class="collegeaddress col-md-12" style="text-transform: uppercase; color:white;margin-left:110px;margin-top:-15px;font-size: 10px">
                        <span class="glyphicon glyphicon-map-marker" style="font-size:12px;padding-right:3px"></span><?php echo $row['address'];?>                      
                    </div>

      <?php }
       } ?>
<div class="collegemenu">
          <ul class="nav navbar-nav" style="font-family: IBM Plex Sans, sans-serif; font-size:13px;margin-top:30px; padding:0px;" >
                     
                     <li ><a href="#">INFO</a></li>
                     <li><a href="#">COURSES & FEE</a></li>
                     <li><a href="#">ADMISSION 2018</a></li>
                     <li><a href="#">FACULTY</a></li>
                     <li><a href="#">GALLERY</a></li>
                     <li><a href="#">NEWS & UPDATES</a></li>
                     <li><a href="#">HOSTEL</a></li>
                     

                         
           </ul>
        </div>




