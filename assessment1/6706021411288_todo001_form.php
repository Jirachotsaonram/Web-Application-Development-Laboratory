<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ทดสอบการใช้ Arithmetic Operator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container {
            width: 400px;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 8px; }
        input[type="text"] { width: 100px; padding: 5px; }
        .button-group { text-align: center; margin-top: 20px; }
        .button-group button { padding: 8px 15px; margin: 0 5px; }
    </style>
</head>
<body>

    <div class="container">
        <h3 style="text-align: center;">ทดสอบการใช้ Arithmetic Operator</h3>
        <form action="6706021411288_todo001_exec.php" method="post">
            <table>
                <tr>
                    <td>Enter Number 1 :</td>
                    <td><input type="text" name="num1" ></td>
                </tr>
                <tr>
                    <td>Enter Number 2 :</td>
                    <td><input type="text" name="num2" ></td>
                </tr>
                <tr>
                    <td>Operator :</td>
                    <td>
                        <input type="radio" name="operator" value="+" checked> + <br>
                        <input type="radio" name="operator" value="-"> - <br>
                        <input type="radio" name="operator" value="*"> * <br>
                        <input type="radio" name="operator" value="/"> / <br>
                        <input type="radio" name="operator" value="%"> %
                    </td>
                </tr>
            </table>
            <div class="button-group">
                <button type="submit">OK</button>
                <button type="reset">Clear</button>
            </div>
        </form>
    </div>

</body>
</html>