<?php
// ต้อง include ไฟล์ที่มี Class ก่อนใช้งาน
include_once '6706021411288_main_class.php'; // เปลี่ยนชื่อไฟล์ตามของคุณ

$multiplier = 0;
$multiplicationTable = [];

if (isset($_POST['generate'])) {
    $multiplier = rand(999999, 9999999);
    // สร้าง Object จาก Class
    $tableGenerator = new StudentId_MultiplicationTable();
    $multiplicationTable = $tableGenerator->generateTable($multiplier);
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตารางสูตรคูณ (สุ่มแม่) - ใช้ Class</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container {
            width: 400px;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <div class="container">
        <h3>สร้างตารางสูตรคูณจากเลขสุ่ม</h3>
        <form action="" method="post">
            <button type="submit" name="generate">สุ่มแม่สูตรคูณและสร้างตาราง</button>
        </form>

        <?php if (!empty($multiplicationTable)): ?>
            <h3 style="text-align: center;">สูตรคูณแม่ <?php echo number_format($multiplier); ?></h3>
            <table>
                <thead>
                    <tr>
                        <th>การคูณ</th>
                        <th>ผลลัพธ์</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($multiplicationTable as $row): ?>
                        <tr>
                          <td><?php echo number_format($multiplier); ?> x <?php echo htmlspecialchars($row['expression'] == '' ? '' : str_replace($multiplier . ' x ', '', $row['expression'])); ?></td>
                            <td><?php echo number_format($row['result']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>กดปุ่มด้านบนเพื่อสุ่มแม่สูตรคูณ</p>
        <?php endif; ?>
    </div>

</body>
</html>