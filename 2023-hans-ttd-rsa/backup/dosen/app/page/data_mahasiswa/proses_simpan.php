<?php include '../../../include/all_include.php';

if (!isset($_POST['id_mahasiwa']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_mahasiwa=id_otomatis("data_mahasiswa","id_mahasiwa","10");
$nim=xss($_POST['nim']);
$name=xss($_POST['name']);
$email=xss($_POST['email']);
$username=xss($_POST['username']);
$password= md5($_POST['password']);
$status=xss($_POST['status']);



$query=mysql_query("insert into data_mahasiswa values (
'$id_mahasiwa'
 ,'$nim'
 ,'$name'
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