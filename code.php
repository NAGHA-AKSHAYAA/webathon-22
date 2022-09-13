<?php
$conn = mysqli_connect('localhost','root','','facinfo');
require 'vendor/autoload.php';
echo "Hello";
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