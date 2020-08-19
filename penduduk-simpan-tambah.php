<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nik = $db->escape_string($_POST["nik"]);
		$nama = $db->escape_string($_POST["nama"]);
		$tempatLahir = $db->escape_string($_POST["tempat_lahir"]);
		$tanggalLahir = $db->escape_string($_POST["tanggal_lahir"]);
		$jenisKelamin = $db->escape_string($_POST["jenis_kelamin"]);
		$golonganDarah = $db->escape_string($_POST["golongan_darah"]);
		$alamat = $db->escape_string($_POST["alamat"]);
		$agama = $db->escape_string($_POST["agama"]);
		$kewarganegaraan = $db->escape_string($_POST["kewarganegaraan"]);
		$sql = "INSERT INTO penduduk (nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, golongan_darah, alamat, agama, kewarganegaraan)
				VALUES ('$nik', '$nama', '$tempatLahir', '$tanggalLahir', '$jenisKelamin', '$golonganDarah', '$alamat', '$agama', '$kewarganegaraan')";
		$res = $db->query($sql);
		if ($res) {
			echo "Data berhasil disimpan.";
			echo "<br />";
			echo "<a href='penduduk.php'>Lanjutkan</a>";
		} else {
			echo "Query gagal: ".(DEVEL ? $db->error : "");
		}
	} else {
		echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
	}
?>