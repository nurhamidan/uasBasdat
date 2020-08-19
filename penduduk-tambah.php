<!DOCTYPE html>
<html>
<head>
	<title>Tambah Penduduk</title>
</head>
<body>
	<form method="post" action="penduduk-simpan-tambah.php">
		<table border="1">
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<input type="text" name="nik">
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<input type="text" name="nama">
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td>
					<input type="text" name="tempat_lahir">
				</td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td>
					<input type="date" name="tanggal_lahir">
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<input type="radio" name="jenis_kelamin" value="L" id="jenis_kelamin_laki_laki" checked>
					<label for="jenis_kelamin_laki_laki">Laki-laki</label>
					<input type="radio" name="jenis_kelamin" value="P" id="jenis_kelamin_perempuan">
					<label for="jenis_kelamin_perempuan">Perempuan</label>
				</td>
			</tr>
			<tr>
				<td>Golongan Darah</td>
				<td>:</td>
				<td>
					<select name="golongan_darah">
						<option value="">- Pilih -</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="AB">AB</option>
						<option value="O">O</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<textarea name="alamat"></textarea>
				</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td>
					<select name="agama">
						<option value="">- Pilih -</option>
						<option value="Islam">Islam</option>
						<option value="Protestan">Protestan</option>
						<option value="Katolik">Katolik</option>
						<option value="Hindu">Hindu</option>
						<option value="Buddha">Buddha</option>
						<option value="Khonghucu">Khonghucu</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kewarganegaraan</td>
				<td>:</td>
				<td>
					<input type="radio" name="kewarganegaraan" value="WNA" id="kewarganegaraan_wna" checked>
					<label for="kewarganegaraan_wna">WNA</label>
					<input type="radio" name="kewarganegaraan" value="WNI" id="kewarganegaraan_wni">
					<label for="kewarganegaraan_wni">WNI</label>
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