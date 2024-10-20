<?php
//kode 9 digit
  
$carikode = mysqli_query($koneksi,"SELECT id_barang FROM tb_barang order by id_barang desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_barang'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;


if (strlen($tambah) == 1){
$format = "B"."00".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "B"."0".$tambah;
			}else (strlen($tambah) == 3)||
			$format = "B".$tambah
				
?>

<section class="content-header">
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>SI LAB STMIK Pontianak</b>
			</a>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Buku</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>ID id_barang</label>
							<input type="text" name="id_barang" id="id_barang" class="form-control" value="<?php echo $format; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang">
						</div>

						<div class="form-group">
							<label>MerekBarang</label>
							<input type="text" name="merek_barang" id="merek_barang" class="form-control" placeholder="Nama merek_barang">
						</div>

						<div class="form-group">
							<label>Harga Barang</label>
							<input type="text" name="harga_barang" id="harga_barang" class="form-control" placeholder="harga_barang">
						</div>

						<div class="form-group">
							<label>Tahun Beli</label>
							<input type="number" name="th_beli" id="th_beli" class="form-control" placeholder="Tahun Terbit">
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_b" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php
if (isset($_POST['Simpan'])){
    $id_barang = mysqli_real_escape_string($koneksi, $_POST['id_barang']);
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $merek_barang = mysqli_real_escape_string($koneksi, $_POST['merek_barang']);
    $harga_barang = mysqli_real_escape_string($koneksi, $_POST['harga_barang']);
    $th_beli = mysqli_real_escape_string($koneksi, $_POST['th_beli']);

    $sql_simpan = "INSERT INTO tb_barang (id_barang, nama_barang, merek_barang, harga_barang, th_beli) VALUES (
       '$id_barang', '$nama_barang', '$merek_barang', '$harga_barang', '$th_beli')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);

    if ($query_simpan){
        echo <script>
        Swal.fire({
            title: 'Tambah Data Berhasil',
            text: '',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_buku';
            }
        });
        </script>;
    } else {
        echo <script>
        Swal.fire({
            title: 'Tambah Data Gagal',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/add_buku';
            }
        });
        </script>";
    }
    mysqli_close($koneksi);
}
?>
    
