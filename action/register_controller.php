<?php
include "../config/koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$level = 1;


$sql = "INSERT INTO `user` (`nama`, `username`, `password`, `id_level`) VALUES ('" . $nama . "', '" . $username . "', '" . $password . "', '2');";
$a = $koneksi->query($sql);


if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Daftar Berhasil!");
        location.replace('../views/login.php');
    </script>
<?php
} else {
    echo "Error";
}

?>