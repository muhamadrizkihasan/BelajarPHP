<?php
    // While dicek dulu, baru di eksekusi
    $i = 0;
    while( $i < 5 ){
    echo "<p>While</p>";
    $i++;
    }

    // Do While melakukan minimal satu kali, baru dicek
    $i = 10;
    do {
        echo "<br> <p>Do While</p>";
        $i++;
    } while ($i < 5);

    
?>