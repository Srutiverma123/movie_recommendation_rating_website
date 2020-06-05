<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Movie";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE Movies(
title varchar(50),
category varchar(20),
m_year int(4),
director varchar(30),
stars varchar(30),
cover varchar(30),
trailer varchar(30),
writers varchar(30),
release_date date,
storyline varchar(100)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Movies created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
