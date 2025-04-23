<?php
/**
 * Template Name: Front Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Le_Grand_Marche
 */

get_header();
?>

    <div class="home">
      <header class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
              <h1>
                <span class="small-text">Un mode de vie</span> 
                <span class="small-text">sain avec des</span> 
                <span class="highlight">Produits frais</span> de

                <span class="small-text">
                    le Grande Marche</span> 
              </h1>
              <p>
                Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour
                calibrer une mise en page, page est achevée. Généralement, on utilise un texte en faux latin...
              </p>
              <a href="#" class="btn btn-connect">Connectez-vous</a>
            </div>
            <div class="hero-image">
                <div class="vegetable-container">
                  <div class="vegetable-bg"></div>
                  <img src="http://localhost/wordpress/wp-content/uploads/2025/04/hero-1.png" alt="Fruits et légumes frais" class="vegetable-img" />
                </div>
              </div>
          </div>
      </header>

      <section class="bestsellers">
        <div class="bestsellers-header">
          <h2>MEILLEURS VENTES</h2>
          <div class="navigation-buttons">
            <button class="nav-btn prev-btn"><</button>
            <button class="nav-btn next-btn">></button>
          </div>
        </div>
        
        <?php
        // Function to display product grid
        function display_product_grid($args) {
          $query = new WP_Query($args);
          
          if ($query->have_posts()) :
            echo '<div class="product-grid">';
            while ($query->have_posts()) : $query->the_post();
              global $product;
              ?>
              <div class="box">
                <div class="group">
                  <div class="overlap-group">
                    <div class="overlap">
                      <div class="icons-shop"></div>
                    </div>
                    <div class="div">
                      <div class="text-wrapper"><?php the_title(); ?></div>
                      <div class="text-wrapper-2"><?php echo $product->get_price_html(); ?></div>
                    </div>
                    <div class="overlap-2">
                      <div class="ellipse"></div>
                      <?php if (has_post_thumbnail()) : ?>
                        <img class="apples-red-fresh" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" />
                      <?php endif; ?>
                      <div class="text-wrapper-3"><?php echo $product->get_weight() ? $product->get_weight() . 'kg' : ''; ?></div>
                      <div class="vector"></div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            endwhile;
            echo '</div>';
            wp_reset_postdata();
          endif;
        }

        // Best Sellers for all users
        $best_sellers_args = array(
          'post_type' => 'product',
          'posts_per_page' => 4,
          'meta_key' => 'total_sales',
          'orderby' => 'meta_value_num',
          'order' => 'DESC'
        );
        
        display_product_grid($best_sellers_args);

        // Additional categories for logged-in users
        if (is_user_logged_in()) {
          // T-shirts category
          $tshirts_args = array(
            'post_type' => 'product',
            'posts_per_page' => 4,
            'tax_query' => array(
              array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => 'tshirts'
              )
            )
          );
          
          echo '<div class="bestsellers-header"><h2>Les fruits</h2></div>';
          display_product_grid($tshirts_args);

          // Hoodies category
          $hoodies_args = array(
            'post_type' => 'product',
            'posts_per_page' => 4,
            'tax_query' => array(
              array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => 'hoodies'
              )
            )
          );
          
          echo '<div class="bestsellers-header"><h2>Les Légumes</h2></div>';
          display_product_grid($hoodies_args);
        }
        ?>
      </section>

      <!-- Features section -->
      <section class="features">
        <div class="feature-content">
          <h1>
            <span>Un mode de vie sain avec des</span>
            <span class="highlight">Produits frais</span>
            <span>de le Grande Marche</span>
          </h1>
          <ul>
            <li>Meilleur service que les autres</li>
            <li>Personnel expérimenté</li>
            <li>Application Mobile</li>
          </ul>
        </div>
        <div class="feature-image">
          <img src="http://localhost/wordpress/wp-content/uploads/2025/04/legumes-dans-sac-papier.png" alt="Assortiment de légumes" />
        </div>
      </section>

      <!-- Delivery section -->
      <section class="delivery-box">
        <div class="delivery-group">
          <div class="delivery-overlap-group">
            <div class="delivery-rectangle"></div>
            <img class="delivery-image" src="http://localhost/wordpress/wp-content/uploads/2025/04/delivery.png" />
            <div class="delivery-text-wrapper">
              <h2>Livraison partout <br/>au <span>maroc</span></h2>
              <p>
                Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, page est achevée. Généralement, on utilise un texte en faux latin...
              </p>
              <button class="btn-subscribe">S'inscrire</button>
            </div>
          </div>
        </div>
      </section>

      <!-- App download section -->
      <section class="app-download">
        <div class="app-content">
          <h2>
            <span>Télécharger maintenant</span>
            <span>l'application <strong>Le Grand</strong></span>
            <span><strong>Marché</strong> sur android et ios</span>
          </h2>
          <div class="app-badges">
            <img src="http://localhost/wordpress/wp-content/uploads/2025/04/app-store.png" alt="App Store" />
            <img src="http://localhost/wordpress/wp-content/uploads/2025/04/play-srore.png" alt="Google Play" />
          </div>
        </div>
        <div class="app-image">
          <img src="http://localhost/wordpress/wp-content/uploads/2025/04/iphone.png" alt="App screenshot" />
        </div>
      </section>

      <!-- Client Reviews Section -->
      <section class="client-reviews">
        <div class="reviews-header">
          <h2>Ce que nos clients disent de</h2>
          <h2 class="highlight">Notre entreprise</h2>
        </div>
        
        <div class="reviews-container">
          <div class="review-box">
            <div class="review-group">
              <div class="review-overlap-group">
                <div class="review-rectangle"></div>
                <div class="review-content">
                  <div class="review-profile">
                    <img class="profile-img" src="https://c.animaapp.com/K4rR5xEo/img/rectangle@2x.png" />
                  </div>
                  <div class="review-text">
                    <h3>Nom et prénom</h3>
                    <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, page est achevée. Généralement, on utilise un texte en faux latin...</p>
                  </div>
                  <div class="stars-group">
                    <img class="star" src="img/star-1-2.svg" />
                    <img class="star" src="img/star-3-3.svg" />
                    <img class="star" src="img/star-2-2.svg" />
                    <img class="star" src="img/star-4-2.svg" />
                    <img class="star" src="img/star-5-3.svg" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php
get_footer();