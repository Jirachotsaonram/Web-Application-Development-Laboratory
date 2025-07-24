<?php
// ต้อง include ไฟล์ที่มี Class ก่อนใช้งาน
include_once '6706021411288_main_class.php'; // เปลี่ยนชื่อไฟล์ตามของคุณ

$multiplier = 0;
$multiplicationTable = [];

if (isset($_POST['number']) && is_numeric($_POST['number'])) {
    $multiplier = (int)$_POST['number'];
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
    <title>ตารางสูตรคูณ (กำหนดแม่) - ใช้ Class</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container {
            width: 400px;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
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
        <h3 style="text-align: center;">สร้างตารางสูตรคูณ</h3>
        <form action="" method="post">
            <label for="number">ป้อนแม่สูตรคูณที่ต้องการ:</label>
            <input type="number" id="number" name="number" value="<?php echo htmlspecialchars($multiplier > 0 ? $multiplier : ''); ?>" required>
            <button type="submit">สร้าง</button>
        </form>

        <?php if (!empty($multiplicationTable)): ?>
            <h3 style="text-align: center;">สูตรคูณแม่ <?php echo htmlspecialchars($multiplier); ?></h3>
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
                            <td><?php echo htmlspecialchars($row['expression']); ?></td>
                            <td><?php echo htmlspecialchars($row['result']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif (isset($_POST['number'])): ?>
            <p style="color: red; text-align: center;">กรุณาป้อนตัวเลขที่ถูกต้องสำหรับแม่สูตรคูณ</p>
        <?php endif; ?>
    </div>

</body>
</html>