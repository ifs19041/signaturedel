<?php

include '../../../include/all_include.php';
include 'rsa/vendor/autoload.php';
include 'rsa/MyEncryption.php';
include 'rsa/Qrcode.php';
include 'rsa/Keys.php';
include 'repos.php';
include 'utils.php';

// $base_url = "http://192.168.100.86/2023-hans-ttd-rsa";
$base_url = "https://localhost.scode.web.id/2023-hans-ttd-rsa";

$proses = isset($_GET['proses']) ? $_GET['proses'] : "";

$data = surat_first($proses);
if ($data == false) {
    die("Dokumen tidak ditemukan");
}

$dosen = dosen_first($data['id_dosen']);
if ($dosen == false) {
    die("Dosen tidak ditemukan");
}

$enc = new MyEncryption(
    $dosen['private_key'],
    $dosen['public_key']
);





// encrypt id_dokumen
$enc_id = $enc->encrypt($proses);
$id = $dosen['id_dosen'];
$id_d = encrypt($id);
$asli = $enc->decrypt($enc_id);

$url = "$base_url/mahasiswa/app/page/data_dokumen/verifikasi.php?proses=$enc_id&d=$id_d";

// generate qrcode
$image_url = generate_qrcode($url);

$surat = dirname(__FILE__) . "/../../../upload/" . $data['file'];
$template_signature = "/home/haryandb/image.docx";
$output = "output/" . $data['file'];

$tanda_tangan = dirname(__FILE__) . "/../../../../admin/upload/" . $dosen['foto'];

echo '<img src="' . $tanda_tangan . '" alt="Tanda Tangan">';


// menambahkan halaman tanda tangan digital
append_digital_signature(
    $surat,
    $template_signature,
    $output,
    $image_url,
    $tanda_tangan,
    ""
);

add_keys($enc_id, $output);
add_keys($data['id_dosen'], $output, ".dosen");

header("location: $output");

?>

<!-- <a href="<?= $output ?>">
    <img src="<?= $image_url ?>" alt="">
</a> -->
