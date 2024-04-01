<?php
// Fungsi untuk melakukan operasi aritmatika
function hitung($angka1, $operator, $angka2) {
    switch ($operator) {
        case '+':
            return $angka1 + $angka2;
        case '-':
            return $angka1 - $angka2;
        case '*':
            return $angka1 * $angka2;
        case '/':
            if ($angka2 != 0) {
                return $angka1 / $angka2;
            } else {
                return "Error: Pembagian dengan nol tidak diperbolehkan!";
            }
        default:
            return "Error: Operator tidak valid!";
    }
}

// Meminta input dari pengguna
echo "Masukkan operasi aritmatika (misal: 1 + 1): ";
$input = trim(fgets(STDIN));

// Memisahkan input menjadi angka dan operator
$tokens = explode(' ', $input);

// Memeriksa apakah input valid
if (count($tokens) != 3) {
    echo "Error: Format input tidak valid!";
} else {
    // Mendapatkan angka dan operator dari input
    $angka1 = (float) $tokens[0];
    $operator = $tokens[1];
    $angka2 = (float) $tokens[2];

    // Melakukan operasi aritmatika
    $hasil = hitung($angka1, $operator, $angka2);

    // Menampilkan hasil
    echo "Hasil: $hasil";
}
?>
