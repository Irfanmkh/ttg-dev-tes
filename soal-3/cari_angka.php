<?php

function cariAngka($arr)
{
    $min = min($arr);
    $max = max($arr);
    $hilang = [];


    // cek angka yang hilang
    for ($i = $min; $i <= $max; $i++) {
        if (!in_array($i, $arr)) {
            $hilang[] = $i;
        }
    }

    if (empty($hilang)) {
        return "Lengkap, tidak ada angka yang hilang";
    } else {
        return implode(", ", $hilang);
    }
}


$input = readline("Masukkan angka (pisahkan dengan koma): ");

// ubah ke array
$inputArray = explode(',', $input);
// ubah ke integer 
$inputArray = array_map('intval', $inputArray);
// hilangkan duplikat
$unik = array_unique($inputArray);

echo "\nInput : [" . implode(", ", $unik) . "]\n";
echo "Angka / Urutan yang hilang: " . cariAngka($unik) . "\n";
