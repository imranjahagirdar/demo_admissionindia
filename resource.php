<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
<title>AdmissionIndia</title>
<style type="text/css">nav a{color:white;}</style>
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
</head>



<body>
  <?php include "header.php";?>  

//Include the database configuration file
<div class="container-fluid">
  <div class="row">
    <form action ="resourcedb.php" method="POST">
    <div class="col-xs-12 col-md-sm-6 col-md-3" style="margin-top:200px">
        
      <label>University :</label>
      <select name="university" class="form-control" id="university">
        <option value=''>------- Select --------</option>
        <?php 
        $con = mysqli_connect('localhost','admissio_user22','vashi@123','admissio_university_tabdatabase');
        $sql = "select * from `college_information`";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0) {
          while($row = mysqli_fetch_object($res)) {
            echo "<option value='".$row->university_id."'>".$row->universityname."</option>";
          }
        }
        ?>
      </select>
    </div>
    <div class="col-xs-12 col-md-sm-6 col-md-3" style="margin-top:200px">
      <label>College :</label>
      <select name="college" class="form-control" id="college" disabled="disabled"><option>------- Select --------</option></select>
    </div>
    <div class="col-xs-12 col-md-sm-6 col-md-3" style="margin-top:200px">
      <label>course:</label>
      <select name="course" class="form-control" id="course" disabled="disabled"><option>------- Select --------</option></select>
    </div>
    <div class="col-xs-12 col-md-sm-6 col-md-3" style="margin-top:200px">
      <label>subcourse</label>
      <select name="subcourse" class="form-control" id="subcourse" disabled="disabled"><option>------- Select --------</option></select>
    </div>
  </div>
  <div class="col-md-2" style="margin-top:20px;margin-left:400px">
  <input type="submit"  class="form-control" name="submit"></div>
</form>
</div>

<script type="text/javascript">
  
$(document).ready(function() {

  //Change in continent dropdown list will trigger this function and
  //generate dropdown options for county dropdown

  $(document).on('change','#university', function() {
    var university_id = $(this).val();
    if(university_id != "") {
      $.ajax({
        url:"get_data.php",
        type:'POST',
        data:{university_id:university_id},
        success:function(response) {
          //var resp = $.trim(response);
          if(response != '') {
            $("#college").removeAttr('disabled','disabled').html(response);
            $("#course, #subcourse").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          } else {
            $("#college, #course, #subcourse").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          }
        }
      });
    } else {
      $("#college, #course, #subcourse").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
    }
  });


  //Change in coutry dropdown list will trigger this function and
  //generate dropdown options for state dropdown
  $(document).on('change','#college', function() {
    var college_id = $(this).val();
    
    if(college_id != "") {
  
      $.ajax({
        url:"get_data.php",
        type:'POST',
        data:{college_id:college_id},
        success:function(response) {
          //var resp = $.trim(response);
          
          if(response != '') {
            $("#course").removeAttr('disabled','disabled').html(response);
            $("#subcourse").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          }
          else $("#course, #subcourse").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
        }
      });
    } else {
      $("#course, #subcourse").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
    }
  });



  //Change in state dropdown list will trigger this function and
  //generate dropdown options for city dropdown
  $(document).on('change','#course', function() {
    var course_id = $(this).val();
    if(course_id != "") {
      $.ajax({
        url:"get_data.php",
        type:'POST',
        data:{course_id:course_id},
        success:function(response) {
          if(response != '') $("#subcourse").removeAttr('disabled','disabled').html(response);
          else $("#subcourse").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
        }
      });
    } else {
      $("#subcourse").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
    }
  });
});




</script>

</body>
</html>