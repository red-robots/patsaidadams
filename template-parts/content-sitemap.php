<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-page"); ?>>
    <div class="wrapper cap">
        <header>
            <h1><?php the_title();?></h1>
        </header>
        <div class="copy">
            <?php the_content();?>
            <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
        </div><!--.copy-->
    </div><!--.wrapper.cap-->
</article><!-- #post-## -->
