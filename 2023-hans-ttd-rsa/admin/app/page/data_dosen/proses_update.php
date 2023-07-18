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

$id_dosen=xss($_POST['id_dosen']);
$nidn=xss($_POST['nidn']);
$nama=xss($_POST['nama']);
$email=xss($_POST['email']);
$foto=upload('foto');
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

$query=mysql_query("update data_dosen set 
nidn='$nidn',
nama='$nama',
email='$email',
foto='$foto',
username='$username',
password='$password',

status='$status'
where id_dosen='$id_dosen' ") or die (mysql_error());

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