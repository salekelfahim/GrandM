<?php
/**
 * Template Name: Sign Up Page
 *
 * @package Le_Grand_Marche
 */

if (is_user_logged_in()) {
    wp_redirect(home_url('/'));
    exit;
}

$register_errors = lgm_process_registration();

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="connexion-container">
            <h1 class="connexion-title">S'inscrire</h1>

            <?php if (!empty($register_errors)) : ?>
                <div class="form-errors">
                    <?php foreach ($register_errors as $error) : ?>
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span><?php echo esc_html($error); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="form-container">
                <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
                    <?php wp_nonce_field('lgm_register_action', 'lgm_register_nonce'); ?>

                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <div class="input-container">
                            <input type="text" name="username" id="username" class="form-control" 
                                   placeholder="Entrez un nom d'utilisateur" required
                                   value="<?php echo isset($_POST['username']) ? esc_attr($_POST['username']) : ''; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-container">
                            <input type="email" name="email" id="email" class="form-control" 
                                   placeholder="Entrez votre email" required
                                   value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="password-container">
                            <input type="password" name="password" id="password" class="form-control" 
                                   placeholder="Mot de passe" required>
                            <button type="button" class="password-toggle" tabindex="-1">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirmer mot de passe</label>
                        <div class="password-container">
                            <input type="password" name="confirm_password" id="confirm-password" class="form-control" 
                                   placeholder="Confirmez le mot de passe" required>
                            <button type="button" class="password-toggle" tabindex="-1">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="connexion-btn">Créer un compte</button>
                </form>

                <div class="signup-prompt">
                    Vous avez déjà un compte ? <a href="<?php echo esc_url(home_url('/connexion')); ?>">Se connecter</a>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>