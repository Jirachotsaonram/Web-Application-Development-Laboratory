<?php
    require_once "class.database.php";
    $db = new database('jirachot', "HhlWIvksREsK1An@");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['create'])) {
            $db->insert([
                "id" => $_POST['id'],
                "name" => $_POST['name'],
                "password" => $_POST['password']
            ]);
        } elseif (isset($_POST['update'])){
        $db->update(
            ["name" => $_POST['name'],
            "password" => $_POST['password']],
            ["id" => $_POST['id']]
        );
        } elseif (isset($_POST['delete'])) {
            $db->delete(["id" => $_POST['id']]);
        }
    }

    $users = $db->select();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>User Form</h2>
    <form action="" method="post">
        <label for="">ID:</label>
        <input type="text" name="id" required><br><br>

        <label for="">Name:</label>
        <input type="text" name="name"><br><br>

        <label for="">Password:</label>
        <input type="text" name="password"><br><br>

        <button type="submit" name="create">create</button>
        <button type="submit" name="update">update</button>
        <button type="submit" name="delete">delete</button>
    </form>

    <h2>User List</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
            <th>date</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['password']); ?></td>
            <td><?php echo htmlspecialchars($user['date']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
