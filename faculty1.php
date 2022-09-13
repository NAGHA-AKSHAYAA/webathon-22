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
  $result = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE batch>0");
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
  <select name="course0" id="course0" onchange="myFunction()">
  <option value="-1">Select Course</option>
      <?php 
      for($x=0;$x<count($course_list);$x++)
      {
            echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>";
      }
      
      ?>
</select><br><br>
<!-- <script type="text/javascript">
      function myFunction() {
var cl = <?php echo json_encode($course_list); ?>;
var x = document.getElementById("course0").value;
var i=0;
for(i=0;i<cl.length;i++)
{
      if(x==cl[i][0])
      {
            break;
      }
}
cl[i]=cl[cl.length-1];
cl[cl.length-1]=x;
cl.pop()

alert(cl)

      }
</script> -->
<label for="course1">Second Preference:</label>
  <select name="course1" id="course1" onchange="myFunction1()">
      <option value="-1">Select Course</option>
      <?php 
      $val = $_REQUEST['course0'];
      echo "Hello";
      for($x=0;$x<count($course_list);$x++)
{
      if($course_list[$x][0]!=$val)
            echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>";
      
}
      $val1 = $_REQUEST['course1'];
      
      ?>
</select><br><br>
<script type="text/javascript">
      function myFunction1() {
var x = document.getElementById("course0").value;
var x1 = document.getElementById("course1").value;
if(x1==x){
      alert("Preferences cannot be same")
      document.getElementById('course1').value = "-1";
}

var i=0;
for(i=0;i<cl.length;i++)
{
      if(x==cl[i][0])
      {
            break;
      }
}
cl[i]=cl[cl.length-1];
cl[cl.length-1]=x;
cl.pop()

alert(cl)

      }
</script>
  <label for="course2">Third Preference:</label>
  <select name="course2" id="course2" onchange="myFunction2()">
  <option value="-1">Select Course</option>
      <?php 
      
      for($x=0;$x<count($course_list);$x++)
      {
            
            echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>";
      
           
      }
      
      ?>
</select><br><br>
<script type="text/javascript">
      function myFunction2() {
var x = document.getElementById("course0").value;
var x1 = document.getElementById("course1").value;
var x2 = document.getElementById("course2").value;

if(x1==x || x2==x || x2 == x1){
      alert("Preferences cannot be same")
      document.getElementById('course2').value = "-1";
}

var i=0;
for(i=0;i<cl.length;i++)
{
      if(x==cl[i][0])
      {
            break;
      }
}
cl[i]=cl[cl.length-1];
cl[cl.length-1]=x;
cl.pop()

alert(cl)

      }
</script>

<label for="course3">Fourth Preference:</label>
  <select name="course3" id="course3" onchange="myFunction3()">
  <option value="-1">Select Course</option>
      <?php 
      for($x=0;$x<count($course_list);$x++)
      {
      
                  echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>".$val;
      }
      
      $val3 = $_REQUEST['course3'];
      ?>
</select><br><br>
<script type="text/javascript">
      function myFunction3() {
var x = document.getElementById("course0").value;
var x1 = document.getElementById("course1").value;
var x2 = document.getElementById("course2").value;
var x3 = document.getElementById("course3").value;


if(x3==x1 || x3 == x2 || x3 == x){
      alert("Preferences cannot be same")
      document.getElementById('course3').value = "-1";
}

var i=0;
for(i=0;i<cl.length;i++)
{
      if(x==cl[i][0])
      {
            break;
      }
}
cl[i]=cl[cl.length-1];
cl[cl.length-1]=x;
cl.pop()

alert(cl)

      }
</script>
<label for="course4">Fifth Preference:</label>
  <select name="course4" id="course4" onchange="myFunction4()">
  <option value="-1">Select Course</option>
      <?php 
   
      for($x=0;$x<=count($course_list);$x++)
      {
           
            
                  echo "<option value=".$course_list[$x][0].">".$course_list[$x][1]."</option>";
            
      }
      
      $val4 = $_REQUEST['course4'];
      ?>
</select><br>
<script type="text/javascript">
      function myFunction4() {
var x = document.getElementById("course0").value;
var x1 = document.getElementById("course1").value;
var x2 = document.getElementById("course2").value;
var x3 = document.getElementById("course3").value;
var x4 = document.getElementById("course4").value;


if(x3==x4 || x4 == x2 || x4 == x || x4==x1){
      alert("Preferences cannot be same")
      document.getElementById('course4').value = "-1";
}

var i=0;
for(i=0;i<cl.length;i++)
{
      if(x==cl[i][0])
      {
            break;
      }
}
cl[i]=cl[cl.length-1];
cl[cl.length-1]=x;
cl.pop()

alert(cl)

      }
</script>
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
      $fid=3;
      $sqlquery  = "INSERT INTO faculty_course_list VALUES ('$fid','$c1','$c2','$c3','$c4','$c5')";
      $result = mysqli_query($conn, $sqlquery);
      $sqlc1q = "Select * from `course_nr` WHERE `Code`='$c1'";
      $result1 = mysqli_query($conn,$sqlc1q);
      while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
            $code1 =$row['0'];
            $tot = $row['1'];
      }
      $tot=$tot+1;
      $sqlc1 = "UPDATE `course_nr` SET `Code`='$c1',`Total_pref`='$tot' WHERE `Code`='$c1' ";
      $result1 = mysqli_query($conn,$sqlc1);
      $sqlc1q = "Select * from `course_nr` WHERE `Code`='$c2'";
      $result1 = mysqli_query($conn,$sqlc1q);
      while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
            $code1 =$row['0'];
            $tot = $row['1'];
      }
      $tot=$tot+1;
      $sqlc1 = "UPDATE `course_nr` SET `Code`='$c2',`Total_pref`='$tot' WHERE `Code`='$c2'";
      $result1 = mysqli_query($conn,$sqlc1);
      


      $sqlc1q = "Select * from `course_nr` WHERE `Code`='$c3'";
      $result1 = mysqli_query($conn,$sqlc1q);
      while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
            $code1 =$row['0'];
            $tot = $row['1'];
      }
      $tot=$tot+1;
      $sqlc1 = "UPDATE `course_nr` SET `Code`='$c3',`Total_pref`='$tot' WHERE `Code`='$c3'";
      $result1 = mysqli_query($conn,$sqlc1);
      $sqlc1q = "Select * from `course_nr` WHERE `Code`='$c4'";
      $result1 = mysqli_query($conn,$sqlc1q);
      while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
            $code1 =$row['0'];
            $tot = $row['1'];
      }
      $tot=$tot+1;
      $sqlc1 = "UPDATE `course_nr` SET `Code`='$c4',`Total_pref`='$tot' WHERE `Code`='$c4'";
      $result1 = mysqli_query($conn,$sqlc1);

      $sqlc1q = "Select * from `course_nr` WHERE `Code`='$c5'";
      $result1 = mysqli_query($conn,$sqlc1q);
      while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
            $code1 =$row['0'];
            $tot = $row['1'];
      }
      $tot=$tot+1;
      $sqlc1 = "UPDATE `course_nr` SET `Code`='$c5',`Total_pref`='$tot' WHERE `Code`='$c5'";
      $result1 = mysqli_query($conn,$sqlc1);
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

