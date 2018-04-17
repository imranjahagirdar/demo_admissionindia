<!DOCTYPE html>
<html lang="en">
<head>
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
  <style>
  
  nav a{color:white;}
  
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
   
    text-align: center;
}


button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: gray;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
}

button:hover, a:hover {
    opacity: 0.7;
    .nav a{color:white;}
}
</style>
</head>
<body>
  <!----Navbar-->
<?php include"header.php"?>

<!--- carousel effect-->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="admission-india-home-page-slider.jpg" alt="Alliance" style="width:100%; margin-top:100px">
    </div>

    <div class="item">
      <img src="admission-india-home-page-slider.jpg" alt="acadamy" style="width:100%;margin-top:100px">
    </div>

    <div class="item">
      <img src="admission-india-home-page-slider.jpg" alt="convocation" style="width:100%;margin-top:100px">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <h2 style="font-family: verdana;font-weight:700; font-size: 18PX;Color:#202020;line-height: 20PX">COLLEGE</h2>
        <div class="card">
	           <?php
	                   //$con = mysqli_connect('localhost','admissio_user22','vashi@123','admissio_university_tabdatabase');
$con = mysqli_connect('localhost','root','','admissio_university_tabdatabase');  
						    	   $query3= "SELECT  college_information.*, college_details.*, websitetag.* FROM college_information, college_details, websitetag WHERE college_information.university_id = college_details.s_id AND            college_details.s_id = websitetag.s_id";
							      $result = mysqli_query($con, $query3);
							               if (mysqli_num_rows($result) > 0) {
							                   while($query4 = mysqli_fetch_assoc($result)){
							 ?>
							 
<div class="col-md-3 col-sm-4 col-xs-12 " style="margin-left:48px;padding-top:10px; margin-top:25px; width:250px; height:200px;">
 <img src="<?php echo $query4['imagelink'];?>" height="100px" width="250px" alt="Image"/>
  <h6 style="text-align:justify"><?php echo $query4['universityname'];?></h6>
       <p style="width:250px;"><a href="detail.php?q=<?php echo $query4['universityname'];?>"> <button>View Details</button></a> </p>
                    </div>
        </div>
                    <?php } } ?>




  <?php include"footer.php";?>
  
</body>
</html>