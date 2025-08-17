<?php
    $table = "user";
    $array = array(
        "id" => "001",
        "name" => "john smith"
    );

    print_r($array);
    echo "<br>";
    print_r(array_keys($array));
    echo "<br>";
    print_r(array_values($array));
    echo "<br>";

    $cols = implode(", ",array_keys($array));
    $data = implode(", ",array_values($array));
    echo "$cols<br>";
    echo "$data<br>";

    $sql = "INSERT INTO $table ($cols) VALUES ($data)";
    echo "$sql<br>";
?>