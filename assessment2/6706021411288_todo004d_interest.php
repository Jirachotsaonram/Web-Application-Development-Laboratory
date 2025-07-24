<?php
// ต้อง include ไฟล์ที่มี Class ก่อนใช้งาน
include_once '6706021411288_main_class.php'; // เปลี่ยนชื่อไฟล์ตามของคุณ

$initialDeposit = 0;
$years = 0;
$annualBalances = [];

if (isset($_POST['initial_deposit']) && isset($_POST['years'])) {
    $initialDeposit = (float)$_POST['initial_deposit'];
    $years = (int)$_POST['years'];

    // สร้าง Object จาก Class
    $interestCalculator = new StudentId_InterestCalculator();
    $annualBalances = $interestCalculator->calculateAnnualBalance($initialDeposit, $years);
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำนวณดอกเบี้ยเงินฝาก - ใช้ Class</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container {
            width: 450px;
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
            text-align: right;
        }
        th { background-color: #f2f2f2; text-align: center; }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: inline-block;
            width: 120px;
        }
        .form-group input {
            padding: 5px;
            width: 150px;
        }
        .button-group { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>

    <div class="container">
        <h3 style="text-align: center;">คำนวณดอกเบี้ยเงินฝาก</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="initial_deposit">ยอดเงินฝากเริ่มต้น:</label>
                <input type="number" id="initial_deposit" name="initial_deposit" step="0.01" min="0" value="<?php echo htmlspecialchars($initialDeposit > 0 ? $initialDeposit : ''); ?>" required> บาท
            </div>
            <div class="form-group">
                <label for="years">ระยะเวลาฝาก (ปี):</label>
                <input type="number" id="years" name="years" min="1" value="<?php echo htmlspecialchars($years > 0 ? $years : ''); ?>" required> ปี
            </div>
            <div class="button-group">
                <button type="submit">คำนวณ</button>
            </div>
        </form>

        <?php if (!empty($annualBalances)): ?>
            <h3 style="text-align: center;">ยอดเงินสะสมรายปี (ดอกเบี้ย 1.5% ต่อปี)</h3>
            <table>
                <thead>
                    <tr>
                        <th>ปีที่</th>
                        <th>ยอดเงินสะสม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($annualBalances as $data): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($data['year']); ?></td>
                            <td><?php echo number_format($data['balance'], 2); ?> บาท</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif (isset($_POST['initial_deposit']) || isset($_POST['years'])): ?>
            <p style="color: red; text-align: center;">กรุณาป้อนข้อมูลให้ถูกต้องและครบถ้วน</p>
        <?php endif; ?>
    </div>

</body>
</html>