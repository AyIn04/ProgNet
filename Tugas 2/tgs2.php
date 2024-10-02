<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penilaian Siswa</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        table, th, td {
            border: 1px solid #bbb;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #2980b9;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        tr:hover {
            background-color: #bdc3c7;
        }

        .result {
            text-align: center;
            margin-top: 30px;
        }

        .result span {
            font-weight: bold;
            font-size: 18px;
            color: #2980b9;
        }

        .failed {
            color: #e74c3c;
        }

        .passed {
            color: #27ae60;
        }

    </style>
</head>
<body>
    <h1>Data Penilaian Siswa</h1>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Rata-rata</th>
                <th>Kelulusan</th>
                <th>Diperbaiki (Jika Tidak Lulus)</th>
            </tr>
        </thead>
        <tbody>
        <?php

        // Data siswa
        $siswa = [
            ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
            ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
            ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
            ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
            ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
        ];

        // Variabel untuk menghitung jumlah siswa yang lulus dan tidak lulus
        $totalLulus = 0;
        $totalTidakLulus = 0;

        // Fungsi untuk menghitung nilai rata-rata
        function hitungRataRata($nilai) {
            return array_sum($nilai) / count($nilai);
        }

        // Perulangan untuk setiap siswa
        foreach ($siswa as $s) {
            // Mengambil nilai mata pelajaran
            $nilai = [
                'matematika' => $s['matematika'],
                'bahasa_inggris' => $s['bahasa_inggris'],
                'ipa' => $s['ipa']
            ];

            // Menghitung nilai rata-rata
            $rataRata = hitungRataRata($nilai);

            // Menentukan status kelulusan
            $status = $rataRata >= 75 ? "Lulus" : "Tidak Lulus";

            // Jika tidak lulus, tentukan mata pelajaran dengan nilai terendah
            $mataPelajaranTerendah = null;
            if ($status == "Tidak Lulus") {
                $totalTidakLulus++;
                $mataPelajaranTerendah = array_keys($nilai, min($nilai))[0];
            } else {
                $totalLulus++;
            }

            // Cetak data siswa ke tabel
            echo "<tr>";
            echo "<td>{$s['nama']}</td>";
            echo "<td>" . number_format($rataRata, 2) . "</td>";
            echo "<td>" . ($status == "Lulus" ? "<span class='passed'>$status</span>" : "<span class='failed'>$status</span>") . "</td>";
            echo "<td>" . ($status == "Tidak Lulus" ? ucfirst($mataPelajaranTerendah) : "-") . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <div class="result">
        <?php
        // Cetak jumlah total siswa yang lulus dan tidak lulus
        echo "<p>Total Siswa Lulus: <span class='passed'>$totalLulus</span></p>";
        echo "<p>Total Siswa Tidak Lulus: <span class='failed'>$totalTidakLulus</span></p>";
        ?>
    </div>
</body>
</html>
