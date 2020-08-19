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
		<li><a href="index.php">Utama</a></li>
		<li><a href="orang-tua-tambah.php">Tambah Orang Tua</a></li>
	</ul>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>TTL</th>
			<th>Jenis Kelamin</th>
			<th>Golongan Darah</th>
			<th>Alamat</th>
			<th>Agama</th>
			<th>Kewarganegaraan</th>
			<th>No. Telepon</th>
			<th>Jumlah Anak</th>
			<th>Pekerjaan</th>
			<th>Status Orang Tua</th>
			<th>Aksi</th>
		</tr>
<?php
		$sql = "SELECT orang_tua.id_orang_tua, penduduk.nik, penduduk.nama, CONCAT(penduduk.tempat_lahir, ' ', penduduk.tanggal_lahir) AS ttl, penduduk.jenis_kelamin, penduduk.golongan_darah, penduduk.alamat, penduduk.agama, penduduk.kewarganegaraan, orang_tua.nomor_telepon, orang_tua.jumlah_anak, orang_tua.pekerjaan, orang_tua.status_orang_tua FROM orang_tua LEFT JOIN penduduk ON orang_tua.nik = penduduk.nik";
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
			<td><?php echo "<a href='orang-tua-ubah.php?id_orang_tua=".$data[0]."'>Ubah</a> | <a href='orang-tua-hapus.php?id_orang_tua=".$data[0]."'>Hapus</a>"; ?></td>
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