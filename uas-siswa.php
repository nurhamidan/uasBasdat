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
	</ul>
	
	<table border="1">
		<tr>
			<th>NIS</th>
			<th>Nilai</th>
			<th>Aksi</th>
		</tr>
<?php
		$sql = "SELECT nis, nilai_uas FROM siswa";
		$res = $db->query($sql);
		if ($res) {
			while ($data=$res->fetch_row()) {
?>
		<tr>
			<td><?php echo ($data[0] == NULL ? "Tidak diketahui" : $data[0]); ?></td>
			<td><?php echo ($data[1] == NULL ? "Tidak diketahui" : $data[1]); ?></td>
			<td><?php echo "<a href='uas-siswa-ubah.php?nis=".$data[0]."'>Ubah</a>"; ?></td>
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