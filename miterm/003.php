<?php
    require_once '002.php';
    $db = new database('test_db', 'root', '');

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['insert'])) {
            $db->insert([
                "id" => $_POST['id'],
                "name" => $_POST['name']
            ]);
        }elseif (isset($_POST['update'])) {
            $db->update([
                "name" => $_POST['name']
            ], [
                "id" => $_POST['id']
            ]);
        }elseif (isset($_POST['delete'])) {
            $db->delete([
                "id" => $_POST['id']
            ]);
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
</head>
<body>
    <h2>User Form</h2>
    <form action="" method="post">
        <label for="">ID:</label>
        <input type="text" name="id" required><br><br>

        <label for="">Name:</label>
        <input type="text" name="name"><br><br>

        <button type="submit" name="insert">Insert</button>
        <button type="submit" name="update">Update</button>
        <button type="submit" name="delete">Delete</button>
    </form>
    <hr>

    <h2>All Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>