<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nip = $db->escape_string($_GET["nip"]);
		$sql = "DELETE FROM pegawai WHERE nip='".$nip."'";
		$res = $db->query($sql);
		if ($res) {
			if ($db->affected_rows > 0) {
				echo "Data berhasil dihapus.";
				echo "<br />";
				echo "<a href='pegawai.php'>Lanjutkan</a>";
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