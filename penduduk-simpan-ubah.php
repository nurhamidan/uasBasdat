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
		$sql = "UPDATE penduduk SET nama='".$nama."', tempat_lahir='".$tempatLahir."', tanggal_lahir='".$tanggalLahir."', jenis_kelamin='".$jenisKelamin."', golongan_darah='".$golonganDarah."', alamat='".$alamat."', agama='".$agama."', kewarganegaraan='".$kewarganegaraan."' WHERE nik='".$nik."'";
		$res = $db->query($sql);
		if ($res) {
			if ($db->affected_rows > 0) {
				echo "Data berhasil diubah.";
				echo "<br />";
				echo "<a href='penduduk.php'>Lanjutkan</a>";
			} else {
				echo "Data gagal diubah.";
			}
		} else {
			echo "Query gagal: ".(DEVEL ? $db->error : "");
		}
	} else {
		echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
	}
?>