<?php
	include_once("./functions.php");
	$db = dbConnect();
	if ($db->connect_errno == 0) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manajemen Penduduk</title>
</head>
<body>
	<a href="penduduk-tambah.php">Tambah Penduduk</a>
	<table border="1">
		<tr>
			<th>NIK</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Golongan Darah</th>
			<th>Alamat</th>
			<th>Agama</th>
			<th>Kewarganegaraan</th>
			<th>Aksi</th>
		</tr>
<?php
		$sql = "SELECT * FROM penduduk";
		$res = $db->query($sql);
		if ($res) {
			while ($data=$res->fetch_row()) {
?>
		<tr>
			<td><?php echo $data[0]; ?></td>
			<td><?php echo $data[1]; ?></td>
			<td><?php echo $data[2]; ?></td>
			<td><?php echo $data[3]; ?></td>
			<td><?php echo $data[4]; ?></td>
			<td><?php echo $data[5]; ?></td>
			<td><?php echo $data[6]; ?></td>
			<td><?php echo $data[7]; ?></td>
			<td><?php echo $data[8]; ?></td>
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