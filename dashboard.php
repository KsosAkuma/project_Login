<?php
if (!empty($_GET['user'])) {
    $user = $_GET['user'];
} else {
    header('Location:index.php?status=error');
}
echo "{$user} good good tu es connecté <br>";

echo '<a href="./index.php"><button type="button">Déconnection</button></a> ';
