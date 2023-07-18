<?php include '../../../include/all_include.php';

if (!isset($_POST['id_mahasiswa']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_mahasiswa=id_otomatis("data_mahasiswa","id_mahasiswa","10");
$nim=xss($_POST['nim']);
$nama=xss($_POST['nama']);
$email=xss($_POST['email']);
$username=xss($_POST['username']);
$password= md5($_POST['password']);
$status=xss($_POST['status']);



$query=mysql_query("insert into data_mahasiswa values (
'$id_mahasiswa'
 ,'$nim'
 ,'$nama'
 ,'$email'
 ,'$username'
 ,'$password'
 ,'$status'

)");

if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_tambah"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>