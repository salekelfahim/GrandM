<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Le_Grand_Marche
 */
?>

      <footer class="footer">
        <!-- Newsletter/Subscribe Section -->
        <div class="subscribe-section">
          <div class="subscribe-content">
            <div class="subscribe-text">
              <h2>S'abonner</h2>
              <h3 class="highlight">dernières actualités</h3>
            </div>
            <div class="subscribe-form">
              <input type="email" placeholder="Votre e-mail" class="email-input">
              <button class="subscribe-button">S'abonner</button>
            </div>
          </div>
          <div class="vegetables-image">
            <img src="http://localhost/wordpress/wp-content/uploads/2025/04/mix-vegetable-1.png" alt="Légumes frais">
          </div>
        </div>
        
        <!-- Main Footer Section -->
        <div class="main-footer">
          <div class="footer-container">
            <!-- Logo Section -->
            <div class="footer-logo">
              <?php echo get_custom_logo(); ?>
              <!-- Description -->
              <div class="footer-description">
                <p>Très bonne nourriture Frais, rapide, amical, abordable Très flexible avec les commandes. Très bonnes portions si vous le souhaitez</p>
                
                <div class="opening-hours">
                  <h4>Heures d'ouverture</h4>
                  <p>Lun-Sam (8:00-6:00)</p>
                  <p>Dimanche-Fermé</p>
                </div>
              </div>
            </div>
            
            <!-- Contact Information -->
            <div class="footer-contact">
              <div class="address">
                <h4>Adress :</h4>
                <p>932 Mhamid Rue Nakhil,</p>
                <p>Marrakech</p>
              </div>
              
              <div class="email">
                <h4>E-mail:</h4>
                <p>Hello@legrandmarche.com</p>
              </div>
              
              <div class="phone">
                <h4>Fix:</h4>
                <p>+212 524 ++++ +++</p>
              </div>
            </div>
            
            <!-- Navigation -->
            <div class="footer-nav">
              <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Actualités</a></li>
                <li><a href="#">boutique</a></li>
                <li><a href="#">Faq</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
          
          <!-- Decorative elements -->
          <div class="footer-decoration">
            <img src="http://localhost/wordpress/wp-content/uploads/2025/04/footer-1.png" alt="Feuille décorative">
          </div>
        </div>
      </footer>
    </div>
  </body>
</html><?php wp_footer(); ?>
