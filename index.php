<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<div class="container">
    <form action="connected.php" method="post">
        <input type="email" name="email" placeholder="Entrez votre mail" required>
        <input type="password_hash" name="password" placeholder="Entrez votre mot de passe" required>
        <input type="submit" name="submit" value="Sauvegarder">
    </form>
</div>
<?php

// on récupère la valeur du paramètre page dans l'url
if (!empty($_GET['status'])) {
    $status = $_GET['status'];
} else {
    $status = 'index.php/';
}
if ($status == "error") {
    echo "<h1>Désolé</h1> <br> <p>Mail ou mot de passe incorrect</p>";
}
