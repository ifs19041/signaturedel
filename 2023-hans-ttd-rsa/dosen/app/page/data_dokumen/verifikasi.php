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

$id_dokumen = xss($_POST['id_dokumen']);

$status = $_POST['status'];

$query = mysql_query("update data_dokumen set 
status='$status'
where id_dokumen='$id_dokumen' ") or die(mysql_error());

if ($query) {
?>
    <script>
        location.href = "<?php index(); ?>?input=popup_edit";
    </script>
<?php
} else {
    echo "GAGAL DIPROSES";
}
?>
