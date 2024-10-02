<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status AC</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    text-align: center;
}

h1 {
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

label {
    font-size: 16px;
    color: #555;
    text-align: left;
}

input[type="number"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

button {
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #2980b9;
}

.result {
    margin-top: 20px;
}

.result p {
    font-size: 18px;
    color: #333;
}

.result strong {
    font-size: 20px;
    color: #e74c3c;
}

    </style>

</head>
<body>
    <div class="container">
        <h1>Status AC Berdasarkan Suhu dan Kelembapan</h1>
        <form action="tgsac.php" method="GET"> <!-- Mengarah ke tgsac.php -->
            <label for="suhu">Masukkan Suhu (°C):</label>
            <input type="number" id="suhu" name="suhu" step="0.1" required>

            <label for="kelembapan">Masukkan Kelembapan (%):</label>
            <input type="number" id="kelembapan" name="kelembapan" step="0.1" required>

            <button type="submit">Cek Status AC</button>
        </form>

        <div class="result">
            <?php
            // Batas suhu dan kelembapan, bisa diatur oleh pengguna
            $suhu_tinggi = 30;
            $suhu_sedang = 25;
            $suhu_rendah = 18;
            $kelembapan_tinggi = 80;
            $kelembapan_sedang = 60;

            // Input suhu dan kelembapan
            $suhu = isset($_GET['suhu']) ? floatval($_GET['suhu']) : null;
            $kelembapan = isset($_GET['kelembapan']) ? floatval($_GET['kelembapan']) : null;

            // Validasi input
            if ($suhu !== null && $kelembapan !== null) {
                // Logika pengaturan status AC
                if ($suhu <= $suhu_rendah && $kelembapan <= $kelembapan_sedang) {
                    $ac_status = "AC mati";
                } elseif ($suhu > $suhu_rendah && $suhu <= $suhu_sedang && $kelembapan <= $kelembapan_sedang) {
                    $ac_status = "AC menyala dengan kerja ringan";
                } elseif ($suhu > $suhu_sedang && $suhu <= $suhu_tinggi && $kelembapan <= $kelembapan_tinggi) {
                    $ac_status = "AC menyala dengan kerja sedang";
                } elseif ($suhu > $suhu_tinggi || $kelembapan > $kelembapan_tinggi) {
                    $ac_status = "AC menyala dengan kerja berat";
                } else {
                    $ac_status = "Kondisi tidak dikenali";
                }

                // Output status AC
                echo "<p>Status AC: <strong>$ac_status</strong></p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
