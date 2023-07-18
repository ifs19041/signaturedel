<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>	

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Tambah<h3></h3></div>
<form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;admin <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo id_otomatis("data_admin","id_admin","10");?>" name="id_admin" placeholder="id_admin" id="id_admin" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Email <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''  type="email" name="email" id="email" placeholder="Email" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Username <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="username" id="username" placeholder="Username" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Password <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="password" name="password" id="password" placeholder="Password" required="required">

		
				</td>
			   </tr>
			   
	</tbody>
</table>
<div class="content-box-content">
<center>
<?php btn_simpan(' SIMPAN'); ?>
</center>
</div>		
</div>
</div>
</form>
<script>
  const form = document.querySelector('form');
  const passwordInput = document.getElementById('password');

  passwordInput.addEventListener('blur', () => {
    // mengambil nilai input
    const passwordValue = passwordInput.value;

    // mengecek apakah nilai input memenuhi kriteria password yang diminta
    const passwordRegex = /^(?=.[A-Z])(?=.\d)[A-Za-z\d]{6,}$/;
    if (!passwordRegex.test(passwordValue)) {
      alert('Password harus terdiri dari minimal 6 karakter dengan setidaknya 1 huruf besar dan 1 angka');
    }
  });

  form.addEventListener('submit', (event) => {
    // mengambil nilai input
    const passwordValue = passwordInput.value;

    // mengecek apakah nilai input memenuhi kriteria password yang diminta
    const passwordRegex = /^(?=.[A-Z])(?=.\d)[A-Za-z\d]{6,}$/;
    if (!passwordRegex.test(passwordValue)) {
      alert('Password harus terdiri dari minimal 6 karakter dengan setidaknya 1 huruf besar dan 1 angka');
      event.preventDefault(); // membatalkan aksi default form submit
    }
  });
</script>