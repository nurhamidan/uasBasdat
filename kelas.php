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
	<a href="kelas-tambah.php">Tambah Kelas</a>
	<table border="1">
		<tr>
			<th>Kode Kelas</th>
			<th>Nama Kelas</th>
			<th>Nama Wali Kelas</th>
			<th>Aksi</th>
		</tr>
<?php
		$sql = "SELECT kelas.kode_kelas, kelas.nama, penduduk.nama FROM pegawai LEFT JOIN guru ON pegawai.nip = guru.nip LEFT JOIN penduduk ON pegawai.nik = penduduk.nik INNER JOIN kelas ON guru.id_guru = kelas.id_guru";
		$res = $db->query($sql);
		if ($res) {
			while ($data=$res->fetch_row()) {
?>
		<tr>
			<td><?php echo $data[0]; ?></td>
			<td><?php echo $data[1]; ?></td>
			<td><?php echo $data[2]; ?></td>
			<td><?php echo "<a href='penduduk-ubah.php?nik=".$data[0]."'>Ubah</a> | <a href='penduduk-hapus.php?nik=".$data[0]."'>Hapus</a>"; ?></td>
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