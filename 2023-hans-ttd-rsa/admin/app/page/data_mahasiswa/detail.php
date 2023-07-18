
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
							Detail data&nbsp;mahasiswa
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
					$sql=mysql_query("SELECT * FROM data_mahasiswa where id_mahasiswa = '$proses'");
					$data=mysql_fetch_array($sql);
					?>
					<tr>
						<td class="clleft" width="25%">id&nbsp;mahasiwa</td>
						<td class="clleft" width="2%">:</td>
						<td class="clleft"><?php echo $data['id_mahasiswa']; ?></td>	
					</tr>

					<tr>
						<td class="clleft" width="25%">Nim</td>
						<td class="clleft" width="2%">:</td>
						<td class="clleft"><?php echo $data['nim']; ?></td>	
					</tr>
					<tr>
						<td class="clleft" width="25%">Nama</td>
						<td class="clleft" width="2%">:</td>
						<td class="clleft"><?php echo $data['nama']; ?></td>	
					</tr>
					<tr>
						<td class="clleft" width="25%">Email</td>
						<td class="clleft" width="2%">:</td>
						<td class="clleft"><?php echo $data['email']; ?></td>	
					</tr>
					<tr>
						<td class="clleft" width="25%">Username</td>
						<td class="clleft" width="2%">:</td>
						<td class="clleft"><?php echo $data['username']; ?></td>	
					</tr>
					<tr>
						<td class="clleft" width="25%">Password</td>
						<td class="clleft" width="2%">:</td>
						<td class="clleft"><?php echo $data['password']; ?></td>	
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