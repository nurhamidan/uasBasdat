<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nis = $db->escape_string($_POST["nis"]);
		$nik = $db->escape_string($_POST["nik"]) == "" ? "NULL" : "'".$db->escape_string($_POST["nik"])."'";
		$anakKe = $db->escape_string($_POST["anak_ke"]) == "" ? "NULL" : "'".$db->escape_string($_POST["anak_ke"])."'";
		$kodeKelas = $db->escape_string($_POST["kode_kelas"]) == "" ? "NULL" : "'".$db->escape_string($_POST["kode_kelas"])."'";
		$jenisKendaraan = $db->escape_string($_POST["jenis_kendaraan"]) == "" ? "NULL" : "'".$db->escape_string($_POST["jenis_kendaraan"])."'";
		$idEkstrakurikuler = $db->escape_string($_POST["id_ekstrakurikuler"]) == "" ? "NULL" : "'".$db->escape_string($_POST["id_ekstrakurikuler"])."'";
		$sql = "UPDATE siswa SET anak_ke=$anakKe, jenis_kendaraan=$jenisKendaraan, nik=$nik, kode_kelas=$kodeKelas, id_ekskul=$idEkstrakurikuler WHERE nis='$nis'";
		$res = $db->query($sql);
		if ($res) {
			echo "Data berhasil diubah.";
			echo "<br />";
			echo "<a href='siswa.php'>Lanjutkan</a>";
		} else {
			echo "Query gagal: ".(DEVEL ? $db->error : "");
		}
	} else {
		echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
	}
?>