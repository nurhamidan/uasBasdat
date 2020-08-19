<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nama = $db->escape_string($_POST["nama"]);
		$nip = $db->escape_string($_POST["nip"]) == "" ? "NULL" : "'".$db->escape_string($_POST["nip"])."'";
		$sql = "INSERT INTO ekstrakurikuler (nama, nip) VALUES ('$nama', $nip)";
		$res = $db->query($sql);
		if ($res) {
			if ($db->affected_rows > 0) {
				echo "Data berhasil disimpan.";
				echo "<br />";
				echo "<a href='kesiswaan.php'>Lanjutkan</a>";
			} else {
				echo "Data gagal disimpan.";
			}
		} else {
			echo "Query gagal: ".(DEVEL ? $db->error : "");
		}
	} else {
		echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
	}
?>