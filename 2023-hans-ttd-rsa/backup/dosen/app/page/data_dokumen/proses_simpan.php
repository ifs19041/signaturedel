<?php include '../../../include/all_include.php';

if (!isset($_POST['id_dokumen'])) {
?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
<?php
    die();
}


$id_dokumen = id_otomatis("data_dokumen", "id_dokumen", "10");
$id_mahasiswa = xss($_POST['id_mahasiswa']);
$id_dosen = xss($_POST['id_dosen']);
$tanggal = xss($_POST['tanggal']);
$nama = xss($_POST['nama']);
$file = upload('file');
$status = xss($_POST['status']);



$query = mysql_query("insert into data_dokumen values (
'$id_dokumen'
 ,'$id_mahasiswa'
 ,'$id_dosen'
 ,'$tanggal'
 ,'$nama'
 ,'$file'
 ,'$status'

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
