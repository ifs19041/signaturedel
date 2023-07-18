<?php

include "repos.php";

$id_dosen = decrypt($_COOKIE['kodene']);

$dosen = dosen_first($id_dosen);

if ($dosen == false) {
?>
    <script>
        alert("Session berakhir, silahkan login!");
        window.location = "../../../login";
    </script>
<?php
} else {
?>
    <div class="col-md-12">
        <button class="btn btn-primary" onclick="$('#public_key').toggle('fade')">
            Lihat Public Key
        </button>
        <br>
        <br>
        <code id="public_key" style="white-space: normal; display: none;">
            <?= $dosen['public_key'] ?>
        </code>
        <br>
        <br>
        <br>
    </div>
<?php
}
