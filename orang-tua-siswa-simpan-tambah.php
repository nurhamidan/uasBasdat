<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nis = $db->escape_string($_POST["nis"]);
		$idOrangTua = $db->escape_string($_POST["id_orang_tua"]) == "" ? "NULL" : "'".$db->escape_string($_POST["id_orang_tua"])."'";
		$sql = "INSERT INTO orang_tua_siswa (nis, id_orang_tua) VALUES ('$nis', $idOrangTua)";
		$res = $db->query($sql);
		if ($res) {
			if ($db->affected_rows > 0) {
				echo "Data berhasil disimpan.";
				echo "<br />";
				echo "<a href='siswa.php'>Lanjutkan</a>";
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