<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<h2>Course Details</h2>

<table style="width:100%">
  <tr>
    <th>Course Code</th>
    <th>Course Name</th>
  </tr>
  <?php
  $conn = mysqli_connect('localhost','root','','facinfo');
  $result = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE 1");
  $course_list = array();

  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
      array_push($course_list,$row);
      echo "<tr>
      <td>".$row['0']."</td>
      <td>".$row['1']."</td>
      </tr>
      
      " ;
  }

  ?>
  </table>
  <h3>Insert Courses</h3>
  
  <form method="post" >
  <label for="course0">First Preference:</label>
  <select name="course0" id="course0">
  <option value="-1">Select Course</option>
      <?php 
      for($x=0;$x<count($course_list);$x++)
      {
            echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>";
      }
      
      ?>
</select><br><br>
<label for="course1">Second Preference:</label>
  <select name="course1" id="course1">
      <option value="-1">Select Course</option>
      <?php 

      echo "Hello";
      for($x=0;$x<count($course_list);$x++)
{
            echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>";
      
}
      $val1 = $_REQUEST['course1'];
      
      ?>
</select><br><br>
  <label for="course2">Third Preference:</label>
  <select name="course2" id="course2">
  <option value="-1">Select Course</option>
      <?php 
      
      for($x=0;$x<count($course_list);$x++)
      {
            
            echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>";
      
           
      }
      
      ?>
</select><br><br>


<label for="course3">Fourth Preference:</label>
  <select name="course3" id="course3">
  <option value="-1">Select Course</option>
      <?php 
      for($x=0;$x<count($course_list);$x++)
      {
      
                  echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>".$val;
      }
      
      $val3 = $_REQUEST['course3'];
      ?>
</select><br><br>
<label for="course4">Fifth Preference:</label>
  <select name="course4" id="course4">
  <option value="-1">Select Course</option>
      <?php 
   
      for($x=0;$x<=count($course_list);$x++)
      {
           
            
                  echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>";
            
      }
      
      $val4 = $_REQUEST['course4'];
      ?>
</select><br>
<input type="submit" name="submit" />
  </form>
  <?php
  
  if(isset($_POST['submit']))
  {
      $c1=$_REQUEST['course0'];
  $c2=$_REQUEST['course1'];
  $c3=$_REQUEST['course2'];
  $c4=$_REQUEST['course3'];
  $c5=$_REQUEST['course4'];
      $fid=1;
      $sqlquery  = "INSERT INTO faculty_course_list VALUES ('$fid','$c1','$c2','$c3','$c4','$c5')";
      $result = mysqli_query($conn, $sqlquery);
      $msg = true;
     
      if(isset($msg)){
            echo "Row inserted";
            
      }
      // else {
      //       echo "Row not inserted";
      // }
  }
  
  ?>



</body>
</html>

