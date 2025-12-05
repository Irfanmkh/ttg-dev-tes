<?php

// Bikin semua urutan kemungkinan dari array angka
function permutasi($arr)
{
    if (count($arr) == 1) {
        return [$arr];
    }

    $result = [];
    foreach ($arr as $i => $v) {
        $sisa = $arr;
        unset($sisa[$i]); // buang angka yang sedang dipakai
        foreach (permutasi(array_values($sisa)) as $perm) {
            $result[] = array_merge([$v], $perm); // gabungkan angka awal + sisa
        }
    }
    return $result;
}
function cariPola($angka, $target)
{
    $ops = ['+', '-', '*'];

    // coba semua urutan angka
    foreach (permutasi($angka) as $perm) {
        // coba semua kombinasi
        foreach ($ops as $op1) {
            foreach ($ops as $op2) {
                foreach ($ops as $op3) {
                    // pola kurung
                    $pola = [
                        "({$perm[0]} $op1 {$perm[1]}) $op2 ({$perm[2]} $op3 {$perm[3]})",
                        "(({$perm[0]} $op1 {$perm[1]}) $op2 {$perm[2]}) $op3 {$perm[3]}",
                        "({$perm[0]} $op1 ({$perm[1]} $op2 {$perm[2]})) $op3 {$perm[3]}",
                        "{$perm[0]} $op1 (({$perm[1]} $op2 {$perm[2]}) $op3 {$perm[3]})",
                        "{$perm[0]} $op1 ({$perm[1]} $op2 ({$perm[2]} $op3 {$perm[3]}))",
                    ];

                    // cek satu-satu pola, jika cocok return pola
                    foreach ($pola as $exp) {
                        if (eval("return $exp;") == $target) {
                            return $exp;
                        }
                    }
                };
            };
        }
    }

    return false; // tidak ada yang cocok
}

$input = readline('Masukkan angka (pisahkan koma): ');
$target = readline('Masukkan target: ');

// ubah string ke array angka
$angka = array_map('intval', explode(',', $input));

// validasi harus 4 angka
if (count($angka) !== 4) {
    echo "Program ini khusus untuk 4 angka.\n";
    exit();
}

$hasil = cariPola($angka, $target);

echo "\nSource: [" . implode(', ', $angka) . "]\n";
echo "Target: $target\n";

if ($hasil) {
    echo "Output: $hasil\n";
} else {
    echo "Tidak ada ekspresi yang cocok.\n";
}
