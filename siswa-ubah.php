<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Siswa</title>
</head>
<body>
	<ul>
		<li><a href="index.php">Utama</a></li>
		<li>
		<a href='penduduk-tambah.php'>Tambah Penduduk</a></li>
		<li>
		<a href='kelas-tambah.php'>Tambah Kelas</a></li>
		<li>
		<a href='ekstrakurikuler-tambah.php'>Tambah Ekstrakurikuler</a></li>
	</ul>
	<?php
		if (isset($_GET["nis"])) {
			$db = dbConnect();
			$nis = $db->escape_string($_GET["nis"]);
			$sql = "SELECT siswa.nis, penduduk.nik, siswa.anak_ke, siswa.kode_kelas, siswa.jenis_kendaraan, siswa.id_ekskul FROM siswa INNER JOIN penduduk ON siswa.nik = penduduk.nik WHERE nis=$nis";
			$res = $db->query($sql);
			if ($res) {
				$data = $res->fetch_row();
	?>
			<form method="POST" action="siswa-simpan-ubah.php">
				<table border="1">
					<tr>
						<td>NIS</td>
						<td>:</td>
						<td>
							<?php echo '<input type="text" name="nis" value="'.$data[0].'" readonly>' ?>
						</td>
					</tr>
					<tr>
						<td>NIK</td>
						<td>:</td>
						<td>
							<select name="nik">
								<option value="">- Pilih -</option>
								<?php
									if ($db->connect_errno == 0) {
										$sql2 = "SELECT penduduk.nik, penduduk.nama FROM penduduk LEFT OUTER JOIN pegawai ON penduduk.nik = pegawai.nik LEFT OUTER JOIN orang_tua ON penduduk.nik = orang_tua.nik LEFT OUTER JOIN siswa ON penduduk.nik = siswa.nik WHERE siswa.nis=$nis OR pegawai.nik IS NULL AND orang_tua.nik IS NULL AND siswa.nik IS NULL";
										$res2 = $db->query($sql2);
										if ($res) {
											while ($data2=$res2->fetch_row()) {
												echo "<option value='".$data2[0]."' ".($data2[0] == $data[1] ? 'selected' : '').">".$data2[0]." - ".$data2[1]."</option>";
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
						<td>Anak Ke</td>
						<td>:</td>
						<td>
							<?php echo '<input type="text" name="anak_ke" value='.$data[2].'>' ?>
						</td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td>
							<select name="kode_kelas">
								<option value="">- Pilih -</option>
								<?php
									if ($db->connect_errno == 0) {
										$sql3 = "SELECT kode_kelas, nama FROM kelas";
										$res3 = $db->query($sql3);
										if ($res3) {
											while ($data3=$res3->fetch_row()) {
												echo "<option value='".$data3[0]."' ".($data3[0] == $data[3] ? 'selected' : '').">".$data3[1]."</option>";
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
						<td>Jenis Kendaraan</td>
						<td>:</td>
						<td>
							<select name="jenis_kendaraan">
								<?php echo '<option value="" '.(strtoupper($data[4]) == "" ? "selected" : "").'>- Pilih -</option>' ?>
								<?php echo '<option value="Jalan Kaki" '.(strtoupper($data[4]) == "JALAN KAKI" ? "selected" : "").'>Jalan Kaki</option>' ?>
								<?php echo '<option value="Sepeda Motor Pribadi" '.(strtoupper($data[4]) == "SEPEDA MOTOR PRIBADI" ? "selected" : "").'>Sepeda Motor Pribadi</option>' ?>
								<?php echo '<option value="Kendaraan Umum" '.(strtoupper($data[4]) == "KENDARAAN UMUM" ? "selected" : "").'>Kendaraan Umum</option>' ?>
								<?php echo '<option value="Mobil Pribadi" '.(strtoupper($data[4]) == "MOBIL PRIBADI" ? "selected" : "").'>Mobil Pribadi</option>' ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Ekstrakurikuler</td>
						<td>:</td>
						<td>
							<select name="id_ekstrakurikuler">
								<option value="">- Pilih -</option>
								<?php
									if ($db->connect_errno == 0) {
										$sql4 = "SELECT id_ekskul, nama FROM ekstrakurikuler";
										$res4 = $db->query($sql4);
										if ($res4) {
											while ($data4=$res4->fetch_row()) {
												echo "<option value='".$data4[0]."' ".($data4[0] == $data[5] ? 'selected' : '').">".$data4[1]."</option>";
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