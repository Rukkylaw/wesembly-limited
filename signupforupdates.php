<?php
 $con = mysqli_connect('localhost','wessembly_wessembly',')2gatncyvEVF');

 if(!$con)
{
  echo 'Not connected to server';
}

 if(!mysqli_select_db($con, 'wessembly_db'))
{
  echo 'Database not selected';
}

$Email = $_POST['email'];

    

 $sql= "INSERT INTO updates(email) VALUES ('$Email')";

 if (!mysqli_query($con,$sql))
 {
    
  echo 'Not Inserted';
 }
 else{
        echo 'Success back to <a href="https://test.wessembly.com/">Home Page</a>';}
 ?>

