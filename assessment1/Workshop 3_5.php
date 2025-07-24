<?php

class Student {
    public $id;
    public $name;
    public $surname;
    public $score;
    public $grade;

    public function __construct($id, $name, $surname, $score) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->score = $score;
        $this->calculateGrade();
    }

    private function calculateGrade() {
        if ($this->score >= 80) {
            $this->grade = 'A';
        } elseif ($this->score >= 75) {
            $this->grade = 'B+';
        } elseif ($this->score >= 70) {
            $this->grade = 'B';
        } elseif ($this->score >= 65) {
            $this->grade = 'C+';
        } elseif ($this->score >= 60) {
            $this->grade = 'C';
        } elseif ($this->score >= 55) {
            $this->grade = 'D+';
        } elseif ($this->score >= 50) {
            $this->grade = 'D';
        } else {
            $this->grade = 'F';
        }
    }
}

// สร้างข้อมูลนักศึกษา 3 คน
$student1 = new Student('6806021422101', 'nopphagaw', 'thongbai', 80);
$student2 = new Student('6806021422102', 'somsak', 'sukjai', 55); // สมมุติ
$student3 = new Student('6806021422103', 'somying', 'deeja', 66); // สมมุติ

// เก็บข้อมูลใน array (ถ้าต้องการ)
$students = [$student1, $student2, $student3];

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลนักศึกษา</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>รหัสนักศึกษา</th>
                <th>ชื่อ-สกุล</th>
                <th colspan="2">คะแนนที่ได้</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student->id; ?></td>
                <td><?php echo $student->name . ' ' . $student->surname; ?></td>
                <td><?php echo $student->score; ?></td>
                <td><?php echo $student->grade; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>