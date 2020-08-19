<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nip = $db->escape_string($_POST["nip"]);
		$nik = $db->escape_string($_POST["nik"]);
		$jumlahAnak = $db->escape_string($_POST["jumlah_anak"]);
		$jabatan = $db->escape_string($_POST["jabatan"]);
		if (!isset($_POST["simpan_auto"])) {
			$nama = $db->escape_string($_POST["nama"]);
			$tempatLahir = $db->escape_string($_POST["tempat_lahir"]);
			$tanggalLahir = $db->escape_string($_POST["tanggal_lahir"]);
			$jenisKelamin = $db->escape_string($_POST["jenis_kelamin"]);
			$golonganDarah = $db->escape_string($_POST["golongan_darah"]);
			$alamat = $db->escape_string($_POST["alamat"]);
			$agama = $db->escape_string($_POST["agama"]);
			$kewarganegaraan = $db->escape_string($_POST["kewarganegaraan"]);
			$sql1 = "INSERT INTO penduduk (nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, golongan_darah, alamat, agama, kewarganegaraan)
				VALUES ('$nik', '$nama', '$tempatLahir', '$tanggalLahir', '$jenisKelamin', '$golonganDarah', '$alamat', '$agama', '$kewarganegaraan')";
			$res1 = $db->query($sql1);
			if ($res1) {
				if ($db->affected_rows > 0) {
					$sql2 = "INSERT INTO pegawai (nip, jumlah_anak, nik) VALUES ('$nip', '$jumlahAnak', '$nik')";
					$res2 = $db->query($sql2);
					if ($res2) {
						if ($db->affected_rows > 0) {
							if ($jabatan != "") {
								$sql4 = "INSERT INTO ".$jabatan." (nip) VALUES ('$nip')";
								$res3 = $db->query($sql4);
								if ($res3) {
									if ($db->affected_rows > 0) {
										echo "Data berhasil disimpan.";
										echo "<br />";
										echo "<a href='pegawai.php'>Lanjutkan</a>";
									} else {
										echo "Data gagal disimpan.";
									}
								} else {
									echo "Query gagal: ".(DEVEL ? $db->error : "");
								}
							} else {
								echo "Data berhasil disimpan.";
								echo "<br />";
								echo "<a href='pegawai.php'>Lanjutkan</a>";
							}
						} else {
							echo "Data gagal disimpan.";
						}
					} else {
						$sql3 = "DELETE FROM penduduk WHERE nik='$nik'";
						$db->query($sql3);
						echo "Query gagal: ".(DEVEL ? $db->error : "");
					}
				} else {
					echo "Data gagal disimpan.";
				}
			} else {
				echo "Query gagal: ".(DEVEL ? $db->error : "");
			}
		} else {
			$sql2 = "INSERT INTO pegawai (nip, jumlah_anak, nik) VALUES ('$nip', '$jumlahAnak', '$nik')";
			$res2 = $db->query($sql2);
			if ($res2) {
				if ($db->affected_rows > 0) {
					if ($jabatan != "") {
						$sql4 = "INSERT INTO ".$jabatan." (nip) VALUES ('$nip')";
						$res3 = $db->query($sql4);
						if ($res3) {
							if ($db->affected_rows > 0) {
								echo "Data berhasil disimpan.";
								echo "<br />";
								echo "<a href='pegawai.php'>Lanjutkan</a>";
							} else {
								echo "Data gagal disimpan.";
							}
						}
					} else {
						echo "Data berhasil disimpan.";
						echo "<br />";
						echo "<a href='pegawai.php'>Lanjutkan</a>";
					}
				} else {
					echo "Data gagal disimpan";
				}
			} elseif ($db->errno == 1062) {
				echo "Nik sudah terdaftar sebagai pegawai. Silakan coba lagi.";
			} else {
				echo "Query gagal: ".(DEVEL ? $db->errno : "");
			}
		}
	} else {
		echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
	}
?>