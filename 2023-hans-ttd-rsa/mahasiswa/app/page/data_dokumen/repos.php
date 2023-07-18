<?php


function surat_first($id_dokumen)
{
    global $dbh;

    $stmt = $dbh->prepare("SELECT * FROM data_dokumen WHERE id_dokumen=?");
    $stmt->execute([$id_dokumen]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data ? $data : false;
}

function dosen_first($id_dosen)
{
    global $dbh;

$id_dosen;   $stmt = $dbh->prepare("SELECT * FROM data_dosen WHERE id_dosen=?");
     $stmt->execute([$id_dosen]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data ? $data : false;
}
