<?php
$homework = isset($_POST['homework']) ? (int)$_POST['homework'] : 0;
$midterm = isset($_POST['midterm']) ? (int)$_POST['midterm'] : 0;
$final = isset($_POST['final']) ? (int)$_POST['final'] : 0;

$totalScore = $homework + $midterm + $final;
$grade = 'F';

if ($totalScore >= 80) {
    $grade = 'A';
} elseif ($totalScore >= 75) {
    $grade = 'B+';
} elseif ($totalScore >= 70) {
    $grade = 'B';
} elseif ($totalScore >= 65) {
    $grade = 'C+';
} elseif ($totalScore >= 60) {
    $grade = 'C';
} elseif ($totalScore >= 55) {
    $grade = 'D+';
} elseif ($totalScore >= 50) {
    $grade = 'D';
} else {
    $grade = 'F';
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลลัพธ์คะแนน</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .result-container {
            margin: 50px auto;
            width: 300px;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="result-container">
        <h3>ข้อมูลคะแนน</h3>
        <p>Homework : <?php echo htmlspecialchars($homework); ?></p>
        <p>Midterm : <?php echo htmlspecialchars($midterm); ?></p>
        <p>Final : <?php echo htmlspecialchars($final); ?></p>
        <p>Total Score : <?php echo htmlspecialchars($totalScore); ?></p>
        <p>Result Grade : <?php echo htmlspecialchars($grade); ?></p>
    </div>
    <div class="back-link">
        <a href="6706021411288_todo002_form.html">Back</a>
    </div>

</body>
</html>