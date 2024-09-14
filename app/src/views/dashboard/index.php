<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
    <head>
        <?php include dirname(__DIR__, 1)."/partials/meta-head.php"; ?>
        <title>IT Creator | dashboard</title>
    </head>
    <body>  
        <?php include dirname(__DIR__, 1) . "/partials/header.php" ?>
        <main class="app-main dashboard-main">
            <section class="dashboard-main__welcome-section"> 
                <header>
                    <h1>Dashboard</h1> <figure><img src=<?= $_SESSION["url"] ?> alt="image de <?=$_SESSION["email"]?>"></figure>
                </header>   
                <section>
                    <p>Bienvenue sur votre tableau de bord <?= $_SESSION["email"]; ?></p>
                </section>
                <section class="dashboard-main__actions-section" aria-labelledby="dashboard-main-actions-title">
                    <h2 id="dashboard-main-actions-title"> Paramètres </h2>
                    <section>             
                        <button class="button"  id="dashboard-edit-profile-button">Modifier vos informations</button>
                        <button class="button" id="dashboard-delete-profile-button">Supprimer votre compte</button>              
                    </section>
                </section>
            </section>
        </main>  
        <?php include dirname(__DIR__).'/partials/footer.php' ?>  
    </body>
</html>