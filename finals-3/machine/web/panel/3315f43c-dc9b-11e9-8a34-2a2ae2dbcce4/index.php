<?php
if ($_COOKIE['logged_in'] == '54178912alice'){
    $filelist = glob("*.dat");
    echo "SYSTEM CORRUPTION - ALICE IS NOT DEFINED BUT AUTHORIZED<br><br>";
    echo "ALICE MEMORY - DATA<br><hr>";
    foreach ($filelist as $file) {
        echo "<a href='/3315f43c-dc9b-11e9-8a34-2a2ae2dbcce4/$file'>".$file."</a><br>";
    }
}else{
    echo "SYSTEM LOCKED";
}
?>