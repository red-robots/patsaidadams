<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-books"); ?>>
    <div class="wrapper cap">
        <header class="row-1">
            <h1><?php the_title();?>
        </header>
        <?php $args = array(
            'post_type'=>'book',
            'posts_per_page'=>-1,
        );
        $query = new WP_Query($args);
        if($query->have_posts()):?>
            <div class="row-2">
                <?php while($query->have_posts()): $query->the_post();?>
                    <article class="book clear-bottom">
                        <div class="col-1">
                            <?php $image = get_field("image");
                            if($image):?>
                                <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                            <?php endif;?>
                            <?php $purchase_button_link = get_field("purchase_button_link");
                            $purchase_button_text = get_field("purchase_button_text");
                            if($purchase_button_link&&$purchase_button_text):?>
                                <a class="button" href="<?php echo $purchase_button_link;?>">
                                    <?php echo $purchase_button_text;?>
                                </a><!--.button-->
                            <?php endif;?>
                        </div><!--.col-1-->
                        <div class="col-2">
                            <header>
                                <h2><?php the_title();?></h2>
                            </header>
                            <div class="copy">
                                <?php the_content();?>
                            </div><!--.copy-->
                        </div><!--.col-2-->
                    </article><!--.book-->
                <?php endwhile;?>
            </div><!--.row-2-->
            <?php wp_reset_postdata();
        endif;?>
    </div><!--.wrapper.cap-->
</article><!-- #post-## -->
