<?php 

// FAQ Shortcode
add_shortcode( 'jwt_designfolio', 'jeweltheme_woofolio_shortcode' );

function jeweltheme_woofolio_shortcode( $atts , $content = null ) {

ob_start();
    extract( shortcode_atts(
        array(
            'cat'                => '',
            'orderby'            => 'menu_order title',
            'order'              => 'ASC',
            ), $atts )
    );

    // WP_Query arguments
    $jwt_designfolio_args = array (
        'post_type'              => 'product',
        'posts_per_page'         => -1,
        );

    // The Query
    $woofolio_query = new WP_Query( $jwt_designfolio_args );
    ?>

    <div class="bar">
        <div class="filter">
            <button class="action filter__item filter__item--selected" data-filter="*">All</button>            
            <?php
                $product_cat = get_terms( 'product_cat' );
                foreach ($product_cat as $cat) { 
                    echo '<button class="action filter__item" data-filter=".'.trim($cat->slug).'"><span class="action__text">'.$cat->name.'</span></button>';
                }
            ?>            
        </div>
    </div>


        <!-- Main view -->
    <div class="view">
        <!-- Grid -->
        <div class="grid grid--loading">
            <!-- Loader -->
            <img class="grid__loader" src="<?php echo plugins_url('images/grid.svg', __FILE__ );?>" width="60" alt="Loader image" />

            <!-- Grid sizer for a fluid Isotope (Masonry) layout -->
            <div class="grid__sizer"></div>

            <!-- Grid items -->            
                <?php 
                if ( $woofolio_query->have_posts() ) {
                    while ( $woofolio_query->have_posts() ) {
                        $woofolio_query->the_post();

                        $terms = wp_get_post_terms(get_the_ID(), 'product_cat' );
                        $t = array();                    
                        foreach($terms as $term)
                            $t[] = $term->slug;
                        
                        $url = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');

                        $t = array();
                        foreach($terms as $term) $t[] = $term->slug;
                        ?>
                    <div class="grid__item grid__item--size-a <?php echo implode(' ', $t); $t = array(); ?>">                        
                        <div class="slider">

                            <?php
                                global $product;
                                $product_thumb = woocommerce_get_product_thumbnail();
                                $attachment_ids = $product->get_gallery_attachment_ids();
                                if ( $attachment_ids ){
                                     foreach( $attachment_ids as $attachment_id ) {
                                        $image_url = wp_get_attachment_image_src( $attachment_id, 'full' );
                                      echo '<div class="slider__item"><img src="' . $image_url['0']  . '" alt="' . get_the_title() . '" /></div>';
                                    }
                                } else {
                                    echo $product_thumb;
                                   
                                }
                            ?>
                        </div>
                        <div class="meta">
                            <h3 class="meta__title">
                                <a href="<?php the_permalink();?>">
                                    <?php the_title();?>
                                </a>
                            </h3>
                            <span class="meta__brand"><?php echo implode(' ', $t); $t = array(); ?></span>
                            <span class="meta__price"><?php echo $product->get_price_html();?></span>
                        </div>
                    </div>
                <?php }  }  ?>
            </div>
            <!-- /grid-->
        </div>


<?php
wp_reset_postdata();


    $output = ob_get_contents(); // end output buffering
    ob_end_clean(); // grab the buffer contents and empty the buffer
    return $output;
}
