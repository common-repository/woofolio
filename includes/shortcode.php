<?php 

// FAQ Shortcode
add_shortcode( 'jwt_product', 'jeweltheme_woofolio_shortcode' );

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
    $ateam_faq_args = array (
        'post_type'              => 'product',
        'faq_cat'                => $cat,
        'posts_per_page'         => -1,
        'order'                  => $order,
        );

    // The Query
    $faq_query = new WP_Query( $ateam_faq_args );

    $accordion = 'accordion' . time() . rand();
    ?>

    <div class="about-item">
        <div class="panel-group style-1" id="<?php echo $accordion;?>">
    
                <?php 
                    if ( $faq_query->have_posts() ) {
                        while ( $faq_query->have_posts() ) {
                            $faq_query->the_post(); ?>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#<?php echo $accordion;?>" href="#<?php echo $accordion;?>-<?php the_ID(); ?>" class="collapsed">
                                                <?php the_title() ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="<?php echo $accordion;?>-<?php the_ID(); ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            
                                                <?php the_content(); ?>
                                            
                                        </div>
                                    </div>
                                </div>

                            <?php 
                        } 
                    } 
                ?>

            </div>
    </div>


<?php
wp_reset_postdata();


    $output = ob_get_contents(); // end output buffering
    ob_end_clean(); // grab the buffer contents and empty the buffer
    return $output;
}
