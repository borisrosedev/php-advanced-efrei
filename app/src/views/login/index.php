<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
    <head>
        <?php include dirname(__DIR__, 1)."/partials/meta-head.php"; ?>
        <title>IT Creator | Login</title>
    </head>
    <body>  
        <?php include dirname(__DIR__, 1). '/partials/header.php' ?>
        <main class="app-main login-main">
         
           <section aria-labelledby="login-title" class="login-main__central-section">
                <h1 id="login-title"><?php echo $title ?></h1>
                <form action="./?url=login/authenticate" method="POST" class="custom-form">
                    <section class="login-form__fields-section">
                        <?php foreach($form_fields as $field): ?>
                            <article class="custom-field" aria-describedby="">
                                <section class="control has-icons-left">
                                    <section class="login-form-field__label-input-section">
                                        <label for="<?= $field["id"]?>"></label>
                                        <input 
                                            class="input"
                                            type="<?= $field["type"]?>"
                                            placeholder="<?= $field["placeholder"]?>"
                                            name="<?= $field["name"]?>"
                                            id="<?= $field["id"] ?>"
                                            pattern="<?= $field["pattern"]?>"
                                            required
                                            aria-required="true"
                                        >
                                    </section>
                                    <span class="icon is-small is-left" aria-label="conteneur de l'icône associée au champ">
                                        <i class="fas <?= $field["icon"]?>"></i>
                                    </span>            
                                </section>
                            </article>
                           
                        <?php endforeach; ?>
                    </section>
                    <section class="login-form__buttons-section">
                        <?php foreach ($form_buttons as $button): ?>
                            <button type="<?= $button["type"] ?>" class="<?= $button["class_names"] ?>" id="<?= $button["id"] ?>"><?= $button["text_content"] ?></button>
                        <?php endforeach; ?>
                    </section>

                </form>
                <aside>
                    <p> Pas encore inscrit(e) ? Cliquez <a href="./?url=register/index">ici</a></p>
                </aside>
           </section>
        </main>  
        <?php include dirname(__DIR__, 1).'/partials/footer.php' ?>  
    </body>
</html>