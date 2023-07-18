<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../../data/tmp/tmp 16/AircraftAdmin/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../data/tmp/tmp 16/AircraftAdmin/lib/font-awesome/css/font-awesome.css">
    <meta content="width=device-width,initial-scale=1" name="viewport">
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <br>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail data&nbsp;dokumen
                </div>

                <?php

                error_reporting(0);

                include '../../../include/all_include.php';
                include 'rsa/MyEncryption.php';
                include 'repos.php';

         $proses = isset($_GET['proses']) ? $_GET['proses'] : "";
         $proses = str_replace(" ", "+", $proses);
                //  echo $proses = decryptIt($proses);
                 $dosen = decrypt(mysql_real_escape_string($_GET['d']));
                 $dosen = dosen_first($dosen);
if ($dosen == false) {
    die("Dosen tidak ditemukan");
}

$enc = new MyEncryption(
    $dosen['private_key'],
    $dosen['public_key']
);
                

                $proses = $enc->decrypt($proses);

                 $data = surat_first($proses);

                if ($data == false) {
                ?>
                    <div style="margin: .6em;" class="alert alert-danger">
                        Dokumen Tidak Asli
                    </div>
               <?php } else { ?>

                <table class="table" style="width: 100%;">
                    <tbody>
                        <!-- <tr class="event3">
                            <td class="clleft" colspan="3">
                                <h3>
                                    Detail data&nbsp;dokumen
                                </h3>
                            </td>
                        </tr> -->
                        <!-- <tr>
                    <td class="clleft" width="25%">id&nbsp;dokumen</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['id_dokumen']; ?></td>
                </tr> -->

                        <!-- <tr>
                    <td class="clleft" width="25%">Id&nbsp;mahasiswa</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['id_mahasiswa']; ?></td>
                </tr> -->
                        <tr>
                            <td class="clleft" width="25%">Nama Mahasiswa</td>
                            <td class="clleft" width="2%">:</td>
                            <td class="clleft"><?php echo baca_database("", "nama", " select * from data_mahasiswa=id_mahasiswa where id_mahasiswa ='$data[id_mahasiswa]'") ?></td>
                        </tr>
                        <!-- <tr>
                    <td class="clleft" width="25%">Id&nbsp;dosen</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['id_dosen']; ?></td>
                </tr> -->
                        <tr>
                            <td class="clleft" width="25%">Nama Dosen</td>
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
                            <td class="clleft" width="25%">Status</td>
                            <td class="clleft" width="2%">:</td>
                            <td class="clleft"><?php  $s = $data['status'];
                            if ($s == "verifikasi")
                            {
                                echo "Dokumen Asli";
                            }
                            ?></td>
                        </tr>



                    </tbody>
                </table>
 <?php
                }

                ?>


            </div>

        </div>
    </div>
</body>

</html>
