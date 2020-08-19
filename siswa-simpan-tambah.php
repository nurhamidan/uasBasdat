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
		$sql = "INSERT INTO siswa (nis, anak_ke, jenis_kendaraan, nik, kode_kelas, id_ekskul) VALUES ('$nis', $anakKe, $jenisKendaraan, $nik, $kodeKelas, $idEkstrakurikuler)";
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