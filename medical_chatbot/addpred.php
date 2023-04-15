<?php 
$con=mysqli_connect("localhost","root","","sipna_chatbot");
//$count= $_POST['count'];
$pred= $_POST['pred'];
$sql=mysqli_query($con,"select * from `prediction` where `prediction`='$pred'");
$countt=mysqli_num_rows($sql);
$row=mysqli_fetch_array($sql);
$count=$row['count'];
if($countt<=0){
//insert
mysqli_query($con,"INSERT INTO `prediction`(`count`, `prediction`) VALUES ('1','$pred')");
}else{
    //update
    $ucount=$count+1;
    mysqli_query($con,"UPDATE `prediction` SET `count`='$ucount' WHERE `prediction`='$pred'");
}

