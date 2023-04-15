<?php
include "db.php";

if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql=mysqli_query($con,"select * from `register` where `email`='$email'");
	$countmob=mysqli_num_rows($sql);
	$dbpassfetch=mysqli_fetch_array($sql);
	$password=$dbpassfetch['password'];
	$id=$dbpassfetch['id'];
	if($countmob!=1){
		echo "<script>alert('Email is Not Registered With Us!! Please Register First.');</script>";
	}else if($email=="" || $password==""){
		echo $error="<script>alert('Please Enter All Fields!!');</script>";
	}else{
		$_SESSION['userlog']=$id;
		header('Location: dashboard.php');
	}

}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Medical Chatbot</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Medical Chatbot</h1>
                            <div class="description">
                            
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter Email and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Email</label>
				                        	<input type="text" name="email" placeholder="Email" class="form-username form-control" id="email">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="">Password</label>
				                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
				                        </div>
				                        <button type="submit" class="btn" name="submit">Sign in!</button>
				                    </form>
			                    </div>
		                    </div>
		                
		             
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
								</div>

	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="registration-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Full name</label>
				                        	<input type="text" name="name" placeholder="Full name..." class="form-first-name form-control" id="name">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Mobile</label>
				                        	<input type="text" name="mobile" placeholder="Mobile" class="form-last-name form-control" id="mobile">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="">Email</label>
				                        	<input type="text" name="email" placeholder="Email..." class="form-email form-control" id="email">
										</div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">DOB</label>
				                        	<input type="date" name="dob" placeholder="DOB..." class="form-email form-control" id="dob">
										</div>
										<div class="form-group">
				                        	<label class="sr-only" for="">Password</label>
				                        	<input type="password" name="passwoed" placeholder="Password..." class="form-email form-control" id="passwoed">
										</div>
										<div class="form-group">
				                        	<label class="sr-only" for="">Confirm Password</label>
				                        	<input type="password" name="cpassword"  placeholder="Confirm Password..." class="form-email form-control" id="cpassword">
				                        </div>
										<button class="btn" id="reg">Sign me up!</button>
				                        
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        			
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
		<script>     
			$("#reg").click(function(e){
			e.preventDefault();
			
				var name=document.getElementById("name").value;
				var dob=document.getElementById("dob").value;
				var mobile=document.getElementById("mobile").value;
				var email=document.getElementById("email").value;
				var passwoed=document.getElementById("passwoed").value;
				var cpassword=document.getElementById("cpassword").value;
			
				if(name=="" || dob=="" || mobile=="" || email=="" || passwoed=="" || cpassword==""){
					alert("Please Enter All Fields!!");
				}else if(passwoed!=cpassword ){
					alert("Password Not Match!!");
				}
				else{
					$.ajax({  
							type: 'POST',  
							url: 'api/register.php', 
							data: { name:name,dob:dob,mobile:mobile,email:email,passwoed:passwoed,cpassword:cpassword },
							success: function(response) {
							//document.getElementById("res").innerHTML=response;
							alert(response);
			
							}
						}); 
				}
		});
		
			</script>
    </body>

</html>