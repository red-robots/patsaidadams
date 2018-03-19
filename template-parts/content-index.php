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
        <div class="wrapper">
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
    <div class="row-2">
        <div class="wrapper">
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
        <div class="wrapper">
            <div class="row-1">
                <?php $args = array(
                    'post_type'=>'post',
                    'posts_per_page'=>3,
                    'order'=>'ASC',
                    'orderby'=>'date'
                );
                $query = new WP_Query($args);
                if($query->have_posts()):?>
                    <?php $read_more_text = get_field("read_more_text","option");?>
                    <?php while($query->have_posts()):$query->the_post();?>
                        <div class="col">
                            <?php $image = get_field("image");
                            if($image):?>
                                <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                            <?php endif;?>
                            <div class="date-wrapper">
                                <div class="date">
                                    <?php echo get_the_date('Md, Y');?>
                                </div><!--.date-->
                            </div><!--.date-wrapper-->
                            <header>
                                <h2><?php the_title();?></h2>
                            </header>
                            <div class="copy">
                                <?php the_excerpt();?>
                            </div><!--.copy-->
                            <a class="button" href="<?php echo get_the_permalink();?>">
                                <?php echo $read_more_text;?>
                            </a><!--.button-->
                        </div><!--.col-->
                    <?php endwhile;?>
                    <?php wp_reset_postdata();
                endif;?>
            </div><!--.row-1-->
            <div class="row-2">
                <?php $row_3_button_link = get_field("row_3_button_link");
                $row_3_button_text = get_field("row_3_button_text");
                if($row_3_button_link&&$row_3_button_text):?>
                    <a class="button" href="<?php echo $row_3_button_link;?>">
                        <?php echo $row_3_button_text;?>
                    </a><!--.button-->
                <?php endif;?>
            </div><!--.row-2-->
        </div><!-- wrapper -->
    </div><!--.row-3-->
    <div class="row-4">
        <div class="wrapper">
            <?php $row_4_copy = get_field("row_4_copy");?>
            <div class="copy">
                <?php echo $row_4_copy;?>
            </div><!--.copy-->
        </div><!-- wrapper -->
    </div><!--.row-4-->
    <div class="row-5">
        <div class="wrapper">
            <ul class='tabs'>
                <li><a href='#tab1'>Tab 1</a></li>
                <li><a href='#tab2'>Tab 2</a></li>
                <li><a href='#tab3'>Tab 3</a></li>
            </ul>
            <div id='tab1'>
                <p>Hi, this is the first tab.</p>
            </div>
            <div id='tab2'>
                <p>This is the 2nd tab.</p>
            </div>
            <div id='tab3'>
                <p>And this is the 3rd tab.</p>
            </div>
        </div><!-- wrapper -->
    </div><!--.row-5-->
</article><!-- #post-## -->
