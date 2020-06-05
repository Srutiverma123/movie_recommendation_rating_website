<?php
$username = $_GET['username'];
// $pw = $_GET['password'];
// echo $pw;
// echo $username;
$con = mysqli_connect("localhost","root","" , "movie");
$sql="SELECT * FROM Users WHERE username='$username'";
$result = mysqli_query($con,$sql);
// echo mysqli_num_rows($result);
if(mysqli_num_rows($result) == 0){
  // echo "ok";
  echo "";
}else{
  echo "Username exists!";
}
 ?>
