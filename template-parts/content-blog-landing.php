<?php
/**
 * Template part for displaying page content in page-blog-landing.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("template-category"); ?>>
    <div class="wrapper cap clear-bottom">
        <div class="col-1">
            <?php $args = array(
                'post_type'=>'post',
                'posts_per_page'=>10,
                'orderby'=>'date',
                'order'=>'DESC'
            );
            $query = new WP_Query($args);
            if ( $query->have_posts() ) : 
                $read_more_text = get_field("read_more_text","option");?>
                <div class="wrapper">
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
                                        <?php the_excerpt();?>
                                    </div><!--.copy-->
                                    <?php if($read_more_text):?>
                                        <div class="wrapper">
                                            <a class="button" href="<?php echo get_the_permalink();?>">
                                                <?php echo $read_more_text;?>
                                            </a><!--.button-->
                                        </div><!--.wrapper-->
                                    <?php endif;?>
                                </div><!--.col-2-->
                            </div><!--.wrapper-->
                        </article><!--.post-->
                    <?php endwhile;?>
                </div><!--.wrapper-->
                <?php pagi_posts_nav($query);
                wp_reset_postdata();
            endif; ?>
        </div><!--.col-1-->
        <aside class="col-2">
            <?php $newsletter_copy = get_field("newsletter_copy","option");
            $newsletter_button_link = get_field("newsletter_button_link","option");
            $newsletter_button_text = get_field("newsletter_button_text","option");
            if($newsletter_copy||($newsletter_button_link&&$newsletter_button_text)):?>
                <div class="row-1">
                    <div class="wrapper">
                        <div class="wrapper">
                            <?php if($newsletter_copy):?>
                                <div class="copy">
                                    <?php echo $newsletter_copy;?>
                                </div><!--.copy-->
                            <?php endif;
                            if($newsletter_button_link&&$newsletter_button_text):?>
                                <a class="button" href="<?php echo $newsletter_button_link;?>">
                                    <?php echo $newsletter_button_text;?>
                                </a><!--.button-->
                            <?php endif;?>
                        </div><!--.wrapper-->
                    </div><!--.wrapper-->
                </div><!--.row-1-->
            <?php endif;?>
            <div class="row-2">
                <?php echo get_search_form();?>
                <?php $categories_title = get_field("categories_title","option");
                $archives_title = get_field("archives_title","option");
                if($categories_title):?>
                    <header>
                        <h2><?php echo $categories_title;?></h2>
                    </header>
                <?php endif;
                $cats = get_categories();
                if($cats):?>
                    <ul>
                        <?php foreach($cats as $cat):?>
                            <li>
                                <a href="<?php echo get_term_link($cat->term_id);?>"><?php echo $cat->name;?></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;
                if($archives_title):?>
                    <header>
                        <h2><?php echo $archives_title;?></h2>
                    </header>
                <?php endif;?>
                <ul>
                    <?php wp_get_archives();?>
                </ul>
            </div><!--.row-2-->
        </aside><!--.col-2-->
    </div><!--.wrapper-->
</div><!--.template-category-->
