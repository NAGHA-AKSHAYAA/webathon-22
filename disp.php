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
    <th>Lecture hours</th>
    <th>Tutorial hours</th>
    <th>Practical hours</th>
    <th>J project hours</th>
    <th>Credits</th>

  </tr>
  <?php
  $conn = mysqli_connect('localhost','root','','facinfo');
  $result = mysqli_query($conn,"SELECT * FROM `courses` WHERE 1");
  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
      echo "<tr>
      <td>".$row['0']."</td>
      <td>".$row['1']."</td>
      <td>".$row['2']."</td>
      <td>".$row['3']."</td>
      <td>".$row['4']."</td>
      <td>".$row['5']."</td>
      <td>".$row['6']."</td>

      </tr>
      
      " ;
  }

  ?>
  </table>
  <h3>Insert Courses</h3>
  <table>
  <tr>
    <th>Course Code</th>
    <th>Course Name</th>
    <th>Lecture hours</th>
    <th>Tutorial hours</th>
    <th>Practical hours</th>
    <th>J project hours</th>
    <th>Credits</th>
    <th>Add courses</th>


  </tr>
  <form method="post" >
      <tr>
            <td><input type="text" name = "code" /></td>
            <td><input type="text" name = "name" /></td>
            <td><input type="text" name = "lhrs" /></td>
            <td><input type="text" name = "thrs" /></td>
            <td><input type="text" name = "phrs" /></td>
            <td><input type="text" name = "jhrs" /></td>
            <td><input type="text" name = "credits" /></td>
            <td><input type="submit" name = "submit" value = "Add"/> </td>


      </tr>
  </form>
  <?php
  
  if(isset($_POST['submit']))
  {
      $ccode=$_REQUEST['code'];
  $cname=$_REQUEST['name'];
  $lecthrs=$_REQUEST['lhrs'];
  $tuthrs=$_REQUEST['thrs'];
  $practhrs=$_REQUEST['phrs'];
  $jhrs=$_REQUEST['jhrs'];
  $credits=$_REQUEST['credits'];
 
      $sqlquery  = "INSERT INTO courses VALUES ('$ccode','$cname','.$lecthrs.','.$tuthrs.','.$practhrs.','.$jhrs.','.$credits.')";
      $result = mysqli_query($conn, $sqlquery);
      $msg = true;
     
      if(isset($msg)){
            echo "Row inserted";
            header('Location:disp.php');
      }
      // else {
      //       echo "Row not inserted";
      // }
  }
  
  ?>
</table>


</body>
</html>

