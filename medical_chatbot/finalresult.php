<?php 
error_reporting(0);
$con=mysqli_connect("localhost","root","","sipna_chatbot");

$sql=mysqli_query($con,"select MAX(`count`),`prediction` from `prediction` GROUP BY `count` order by `count` desc limit 1");
$row=mysqli_fetch_array($sql);
echo $row['prediction'];
?>