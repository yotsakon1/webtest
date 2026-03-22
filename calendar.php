<?php
// 1. เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "academic_system");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// 2. ตั้งค่าเดือนและปี (ในที่นี้กำหนดเป็น มีนาคม 2026 ตามรูป)
$month = 3;
$year = 2026;
$first_day = date('N', strtotime("$year-$month-01")); // หาว่าวันที่ 1 ตรงกับวันอะไร (1=จันทร์, 7=อาทิตย์)
$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// 3. ดึงข้อมูลกิจกรรมจาก DB
$sql = "SELECT * FROM academic_events WHERE MONTH(start_date) = $month AND YEAR(start_date) = $year";
$result = $conn->query($sql);
$events = [];
while($row = $result->fetch_assoc()) {
    $events[] = $row;
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <style>
        .calendar-table { width: 100%; border-collapse: collapse; font-family: sans-serif; }
        .calendar-table th, .calendar-table td { border: 1px solid #ddd; width: 14%; height: 80px; vertical-align: top; padding: 5px; }
        .calendar-header { background-color: #fff; display: flex; justify-content: space-between; align-items: center; }
        .event-bar { font-size: 12px; color: white; padding: 2px 5px; margin-bottom: 2px; border-radius: 2px; }
        .gold { background-color: #B8860B; }
        .brown { background-color: #8B4513; }
        .orange { background-color: #D2691E; }
    </style>
</head>
<body>

<div class="calendar-header">
    <h2>มีนาคม 2569</h2>
</div>

<table class="calendar-table">
    <thead>
        <tr>
            <th>จ.</th> <th>อ.</th> <th>พ.</th> <th>พฤ.</th> <th>ศ.</th> <th>ส.</th> <th>อา.</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            // สร้างช่องว่างก่อนถึงวันที่ 1
            for ($i = 1; $i < $first_day; $i++) { echo "<td></td>"; }

            // เริ่มรันวันที่
            for ($day = 1; $day <= $days_in_month; $day++) {
                $current_date = sprintf('%04d-%02d-%02d', $year, $month, $day);
                
                echo "<td>";
                echo "<strong>$day</strong>";

                // ตรวจสอบว่าวันนี้มีกิจกรรมไหม
                foreach ($events as $event) {
                    if ($current_date >= $event['start_date'] && $current_date <= $event['end_date']) {
                        echo "<div class='event-bar {$event['color_type']}'>{$event['event_title']}</div>";
                    }
                }
                
                echo "</td>";

                // ถ้าครบ 7 วัน (วันอาทิตย์) ให้ขึ้นบรรทัดใหม่
                if (($day + $first_day - 1) % 7 == 0) { echo "</tr><tr>"; }
            }
            ?>
        </tr>
    </tbody>
</table>

</body>
</html>