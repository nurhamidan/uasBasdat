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
	<a href="pegawai-tambah.php?auto-mode">Tambah Pegawai</a>
	<table border="1">
		<tr>
			<th>NIP</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>TTL</th>
			<th>Jenis Kelamin</th>
			<th>Golongan Darah</th>
			<th>Alamat</th>
			<th>Agama</th>
			<th>Kewarganegaraan</th>
			<th>Jumlah Anak</th>
			<th>Jabatan</th>
			<th>Aksi</th>
		</tr>
<?php
		$sql = "SELECT pegawai.nip, pegawai.nik, penduduk.nama, CONCAT(penduduk.tempat_lahir, ' ', penduduk.tanggal_lahir) AS ttl, penduduk.jenis_kelamin, penduduk.golongan_darah, penduduk.alamat, penduduk.agama, penduduk.kewarganegaraan, pegawai.jumlah_anak FROM pegawai INNER JOIN penduduk ON penduduk.nik = pegawai.nik";
		$res = $db->query($sql);
		if ($res) {
			$jabatan = "";
			while ($data=$res->fetch_row()) {
				$sql2 = "SELECT * FROM pegawai INNER JOIN office_boy ON pegawai.nip = office_boy.nip WHERE pegawai.nip = '".$data[0]."'";
				$res2 = $db->query($sql2);
				if ($res2->num_rows == 1) {
					$jabatan = "Office Boy";
				} else {
					$sql3 = "SELECT * FROM pegawai INNER JOIN guru ON pegawai.nip = guru.nip WHERE pegawai.nip = '".$data[0]."'";
					$res3 = $db->query($sql3);
					if ($res3->num_rows == 1) {
						$jabatan = "Guru";
					} else {
						$sql4 = "SELECT * FROM pegawai INNER JOIN tata_usaha ON pegawai.nip = tata_usaha.nip WHERE pegawai.nip = '".$data[0]."'";
						$res4 = $db->query($sql4);
						if ($res4->num_rows == 1) {
							$jabatan = "Tata Usaha";
						} else {
							$sql5 = "SELECT * FROM pegawai INNER JOIN keamanan ON pegawai.nip = keamanan.nip WHERE pegawai.nip = '".$data[0]."'";
							$res5 = $db->query($sql5);
							if ($res5->num_rows == 1) {
								$jabatan = "Keamanan";
							} else {
								$jabatan = "Tidak diketahui";
							}
						}
					}
				}
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
			<td><?php echo $data[9]; ?></td>
			<td><?php echo $jabatan ?></td>
			<td><?php echo "<a href='pegawai-ubah.php?nip=".$data[0]."&jabatan=".$jabatan."'>Ubah</a> | <a href='pegawai-hapus.php?nip=".$data[0]."'>Hapus</a>"; ?></td>
		</tr>
<?php
			}
		} else {
			echo "Query gagal: ".(DEVEL ? $db->error : "");
		}
?>
	</table>
</body>
</html>
<?php
	} else {
		echo "Gagal koneksi: ".(DEVEL ? $db->error : "");
	}
?>