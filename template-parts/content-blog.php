<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-blog"); ?>>
    <div class="wrapper cap">
        <header>
            <h1><?php the_title();?></h1>
        </header>
        <div class="date">
            <?php echo get_the_date('M d, Y');?>
        </div><!--.date-->
        <div class="copy">
            <?php the_content();?>
            <?php comments_template();?>
        </div><!--.copy-->
        <?php if(get_previous_post_link()||get_next_post_link()):?>
            <nav class="pagination clear-bottom">
                <?php if(get_previous_post_link()):?>
                    <div class="button-wrapper" rel="prev">
                        <?php previous_post_link('%link','Previous Blog Post "%title"');?>
                    </div><!--.button-wrapper-->
                <?php endif;?>
                <?php if(get_next_post_link()):?>
                    <div class="button-wrapper" rel="next">
                        <?php next_post_link('%link','Next Blog Post "%title"');?>
                    </div><!--.button-wrapper-->
                <?php endif;?>
            </nav><!--.pagination-->
        <?php endif;?>
    </div><!--.wrapper.cap-->
</article><!-- #post-## -->
