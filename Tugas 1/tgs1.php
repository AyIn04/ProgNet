<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Pemrograman Internet</title>
</head>
<body>
    <h2>Form Nilai Pemrograman Internet</h2>

    <form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required><br><br>

        <label for="nilai">Nilai (0-100):</label>
        <input type="number" name="nilai" id="nilai" min="0" max="100" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $nilai = $_POST['nilai'];

        // Fungsi untuk mengonversi nilai angka ke nilai huruf
        function konversiNilaiHuruf($nilai) {
            if ($nilai >= 85) {
                return 'A';
            } elseif ($nilai >= 80) {
                return 'B+';
            } elseif ($nilai >= 70) {
                return 'B';
            } elseif ($nilai >= 65) {
                return 'C+';
            } elseif ($nilai >= 60) {
                return 'C';
            } elseif ($nilai >= 50) {
                return 'D';
            } else {
                return 'E';
            }
        }

        // Mengonversi nilai angka menjadi nilai huruf
        $nilaiHuruf = konversiNilaiHuruf($nilai);

        // Menampilkan hasil input
        echo "<h3>Hasil:</h3>";
        echo "Nama: $nama <br>";
        echo "NIM: $nim <br>";
        echo "Nilai Angka: $nilai <br>";
        echo "Nilai Huruf: $nilaiHuruf <br>";
    }
    ?>
</body>
</html>
