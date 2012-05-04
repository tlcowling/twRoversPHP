<html>
<head>
<title>Rover Control</title>
</head>
<body>

<?php
	include('Rover.php');
	$rover = new Rover();
	
	echo $rover.getStatus();
	

?>
</body>
</html>