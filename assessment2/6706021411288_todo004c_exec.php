<?php
// ต้อง include ไฟล์ที่มี Class ก่อนใช้งาน
include_once '6706021411288_main_class.php'; // เปลี่ยนชื่อไฟล์ตามของคุณ

$employeeHours = isset($_POST['hours']) ? $_POST['hours'] : [];
$results = [];

if (!empty($employeeHours)) {
    // สร้าง Object จาก Class
    $wageCalculator = new StudentId_EmployeeWageCalculator();
    foreach ($employeeHours as $index => $hours) {
        $hours = (int)$hours;
        $calcResult = $wageCalculator->calculateWage($hours);
        $results[] = [
            'employee' => $index + 1,
            'hours' => $hours,
            'wage' => $calcResult['wage'],
            'warning' => $calcResult['warning']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลลัพธ์ค่าจ้างพนักงาน - ใช้ Class</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container {
            width: 500px;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th { background-color: #f2f2f2; }
        .warning {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3 style="text-align: center;">สรุปค่าจ้างพนักงาน</h3>
        <?php if (!empty($results)): ?>
            <table>
                <thead>
                    <tr>
                        <th>พนักงาน</th>
                        <th>ชั่วโมงทำงาน</th>
                        <th>ค่าจ้าง</th>
                        <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $res): ?>
                        <tr>
                            <td>พนักงานที่ <?php echo htmlspecialchars($res['employee']); ?></td>
                            <td><?php echo htmlspecialchars($res['hours']); ?> ชั่วโมง</td>
                            <td><?php echo number_format($res['wage'], 2); ?> บาท</td>
                            <td>
                                <?php if ($res['warning']): ?>
                                    <span class="warning">แจ้งฝ่ายบุคคลให้เรียกพนักงานมาสอบสวน</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align: center;">ไม่มีข้อมูลชั่วโมงทำงาน</p>
        <?php endif; ?>
        <p style="text-align: center; margin-top: 20px;"><a href="6706021411288_todo004c_form.html">กลับไปหน้าฟอร์ม</a></p>
    </div>

</body>
</html>