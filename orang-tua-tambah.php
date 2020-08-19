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
	<form method="POST" action="orang-tua-simpan-tambah.php">
		<table border="1">
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<select name="nik" required>
						<option value="">- Pilih -</option>
						<?php
							$db = dbConnect();
							if ($db->connect_errno == 0) {
								$sql = "SELECT penduduk.nik, penduduk.nama FROM penduduk LEFT OUTER JOIN pegawai ON penduduk.nik = pegawai.nik LEFT OUTER JOIN orang_tua ON penduduk.nik = orang_tua.nik LEFT OUTER JOIN siswa ON penduduk.nik = siswa.nik WHERE orang_tua.nik IS NULL AND siswa.nik IS NULL";
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
				<td>Nomor Telepon</td>
				<td>:</td>
				<td>
					<input type="text" name="nomor_telepon">
				</td>
			</tr>
			<tr>
				<td>Jumlah Anak</td>
				<td>:</td>
				<td>
					<input type="text" name="jumlah_anak">
				</td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>:</td>
				<td>
					<input type="text" name="pekerjaan">
				</td>
			</tr>
			<tr>
				<td>Status Orang Tua</td>
				<td>:</td>
				<td>
					<select name="status_orang_tua">
						<option value="">- Pilih -</option>
						<option value="Hidup">Hidup</option>
						<option value="Meninggal">Meninggal</option>
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