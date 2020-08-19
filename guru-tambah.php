<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Penduduk</title>
</head>
<body>
	<ul>
		<li><a href='pegawai-tambah.php?dari=guru'>Tambah Pegawai</a></li>
		<li><a href='mapel-tambah.php?dari=guru'>Tambah Mata Pelajaran</a></li>
	</ul>
	<form method="POST" action="guru-simpan-tambah.php">
		<table border="1">
			<tr>
				<td>NIP</td>
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
				<td>Mata Pelajaran</td>
				<td>:</td>
				<td>
					<select name="kode_mata_pelajaran">
						<option value="">- Pilih -</option>
						<?php
							$db = dbConnect();
							if ($db->connect_errno == 0) {
								$sql = "SELECT kode_mata_pelajaran, nama FROM mata_pelajaran";
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