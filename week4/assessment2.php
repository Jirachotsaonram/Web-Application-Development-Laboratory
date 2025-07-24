<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["text"] ?? '';
    $password1 = $_POST["password1"] ?? '';
    $password2 = $_POST["password2"] ?? '';
    $textarea = $_POST["textarea"] ?? '';
    $select = $_POST["select"] ?? '';
    $rAndl = $_POST["rAndl"] ?? '';
    $phone = $_POST["phone"] ?? '';
    $email = $_POST["email"] ?? '';
    $time = $_POST["time"] ?? '';

    // ตรวจสอบรหัสผ่าน
    $passwordMatch = ($password1 === $password2);

    echo "<h2>ผลการส่งข้อมูล</h2>";
    echo "Text: " . htmlspecialchars($text) . "<br>";
    echo "Password: " . htmlspecialchars($password1) . "<br>";
    echo "Required Password: " . htmlspecialchars($password2) . "<br>";
    echo "Password Match: " . ($passwordMatch ? "ตรงกัน" : "ไม่ตรงกัน") . "<br>";
    echo "Textarea: " . nl2br(htmlspecialchars($textarea)) . "<br>";
    echo "Select: " . htmlspecialchars($select) . "<br>";
    echo "Radio/Legend: " . htmlspecialchars($rAndl) . "<br>";
    echo "Phone: " . htmlspecialchars($phone) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Time: " . htmlspecialchars($time) . "<br>";
} else {
    echo "กรุณาส่งข้อมูลผ่านฟอร์ม";
}
?>