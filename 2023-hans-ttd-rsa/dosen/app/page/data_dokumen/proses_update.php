<?php include '../../../include/all_include.php';

if (!isset($_POST['id_dokumen']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_dokumen=xss($_POST['id_dokumen']);
$id_mahasiswa=xss($_POST['id_mahasiswa']);
$id_dosen=xss($_POST['id_dosen']);
$tanggal=xss($_POST['tanggal']);
$nama=xss($_POST['nama']);
$file=xss($_FILES['file']['name']); if (empty($file)){$file = $_POST['file1'];} else { $file = upload('file');};

$status=$_POST['status'];

$query=mysql_query("update data_dokumen set 
id_mahasiswa='$id_mahasiswa',
id_dosen='$id_dosen',
tanggal='$tanggal',
nama='$nama',
file='$file',

status='$status'
where id_dokumen='$id_dokumen' ") or die (mysql_error());

if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_edit"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>