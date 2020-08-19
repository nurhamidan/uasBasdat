<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Penduduk</title>
</head>
<body>
	<?php
		if (isset($_GET["auto-mode"])) {
			echo "<p>Belum punya data penduduk? <a href='pegawai-tambah.php'>Masuk ke sini</a></p>";
		} else {
			echo "<p>Sudah ada data penduduk? <a href='pegawai-tambah.php?auto-mode=true'>Masuk ke sini</a></p>";
		}
	?>
	<form method="POST" action="pegawai-simpan-tambah.php">
		<table border="1">
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td>
					<input type="text" name="nip">
				</td>
			</tr>
			<?php
			if (isset($_GET["auto-mode"])) {
				$autoMode = $_GET["auto-mode"];
				if ($autoMode) {
			?>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<select name="nik">
						<option value="">- Pilih -</option>
						<?php
							$db = dbConnect();
							if ($db->connect_errno == 0) {
								$sql = "SELECT penduduk.nik, penduduk.nama FROM penduduk LEFT OUTER JOIN pegawai ON penduduk.nik = pegawai.nik LEFT OUTER JOIN orang_tua ON penduduk.nik = orang_tua.nik LEFT OUTER JOIN siswa ON penduduk.nik = siswa.nik WHERE pegawai.nik IS NULL AND siswa.nik IS NULL";
								$res = $db->query($sql);
								if ($res) {
									while ($data=$res->fetch_row()) {
										echo "<option value='".$data[0]."'>".$data[0]." - ".$data[1]."</option>";
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
			<?php
				}
			} else {

			?>		
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
			<?php
			}
			?>
			<tr>
				<td>Jumlah Anak</td>
				<td>:</td>
				<td><input type="text" name="jumlah_anak"></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td>
					<select name="jabatan">
						<option value="">- Pilih -</option>
						<option value="office_boy">Office Boy</option>
						<option value="guru">Guru</option>
						<option value="tata_usaha">Tata Usaha</option>
						<option value="keamanan">Keamanan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<?php echo "<input type='submit' name='".(isset($_GET["auto-mode"]) ? "simpan_auto" : "simpan")."' value='Simpan'>"; ?>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>