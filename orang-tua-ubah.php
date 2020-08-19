<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Siswa</title>
</head>
<body>
	<p>
		<a href='penduduk-tambah.php'>Tambah Penduduk</a>
	</p>
	<?php
		if (isset($_GET["id_orang_tua"])) {
			$db = dbConnect();
			$idOrangTua = $db->escape_string($_GET["id_orang_tua"]);
			$sql = "SELECT orang_tua.id_orang_tua, penduduk.nik, orang_tua.nomor_telepon, orang_tua.jumlah_anak, orang_tua.pekerjaan, orang_tua.status_orang_tua FROM orang_tua INNER JOIN penduduk ON orang_tua.nik = penduduk.nik WHERE id_orang_tua=$idOrangTua";
			$res = $db->query($sql);
			if ($res) {
				$data = $res->fetch_row();
	?>
	<?php echo '<form method="POST" action="orang-tua-simpan-ubah.php?id='.$idOrangTua.'">' ?>
		<table border="1">
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<select name="nik" required>
						<option value="">- Pilih -</option>
						<?php
							if ($db->connect_errno == 0) {
								$sql2 = "SELECT penduduk.nik, penduduk.nama FROM penduduk LEFT OUTER JOIN pegawai ON penduduk.nik = pegawai.nik LEFT OUTER JOIN orang_tua ON penduduk.nik = orang_tua.nik LEFT OUTER JOIN siswa ON penduduk.nik = siswa.nik WHERE orang_tua.id_orang_tua = $idOrangTua OR orang_tua.nik IS NULL AND siswa.nik IS NULL";
								$res2 = $db->query($sql2);
								if ($res2) {
									while ($data2=$res2->fetch_row()) {
										echo "<option value='".$data2[0]."' ".($data2[0] == $data[1] ? 'selected' : '').">".$data2[0]." - ".$data2[1]."</option>";
									}
								} else {
									echo "Query gagal: ".(DEVEL ? $db->error : "");
								}
							} else {
								echo "Koneksi gagal: ".(DEVEL ? $db->connect_error : "");
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td>:</td>
				<td>
					<?php echo '<input type="text" name="nomor_telepon" value='.$data[2].'>' ?>
				</td>
			</tr>
			<tr>
				<td>Jumlah Anak</td>
				<td>:</td>
				<td>
					<?php echo '<input type="text" name="jumlah_anak" value='.$data[3].'>' ?>
				</td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>:</td>
				<td>
					<?php echo '<input type="text" name="pekerjaan" value='.$data[4].'>' ?>
				</td>
			</tr>
			<tr>
				<td>Status Orang Tua</td>
				<td>:</td>
				<td>
					<select name="status_orang_tua">
						<?php echo "<option value='' ".(strtoupper($data[5]) == "" ? "selected" : "").">- Pilih -</option>"; ?>
						<?php echo "<option value='Hidup' ".(strtoupper($data[5]) == "HIDUP" ? "selected" : "").">Hidup</option>"; ?>
						<?php echo "<option value='Meninggal' ".(strtoupper($data[5]) == "MENINGGAL" ? "selected" : "").">Meninggal</option>"; ?>
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
	<?php
			} else {
				echo "Data tidak ditemukan.";
			}
	?>
	<?php
		} else {
			echo "Kesalahan url.";
		}
	?>
</body>
</html>