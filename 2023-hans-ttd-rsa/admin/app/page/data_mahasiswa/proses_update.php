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

$id_mahasiswa=xss($_POST['id_mahasiswa']);
$nim=xss($_POST['nim']);
$nama=xss($_POST['nama']);
$email=xss($_POST['email']);
$username=xss($_POST['username']);
$password_validasi=decrypt($_POST['password_validasi']); 
$password_lama=MD5($_POST['password_lama']);
$password=($_POST['password']);
if ($password_lama=="" or $password=="")
{
	$password=decrypt($_POST['password_validasi']);
}
else
{
	if ($password_lama==$password_validasi)
	{
		$password=MD5($_POST['password']);
	}
	else
	{
		?>
		<script>
			alert("password Lama tidak sesuai, Gagal Mengganti password.");
		window.history.back(); </script>
		<?php
		die();
	}
}
$status=$_POST['status'];

$query=mysql_query("update data_mahasiswa set 
	nim='$nim',
	nama='$nama',
	email='$email',
	username='$username',
	password='$password',
	status='$status'
	where id_mahasiswa='$id_mahasiswa' ") or die (mysql_error());

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