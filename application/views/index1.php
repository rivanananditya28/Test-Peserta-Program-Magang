<html>

<head>
	<title>Tambah Data Siswa</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
</head>

<body>
	<h1>Tambah Data Siswa</h1>
	<form action="<?php echo base_url('students/add_student') ?>" method="post">
		<label for="nama">Nama:</label>
		<input type="text" id="nama" name="nama">
		<br>
		<label for="nisn">NISN:</label>
		<input type="text" id="nisn" name="nisn">
		<br>
		<label for="tempat_lahir">Tempat Lahir:</label>
		<input type="text" id="tempat_lahir" name="tempat_lahir">
		<br>
		<label for="tanggal_lahir">Tanggal Lahir:</label>
		<input type="date" id="tanggal_lahir" name="tanggal_lahir">
		<br>
		<label for="foto">Foto:</label>
		<input name="foto" type="file">
		<br>
		<button name="save_student" type="submit" class="btn btn-success mr-2">Simpan</button>
		<a href="javascript:history.back()" class="btn btn-danger">Batal</a>
	</form>
</body>

</html>
<?php

if (isset($_POST['save_student'])) {
	$nama = filter_input(INPUT_POST, 'nama');
	$nisn = filter_input(INPUT_POST, 'nisn');
	$tempat_lahir = filter_input(INPUT_POST, 'tempat_lahir');
	$tanggal_lahir = filter_input(INPUT_POST, 'email');

	$sumber = @$_FILES['foto']['tmp_name'];

	$temp = explode(".", @$_FILES["foto"]["name"]);
	$extensions = end($temp);

	$target = '../vendor/images/img_student/';

	$nama_gambar = @$_FILES['foto']['name'];
	$size_gambar = @$_FILES['foto']['size'];
	$nama_input = md5($nama_gambar . $size_gambar) . '.' . $extensions;

	if (!empty($sumber)) {
		if (($_FILES["foto"]["type"] == "image/gif")
			|| ($_FILES["foto"]["type"] == "image/jpeg")
			|| ($_FILES["foto"]["type"] == "image/jpg")
			|| ($_FILES["foto"]["type"] == "image/pjpeg")
			|| ($_FILES["foto"]["type"] == "image/x-png")
			|| ($_FILES["foto"]["type"] == "image/png")
		) {
			$pindah = move_uploaded_file($sumber, $target . $nama_input);

			if ($pindah) {
				$save = mysqli_query($con, "INSERT INTO students (`nama`,`nisn`, `tempat_lahir`, `tanggal_lahir`, `foto` )
																	VALUES('$nama', '$nisn', '$tempat_lahir','$tanggal_lahir', '$nama_input')");
				if ($save) {
					echo " <script>
												alert('Data Berhasil disimpan !');
												</script>";
				}
			}
			unlink($sumber);
		} else {
			echo " <script>
										alert('File Extension tidak diizinkan');
										</script>";
		}
	} else {
		$save = mysqli_query($con, "INSERT INTO students (`nama`,`nisn`, `tempat_lahir`, `tanggal_lahir`, `foto` )
															VALUES('$nama', '$nisn', '$tempat_lahir', '$tanggal_lahir', '$foto')");
		if ($save) {
			echo " <script>
										alert('Data Berhasil disimpan !');
										</script>";
		}
	}
}
?>