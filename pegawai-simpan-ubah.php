<?php
//http://localhost/uasBasdat/pegawai-simpan-ubah.php?nip=66&nik=64&nama=nama&tempat_lahir=tempat+lahir&tanggal_lahir=2020-08-17&jenis_kelamin=P&golongan_darah=AB&alamat=dfsd&agama=Islam&kewarganegaraan=WNA&jumlah_anak=12&jabatan=keamanan&simpan=Simpan
?>
<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$nip = $db->escape_string($_POST["nip"]);
		$nik = $db->escape_string($_POST["nik"]);
		$nikSebelumnya = $db->escape_string($_GET["nik_sebelumnya"]);
		$nikBerubah = ($nik != $nikSebelumnya ? true : false);
		$jumlahAnak = $db->escape_string($_POST["jumlah_anak"]);
		$jabatanSesudahnya = $db->escape_string($_POST["jabatan"]);
		$jabatanSebelumnya = "";
		if ($nikBerubah) {
			$sql10 = "SELECT * FROM penduduk INNER JOIN pegawai ON penduduk.nik = pegawai.nik WHERE pegawai.nip = $nip";
			$res10 = $db->query($sql10);
			if ($res10->num_rows == 0) {
				$sql = "SELECT * FROM pegawai INNER JOIN office_boy ON pegawai.nip = office_boy.nip WHERE pegawai.nip = '".$nip."'";
				$res = $db->query($sql);
				if ($res->num_rows == 1) {
					$jabatanSebelumnya = "office_boy";
				} else {
					$sql2 = "SELECT * FROM pegawai INNER JOIN guru ON pegawai.nip = guru.nip WHERE pegawai.nip = '".$nip."'";
					$res2 = $db->query($sql2);
					if ($res2->num_rows == 1) {
						$jabatanSebelumnya = "guru";
					} else {
						$sql3 = "SELECT * FROM pegawai INNER JOIN tata_usaha ON pegawai.nip = tata_usaha.nip WHERE pegawai.nip = '".$nip."'";
						$res3 = $db->query($sql3);
						if ($res3->num_rows == 1) {
							$jabatanSebelumnya = "tata_usaha";
						} else {
							$sql4 = "SELECT * FROM pegawai INNER JOIN keamanan ON pegawai.nip = keamanan.nip WHERE pegawai.nip = '".$nip."'";
							$res4 = $db->query($sql4);
							if ($res4->num_rows == 1) {
								$jabatanSebelumnya = "keamanan";
							} else {
								$jabatanSebelumnya = "";
							}
						}
					}
				}
				if ($jabatanSebelumnya != $jabatanSesudahnya) {
					$sql5 = "INSERT INTO $jabatanSesudahnya (nip) VALUES ('$nip')";
					$res5 = $db->query($sql5);
					if ($res5) {
						if ($db->affected_rows > 0) {
							if ($jabatanSebelumnya == "") {
								$sql11 = "UPDATE pegawai SET jumlah_anak='".$jumlahAnak."', nik='".$nik."' WHERE nip='".$nip."'";
								$res11 = $db->query($sql11);
								if ($res11) {
									echo "Data berhasil diubah.";
									echo "<br />";
									echo "<a href='pegawai.php'>Lanjutkan</a>";
								} else {
									echo "Query gagal: ".(DEVEL ? $db->error : "");
								}
							} else {
								$sql6 = "DELETE FROM $jabatanSebelumnya WHERE nip = '$nip'";
								$res6 = $db->query($sql6);
								if ($res6) {
									if ($db->affected_rows > 0) {
										$sql7 = "UPDATE pegawai SET jumlah_anak='".$jumlahAnak."', nik='".$nik."' WHERE nip='".$nip."'";
										$res7 = $db->query($sql7);
										if ($res7) {
											echo "Data berhasil diubah.";
											echo "<br />";
											echo "<a href='pegawai.php'>Lanjutkan</a>";
										} else {
											echo "Query gagal: ".(DEVEL ? $db->error : "");
										}
									} else {
										$sql8 = "DELETE FROM $jabatanSebelumnya WHERE nip = $nip";
										$res8 = $db->query($sql8);
										if ($res8) {
											echo "Data gagal diubah";
										}
									}
								} else {
									$sql8 = "DELETE FROM $jabatanSesudahnya WHERE nip = $nip";
									$res8 = $db->query($sql8);
									if ($res8) {
										echo "Query gagal: ".(DEVEL ? $db->error : "");
									}
								}
							}
						} else {
							echo "Data gagal diubah.";
						}
					} else {
						echo "Query gagal: ".(DEVEL ? $db->error : "");
					}
				} else {
					$sql9 = "UPDATE pegawai SET jumlah_anak=".$jumlahAnak.", nik='".$nik."' WHERE nip='".$nip."'";
					$res9 = $db->query($sql9);
					if ($res9) {
						echo "Data berhasil diubah.";
						echo "<br />";
						echo "<a href='pegawai.php'>Lanjutkan</a>";
					} else {
						echo "Query gagal: ".(DEVEL ? $db->error : "");
					}
				}
			} else {
				echo "Data tidak bisa diubah";
			}
		} else {
				$sql = "SELECT * FROM pegawai INNER JOIN office_boy ON pegawai.nip = office_boy.nip WHERE pegawai.nip = '".$nip."'";
				$res = $db->query($sql);
				if ($res->num_rows == 1) {
					$jabatanSebelumnya = "office_boy";
				} else {
					$sql2 = "SELECT * FROM pegawai INNER JOIN guru ON pegawai.nip = guru.nip WHERE pegawai.nip = '".$nip."'";
					$res2 = $db->query($sql2);
					if ($res2->num_rows == 1) {
						$jabatanSebelumnya = "guru";
					} else {
						$sql3 = "SELECT * FROM pegawai INNER JOIN tata_usaha ON pegawai.nip = tata_usaha.nip WHERE pegawai.nip = '".$nip."'";
						$res3 = $db->query($sql3);
						if ($res3->num_rows == 1) {
							$jabatanSebelumnya = "tata_usaha";
						} else {
							$sql4 = "SELECT * FROM pegawai INNER JOIN keamanan ON pegawai.nip = keamanan.nip WHERE pegawai.nip = '".$nip."'";
							$res4 = $db->query($sql4);
							if ($res4->num_rows == 1) {
								$jabatanSebelumnya = "keamanan";
							} else {
								$jabatanSebelumnya = "";
							}
						}
					}
				}
				if ($jabatanSebelumnya != $jabatanSesudahnya) {
					$sql5 = "INSERT INTO $jabatanSesudahnya (nip) VALUES ('$nip')";
					$res5 = $db->query($sql5);
					if ($res5) {
						if ($db->affected_rows > 0) {
							if ($jabatanSebelumnya == "") {
								$sql11 = "UPDATE pegawai SET jumlah_anak='".$jumlahAnak."', nik='".$nik."' WHERE nip='".$nip."'";
								$res11 = $db->query($sql11);
								if ($res11) {
									echo "Data berhasil diubah.";
									echo "<br />";
									echo "<a href='pegawai.php'>Lanjutkan</a>";
								} else {
									echo "Query gagal: ".(DEVEL ? $db->error : "");
								}
							} else {
								$sql6 = "DELETE FROM $jabatanSebelumnya WHERE nip = '$nip'";
								$res6 = $db->query($sql6);
								if ($res6) {
									if ($db->affected_rows > 0) {
										$sql7 = "UPDATE pegawai SET jumlah_anak='".$jumlahAnak."', nik='".$nik."' WHERE nip='".$nip."'";
										$res7 = $db->query($sql7);
										if ($res7) {
											echo "Data berhasil diubah.";
											echo "<br />";
											echo "<a href='pegawai.php'>Lanjutkan</a>";
										} else {
											echo "Query gagal: ".(DEVEL ? $db->error : "");
										}
									} else {
										$sql8 = "DELETE FROM $jabatanSebelumnya WHERE nip = $nip";
										$res8 = $db->query($sql8);
										if ($res8) {
											echo "Data gagal diubah";
										}
									}
								} else {
									$sql8 = "DELETE FROM $jabatanSesudahnya WHERE nip = $nip";
									$res8 = $db->query($sql8);
									if ($res8) {
										echo "Query gagal: ".(DEVEL ? $db->error : "");
									}
								}
							}
						} else {
							echo "Data gagal diubah.";
						}
					} else {
						echo "Query gagal: ".(DEVEL ? $db->error : "");
					}
				} else {
					$sql9 = "UPDATE pegawai SET jumlah_anak=".$jumlahAnak.", nik='".$nik."' WHERE nip='".$nip."'";
					$res9 = $db->query($sql9);
					if ($res9) {
						echo "Data berhasil diubah.";
						echo "<br />";
						echo "<a href='pegawai.php'>Lanjutkan</a>";
					} else {
						echo "Query gagal: ".(DEVEL ? $db->error : "");
					}
				}
		}
	} else {
		echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
	}
?>