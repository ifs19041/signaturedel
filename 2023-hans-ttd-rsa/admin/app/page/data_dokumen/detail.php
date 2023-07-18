
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Detail
<h3 style="cursor: s-resize;"></h3></div>
<div class="content-box-content">
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
	<tr class="event3">
		<td class="clleft" colspan="3">
			Detail data&nbsp;dokumen
		</td>
	</tr>	
			<?php

if (!isset($_GET['proses']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
}
			$proses = decrypt(mysql_real_escape_string($_GET['proses']));
			$sql=mysql_query("SELECT * FROM data_dokumen where id_dokumen = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;dokumen</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_dokumen']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">Id&nbsp;mahasiswa</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_mahasiswa']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama", " select * from data_mahasiswa=id_mahasiswa where id_mahasiswa ='$data[id_mahasiswa]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Id&nbsp;dosen</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_dosen']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama", " select * from data_dosen where id_dosen ='$data[id_dosen]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Tanggal</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (format_indo($data['tanggal'])); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nama']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">File</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><a href='../../../../mahasiswa/upload/<?php echo $data['file']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='250'  src='../../../../mahasiswa/upload/<?php echo $data['file']; ?>'></a></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Status</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['status']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>