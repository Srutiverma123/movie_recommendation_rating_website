<?php
$title = $_POST['title'];
$category = $_POST['category'];
$year = $_POST['year'];
$cover = $_POST['cover'];
$trailer = $_POST['trailer'];
$director = $_POST['director'];
$stars = $_POST['stars'];
$writers = $_POST['writers'];
$release_date = $_POST['release_date'];
$storyline = $_POST['storyline'];
$mmid = $_POST['mmid'];
// echo $year;

$con = mysqli_connect("localhost","root","" , "movie");


if($mmid === ""){
  // echo "empty";
	$sql = "INSERT INTO Movies (title, Category, m_year, cover, trailer, director, stars, writers, release_date, storyline) VALUES ('$title', '$category', '$year', '$cover', '$trailer', '$director', '$stars', '$writers', '$release_date', '$storyline')";
  	$result = mysqli_query($con,$sql);
	header("Location: managemovies.php?page=1");
  // echo $sql;

}else{
  // echo $mmid;
  $sql = "UPDATE Movies SET title='$title', Category='$category', m_year=$year, cover='$cover', trailer='$trailer', director='$director', stars='$stars', writers='$writers', release_date='$release_date', storyline='$storyline' WHERE M_ID=$mmid;";
  $result = mysqli_query($con,$sql);
  header("Location: movieinfo.php?id=$mmid");
}


 ?>
