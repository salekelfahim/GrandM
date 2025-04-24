<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Le_Grand_Marche
 */
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Grand Marché</title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  </head>
  <body <?php body_class(); ?>>
    <nav class="navbar <?php echo is_front_page() ? 'home-navbar' : ''; ?>">
      <div class="container-fluid">
        <div class="row align-items-center w-100">
          <div class="col-md-3">
            <div class="logo">
              <?php if (is_front_page()): ?>
                <?php echo get_custom_logo(); ?>
              <?php else: ?>
                <img src="http://localhost/wordpress/wp-content/uploads/2025/04/logo-2.png" alt="Le Grand Marché Logo" />
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-4 ms-auto">
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'd-flex justify-content-center gap-4 list-unstyled mb-0',
              )
            );
            ?>
          </div>
          <?php if (is_front_page()): ?>
          <div class="<?php echo is_user_logged_in() ? 'col-md-1' : 'col-md-3'; ?>">
            <?php if (is_front_page()) : ?>
              <?php if (!is_user_logged_in()) : ?>
                <div class="auth-buttons">
                  <a href="<?php echo get_permalink(get_page_by_path('connexion')); ?>" class="btn btn-outline">Connexion</a>
                  <a href="<?php echo get_permalink(get_page_by_path('inscription')); ?>" class="btn btn-filled">S'inscrire</a>
                </div>
              <?php else : ?>
                <div class="user-icons d-flex align-items-center justify-content-end gap-4">
                  <a href="#" class="icon-link"><i class="fas fa-heart"></i></a>
                  <a href="#" class="icon-link"><i class="fa-solid fa-basket-shopping"></i></a>
                  <a href="#" class="icon-link"><i class="fas fa-bell"></i></a>
                  <a href="#" class="icon-link"><img src="https://c.animaapp.com/K4rR5xEo/img/rectangle@2x.png" alt="Profile" class="icon-img rounded-circle"></a>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </nav>