<?php

function add_keys($key, $file, $name = ".keys")
{
    $zip_val = new ZipArchive;

    $file_keys = dirname(__FILE__) . DIRECTORY_SEPARATOR . ".keys";

    file_put_contents($file_keys, $key);

    if ($zip_val->open($file) == true) {
        $zip_val->addFile($file_keys, $name);
        return true;
    }

    return false;
}

function cek_upload($namafile)
{
    global $ekstensi_dilarang;

    $tmp_file = $_FILES[$namafile]['tmp_name'];
    $nama = $_FILES[$namafile]['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    if (in_array($ekstensi, $ekstensi_dilarang) === false) {
    } else {
?>
        <script>
            alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
            window.history.back();
        </script>
<?php
        die();
    }

    return $tmp_file;
}

function get_keys($file, $name = ".keys")
{
    $keys = file_get_contents("zip://$file#$name");
    return $keys;
}
