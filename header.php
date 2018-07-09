<?php
ob_start();
session_start();
include 'connection/baglan.php'; ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="csbs/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="csbs/bootstrap.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


	<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>

	<link rel="stylesheet" type="text/css" href="css/my-style.css">

	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> 

	<title>Template</title>

</head>
<body >

	
<nav class="navbar header-opac"><a class="navbar-brand" href="index" style="color: white;font-size: 20px;">Ne Demiş?</a>
<?php if (isset($_SESSION['mail'])) { ?>

<a href="exit"><button class="btn btn-danger">Çıkış Yap</button></a>
<? } ?>
	</nav>

</body>
