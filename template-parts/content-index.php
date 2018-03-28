<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>>
    <div class="row-1">
        <div class="wrapper cap clear-bottom">
            <?php $pat_photo = get_field("pat_photo");?>
            <div class="col-1">
                <?php if($pat_photo):?>
                    <img src="<?php echo $pat_photo['url'];?>" alt="<?php echo $pat_photo['alt'];?>">
                <?php endif;?>
            </div><!--.col-1-->
            <div class="col-2">
                <div class="copy">
                    <?php the_content();?>
                </div><!--.copy-->
                <?php $row_1_button_link = get_field("row_1_button_link");
                $row_1_button_text = get_field("row_1_button_text");
                if($row_1_button_link&&$row_1_button_text):?>
                    <a class="button" href="<?php echo $row_1_button_link;?>">
                        <?php echo $row_1_button_text;?>
                    </a><!--.button-->
                <?php endif;?>
            </div><!--.col-2-->
        </div><!-- wrapper -->
    </div><!--.row-1-->
    <div class="row-2" style="background-image: url(<?php echo get_template_directory_uri()."/images/water.jpg";?>)">
        <div class="wrapper cap">
            <?php $row_2_copy = get_field("row_2_copy");
            $row_2_title = get_field("row_2_title");
            if($row_2_title):?>
                <header>
                    <h2><?php echo $row_2_title;?></h2>
                </header>
            <?php endif;
            if($row_2_copy):?>
                <div class="copy">
                    <?php echo $row_2_copy;?>
                </div><!--.copy-->
            <?php endif;?>
            <?php $row_2_button_link = get_field("row_2_button_link");
            $row_2_button_text = get_field("row_2_button_text");
            if($row_2_button_link&&$row_2_button_text):?>
                <a class="button" href="<?php echo $row_2_button_link;?>">
                    <?php echo $row_2_button_text;?>
                </a><!--.button-->
            <?php endif;?>
        </div><!-- wrapper -->
    </div><!--.row-2-->
    <div class="row-3">
        <div class="wrapper cap">
            <div class="row-1 clear-bottom">
                <?php $args = array(
                    'post_type'=>'post',
                    'posts_per_page'=>3,
                    'order'=>'DESC',
                    'orderby'=>'date'
                );
                $query = new WP_Query($args);
                if($query->have_posts()):?>
                    <?php $read_more_text = get_field("read_more_text","option");?>
                    <?php while($query->have_posts()):$query->the_post();?>
                        <div class="col js-blocks">
                            <?php $image = get_field("image");
                            if($image):?>
                                <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                            <?php endif;?>
                            <div class="date-wrapper clear-bottom">
                                <div class="date">
                                    <?php echo get_the_date('M d, Y');?>
                                </div><!--.date-->
                            </div><!--.date-wrapper-->
                            <header>
                                <h2><?php the_title();?></h2>
                            </header>
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
                        </div><!--.col-->
                    <?php endwhile;?>
                    <?php $post = get_post(6);
                    setup_postdata($post);
                endif;?>
            </div><!--.row-1-->
            <?php $row_3_button_link = get_field("row_3_button_link");
            $row_3_button_text = get_field("row_3_button_text");
            if($row_3_button_link&&$row_3_button_text):?>
                <div class="row-2">
                    <div class="button-wrapper">
                        <a href="<?php echo $row_3_button_link;?>">
                            <?php echo $row_3_button_text;?>
                        </a><!--.button-->
                    </div><!--.button-wrapper-->
                </div><!--.row-2-->
            <?php endif;?>
        </div><!-- wrapper -->
    </div><!--.row-3-->
    <div class="row-4" style="background-image: url(<?php echo get_template_directory_uri()."/images/water.jpg";?>)">
        <div class="wrapper cap">
            <?php $row_4_copy = get_field("row_4_copy");?>
            <div class="copy">
                <?php echo $row_4_copy;?>
            </div><!--.copy-->
        </div><!-- wrapper -->
        <?php $books = get_field("books");
        if($books):?>
            <a name="books-media"></a>
            <ul class='tabs clear-bottom'>
                <?php foreach($books as $book):?>
                    <li><a href='#<?php echo strtolower(preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($book->post_title)));?>'><?php echo $book->post_title;?></a></li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
    </div><!--.row-4-->
    <?php if($books):?>
        <div class="row-5">
            <div class="wrapper cap">
                <?php foreach($books as $book):
                    $post = get_post($book->ID);
                    setup_postdata($post);
                    $image = get_field("image");
                    $button_text = get_field("button_text");
                    $button_link = get_field("button_link");?>
                    <div id='<?php echo strtolower(preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($book->post_title)));?>' class="tab clear-bottom">
                        <div class="col-1">
                            <?php if($image):?>
                                <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                            <?php endif;?>
                            <?php if($button_link&&$button_text):?>
                                <a class="button" href="<?php echo $button_link;?>">
                                    <?php echo $button_text;?>
                                </a>
                            <?php endif;?>
                        </div><!--.col-1-->
                        <div class="col-2 copy">
                            <?php the_excerpt();?>
                        </div><!--.col-2-->
                    </div>
                <?php endforeach;
                wp_reset_postdata();?>
            </div><!-- wrapper -->
        </div><!--.row-5-->
    <?php endif;?>
</article><!-- #post-## -->
