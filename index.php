<?php
	include_once("functions.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul>
	<?php
		if (!isset($_SESSION['id_admin'])) {
			echo "<li><a href='login.php'>Login</a></li>";
		} else {
			echo "<li><a href='kesiswaan.php'>Kesiswaan</a></li>";
			echo "<li><a href='kepegawaian.php'>Kepegawaian</a></li>";
			echo "<li><a href='logout-proses.php'>Logout</a></li>";
		}
	?>
	</ul>
</body>
</html>