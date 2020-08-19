<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nik = $db->escape_string($_POST["nik"]) == "" ? "NULL" : "'".$db->escape_string($_POST["nik"])."'";
		$nomorTelepon = $db->escape_string($_POST["nomor_telepon"]) == "" ? "NULL" : "'".$db->escape_string($_POST["nomor_telepon"])."'";
		$jumlahAnak = $db->escape_string($_POST["jumlah_anak"]) == "" ? "NULL" : "'".$db->escape_string($_POST["jumlah_anak"])."'";
		$pekerjaan = $db->escape_string($_POST["pekerjaan"]) == "" ? "NULL" : "'".$db->escape_string($_POST["pekerjaan"])."'";
		$statusOrangTua = $db->escape_string($_POST["status_orang_tua"]) == "" ? "NULL" : "'".$db->escape_string($_POST["status_orang_tua"])."'";
		$sql = "INSERT INTO orang_tua (nomor_telepon, jumlah_anak, pekerjaan, status_orang_tua, nik) VALUES ($nomorTelepon, $jumlahAnak, $pekerjaan, $statusOrangTua, $nik)";
		$res = $db->query($sql);
		if ($res) {
			if ($db->affected_rows > 0) {
				echo "Data berhasil disimpan.";
				echo "<br />";
				echo "<a href='orang-tua.php'>Lanjutkan</a>";
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