<?php
$num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
$num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;
$operator = isset($_POST['operator']) ? $_POST['operator'] : '+';
$result = 0;
$error = false;
$errorMessage = '';

switch ($operator) {
    case '+':
        $result = $num1 + $num2;
        break;
    case '-':
        $result = $num1 - $num2;
        break;
    case '*':
        $result = $num1 * $num2;
        break;
    case '/':
        if ($num2 != 0) {
            $result = $num1 / $num2;
        } else {
            $error = true;
            $errorMessage = "ไม่สามารถหารด้วยศูนย์ได้";
        }
        break;
    case '%':
        if ($num2 != 0) {
            $result = $num1 % $num2;
        } else {
            $error = true;
            $errorMessage = "ไม่สามารถหารด้วยศูนย์ได้ (modulus)";
        }
        break;
    default:
        $error = true;
        $errorMessage = "ตัวดำเนินการไม่ถูกต้อง";
        break;
}

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลลัพธ์การคำนวณ</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .result-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }
        .result-box {
            border: 1px solid #ccc;
            padding: 20px;
            width: 250px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="result-container">
        <div class="result-box">
            <h3>ข้อมูลผู้ใช้ใส่มา</h3>
            <p>Number 1 : <?php echo htmlspecialchars($num1); ?></p>
            <p>Number 2 : <?php echo htmlspecialchars($num2); ?></p>
            <p>Operator : <?php echo htmlspecialchars($operator); ?></p>
            <?php if (!$error): ?>
                <p>Result : <?php echo htmlspecialchars($result); ?></p>
            <?php else: ?>
                <p class="error">Error : <?php echo htmlspecialchars($errorMessage); ?></p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>