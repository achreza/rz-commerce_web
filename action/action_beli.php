<?php
session_start();
$id = $_GET['id'];
$size = $_POST['ukuran'];
$jumlah = $_POST['jumlah'];
$user_id = $_SESSION['id'];

include '../config/koneksi.php';

if ($_POST['submit'] == "Beli Barang Ini") {
    $query_1 = "select * from barang inner join tipe on barang.id_tipe = tipe.id_tipe where id = '$id'";
    $h_1 = $koneksi->query($query_1);
    $d_1 = $h_1->fetch_array();

    $namabarang = $d_1['nama_barang'];
    $tipe = $d_1['nama_tipe'];
    $harga = $d_1['harga'];

    $insert = "INSERT INTO `keranjang` (`id_user`, `id_barang`, `jumlah`, `id_size`) VALUES ('$user_id', '$id', '$jumlah', '$size');";
    $hasil = $koneksi->query($insert);
    echo "<script>";
    echo "alert('barang dimasukkan ke keranjang');";
    echo "</script>";
    header('location: ../views/keranjang_view.php');
} else {

    $insert = "INSERT INTO `wishlist` (`id_barang`, `id_user`) VALUES ('$id', '$user_id');";
    $hasil = $koneksi->query($insert);
    header('location: ../views/product_grid.php');

    echo "<script>";
    echo "alert('barang dimasukkan ke Wishlist');";
    echo "</script>";
}
