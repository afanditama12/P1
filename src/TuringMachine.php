<?php

namespace Affandi\TugasP1;

class TuringMachine
{
    public function run()
    {
        // Meminta input dari pengguna
        echo "Masukkan operasi aritmatika (misal: 5 + 3): ";
        $input = trim(fgets(STDIN));

        // Memisahkan input menjadi angka dan operator
        $tokens = explode(' ', $input);

        // Memeriksa apakah input valid
        if (count($tokens) != 3) {
            echo "Error: Format input tidak valid!";
        } else {
            // Mendapatkan angka dan operator dari input
            $angka1 = (int) $tokens[0];
            $operator = $tokens[1];
            $angka2 = (int) $tokens[2];

            // Melakukan operasi aritmatika
            switch ($operator) {
                case '+':
                    $hasil = $angka1 + $angka2;
                    break;
                case '-':
                    $hasil = $angka1 - $angka2;
                    break;
                case '*':
                    $hasil = $angka1 * $angka2;
                    break;
                case '/':
                    if ($angka2 != 0) {
                        $hasil = $angka1 / $angka2;
                    } else {
                        $hasil = "Error: Pembagian dengan nol tidak diperbolehkan!";
                    }
                    break;
                default:
                    $hasil = "Error: Operator tidak valid!";
            }

            // Menampilkan hasil
            echo "Hasil: $hasil";
        }
    }
}

$turingMachine = new TuringMachine();
$turingMachine->run();