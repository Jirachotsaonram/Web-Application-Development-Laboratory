<?php
    require_once '002.php';

    //Create DB object
    $db = new database('test_db', 'root', '');
    $editMode = false;
    $editUser = ['id' => '','name' => ''];

    //Handle form submissions
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['insert'])) {
            $db->insert([
                "id" => $_POST['id'],
                "name" => $_POST['name']
            ]);
            header("Location: 004.php");
        } elseif (isset($_POST['update'])) {
            $db->update([
                "name" => $_POST['name']
            ], [
                "id" => $_POST['id']
            ]);
            header("Location: 004.php");
        } elseif (isset($_POST['delete'])) {
            $db->delete([
                "id" => $_POST['id']
            ]);
            header("Location: 004.php");
        }
    }

    //Handle edit link
    if(isset($_GET['edit'])) {
        $userId = $_GET['edit'];
        $result = $db->select(['id' => $userId]);
        if(!empty($result)) {
            $editMode = true;
            $editUser = $result[0]; // Assuming select returns an array of users
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
    <h2><?=$editMode ? "Edit User" : "Add User" ?></h2>
    <form action="004.php" method="POST">
        <input type="hidden" name="id" value="<?=$editUser['id']?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?=$editUser['name']?>">
        <button type="submit" name="<?=$editMode ? "update" : "insert"?>"><?=$editMode ? "Update" : "Add"?></button>
    </form>
    <h2>Users</h2>
    <ul>
        <?php foreach($users as $user): ?>
            <li>
                <?=$user['name']?>
                <a href="004.php?edit=<?=$user['id']?>">Edit</a>
                <form action="004.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?=$user['id']?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>