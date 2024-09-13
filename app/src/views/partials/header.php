<header class="app-header">
    <a href="./?url=home/index">
        <figure>
            <img src="./images/logo.webp" alt="Logo de IT Creator">
        </figure>
        <span aria-label="Nom de l'application">IT Creator</span>
    </a>
    <nav>
        <ul>
          
            <?php if( isset($_GET["url"]) && $_GET["url"] == "login/index" && isset($_SESSION["id"])): ?>
                <li>
                    <a href="./?url=register/index">Inscription</a>
                </li>
            <?php elseif(isset($_SESSION["id"])): ?>
                <li>
                    <a href="./?url=logout/index">Déconnexion</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="./?url=login/index">Connexion</a>
                </li>
            <?php endif; ?>
            
      
        </ul>
    </nav>
</header>