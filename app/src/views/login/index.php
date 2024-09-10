<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
    <head>
        <?php include dirname(__DIR__, 1)."/partials/meta-head.php"; ?>
        <title>IT Creator | Login</title>
    </head>
    <body>  
        <header class="app-header">
            <a href="/app/public?url=home/index">
                <figure>
                    <img src="/app/public/images/logo.webp" alt="Logo de IT Creator">
                </figure>
            </a>
            <nav>
                <ul>
                    <li>
                        <a href=<?= $register_href ?>>Inscription</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="app-main contact-main">
         
           <section aria-labelledby="login-title">
                <h2 id="login-title"><?php echo $title ?></h2>
                <form action="">
                    <section class="login-form__fields-section">
                        <?php foreach($form_fields as $field): ?>
                            <article>
                                <section>
                                    <label for="<?= $field["id"]?>"></label>
                                    <input 
                                        type="<?= $field["type"]?>"
                                        placeholder="<?= $field["placeholder"]?>"
                                        name="<?= $field["name"]?>"
                                        id="<?= $field["id"] ?>"
                                        pattern="<?= $field["pattern"]?>"
                                        required
                                        aria-required="true"
                                    >
                                </section>
                            </article>
                           
                        <?php endforeach; ?>
                    </section>
                    <section class="login-form__fields-section">

                    </section>

                </form>
           </section>
        </main>  
        <?php include dirname(__DIR__, 1).'/partials/footer.php' ?>  
    </body>
</html>