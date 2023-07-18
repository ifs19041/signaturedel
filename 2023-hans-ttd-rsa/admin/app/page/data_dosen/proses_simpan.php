<?php

include '../../../include/all_include.php';
include 'GenKeys.php';

if (!isset($_POST['id_dosen'])) {
?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
<?php
    die();
}

$key = new GenKeys();

$id_dosen = id_otomatis("data_dosen", "id_dosen", "10");
$nidn = xss($_POST['nidn']);
$nama = xss($_POST['nama']);
$email = xss($_POST['email']);
$foto = upload('foto');
$username = xss($_POST['username']);
$password = md5($_POST['password']);
$status = xss($_POST['status']);
// $tanda_tangan=upload('tanda_tangan');

$publicKey = $key->getPublicKey();
$privateKey = $key->getPrivateKey();



 $query =mysql_query("insert into data_dosen values (
'$id_dosen'
 ,'$nidn'
 ,'$nama'
 ,'$email'
 ,'$foto'
 ,'$username'
 ,'$password'
 ,'$status'
 ,''
 ,'$publicKey'
 ,'$privateKey'

)");



if ($query) {
?>
    <script>
        location.href = "<?php index(); ?>?input=popup_tambah";
    </script>
<?php
} else {
    echo "GAGAL DIPROSES";
}
?>
