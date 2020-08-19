<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$idOrangTua = $db->escape_string($_GET["id"]);
		$nik = $db->escape_string($_POST["nik"]) == "" ? "NULL" : "'".$db->escape_string($_POST["nik"])."'";
		$nomorTelepon = $db->escape_string($_POST["nomor_telepon"]) == "" ? "NULL" : "'".$db->escape_string($_POST["nomor_telepon"])."'";
		$jumlahAnak = $db->escape_string($_POST["jumlah_anak"]) == "" ? "NULL" : "'".$db->escape_string($_POST["jumlah_anak"])."'";
		$pekerjaan = $db->escape_string($_POST["pekerjaan"]) == "" ? "NULL" : "'".$db->escape_string($_POST["pekerjaan"])."'";
		$statusOrangTua = $db->escape_string($_POST["status_orang_tua"]) == "" ? "NULL" : "'".$db->escape_string($_POST["status_orang_tua"])."'";
		$sql = "UPDATE orang_tua SET nomor_telepon=$nomorTelepon, jumlah_anak=$jumlahAnak, pekerjaan=$pekerjaan, status_orang_tua=$statusOrangTua, nik=$nik WHERE id_orang_tua='$idOrangTua'";
		$res = $db->query($sql);
		if ($res) {
			echo "Data berhasil diubah.";
			echo "<br />";
			echo "<a href='orang-tua.php'>Lanjutkan</a>";
		} else {
			echo "Query gagal: ".(DEVEL ? $db->error : "");
		}
	} else {
		echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
	}
?>