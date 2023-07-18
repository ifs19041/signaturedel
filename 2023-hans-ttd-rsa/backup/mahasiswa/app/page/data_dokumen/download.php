<?php

include '../../../include/all_include.php';
include 'rsa/vendor/autoload.php';
include 'rsa/MyEncryption.php';
include 'rsa/Qrcode.php';
include 'repos.php';
include 'utils.php';

$proses = isset($_GET['proses']) ? $_GET['proses'] : "";

$data = surat_first($proses);

// $base_url = "http://192.168.100.86/2023-hans-ttd-rsa";
$base_url = "https://localhost.scode.web.id/2023-hans-ttd-rsa";

if ($data == false) {
    die("Dokumen tidak ditemukan");
}

$enc = new MyEncryption();

// encrypt id_dokumen
$enc_id = $enc->encrypt($proses);
$asli = $enc->decrypt($enc_id);

$url = "$base_url/mahasiswa/app/page/data_dokumen/verifikasi.php?proses=$enc_id";

// generate qrcode
$image_url = generate_qrcode($url);

$surat = "../../../upload/" . $data['file'];
$template_signature = "/home/haryandb/image.docx";
$output = "output/" . $data['file'];

// menambahkan halaman tanda tangan digital
append_digital_signature(
    $surat,
    $template_signature,
    $output,
    $image_url,
    ""
);

header("location: $output");

?>

<!-- <a href="<?= $output ?>">
    <img src="<?= $image_url ?>" alt="">
</a> -->
