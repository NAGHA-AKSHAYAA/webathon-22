<!DOCTYPE html>
<html>
<head>
	<title>Admin View Teacher Preference</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <div class="container">
  	<h1>Teacher Preferences</h1>
    <form method="post">
       <input type="submit" name="button1"
               class="button" value="Pending" />

       <input type="submit" name="button2"
               class="button" value="Filled In" />
   </form>
  </div>

    <?php
        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }
        function button2() {
          echo "<br><br><br>
          <table class=\"tablecenter table table-hover\" >
            <tr>
              <th>Teacher ID</th>
              <th>Preference 1</th>
              <th>Preference 2</th>
              <th>Preference 3</th>
              <th>Preference 4</th>
              <th>Preference 5</th>
          </tr>";
          include("adminprefdb.php");
        $result = mysqli_query($conn,"SELECT * FROM `preferences` WHERE 1");
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
          echo "<tr>
           <td>".$row['0']."</td>
           <td>".$row['1']."</td>
           <td>".$row['2']."</td>
           <td>".$row['3']."</td>
           <td>".$row['4']."</td>
           <td>".$row['5']."</td>
           </tr>" ;
 }
        echo"  </table>";
        }
        function button1() {
          echo "<br><br><br>
          <table class=\"tablecenter table table-hover\" >
            <tr>
              <th>Teacher ID</th>
              <th>Email ID</th>
              <th>Mail</th>
          </tr>";
          include("adminprefdb.php");
        $result = mysqli_query($conn,"SELECT EmpID,Email from `faculty_info` where EmpID IN (SELECT EmpID FROM `faculty_info` EXCEPT SELECT user_id FROM `preferences`)");
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
          echo "<tr>
           <td>".$row['0']."</td>
           <td>".$row['1']."</td>
           <td><a href=\"mailto:".$row['1']."\">Email</a></td>
           </tr>" ;
 }
        echo"  </table>";

        }?>

</body>
</html>
