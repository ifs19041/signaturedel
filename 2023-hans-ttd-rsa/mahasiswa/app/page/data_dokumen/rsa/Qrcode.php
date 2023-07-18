<?php

include(dirname(__FILE__) . DIRECTORY_SEPARATOR . "phpqrcode/qrlib.php");

function generate_qrcode($isi)
{
    $penyimpanan = dirname(__FILE__) . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR;

    if (!file_exists($penyimpanan))
        mkdir($penyimpanan);

    QRcode::png($isi, $penyimpanan . "qrcode_saya.png");

    return "rsa/tmp/qrcode_saya.png";
}
