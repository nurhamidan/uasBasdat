<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$namaKelas = $db->escape_string($_POST["nama_kelas"]);
		$waliKelas = $db->escape_string($_POST["wali_kelas"]) == "" ? "NULL" : "'".$db->escape_string($_POST["wali_kelas"])."'";
		$sql = "INSERT INTO kelas (nama, id_guru) VALUES ('$namaKelas', $waliKelas)";
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