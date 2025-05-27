<?php
$kelipatan_input = 1; 
$judul_kelipatan = "1";
$pesan_error = "";
$data_tabel = [];

function cekKelipatan($angka, $pembanding) {
    if ($pembanding == 0) return false; 
    return $angka % $pembanding == 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['kelipatan'])) {
        $input_str = trim($_POST['kelipatan']);

        if ($input_str === "") {
            $kelipatan_input = 1;
            $judul_kelipatan = "1";
        } elseif (!is_numeric($input_str)) {
            $pesan_error = "Masukan harus berupa angka.";
            $kelipatan_input = 1; 
            $judul_kelipatan = "1";
        } else {
            $input_val = (int)$input_str; 
            if ($input_val < 0) {
                $pesan_error = "Angka minus tidak akan diproses. Menampilkan kelipatan dari 1.";
                $kelipatan_input = 1; 
                $judul_kelipatan = "1";
            } elseif ($input_val == 0) {
                $pesan_error = "Kelipatan dari 0 tidak valid. Menampilkan kelipatan dari 1.";
                $kelipatan_input = 1;
                $judul_kelipatan = "1";
            }
            else {
                $kelipatan_input = $input_val;
                $judul_kelipatan = (string)$kelipatan_input;
            }
        }
    }
} else {
    $kelipatan_input = 1;
    $judul_kelipatan = "1";
}

for ($i = 1; $i <= 40; $i++) {
    $adalah_kelipatan = cekKelipatan($i, $kelipatan_input);
    $teks_kelipatan = $i;
    $kelas_background = 'bg-white'; 

    if ($kelipatan_input == 1) { 
        $teks_kelipatan = $i . " (kelipatan dari 1)";
        $kelas_background = 'bg-green';
    } elseif ($pesan_error && strpos($pesan_error, "minus") !== false) { 
         $teks_kelipatan = $i . " (kelipatan dari 1)"; 
         $kelas_background = 'bg-green';
    } elseif ($pesan_error && strpos($pesan_error, "0 tidak valid") !== false) { 
         $teks_kelipatan = $i . " (kelipatan dari 1)"; 
         $kelas_background = 'bg-green';
    }
    elseif ($adalah_kelipatan) {
        $teks_kelipatan = $i . " (kelipatan dari " . $kelipatan_input . ")";
        $kelas_background = 'bg-green';
    }

    $data_tabel[] = [
        'angka' => $i,
        'teks_kelipatan' => $teks_kelipatan,
        'kelas_background' => $kelas_background
    ];
}

if ($kelipatan_input != 1 && !$pesan_error) {
    $data_tabel_temp = [];
    for ($i = 1; $i <= 40; $i++) {
        $adalah_kelipatan = cekKelipatan($i, $kelipatan_input);
        $teks_kelipatan = $i;
        $kelas_background = 'bg-white';

        if ($adalah_kelipatan) {
            $teks_kelipatan = $i . " (kelipatan dari " . $kelipatan_input . ")";
            $kelas_background = 'bg-green';
        }
        $data_tabel_temp[] = [
            'angka' => $i,
            'teks_kelipatan' => $teks_kelipatan,
            'kelas_background' => $kelas_background
        ];
    }
    $data_tabel = $data_tabel_temp;
}


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Kelipatan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="canvas">
        <div class="form-container">
            <form method="POST" action="">
                <label for="kelipatan">Masukan Kelipatan :</label>
                <input type="number" id="kelipatan" name="kelipatan" value="<?php echo isset($_POST['kelipatan']) ? htmlspecialchars($_POST['kelipatan']) : ''; ?>" step="1">
                <input type="submit" value="Kirim">
            </form>
        </div>

        <?php if ($pesan_error): ?>
            <p class="alert-message"><?php echo htmlspecialchars($pesan_error); ?></p>
        <?php endif; ?>

        <h2>Kelipatan dari <?php echo htmlspecialchars($judul_kelipatan); ?></h2>

        <table>
            <thead>
                <tr>
                    <th>Angka</th>
                    <th>Kelipatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_tabel as $row): ?>
                    <tr>
                        <td class="angka-col"><?php echo $row['angka']; ?></td>
                        <td class="kelipatan-col <?php echo $row['kelas_background']; ?>">
                            <?php echo htmlspecialchars($row['teks_kelipatan']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>