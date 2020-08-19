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
	<form method="POST" action="ekstrakurikuler-simpan-tambah.php">
		<table border="1">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<input type="text" name="nama" required>
				</td>
			</tr>
			<tr>
				<td>Pembimbing</td>
				<td>:</td>
				<td>
					<select name="nip" required>
						<option value="">- Pilih -</option>
						<?php
							$db = dbConnect();
							if ($db->connect_errno == 0) {
								$sql = "SELECT pegawai.nip, penduduk.nama FROM pegawai LEFT JOIN tata_usaha ON pegawai.nip = tata_usaha.nip LEFT JOIN keamanan ON pegawai.nip = keamanan.nip LEFT JOIN admin ON pegawai.nip = admin.nip LEFT JOIN office_boy ON pegawai.nip = office_boy.nip LEFT JOIN guru ON pegawai.nip = guru.nip LEFT JOIN penduduk ON pegawai.nik = penduduk.nik WHERE tata_usaha.nip IS NULL AND keamanan.nip IS NULL AND admin.nip IS NULL AND office_boy.nip IS NULL AND guru.nip IS NULL";
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