<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Penduduk</title>
</head>
<body>
	<form method="POST" action="mapel-simpan-tambah.php">
		<table border="1">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<input type="text" name="nama">
				</td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td>:</td>
				<td>
					<select name="jenis">
						<option value="">- Pilih -</option>
						<option value="Kejuruan">Kejuruan</option>
						<option value="Umum">Umum</option>
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