<?php
// เรียกใช้ฟังก์ชันหลักเพื่อเริ่มการทำงาน
read_csv("data.csv");

function read_csv($filename){
    $file = fopen($filename, "r");
    if($file){
        echo "<table border='1' cellpadding='5'>";
        
        // ตัวแปรสำหรับเช็คว่าเป็นบรรทัดแรกหรือไม่
        $is_header = true;
        
        while(($line = fgetcsv($file)) !== false){
            $sum = 0;
            
            // ถ้าเป็นบรรทัดแรก (header) ให้ใช้ <th>
            echo "<tr>";
            if($is_header){
                foreach($line as $value){
                    echo "<th>" . htmlspecialchars($value) . "</th>";
                }
                echo "<th>Total</th>";
                echo "<th>Grade</th>";
                $is_header = false; // เปลี่ยนค่าเพื่อไม่ให้เข้าเงื่อนไขนี้อีก
            } else {
                // ถ้าเป็นบรรทัดข้อมูล
                foreach($line as $key => $value){
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                    // คำนวณคะแนนเฉพาะคอลัมน์ที่ 3 (index 2) เป็นต้นไป
                    if($key >= 2){
                        $sum += (float)$value;
                    }
                }
                echo "<td>" . total($sum) . "</td>";
                echo "<td>" . calgrade($sum) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        fclose($file); // ปิดไฟล์เมื่อใช้งานเสร็จ
    }else{
        echo "ไม่สามารถเปิดไฟล์ได้";
    }
}

function calgrade($num){
  if($num >= 80) {
    return "A";
  }else if($num >= 70){
    return "B";
  }else if($num >= 60){
    return "C";
  }else if($num >= 50){
    return "D";
  }else {
    return "F";
  }
}

function total($sum){
    if($sum > 0){
        return $sum;
    }
    return "Total";
}
?>