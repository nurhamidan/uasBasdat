<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nip = $db->escape_string($_POST["nip"]);
		$kodeMapel = $db->escape_string($_POST["kode_mata_pelajaran"]) == "" ? "NULL" : "'".$db->escape_string($_POST["kode_mata_pelajaran"])."'";
		$sql = "INSERT INTO guru (nip, kode_mata_pelajaran) VALUES ('$nip', $kodeMapel)";
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