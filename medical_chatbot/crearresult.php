<?php 
$con=mysqli_connect("localhost","root","","sipna_chatbot");
mysqli_query($con,"DELETE FROM `prediction`");
?>