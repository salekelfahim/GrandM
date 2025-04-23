<?php
/**
 * Template Name: Sign Up Page
 *
 * This is the template for displaying the registration page.
 *
 * @package Le_Grand_Marche
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="connexion-container">
            <h1 class="connexion-title">S'inscrire</h1>
            
            <div class="form-container">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <div class="input-container">
                            <input type="text" id="name" class="form-control" placeholder="Enter user name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-container">
                            <input type="email" id="email" class="form-control" placeholder="Enter your Email">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-container">
                            <input type="password" id="password" class="form-control" placeholder="Enter password">
                            <button type="button" class="password-toggle">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm password</label>
                        <div class="input-container">
                            <input type="password" id="confirm-password" class="form-control" placeholder="Enter password">
                            <button type="button" class="password-toggle">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <button type="submit" class="connexion-btn">Connectez-vous</button>
                </form>
                
                <div class="signup-prompt">
                    Already have an account ? <a href="<?php echo esc_url(home_url('/connexion')); ?>">Sign in</a>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordToggles = document.querySelectorAll('.password-toggle');
        
        passwordToggles.forEach(toggle => {
            const toggleIcon = toggle.querySelector('i');
            toggle.addEventListener('click', function() {
                const passwordInput = this.parentElement.querySelector('input');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                }
            });
        });
    });
</script>

<?php
get_footer();
?> 