<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
    <head>
        <?php include dirname(__DIR__, 1)."/partials/meta-head.php"; ?>
        <title>IT Creator | Home</title>
    </head>
    <body>  
        <header class="app-header">
            <a href="/app/public?url=home/index">
                <figure>
                    <img src="/app/public/images/logo.webp" alt="Logo de IT Creator">
                </figure>
                <span aria-label="Nom de l'application">IT Creator</span>
            </a>
            <nav>
                <ul>
                    <li>
                        <a href="#">Connexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="app-main home-main">
            <section class="home-main__section home-main__introduction-section">
              <h2>IT Creator</h2>
              <section>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae tempora sit dolorum iusto, sequi odio vel ab quos dignissimos, consequuntur sed nisi dolorem assumenda in rerum laudantium consequatur obcaecati omnis?</p>
                <section>
                    <button class="button">Démarrer</button>
                </section>
              </section>
            </section>

            <section class="home-main__section home-main__functionalities-section">
              <h2>Nos Fonctionalités</h2>
                <section>
                    <section>
                        <figure>
                            <img src="/app/public/images/network.webp" alt="">
                        </figure>
                    </section>
                    <section>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi, est nemo temporibus aspernatur fugit deserunt molestiae nisi error maxime delectus tempore explicabo velit, dolor voluptate pariatur aliquid obcaecati quo laborum?
                        </p>
                        <section>
                            <button class="button">Explorer</button>
                        </section>
                    </section>
                </section>
            </section>
            <section class="home-main__section home-main__partners-section">
              <h2>Ils nous ont fait confiance</h2>
              <ul>
                <li>
                    <figure>
                        <img src="https://www.aerocontact.com/actualite-aeronautique-spatiale/images/AERO20210415110010.gif" alt="Image de Dassault Aviation">
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="https://www.objetconnecte.com/wp-content/uploads/2021/01/Sopra-Steria-Logo.jpg" alt="Image de Sopra Steria">
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="https://collecter.apprentis-auteuil.org/cdn.iraiser.eu/YIbzhGkk9bX+EtoEinZHNhT8yHPg+ZyDbTkS0OGVfD4w3skiD2FTpVrBrqesA7Ua/Laetitia_Merciris/thumbnail/Logo-Efrei-2017-verticalwhite.png" alt="Image de EFREI">
                    </figure>
                </li>
              </ul>
            </section>
        </main>  
        <?php include dirname(__DIR__).'/partials/footer.php' ?>  
    </body>
</html>