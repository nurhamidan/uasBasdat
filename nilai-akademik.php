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
	</ul>
	<table border="1">
		<tr>
			<th>NIS</th>
			<th>Nilai UTS</th>
			<th>Nilai UAS</th>
		</tr>
<?php
		$sql = "SELECT nis, nilai_uts, nilai_uas FROM siswa";
		$res = $db->query($sql);
		if ($res) {
			while ($data=$res->fetch_row()) {
?>
		<tr>
			<td><?php echo ($data[0] == NULL ? "Tidak diketahui" : $data[0]); ?></td>
			<td><?php echo ($data[1] == NULL ? "Tidak diketahui" : $data[1]); ?></td>
			<td><?php echo ($data[2] == NULL ? "Tidak diketahui" : $data[2]); ?></td>
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