<?php 
$con=mysqli_connect("localhost","root","","sipna_chatbot");
$finalres= $_POST['finalres'];

$sql=mysqli_query($con,"select * from `drsuggessions` where `specialist`='$finalres'");
$count=mysqli_num_rows($sql);
$row=mysqli_fetch_array($sql);
if($count>=1){
echo $dr_name=$row['dr_name'];
//$specialist=$row['specialist'];
}else{
    echo "Specialist Doctor Not Found!!";
}
?>