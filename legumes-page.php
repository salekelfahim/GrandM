<?php
/**
 * Template Name: Legumes Page
 *
 * @package Le_Grand_Marche
 */

get_header();
?>

<div class="fruits-page">
    <!-- Hero Section -->
    <section class="fruits-hero">
        <div class="fruits-hero-content">
            <div class="fruits-hero-text">
                <h1>Les Légumes</h1>
                <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, page est achevée. Généralement, on utilise un texte en faux latin...</p>
                <div class="search-bar">
                    <input type="text" placeholder="Recherche" class="search-input">
                    <button class="search-button">Recherche</button>
                </div>
            </div>
            <div class="fruits-hero-image">
                <img src="http://localhost/wordpress/wp-content/uploads/2025/04/mix-vegetable-1.png" alt="Assortiment de fruits" />
            </div>
        </div>
    </section>

    <!-- Products Grid Section -->
    <section class="products-section">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 24,
            'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => 'Légumes'
                )
            )
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            echo '<div class="product-grid fruits-grid">';
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
                                    <img class="product-image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                                <div class="text-wrapper-3"><?php echo $product->get_weight() ? $product->get_weight() . 'kg' : ''; ?></div>
                                <div class="vector">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            echo '</div>';

            // Pagination
            echo '<div class="pagination">';
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => $paged,
                'prev_text' => '&lt;',
                'next_text' => '&gt;',
                'mid_size' => 2
            ));
            echo '</div>';

            wp_reset_postdata();
        else :
            echo '<p>Aucun produit trouvé</p>';
        endif;
        ?>
    </section>
</div>

<?php
get_footer();
