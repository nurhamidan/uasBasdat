<?php 
include_once("functions.php");
if (isset($_GET["nip"])&&isset($_GET["jabatan"])) {
	$db = dbConnect();
	$nip = $db->escape_string($_GET["nip"]);
	$jabatan = $db->escape_string($_GET["jabatan"]);
	$sql = "SELECT * FROM pegawai WHERE nip='".$nip."'";
	$res = $db->query($sql);
	if ($res) {
		$data = $res->fetch_row();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah</title>
</head>
<body>
	<?php echo '<form method="POST" action="pegawai-simpan-ubah.php?nik_sebelumnya='.$data[2].'">'; ?>
		<table border="1">
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td>
					<?php echo '<input type="text" name="nip" value="'.$data[0].'" readonly>'; ?>
				</td>
			</tr>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<select name="nik">
						<?php
								$sql2 = "SELECT nik, nama FROM penduduk";
								$res2 = $db->query($sql2);
								if ($res2) {
									while ($data2=$res2->fetch_row()) {
										echo "<option value='".$data2[0]."'".($data2[0] == $data[2] ? " selected" : "").">".$data2[0]." - ".$data2[1]."</option>";
									}
								} else {
									echo "Query gagal: ".(DEVEL ? $db->error : "");
								}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jumlah Anak</td>
				<td>:</td>
				<td><?php echo '<input type="text" name="jumlah_anak" value="'.$data[1].'">'; ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td>
					<select name="jabatan">
						<?php echo "<option value='' ".(strtoupper($jabatan) == "TIDAK DIKETAHUI" ? "selected" : "").">- Pilih -</option>"; ?>
						<?php echo "<option value='office_boy' ".(strtoupper($jabatan) == "OFFICE BOY" ? "selected" : "").">Office Boy</option>"; ?>
						<?php echo "<option value='guru' ".(strtoupper($jabatan) == "GURU" ? "selected" : "").">Guru</option>"; ?>
						<?php echo "<option value='tata_usaha' ".(strtoupper($jabatan) == "TATA USAHA" ? "selected" : "").">Tata Usaha</option>"; ?>
						<?php echo "<option value='keamanan' ".(strtoupper($jabatan) == "KEAMANAN" ? "selected" : "").">Keamanan</option>"; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<input type="submit" name="simpan" value='Simpan'>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>