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
	<form method="POST" action="siswa-simpan-tambah.php">
		<table border="1">
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td>
					<input type="text" name="nis" required>
				</td>
			</tr>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<select name="nik">
						<option value="">- Pilih -</option>
						<?php
							$db = dbConnect();
							if ($db->connect_errno == 0) {
								$sql = "SELECT penduduk.nik, penduduk.nama FROM penduduk LEFT OUTER JOIN pegawai ON penduduk.nik = pegawai.nik LEFT OUTER JOIN orang_tua ON penduduk.nik = orang_tua.nik LEFT OUTER JOIN siswa ON penduduk.nik = siswa.nik WHERE pegawai.nik IS NULL AND orang_tua.nik IS NULL AND siswa.nik IS NULL";
								$res = $db->query($sql);
								if ($res) {
									while ($data=$res->fetch_row()) {
										echo "<option value='".$data[0]."'>".$data[0]." - ".$data[1]."</option>";
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
					<input type="text" name="anak_ke">
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td>
					<select name="kode_kelas">
						<option value="">- Pilih -</option>
						<?php
							$db = dbConnect();
							if ($db->connect_errno == 0) {
								$sql = "SELECT kode_kelas, nama FROM kelas";
								$res = $db->query($sql);
								if ($res) {
									while ($data=$res->fetch_row()) {
										echo "<option value='".$data[0]."'>".$data[1]."</option>";
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
						<option value="">- Pilih -</option>
						<option value="Jalan Kaki">Jalan Kaki</option>
						<option value="Sepeda Motor Pribadi">Sepeda Motor Pribadi</option>
						<option value="Kendaraan Umum">Kendaraan Umum</option>
						<option value="Mobil Pribadi">Mobil Pribadi</option>
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
							$db = dbConnect();
							if ($db->connect_errno == 0) {
								$sql = "SELECT id_ekskul, nama FROM ekstrakurikuler";
								$res = $db->query($sql);
								if ($res) {
									while ($data=$res->fetch_row()) {
										echo "<option value='".$data[0]."'>".$data[1]."</option>";
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
</body>
</html>