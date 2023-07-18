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
                                <label>id&nbsp;dokumen <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?php echo id_otomatis("data_dokumen", "id_dokumen", "10"); ?>" name="id_dokumen" placeholder="id_dokumen" id="id_dokumen" required="required">
                            </td>
                        </tr>


                        <input class='' value="<?php echo $id_pegawai = decrypt($_COOKIE['kodene']); ?>" type="date" name="id_mahasiswa" id="id_mahasiswa" placeholder="id_mahasiswa" required="required">
                        <!-- <tr>
							<td width="25%" class="leftrowcms">					
								<label >Id&nbsp;Mahasiswa <span class="highlight"></span></label>
							</td>
							<td width="2%">:</td>
							<td>

								<select  class=' selectpicker' data-live-search='true'  type="text" name="id_mahasiswa" id="id_mahasiswa" placeholder="Id&nbsp;Mahasiswa" required="required">
									<option></option><?php combo_database2('data_mahasiswa', 'id_mahasiwa', 'name', ''); ?>
								</select>		
							</td>
						</tr>

 -->
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Id&nbsp;Dosen <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>

                                <select class=' selectpicker' data-live-search='true' type="text" name="id_dosen" id="id_dosen" placeholder="Id&nbsp;Dosen" required="required">
                                    <option></option><?php combo_database2('data_dosen', 'id_dosen', 'name', ''); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Tanggal <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' value="<?php echo tanggal_otomatis(); ?>" type="date" name="tanggal" id="tanggal" placeholder="Tanggal" required="required">


                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nama <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input onkeypress='return h(event)' class='' type="text" name="nama" id="nama" placeholder="Nama" required="required">


                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>File <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="file" name="file" id="file" placeholder="File" required="required">


                            </td>

                            <input class='' value="proses" type="hidden" name="status" id="status" placeholder="" required="required">

                            <!--  </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Status <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				
<select class=' selectpicker' data-live-search='true'  type="enum" name="status" id="status" placeholder="Status" required="required">
<option></option><?php combo_enum('data_dokumen', 'status', ''); ?>
</select>		
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
