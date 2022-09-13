<!DOCTYPE html>
<html>
<head>
	<title>Excel Uploading PHP</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
	<h1>Excel Upload</h1>


	<form method="POST" action="upload_course.php" enctype="multipart/form-data">
		<div class="form-group">
			<label>Upload Excel File</label>
			<input type="file" name="file" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-success">Upload</button>
		</div>
	</form>
</div>
<?php
include("db/db.php");
require 'vendor/autoload.php';
if (isset($_POST['submit']))
{
      $fileName=$_FILES['file']['name'];
      $file_ext = pathinfo($fileName,PATHINFO_EXTENSION);

      $allowed_ext = ['xls','csv','xlsx'];

      if(in_array($file_ext,$allowed_ext))
      {
            $inputFileName = $_FILES['file']['tmp_name'];
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
            $data = $spreadsheet->getActiveSheet()->toArray();
            $i=0;
            foreach($data as $row)
            {
                  if($i>0)
                  {
                  $ccode = $row['0'];
                  $cname = $row['1'];
                  $lecthrs = $row['2'];
                  $tuthrs = $row['3'];
                  $practhrs = $row['4'];
                  $jhrs = $row['5'];
                  $credits = $row['6'];
                  // echo $ccode . " " .$cname." " .$lecthrs. " " . $tuthrs. " " .$practhrs. " " .$jhrs. " " .$credits;
                  // echo "\n";
                  
                  $sqlquery  = "INSERT INTO courses VALUES ('$ccode','$cname','.$lecthrs.','.$tuthrs.','.$practhrs.','.$jhrs.','.$credits.')";
                  $result = mysqli_query($conn, $sqlquery);
                  $msg = true;
            }
                  $i=$i+1;

                  }
            
            if(isset($msg)){
                  echo "Row inserted";
            }
            else {
                  echo "Row not inserted";
            }
      }
      else {
            
            header('Location:act.html');
            exit(0);
      }
}
?>

</body>
</html>
