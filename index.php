<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<div class="container" style="display:flex; justify-content:center;">
    <form action="connected.php" method="post" style="display: flex; flex-direction:column; align-items:center; gap:1rem;">
        <input type="email" name="email" placeholder="Entrez votre mail" required>
        <input type="password_hash" name="password" placeholder="Entrez votre mot de passe" required>
        <input type="submit" name="submit" value="Sauvegarder">
    </form>
</div>
<?php
//création du json avec "hashage" du MDP
$users = [
    ['email' => "test@mail.com", 'password' => password_hash("0000", PASSWORD_DEFAULT)],
    ['email' => "test2@mail.com", 'password' => password_hash("1111", PASSWORD_DEFAULT)],
    ['email' => "test3@mail.com", 'password' => password_hash("2222", PASSWORD_DEFAULT)],

];
$json = json_encode($users);
file_put_contents('./user.json', $json);
// on récupère la valeur du paramètre page dans l'url
if (!empty($_GET['status'])) {
    $status = $_GET['status'];
} else {
    $status = 'index.php/';
}
if ($status == "error") {
    echo "<h1>Désolé</h1> <br> <p>Mail ou mot de passe incorrect</p>";
}
