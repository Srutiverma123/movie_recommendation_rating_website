<?php
$movid = intval($_GET['q']);
$con = mysqli_connect("localhost","root","" , "movie");
$username = $_COOKIE['movierating'];
$sql0="SELECT * FROM Users WHERE username = '$username'";
$result0= mysqli_query($con,$sql0);
$row = mysqli_fetch_array($result0);
$uid = $row['U_ID'];

if(empty($uid)){
  echo "<button type='button' class='btn btn-info' onclick='wishlistmsg(" . $movid . ")'>Add to Wishlist</button>";
  echo "<div class='alert alert-warning'>";
  echo "Registration or login is required!";
  echo "</div>";
}else{
  $sql="SELECT * FROM Wishlist WHERE movie_id = '$movid' AND user_id = '$uid'";
  $result = mysqli_query($con,$sql);
  $row_num = mysqli_num_rows($result);
  //echo "row num is " . $row_num;
  if($row_num == 0){
    $sql1="INSERT INTO `Wishlist` (`user_id`, `movie_id`) VALUES ('$uid', '$movid')";
    $result1 = mysqli_query($con,$sql1);
    echo "<button type='button' class='btn btn-success' onclick='wishlistmsg(" . $movid . ")'>Saved to Wishlist</button>";
    echo "</br>Movie saved to wishlist.";
  }elseif($row_num ==1){
    $sql2 = "DELETE FROM `Wishlist` WHERE user_id = '$uid' AND movie_id = '$movid'";
    $result2 = mysqli_query($con,$sql2);
    echo "<button type='button' class='btn btn-info' onclick='wishlistmsg(" . $movid . ")'>Add to Wishlist</button>";
    echo "</br>Movie removed from wishlist.";
  }
}
?>
