<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
    <div class="content-box-header" style="height: 39px">Edit<h3></h3>
    </div>
    <form action="proses_update.php" enctype="multipart/form-data" method="post">
        <div class="content-box-content">
            <div id="postcustom">
                <table <?php tabel_in(100, '%', 0, 'center');  ?>>
                    <tbody>
                        <?php

                        if (!isset($_GET['proses'])) {
                        ?>
                            <script>
                                alert("AKSES DITOLAK");
                                location.href = "index.php";
                            </script>
                        <?php
                            die();
                        }
                        $proses = decrypt(mysql_real_escape_string($_GET['proses']));
                        $sql = mysql_query("SELECT * FROM data_dokumen where id_dokumen = '$proses'");
                        $data = mysql_fetch_array($sql);
                        ?>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>id&nbsp;dokumen <font color="red">*</font></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="%typepertama%" name="id_dokumen" value="<?php echo $data['id_dokumen']; ?>" readonly id="id_dokumen" required="required">
                            </td>
                        </tr>

                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Id&nbsp;Mahasiswa <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <!-- -->
                                <select class=' selectpicker' data-live-search='true' required="required" type="text" name="id_mahasiswa" id="id_mahasiswa" placeholder="Id&nbsp;Mahasiswa" value="<?php echo ($data['id_mahasiswa']); ?>">
                                    <option value='<?php echo $data[id_mahasiswa]; ?>'>- <?php echo $data[id_mahasiswa]; ?> -</option><?php combo_database2('data_mahasiswa', 'id_mahasiwa', 'name', ''); ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Id&nbsp;Dosen <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <!-- -->
                                <select class=' selectpicker' data-live-search='true' required="required" type="text" name="id_dosen" id="id_dosen" placeholder="Id&nbsp;Dosen" value="<?php echo ($data['id_dosen']); ?>">
                                    <option value='<?php echo $data[id_dosen]; ?>'>- <?php echo $data[id_dosen]; ?> -</option><?php combo_database2('data_dosen', 'id_dosen', 'name', ''); ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Tanggal <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' required="required" type="date" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo ($data['tanggal']); ?>">



                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nama <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input onkeypress='return h(event)' class='' required="required" type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo ($data['nama']); ?>">



                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>File<span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <a href='../../../../admin/upload/<?php echo $data['file']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='100' height='60' src='../../../../admin/upload/<?php echo $data['file']; ?>'></a>
                                <br>
                                <?php echo $data['file']; ?>
                                <input type="hidden" name="file1" value="<?php echo $data['file']; ?>">
                                <br>
                                <input class='' type="file" name="file" id="file" placeholder="File" value="<?php echo ($data['file']); ?>">



                            </td>
                        </tr>
                        <!-- <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Status <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class=' selectpicker' data-live-search='true' required="required" type="enum" name="status" id="status" placeholder="Status" value="<?php echo ($data['status']); ?>">
                                    <option value='<?php echo $data['status']; ?>'>- <?php echo $data['status']; ?> -</option><?php combo_enum('data_dokumen', 'status', ''); ?>
                                </select>

                            </td>
                        </tr> -->

                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="alert alert-danger" role="alert">
                                    Jika file surat dirubah <br>
                                    status surat menjadi proses <br>
                                    harus diverifikasi ulang oleh dosen
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_update(' UPDATE'); ?>
                    </center>
                </div>
            </div>
        </div>
    </form>
