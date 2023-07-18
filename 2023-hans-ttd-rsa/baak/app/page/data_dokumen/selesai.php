<?php include '../../../include/all_include.php';



$id_dokumen=$_GET['id_dokumen'];
$status="selesai";
$query=mysql_query("update data_dokumen set 
status='$status'") or die (mysql_error());

if($query){
?>
 ?>
<script>location.href = ""; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>