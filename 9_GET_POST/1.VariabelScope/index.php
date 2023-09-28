<?php
    // Variabel Scope / lingkup variabel
    $local = 10;

    function tampilX() {
        global $local;
        echo $local;
    }

    tampilX();
?>