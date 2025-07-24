<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Submission Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align to the top */
            min-height: 90vh; /* Make sure it takes up most of the viewport height */
        }
        .result-container {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%; /* Ensure it takes full width up to max-width */
            box-sizing: border-box; /* Include padding in the width */
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #e9e9e9; /* Make it look like read-only */
        }
    </style>
</head>
<body>

    <div class="result-container">
        <h1>Form Data Submitted</h1>
        <?php
        // ตรวจสอบว่ามีการส่งข้อมูลแบบ POST มาหรือไม่
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // ฟังก์ชันสำหรับ sanitize input เพื่อป้องกัน XSS
            function sanitize_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            // รับข้อมูลจากแต่ละฟิลด์
            $text_input = isset($_POST['text']) ? sanitize_input($_POST['text']) : '';
            $password1 = isset($_POST['password1']) ? $_POST['password1'] : ''; // ไม่ sanitize เพราะเราจะไม่แสดงตรงๆ
            $password2 = isset($_POST['password2']) ? $_POST['password2'] : ''; // ไม่ sanitize เพราะเราจะไม่แสดงตรงๆ
            $textarea_input = isset($_POST['textarea']) ? sanitize_input($_POST['textarea']) : '';
            $select_value = isset($_POST['select']) ? sanitize_input($_POST['select']) : '';
            $radio_value = isset($_POST['rAndl']) ? sanitize_input($_POST['rAndl']) : '';
            $phone_number = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';
            $email_address = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
            $time_value = isset($_POST['time']) ? sanitize_input($_POST['time']) : '';

            // ตรวจสอบ Password required
            $password_match_status = "Not checked";
            if (!empty($password1) && !empty($password2)) {
                if ($password1 === $password2) {
                    $password_match_status = "Passwords match";
                } else {
                    $password_match_status = "Passwords do NOT match";
                }
            } else {
                $password_match_status = "One or both passwords are empty (required field)";
            }

            ?>
            <div class="form-group">
                <label for="display_text">Text Input:</label>
                <input type="text" id="display_text" value="<?php echo $text_input; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="display_password_status">Password Status (Password1 vs Password2):</label>
                <input type="text" id="display_password_status" value="<?php echo $password_match_status; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="display_textarea">Textarea Content:</label>
                <textarea id="display_textarea" rows="5" readonly><?php echo $textarea_input; ?></textarea>
            </div>

            <div class="form-group">
                <label for="display_select">Selected Value (Select):</label>
                <input type="text" id="display_select" value="<?php echo $select_value; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="display_radio">Selected Value (Radio and Legend):</label>
                <input type="text" id="display_radio" value="<?php echo $radio_value; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="display_phone">Phone Number:</label>
                <input type="text" id="display_phone" value="<?php echo $phone_number; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="display_email">University Email:</label>
                <input type="text" id="display_email" value="<?php echo $email_address; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="display_time">Time:</label>
                <input type="text" id="display_time" value="<?php echo $time_value; ?>" readonly>
            </div>

        <?php
        } else {
            // หากไม่มีข้อมูล POST ให้แสดงข้อความและลิงก์กลับไปหน้าฟอร์ม
            echo "<p>No data submitted. Please <a href='assessment2.html'>go back to the form</a> to submit data.</p>";
        }
        ?>
    </div>

</body>
</html>