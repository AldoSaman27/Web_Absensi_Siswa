<?php
function getHari($i) {
    switch ($i) {
        case 1: $hari = "Senin"; break;
        case 2: $hari = "Selasa"; break;
        case 3: $hari = "Rabu"; break;
        case 4: $hari = "Kamis"; break;
        case 5: $hari = "Jum'at"; break;
        case 6: $hari = "Sabtu"; break;
        case 7: $hari = "Minggu"; break;
        default: $hari = "Unknown"; break;
    }
    return $hari;
}
?>