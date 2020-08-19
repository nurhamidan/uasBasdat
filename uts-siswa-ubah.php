<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Siswa</title>
</head>
<body>
	<?php echo '<form method="POST" action="uts-siswa-simpan-ubah.php?nis='.$_GET["nis"].'">'; ?>
		<table border="1">
			<tr>
			<tr>
				<td>Nilai</td>
				<td>:</td>
				<td>
					<input type="text" name="nilai">
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