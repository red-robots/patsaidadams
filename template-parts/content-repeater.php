<?php
/**
 * Template part for displaying page content in page-blog-landing.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("template-repeater"); ?>>
    <div class="wrapper cap">
        <?php $args = array(
            'post_type'=>'post',
            'posts_per_page'=>10,
            'orderby'=>'date',
            'order'=>'DESC'
        );
        $query = new WP_Query($args);
        if ( $query->have_posts() ) : ?>
            <?php /* Start the Loop */
            while ( $query->have_posts() ) : $query->the_post();?>
                <article class="post">
                    <header>
                        <h1><?php the_title();?></h1>
                    </header>
                    <div class="wrapper clear-bottom">
                        <div class="col-1">
                            <?php $image = get_field("image");
                            if($image):?>
                                <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                            <?php endif;?>
                        </div><!--.col-1-->
                        <div class="col-2">
                            <div class="date">
                                <?php echo get_the_date('M d, Y');?>
                            </div><!--.date-->
                            <div class="copy">
                                <?php the_content();?>
                            </div><!--.copy-->
                        </div><!--.col-2-->
                    </div><!--.wrapper-->
                </article><!--.post-->
            <?php endwhile;?>
            <?php wp_reset_postdata();
        endif; ?>
    </div><!--.wrapper-->
</div><!--.template-category-->
