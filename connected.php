<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $post = [
            'email' => strtolower(trim($_POST['email'])),
            'password' => trim($_POST['password']),
        ];
        // on récupère le contenu de la bdd (le contenu du fichier db.json dans notre cas)
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
