<?php 
include_once "db.php";
if(!isset($_SESSION['userlog'])){
    header("location: index.php");
  }
   $sessid= $_SESSION['userlog'];
  $sqluser=mysqli_query($con,"select * from `register` where `id`='$sessid'");
   $row=mysqli_fetch_array($sqluser);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=yes">
    <title>Medical Chatboat </title>
    <meta name="description" content="Chat Bot UI/UX & html for web" />
    <meta name="keywords" content="Chat Bot UI/UX & html for web, UI/UX for chat bot, chat bot html, best chatbot, chatbot app, online chat bot plugin" />
    <meta name="author" content="css3transition" />
    <link rel="shortcut icon" href="../favicon.ico">
    <meta name="description" content="Chat Bot UI/UX & html for web, UI/UX for chat bot, chat bot html, best chatbot, chatbot app, online chat bot plugin | Css3Transition " />
    <meta name="keywords" content="Chat Bot UI/UX & html for web, UI/UX for chat bot, chat bot html, best chatbot, chatbot app, online chat bot plugin" />
    <meta name="abstract" content="Chat Bot UI/UX & html for web, UI/UX for chat bot, chat bot html, best chatbot, chatbot app, online chat bot plugin">
    <meta name="author" content="Rahul Yaduvanshi">
    <meta name="technologies" content="HTML5, CSS3, HTML, CSS, JQUERY, Bootstrap, Angular">
    <meta name="distribution" content="Global">
    <meta name="development" content="Rahul Yaduvanshi">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="city" content="New Delhi">
    <meta name="country" content="india">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/chatBot.css" rel="stylesheet" type="text/css"/>
    <link href="css/timeline.css" rel="stylesheet" type="text/css"/>

    <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>

</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="dashboard.php" class="">Home</a>
  <a href="about_guide.php" class="">About Guide</a>
  <a href="about.php">About Us</a>
  <a href="about_project.php">About Project</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>