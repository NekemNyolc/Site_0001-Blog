<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Armchair Blog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./style/css/bootstrap.css">
	<script src="./style/js/bootstrap.min.js"></script>
	<!--
	<link rel="stylesheet" type="text/css" href="./style/myStyle.css?version=3.0002">
	-->
</head>
<body>
<div class="container-fluid">

<?php

if (isset($_SESSION['username']))
{
	include './controllers/controller_user.php';
}
else
{
	include './controllers/controller_main.php';
}

?>

</div>
</body>
</html>