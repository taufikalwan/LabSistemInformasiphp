<?php
$koneksi = mysqli_connect("localhost","root","","data_perpus");
if( !$koneksi ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>