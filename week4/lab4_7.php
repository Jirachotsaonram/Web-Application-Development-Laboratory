<?php
    $maxRow = 10; $maxCol = 3;
    // กำหนดช่วงคะแนนแต่ละช่อง
    $ranges = [
        [0, 30],   // Homework
        [0, 35],   // Midterm
        [0, 35]    // Final
    ];

    // ฟังก์ชันคำนวณเกรด
    function getGrade($score) {
        if ($score >= 80 && $score <= 100) return "A";
        else if ($score >= 75 && $score < 80) return "B+";
        else if ($score >= 70 && $score < 75) return "B";
        else if ($score >= 65 && $score < 70) return "C+";
        else if ($score >= 60 && $score < 65) return "C";
        else if ($score >= 55 && $score < 60) return "D+";
        else if ($score >= 50 && $score < 55) return "D";
        else return "F";
    }

    for($r = 0; $r < $maxRow; $r++) {
        for($c = 0; $c < $maxCol; $c++) {
            $table[$r][$c] = rand($ranges[$c][0], $ranges[$c][1]);
        }
    }
?>

<table border='1' align='center' width='100%'>
    <tr>
        <td width='80' align='center'>Homework (30)</td>
        <td width='80' align='center'>Midterm (35)</td>
        <td width='80' align='center'>Final (35)</td>
        <td width='80' align='center'>Total</td>
        <td width='80' align='center'>Grade</td>
    </tr>
    <?php for($r = 0; $r < $maxRow; $r++){
        $total = array_sum($table[$r]);
        $grade = getGrade($total);
        echo "<tr>";
        for($c = 0; $c < $maxCol; $c++){
            echo "<td align='center'>".$table[$r][$c]."</td>";
        }
        echo "<td align='center'>$total</td>";
        echo "<td align='center'>$grade</td>";
        echo "</tr>";
    }
    ?> 
</table>