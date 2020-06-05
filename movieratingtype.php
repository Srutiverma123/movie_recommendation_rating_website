<?php
$sp = intval($_GET['sp']);
$v = intval($_GET['v']);
$a= intval($_GET['a']);
$mid= intval($_GET['mid']);

if(!empty($a)){
  $con = mysqli_connect("localhost","root","" , "movie");
  $sql="INSERT INTO `Arating` (`movie_ID`,`A_rating`) VALUES ('$mid','$a')";
  $result = mysqli_query($con,$sql);
  echo "<span>  Rated it!</span>";
}
if(!empty($sp)){
  $con = mysqli_connect("localhost","root","" , "movie");
  $sql="INSERT INTO `Sprating` (`movie_ID`,`sp_rating`) VALUES ('$mid','$sp')";
  $result = mysqli_query($con,$sql);
  echo "<span>  Rated it!</span>";
}
if(!empty($v)){
  $con = mysqli_connect("localhost","root","" , "movie");
  $sql="INSERT INTO `Vrating` (`movie_ID`,`v_rating`) VALUES ('$mid','$v')";
  $result = mysqli_query($con,$sql);
  echo "<span>  Rated it!</span>";
}


?>
