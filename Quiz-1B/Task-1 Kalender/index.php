<?php
setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'Indonesian_Indonesia.1252', 'Indonesian');

// Fungsi untuk mendapatkan nama bulan dalam bahasa Indonesia
function getNamaBulanIndonesia($monthNumber) {
    $dateObj = DateTime::createFromFormat('!m', $monthNumber);
    if ($dateObj === false) {
        return strftime('%B', mktime(0, 0, 0, $monthNumber, 1));
    }
    return strftime('%B', $dateObj->getTimestamp());
}

$demoMode = !isset($_GET['month']) && !isset($_GET['year']); 

if ($demoMode) {
    $_GET['month'] = 2;  
    $_GET['year'] = 2025; 
    $today = 15; 
    $currentMonthToday = 2;
    $currentYearToday = 2025;
    $currentDayRequest = true; 
} else {
    $today = date('j');
    $currentMonthToday = date('m');
    $currentYearToday = date('Y');
    $currentDayRequest = isset($_GET['month']) && isset($_GET['year']) ? false : true;
    if (!isset($_GET['month']) && !isset($_GET['year'])) { 
        $currentDayRequest = true;
    }
}

// Mendapatkan bulan dan tahun dari query string, atau default ke bulan dan tahun saat ini
$month = isset($_GET['month']) ? (int)$_GET['month'] : date('m');
$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');


// Validasi bulan dan tahun
if ($month < 1) {
    $month = 12;
    $year--;
} elseif ($month > 12) {
    $month = 1;
    $year++;
}


$firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
$numberDays = date('t', $firstDayOfMonth);
$dateComponents = getdate($firstDayOfMonth);
$dayOfWeek = $dateComponents['wday']; 

// Menghitung bulan dan tahun sebelumnya
$prevMonth = $month - 1;
$prevYear = $year;
if ($prevMonth == 0) {
    $prevMonth = 12;
    $prevYear--;
}

// Menghitung bulan dan tahun berikutnya
$nextMonth = $month + 1;
$nextYear = $year;
if ($nextMonth == 13) {
    $nextMonth = 1;
    $nextYear++;
}

// Nama-nama hari (Minggu, Senin, Selasa, Rabu, Kamis, Jumat, Sabtu)
$namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz-2 Kalender</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="calendar-wrapper"> 
        <div class="calendar-container">
            <div class="navigation">
                <a href="?month=<?php echo $prevMonth; ?>&year=<?php echo $prevYear; ?>">&lt;&lt; Bulan Sebelumnya</a>
                <span class="month-year"><?php echo getNamaBulanIndonesia($month) . ' ' . $year; ?></span>
                <a href="?month=<?php echo $nextMonth; ?>&year=<?php echo $nextYear; ?>">&gt;&gt; Bulan Berikutnya</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <?php foreach ($namaHari as $hari): ?>
                            <th><?php echo $hari; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        for ($i = 0; $i < $dayOfWeek; $i++) {
                            echo "<td class='empty-day'></td>";
                        }

                        $currentCalDay = 1; 
                        while ($currentCalDay <= $numberDays) {
                            if ($dayOfWeek == 7) {
                                $dayOfWeek = 0;
                                echo "</tr><tr>";
                            }

                            $class = '';

                            if (($demoMode && $currentCalDay == 15 && $month == 2 && $year == 2025) ||
                                (!$demoMode && $currentDayRequest && $currentCalDay == $today && $month == $currentMonthToday && $year == $currentYearToday)) {
                                $class = 'today'; 
                            } elseif ($currentCalDay == $today) { 
                                $class = 'current-day-highlight';
                            }


                            echo "<td class='$class'>$currentCalDay</td>";

                            $currentCalDay++;
                            $dayOfWeek++;
                        }

                        if ($dayOfWeek != 7 && $dayOfWeek > 0) { 
                            $remainingDays = 7 - $dayOfWeek;
                            for ($i = 0; $i < $remainingDays; $i++) {
                                echo "<td class='empty-day'></td>";
                            }
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>