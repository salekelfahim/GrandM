<?php
/**
 * Template Name: Login Page
 *
 * This template is used to display the login page.
 *
 * @package Le_Grand_Marche
 */

get_header();
?>

<div class="connexion-container">
    <h1 class="connexion-title">Connexion</h1>
    
    <div class="form-container">
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" placeholder="Enter your name">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" class="form-control" placeholder="Enter password">
                    <button type="button" class="password-toggle">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/eye-icon.svg" alt="show password">
                    </button>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            
            <button type="submit" class="connexion-btn">Connectez-vous</button>
            
            <button type="button" class="google-btn">
                <img src="<?php echo get_template_directory_uri(); ?>/img/google-icon.svg" alt="Google Icon">
                Connectez-vous avec Google
            </button>
        </form>
        
        <div class="signup-prompt">
            Vous n'avez pas de compte ? <a href="<?php echo esc_url(home_url('/inscription')); ?>">S'inscrire</a>
        </div>
    </div>
</div>


<?php get_footer(); ?>