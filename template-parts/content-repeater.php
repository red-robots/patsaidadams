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
        <?php $list = get_field("list");
        if ( $list ) : ?>
            <?php /* Start the Loop */
            foreach ($list as $item) : ?>
                <article class="post clear-bottom">
                    <div class="col-1">
                        <?php $image = $item['image'];
                        if($image):?>
                            <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                        <?php endif;?>
                    </div><!--.col-1-->
                    <div class="col-2 copy">
                        <?php $copy = $item['copy'];
                        if($copy):?>
                            <?php echo $copy;?>
                        <?php endif;?>
                    </div><!--.col-2-->
                </article><!--.post-->
            <?php endforeach;?>
        <?php endif; ?>
    </div><!--.wrapper-->
</div><!--.template-category-->
