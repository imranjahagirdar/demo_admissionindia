
<?php
$con = mysqli_connect('localhost','admissio_user22','vashi@123','admissio_university_tabdatabase');

if (isset($_POST['university_id'])) {
  
  $qry = "select * from college_details where s_id=".mysqli_real_escape_string($con,$_POST['university_id'])." ";
  $res = mysqli_query($con, $qry);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->id.'">'.$row->full_name.'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }

} else if(isset($_POST['college_id'])) {

  $qry = "select * from coursetbl where CollegeId=".mysqli_real_escape_string($con,$_POST['college_id'])." ";
  $res = mysqli_query($con, $qry);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->CourseId.'">'.$row->CourseName.'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }

} else if(isset($_POST['course_id'])) {

  $qry = "select * from subcoursetbl where Course_Id=".mysqli_real_escape_string($con,$_POST['course_id'])." ";
  $res = mysqli_query($con, $qry) or die(mysqli_error());
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->SubcourseId.'">'.$row->SubcourseName.'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }
}

?>