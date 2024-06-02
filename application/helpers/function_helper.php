<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function skorNilai ($nilai) {
    if ($nilai >= 80) {
        return 'A';
    } elseif ($nilai >= 70) {
        return 'B';
    } elseif ($nilai >= 60) {
        return 'C';
    } elseif ($nilai >= 50) {
        return 'D';
    } else {
        return 'E';
    }
}
?>