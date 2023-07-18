<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
    <div class="content-box-header" style="height: 39px">Tambah<h3></h3>
    </div>
    <form action="proses_simpan.php" enctype="multipart/form-data" method="post">
        <div class="content-box-content">
            <div id="postcustom">
                <table <?php tabel_in(100, '%', 0, 'center');  ?>>
                    <tbody>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>id&nbsp;dosen <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?php echo id_otomatis("data_dosen", "id_dosen", "10"); ?>" name="id_dosen" placeholder="id_dosen" id="id_dosen" required="required">
                            </td>
                        </tr>

                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nidn <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="nidn" id="nidn" placeholder="Nidn" required="required">


                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nama <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="nama" id="nama" placeholder="Nama" required="required">


                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Email <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="email" name="email" id="email" placeholder="Email" required="required">


                            </td>
                        </tr>

                        <tr>
				<td width="25%" class="leftrowcms">					
				<label >Foto Tanda Tangan<span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''  type="file" name="foto" id="foto" placeholder="Foto" required="required">

		
				</td>
			   </tr
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Username <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="username" id="username" placeholder="Username" required="required">


                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Password <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="password" name="password" id="password" placeholder="Password" required="required">


                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Status <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="status" id="status" placeholder="Status" required="required">
                            </td>
                        </tr>
                        <!-- 	<tr>
							<td width="25%" class="leftrowcms">					
								<label >Tanda Tangan <span class="highlight"></span></label>
							</td>
							<td width="2%">:</td>
							<td>
								<input class='' type="file" name="tanda_tangan" id="tanda_tangan" placeholder="Tanda Tangan" required="required">
							</td>
						</tr> -->

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
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$/;
            if (!passwordRegex.test(passwordValue)) {
                alert('Password harus terdiri dari minimal 6 karakter dengan setidaknya 1 huruf besar dan 1 angka');
            }
        });

        form.addEventListener('submit', (event) => {
            // mengambil nilai input
            const passwordValue = passwordInput.value;

            // mengecek apakah nilai input memenuhi kriteria password yang diminta
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$/;
            if (!passwordRegex.test(passwordValue)) {
                alert('Password harus terdiri dari minimal 6 karakter dengan setidaknya 1 huruf besar dan 1 angka');
                event.preventDefault(); // membatalkan aksi default form submit
            }
        });
    </script>
