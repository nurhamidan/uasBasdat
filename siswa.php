<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul>
		<li>
		<a href="index.php">Utama</a></li>
		<li>
		<a href="siswa-tambah.php">Tambah Siswa</a></li>
	</ul>
	<table border="1">
		<tr>
			<th>NIS</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>TTL</th>
			<th>Jenis Kelamin</th>
			<th>Golongan Darah</th>
			<th>Alamat</th>
			<th>Agama</th>
			<th>Kewarganegaraan</th>
			<th>Anak Ke</th>
			<th>Dari</th>
			<th>Kendaraan</th>
			<th>Kelas</th>
			<th>Ekstrakurikuler</th>
			<th>Aksi</th>
		</tr>
<?php
		$sql = "SELECT siswa.nis, penduduk.nik, penduduk.nama, CONCAT(penduduk.tempat_lahir, ' ', penduduk.tanggal_lahir) AS ttl, penduduk.jenis_kelamin, penduduk.golongan_darah, penduduk.alamat, penduduk.agama, penduduk.kewarganegaraan, siswa.anak_ke, orang_tua.jumlah_anak, siswa.jenis_kendaraan, kelas.nama, ekstrakurikuler.nama FROM siswa LEFT JOIN penduduk ON siswa.nik = penduduk.nik LEFT JOIN orang_tua_siswa ON siswa.nis = orang_tua_siswa.nis LEFT JOIN orang_tua ON orang_tua_siswa.id_orang_tua = orang_tua.id_orang_tua LEFT JOIN kelas ON siswa.kode_kelas = kelas.kode_kelas LEFT JOIN ekstrakurikuler ON siswa.id_ekskul = ekstrakurikuler.id_ekskul LEFT JOIN penduduk p2 ON orang_tua.nik = p2.nik WHERE p2.jenis_kelamin = 'L' OR p2.jenis_kelamin IS NULL";
		$res = $db->query($sql);
		if ($res) {
			while ($data=$res->fetch_row()) {
?>
		<tr>
			<td><?php echo ($data[0] == NULL ? "Tidak diketahui" : $data[0]); ?></td>
			<td><?php echo ($data[1] == NULL ? "Tidak diketahui" : $data[1]); ?></td>
			<td><?php echo ($data[2] == NULL ? "Tidak diketahui" : $data[2]); ?></td>
			<td><?php echo ($data[3] == NULL ? "Tidak diketahui" : $data[3]); ?></td>
			<td><?php echo ($data[4] == NULL ? "Tidak diketahui" : $data[4]); ?></td>
			<td><?php echo ($data[5] == NULL ? "Tidak diketahui" : $data[5]); ?></td>
			<td><?php echo ($data[6] == NULL ? "Tidak diketahui" : $data[6]); ?></td>
			<td><?php echo ($data[7] == NULL ? "Tidak diketahui" : $data[7]); ?></td>
			<td><?php echo ($data[8] == NULL ? "Tidak diketahui" : $data[8]); ?></td>
			<td><?php echo ($data[9] == NULL ? "Tidak diketahui" : $data[9]); ?></td>
			<td><?php echo ($data[10] == NULL ? "Tidak diketahui" : $data[10]); ?></td>
			<td><?php echo ($data[11] == NULL ? "Tidak diketahui" : $data[11]); ?></td>
			<td><?php echo ($data[12] == NULL ? "Tidak diketahui" : $data[12]); ?></td>
			<td><?php echo ($data[13] == NULL ? "Tidak diketahui" : $data[13]); ?></td>
			<td><?php echo "<a href='siswa-ubah.php?nis=".$data[0]."'>Ubah</a> | <a href='siswa-hapus.php?nis=".$data[0]."'>Hapus</a> | <a href='orang-tua-siswa-tambah.php?nis=".$data[0]."'>Tambahkan Orang Tua</a>"; ?></td>
		</tr>
<?php
			}
		}
?>
	</table>
</body>
</html>
<?php
	} else {
		echo "Gagal: ".(DEVEL ? $db->error : "");
	}
?>