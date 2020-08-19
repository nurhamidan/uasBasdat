<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nis = $db->escape_string($_GET["nis"]);
		$nilai = $db->escape_string($_POST["nilai"]) == "" ? "NULL" : "'".$db->escape_string($_POST["nilai"])."'";
		$sql = "UPDATE siswa SET nilai_uas=$nilai WHERE nis='$nis'";
		$res = $db->query($sql);
		if ($res) {
			echo "Data berhasil diubah.";
			echo "<br />";
			echo "<a href='uas-siswa.php'>Lanjutkan</a>";
		} else {
			echo "Query gagal: ".(DEVEL ? $db->error : "");
		}
	} else {
		echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
	}
?>