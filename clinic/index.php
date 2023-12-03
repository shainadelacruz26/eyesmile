<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";

    $sql = "SELECT * FROM user 
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <h1>Home</h1>

    <?php if (isset($user)) : ?>
        <p class="p-5 ">Hello <?=htmlspecialchars($user["first_name"])?>, You are logged in.</a></p>
        <p class="p-5 "><a href="logout.php">Log out</a></p>
    <?php else : ?>
        <div class="display-1">Unauthorzied access!</div>
    <?php endif; ?>
</body>

</html>