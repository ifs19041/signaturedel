<?php

function dosen_first($id_dosen)
{
    global $dbh;

    $stmt = $dbh->prepare("SELECT * FROM data_dosen WHERE id_dosen=?");
    $stmt->execute([$id_dosen]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data ? $data : false;
}
