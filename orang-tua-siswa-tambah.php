<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Siswa</title>
</head>
<body>
	<p>
		<a href='penduduk-tambah.php'>Tambah Penduduk</a>
	</p>
	<?php
		if (isset($_GET["nis"])) {
			$db = dbConnect();
			$nis = $db->escape_string($_GET["nis"]);
			$sql = "SELECT siswa.nis, penduduk.nik, siswa.anak_ke, siswa.kode_kelas, siswa.jenis_kendaraan, siswa.id_ekskul FROM siswa INNER JOIN penduduk ON siswa.nik = penduduk.nik WHERE nis=$nis";
			$res = $db->query($sql);
			if ($res) {
				$data = $res->fetch_row();
	?>
			<form method="POST" action="orang-tua-siswa-simpan-tambah.php">
				<table border="1">
					<tr>
						<td>NIS</td>
						<td>:</td>
						<td>
							<?php echo '<input type="text" name="nis" value="'.$data[0].'" readonly>' ?>
						</td>
					</tr>
					<tr>
						<td>NIK Orang Tua</td>
						<td>:</td>
						<td>
							<select name="id_orang_tua">
								<option value="">- Pilih -</option>
								<?php
									if ($db->connect_errno == 0) {
										$sql2 = "SELECT orang_tua.id_orang_tua, orang_tua.nik, penduduk.nama FROM orang_tua INNER JOIN penduduk ON orang_tua.nik = penduduk.nik";
										$res2 = $db->query($sql2);
										if ($res) {
											while ($data2=$res2->fetch_row()) {
												echo "<option value='".$data2[0]."'>".$data2[1]." - ".$data2[2]."</option>";
											}
										} else {
											echo "Query gagal: ".(DEVEL ? $db->error : "");
										}
									} else {
										echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="simpan" value="Simpan">
						</td>
					</tr>
				</table>
			</form>
	<?php
			} else {
				echo "Data tidak ditemukan.";
			}
	?>
	<?php
		} else {
			echo "Kesalahan url.";
		}
	?>
</body>
</html>