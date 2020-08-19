<?php
	include_once("functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		if (isset($_POST["login"])) {
			$username = $db->escape_string($_POST["username"]);
			$password = $db->escape_string($_POST["password"]);
			$sql = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'";
			$res = $db->query($sql);
			if ($res) {
				if ($res->num_rows == 1) {
					$data = $res->fetch_row();
					session_start();
					$_SESSION['id_admin'] = $data[0];
					$_SESSION['nip'] = $data[3];
					header("Location: index.php");
				} else {
					header("Location: login.php?error=1");
				}
			}
		} else {
			header("Location: login.php?error=2");
		}
	} else {
		header("Location: login.php?error=3");
	}
?>