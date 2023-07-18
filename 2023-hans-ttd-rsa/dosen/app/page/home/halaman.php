<?php




if (!empty($halaman)) {
    if (isset($_GET['tmp'])) {
        temp();
    } else if (isset($_GET['tmp_f'])) {
        tmp_f();
    } else if ($_GET['import']) {
        include "import.php";
    } else {
        // include "key_views.php";
        echo "<br>";
        include "../../../data/tmp/$tmp/home.php";
        echo "<br>";
        
    }
} else {
    echo "Mau Ngapain..? Halaman Tidak Ada.";
}

