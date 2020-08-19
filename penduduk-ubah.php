<?php
include_once("functions.php");
if (isset($_GET["nik"])) {
	$db = dbConnect();
	$nik = $db->escape_string($_GET["nik"]);
	$sql = "SELECT * FROM penduduk WHERE nik='".$nik."'";
	$res = $db->query($sql);
	if ($res) {
		$data = $res->fetch_row();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Penduduk</title>
</head>
<body>
	<form method="post" action="penduduk-simpan-ubah.php">
		<table border="1">
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo "<input type='text' name='nik' readonly value='".$data[0]."'>"; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo "<input type='text' name='nama' value='".$data[1]."'>"; ?>
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td>
					<?php echo "<input type='text' name='tempat_lahir' value='".$data[2]."'>"; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td>
					<?php echo "<input type='date' name='tanggal_lahir' value='".$data[3]."'>"; ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php echo "<input type='radio' name='jenis_kelamin' value='L' id='jenis_kelamin_laki_laki' ".(strtoupper($data[4]) == "L"?"checked":"").">"; ?>
					<label for="jenis_kelamin_laki_laki">Laki-laki</label>
					<?php echo "<input type='radio' name='jenis_kelamin' value='P' id='jenis_kelamin_perempuan' ".(strtoupper($data[4]) == "P"?"checked":"").">"; ?>
					<label for="jenis_kelamin_perempuan">Perempuan</label>
				</td>
			</tr>
			<tr>
				<td>Golongan Darah</td>
				<td>:</td>
				<td>
					<select name="golongan_darah">
						<?php echo "<option value='' ".(strtoupper($data[5]) == "" ? "selected" : "").">- Pilih -</option>"; ?>
						<?php echo "<option value='A' ".(strtoupper($data[5]) == "A" ? "selected" : "").">A</option>"; ?>
						<?php echo "<option value='B' ".(strtoupper($data[5]) == "B" ? "selected" : "").">B</option>"; ?>
						<?php echo "<option value='AB' ".(strtoupper($data[5]) == "AB" ? "selected" : "").">AB</option>"; ?>
						<?php echo "<option value='O' ".(strtoupper($data[5]) == "O" ? "selected" : "").">O</option>"; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<textarea name="alamat"><?php echo $data[6]; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td>
					<select name="agama">
						<?php echo "<option value='' ".(strtoupper($data[7]) == "" ? "selected" : "").">- Pilih -</option>"; ?>
						<?php echo "<option value='Islam' ".(strtoupper($data[7]) == "ISLAM" ? "selected" : "").">Islam</option>"; ?>
						<?php echo "<option value='Protestan' ".(strtoupper($data[7]) == "PROTESTAN" ? "selected" : "").">Protestan</option>"; ?>
						<?php echo "<option value='Katolik' ".(strtoupper($data[7]) == "KATOLIK" ? "selected" : "").">Katolik</option>"; ?>
						<?php echo "<option value='Hindu' ".(strtoupper($data[7]) == "HINDU" ? "selected" : "").">Hindu</option>"; ?>
						<?php echo "<option value='Buddha' ".(strtoupper($data[7]) == "BUDDHA" ? "selected" : "").">Buddha</option>"; ?>
						<?php echo "<option value='Khonghucu' ".(strtoupper($data[7]) == "KHONGHUCU" ? "selected" : "").">Khonghucu</option>"; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kewarganegaraan</td>
				<td>:</td>
				<td>
					<?php echo "<input type='radio' name='kewarganegaraan' value='WNA' id='kewarganegaraan_wna' ".(strtoupper($data[8]) == "WNA"?"checked":"").">"; ?>
					<label for="kewarganegaraan_wna">WNA</label>
					<?php echo "<input type='radio' name='kewarganegaraan' value='WNI' id='kewarganegaraan_wni' ".(strtoupper($data[8]) == "WNI"?"checked":"").">"; ?>
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
<?php
	} else {
		echo "Data tidak ditemukan: ".(DEVEL ? $db->error : "");
	}
} else {
	echo "Data tidak ada: ".(DEVEL ? $db->error : "");
}
?>