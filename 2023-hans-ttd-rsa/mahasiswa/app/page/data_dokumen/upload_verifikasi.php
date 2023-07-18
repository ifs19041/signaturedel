<style>
    .p-10 {
        padding: 10px;
    }
</style>

<?php

include 'rsa/vendor/autoload.php';
include 'rsa/MyEncryption.php';
include 'rsa/Qrcode.php';
include 'rsa/Keys.php';
include 'repos.php';
include 'utils.php';


$berhasil = false;
$pesan = false;

if (isset($_FILES['upload'])) {
    $tmp_file = cek_upload("upload");
    $encrypt_id = get_keys($tmp_file);
    $id_dosen = get_keys($tmp_file, ".dosen");

    $dosen = dosen_first($id_dosen);
    if ($dosen == false) {
        $pesan = "Masukkan dokumen terlebih dahulu";
    } else {
        $enc = new MyEncryption($dosen['private_key'], $dosen['public_key']);
        $asli = $enc->decrypt($encrypt_id);

        $surat = surat_first($asli);

        $dosen = dosen_first($surat['id_dosen']);
        if ($dosen == false) {
            die("Dokumen Tidak Asli");
        }

        $asli_enc = encrypt($asli);

        if ($surat) {
            $berhasil = true;
            $pesan = "Dokumen asli dan berhasil ditemukan";
        } else {
            $pesan = "Dokumen Tidak Asli";
        }
    }
}
?>

<body>
    <?php

    if ($pesan) {
    ?>
        <div class="row p-10">
            <div class="col-md-3">
                <div class="alert alert-success" role="alert">
                    <?= $pesan ?>
                </div>

                <?php
                if ($berhasil) {
                ?>
                    <a class="btn btn-success" href="index.php?input=detail&proses=<?= $asli_enc ?>">
                        Lihat Detail
                    </a>
                <?php
                }
                ?>

            </div>
        </div>
    <?php
    }

    ?>
    <form class="p-10" enctype="multipart/form-data" method="post">
        <fieldset>
            <table>
                <tbody>
                    <tr>
                        <td>File Dokumen</td>
                        <td class="p-10">:</td>
                        <td>
                            <input type="file" name="upload">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <?php btn_cari('Upload'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
</body>
