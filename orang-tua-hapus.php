<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$idOrangTua = $db->escape_string($_GET["id_orang_tua"]);
		$sql = "DELETE FROM orang_tua WHERE id_orang_tua='".$idOrangTua."'";
		$res = $db->query($sql);
		if ($res) {
			if ($db->affected_rows > 0) {
				echo "Data berhasil dihapus.";
				echo "<br />";
				echo "<a href='orang-tua.php'>Lanjutkan</a>";
			} else {
				echo "Data gagal dihapus.";
			}
		} else {
			echo "Query gagal: ".(DEVEL ? $db->error : "");
		}
	} else {
		echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
	}
?>