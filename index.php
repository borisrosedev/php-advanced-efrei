<?php 

    $message = "Salut les amis";
    $email = $_POST["email"]; 
    $password = $_POST["password"];
?>

<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
    <head></head>
    <body>

        <?php if($message !== null) { ?>
            <h1><?= $message ?></h1>
        <?php } ?>

        <form action="" method="POST">
                <input name="email" placeholder="Entrez votre email">
                <input name="password" placeholder="Entrez votre mot de passe">
            <button> Valider </button>
        </form>
 
    </body>
</html>