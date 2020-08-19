<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if (isset($_GET["error"])) {
			$errorCode = $_GET["error"];
			if ($errorCode == 1) {
				echo "Username atau password salah. <br />";
			} elseif ($errorCode == 2) {
				echo "Gagal ketika proses login. <br />";
			} elseif ($errorCode == 3) {
				echo "Gagal terhubung ke database. <br />";
			} elseif ($errorCode == 4) {
				echo "Login gagal. <br />";
			} else {
				echo "Error tidak diketahui. <br />";
			}
		}
	?>
	<form action="login-proses.php" method="POST">
		Username<input type="text" name="username">
		Password<input type="password" name="password">
		<input type="submit" name="login" value="Login">
	</form>
</body>
</html>