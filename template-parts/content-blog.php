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
        </div><!--.copy-->
        <nav class="pagination clear-bottom">
            <?php previous_post_link('%link','Previous Blog Post "%title"');?>
            <?php next_post_link('%link','Next Blog Post "%title"');?>
        </nav><!--.pagination-->
    </div><!--.wrapper.cap-->
</article><!-- #post-## -->
