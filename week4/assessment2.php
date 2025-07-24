<?php
// ฟังก์ชันสำหรับเก็บค่าเดิม
function getValue($name) {
    return isset($_POST[$name]) ? htmlspecialchars($_POST[$name]) : '';
}
function isSelected($name, $value) {
    return (isset($_POST[$name]) && $_POST[$name] == $value) ? 'selected' : '';
}
function isChecked($name, $value) {
    return (isset($_POST[$name]) && $_POST[$name] == $value) ? 'checked' : '';
}

$textareaValue = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // textarea และ radio ให้แสดงใน textarea
    $textareaValue = '';
    if (!empty($_POST["textarea"])) {
        $textareaValue .= $_POST["textarea"];
    }
    if (!empty($_POST["rAndl"])) {
        $textareaValue .= (empty($textareaValue) ? '' : "\n") . $_POST["rAndl"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>
<body>
    <form action="assessment2.php" method="post">
        Text:
        <input type="text" name="text" value="<?php echo getValue('text'); ?>" /><br />
        Password:
        <input type="password" name="password1" required value="<?php echo getValue('password1'); ?>" /><br />
        Required Password:
        <input type="password" name="password2" required value="<?php echo getValue('password2'); ?>" /><br />
        Textarea:
        <textarea name="textarea"><?php echo $textareaValue; ?></textarea><br />

        <br /><br /><br />
        Select:
        <select name="select" style="width: 150px">
            <option value="red" <?php echo isSelected('select', 'red'); ?>>Red</option>
            <option value="bule" <?php echo isSelected('select', 'bule'); ?>>Bule</option>
            <option value="green" <?php echo isSelected('select', 'green'); ?>>Green</option>
        </select>
        <fieldset style="width: 150px">
            <legend>Redio and Legend</legend>
            Radio:
            <input type="radio" name="rAndl" value="radio" <?php echo isChecked('rAndl', 'radio'); ?> /><br />
            Legend:
            <input type="radio" name="rAndl" value="legend" <?php echo isChecked('rAndl', 'legend'); ?> /><br />
        </fieldset>

        <br /><br /><br />
        <div>
            <label for="phone">Phone Number (Format: (xxx)xxx-xxxx):</label>
            <input type="tel" id="phone" name="phone" pattern="\(\d{3}\)\d{3}-\d{4}" placeholder="(098)893-9662"
                required value="<?php echo getValue('phone'); ?>" />
            <small>Example: (098)893-9662</small>
        </div>

        <div>
            <label for="email">University Email:</label>
            <input type="email" id="email" name="email"
                pattern="^[a-zA-Z0-9._%+-]+@(email\.kmutnb\.ac\.th|itm\.kmutnb\.ac\.th)$"
                placeholder="sXXXXXX@email.kmutnb.ac.th or your.name@itm.kmutnb.ac.th" size="80" required
                value="<?php echo getValue('email'); ?>" />
        </div>

        Time:
        <input type="time" name="time" value="<?php echo getValue('time'); ?>" />

        
    </form>
</body>
</html>