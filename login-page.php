<?php
/**
 * Template Name: Login Page
 *
 * @package Le_Grand_Marche
 */

if (is_user_logged_in()) {
    wp_redirect(home_url('/'));
    exit;
}

$login_errors = lgm_process_login();

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="connexion-container">
            <h1 class="connexion-title">Connexion</h1>

            <?php if (!empty($login_errors)) : ?>
                <div class="form-errors">
                    <?php foreach ($login_errors as $error) : ?>
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span><?php echo esc_html($error); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="form-container">
                <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
                    <?php wp_nonce_field('lgm_login_action', 'lgm_login_nonce'); ?>

                    <div class="form-group">
                        <label for="name">Nom d'utilisateur ou Email</label>
                        <div class="input-container">
                            <input type="text" name="username" id="name" class="form-control" 
                                   placeholder="Entrez votre nom ou email" required
                                   value="<?php echo isset($_POST['username']) ? esc_attr($_POST['username']) : ''; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="password-container">
                            <input type="password" name="password" id="password" class="form-control" 
                                   placeholder="Entrez votre mot de passe" required>
                            <button type="button" class="password-toggle" tabindex="-1">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        <div class="forgot-password">
                            <a href="<?php echo esc_url(wp_lostpassword_url()); ?>">Mot de passe oublié ?</a>
                        </div>
                    </div>

                    <button type="submit" class="connexion-btn">Connectez-vous</button>

                    <button type="button" class="google-btn">
                        <i class="fa-brands fa-google"></i>
                        Connectez-vous avec Google
                    </button>
                </form>

                <div class="signup-prompt">
                    Vous n'avez pas de compte ? <a href="<?php echo esc_url(home_url('/inscription')); ?>">S'inscrire</a>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>