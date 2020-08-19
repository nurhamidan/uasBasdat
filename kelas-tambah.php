<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Penduduk</title>
</head>
<body>
	<p>
		<a href='guru-tambah.php?dari=kelas'>Tambah Guru</a>
	</p>
	<form method="POST" action="kelas-simpan-tambah.php">
		<table border="1">
			<tr>
				<td>Nama Kelas</td>
				<td>:</td>
				<td>
					<input type="text" name="nama_kelas">
				</td>
			</tr>
			<tr>
				<td>Wali Kelas</td>
				<td>:</td>
				<td>
					<select name="wali_kelas">
						<option value="">- Pilih -</option>
						<?php
							$db = dbConnect();
							if ($db->connect_errno == 0) {
								$sql = "SELECT guru.id_guru, guru.nip, penduduk.nama, kelas.id_guru AS id_guru_kelas FROM guru LEFT JOIN pegawai ON guru.nip = pegawai.nip LEFT JOIN penduduk ON pegawai.nik = penduduk.nik LEFT JOIN kelas ON guru.id_guru = kelas.id_guru WHERE kelas.id_guru IS NULL";
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