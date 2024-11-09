<?php
include ('../../config/config.php');

include ('../templates/database.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM coffee WHERE id=" . $id;
    $result = mysqli_query($connection, $sql);

    mysqli_close($connection);

    header('Location: coffee-admin.php');
