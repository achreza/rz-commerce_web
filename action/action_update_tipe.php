<?php
include '../config/koneksi.php';
$namatipe = $_POST['namatipe'];
$id = $_GET['id'];




$sql = "UPDATE `tipe` SET `nama_tipe`='$namatipe' WHERE  `id_tipe`='$id'";
$a = $koneksi->query($sql);


header('location:../views/input_tipe_view.php');
