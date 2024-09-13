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
                <h1>Dashboard</h1>
                <article>
                    <p>Bienvenue sur votre tableau de bord <?= $_SESSION["email"]; ?></p>
                </article>
            </section>
        </main>  
        <?php include dirname(__DIR__).'/partials/footer.php' ?>  
    </body>
</html>