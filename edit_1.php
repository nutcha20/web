<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'nutcha20.mysql.database.azure.com', 'nutcha@nutcha20', '20092544a-a', 'ITFLab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL PLEASE TRY AGAIN: '.mysqli_connect_error());
}


$name = $_POST['Name'];
$comment = $_POST['Comment'];


$sql = "UPDATE NewTable_1 SET Comment='$comment' WHERE Name='$name' ";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully! CONGRATULATION!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>