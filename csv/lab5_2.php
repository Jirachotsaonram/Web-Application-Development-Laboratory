<?php
read_csv("data.csv");
    function read_csv($filename){
        $file = fopen($filename, "r");
        if($file){
            echo "<table border='1'>";
            while(($line = fgets($file)) !== false){
                //echo $line . "<br>";
                $x = explode(",",$line);
                $sum = (float)$x[2] + (float)$x[3] + (float)$x[4] + (float)$x[5] + (float)$x[6];
                echo "<tr>";
                $total = 0;
                foreach($x as $key => $value){
                    echo "<td>$value</td>";  
                }

                echo "<td>";
                total($sum);
                echo "</td>";

                echo "<td>";
                calgrade($sum);
                echo "</td>";

                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo "ไม่สามารถเปิดไฟล์ได้";
        }
    }

    function calgrade($num){
      if($num >= 80) {
        echo "A";
      }else if($num >=70){
        echo "B";
      }else if($num >=60){
        echo "C";
      }else if($num >=50){
        echo "D";
      }else if($num > 0){
        echo "F";
      }
      if($num == 0){
        echo "Grade";
      }
    }
    function total($sum){
        if($sum != 0){
            echo $sum;
        }else{
            echo "Total";
        }
    }
    ?> 