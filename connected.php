<?php
//création du json avec "hashage" du MDP
$users = [
    ['email' => "test@mail.com", 'password' => password_hash("0000", PASSWORD_DEFAULT)],
    ['email' => "test2@mail.com", 'password' => password_hash("1111", PASSWORD_DEFAULT)],
    ['email' => "test3@mail.com", 'password' => password_hash("2222", PASSWORD_DEFAULT)],

];
$json = json_encode($users);
file_put_contents('./user.json', $json);
if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $post = [
            'email' => strtolower(trim($_POST['email'])),
            'password' => trim($_POST['password']),
        ];
        // on récupère le contenu de la bdd (le contenu du fichier user.json dans notre cas)
        $fileContent = file_get_contents('user.json');
        // on transforme le contenu json en tableau associatif
        $json = json_decode($fileContent, true);
        //parcour JSON dictionnaire et compare
        foreach ($json as $user) {
            if ($user['email'] == $post['email'] && password_verify($post['password'], $user['password'])) {
                header("Location:dashboard.php?user={$user['email']}");
                return;
            }
            header('Location:index.php?status=error');
        }
    } else {
        header('Location:index.php?status=error');
    }
} else {
    header('Location:index.php?status=error');
}
