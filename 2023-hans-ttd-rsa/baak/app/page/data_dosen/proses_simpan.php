<?php include '../../../include/all_include.php';

if (!isset($_POST['id_dosen']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_dosen=id_otomatis("data_dosen","id_dosen","10");
$nidn=xss($_POST['nidn']);
$name=xss($_POST['name']);
$email=xss($_POST['email']);
$username=xss($_POST['username']);
$password= md5($_POST['password']);
$status=xss($_POST['status']);



$query=mysql_query("insert into data_dosen values (
'$id_dosen'
 ,'$nidn'
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