<?php
include '../config/koneksi.php';
$nama = $_POST['namauser'];
$level = $_POST['level'];
$username = $_POST['username'];
$password = $_POST['password'];
$id = $_GET['id'];




$sql = "UPDATE `user` SET `username`='$username', `password`='$password', `nama`='$nama', `id_level`='$level' WHERE  `id`=$id;";
$a = $koneksi->query($sql);


header('location:../views/list_user_view.php');
