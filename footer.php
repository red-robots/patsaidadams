<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row-1">
			<div class="wrapper cap">
				<div class="social">
					<?php $facebook = get_field("facebook","option");
					$youtube = get_field("youtube","option");
					$email = get_field("email","option");
					if($facebook):?>
						<a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<?php endif;
					if($youtube):?>
						<a href="<?php echo $youtube;?>" target="_blank"><i class="fa fa-youtube"></i></a>
					<?php endif;
					if($email):?>
						<a href="mailto:<?php echo $email;?>" target="_blank"><i class="fa fa-envelope"></i></a>
					<?php endif;?>
				</div><!--.social-->
			</div><!--.wrapper-->
		</div><!--.social-->
		<div class="row-2">
			<div class="wrapper cap">
				<div class="col-1 col">
					<?php $footer_col_1_title = get_field("footer_col_1_title","option");
					if($footer_col_1_title):?>
						<header><h2><?php echo $footer_col_1_title;?></h2></header>
					<?php endif;
					$footer_col_1_books = get_field("footer_col_1_books","option");
					if($footer_col_1_books):?>
						<ul>
							<?php foreach($footer_col_1_books as $book):
								if($book['link']&&$book['title']):?>
									<li>
										<a href="<?php echo $book['link'];?>">
											<?php echo $book['title'];?>
										</a>
									</li>
								<?php endif;
							endforeach;?>
						</ul>
					<?php endif;?>
				</div><!--.col-1-->
				<div class="col-2 col">
					<?php $footer_col_2_title = get_field("footer_col_2_title","option");
					if($footer_col_2_title):?>
						<header><h2><?php echo $footer_col_2_title;?></h2></header>
					<?php endif;?>
					<?php $args = array(
						"post_type"=>'post',
						'posts_per_page'=>3,
						'orderby'=>'date',
						'order'=>'DESC'
					);
					$query = new WP_Query($args);
					if($query->have_posts()):?>
						<nav>
							<ul>
								<?php while($query->have_posts()): $query->the_post();?>
									<li>
										<a href="<?php echo get_the_permalink();?>">
											<?php the_title();?>
										</a>
									</li>
								<?php endwhile;?>
							</ul>
						</nav>
						<?php wp_reset_postdata();
					endif;?>
				</div><!--.col-2-->
				<div class="col-3 col">
					<?php $footer_col_3_title = get_field("footer_col_3_title","option");
					$footer_col_3_copy = get_field("footer_col_3_copy","option");
					$footer_col_3_button_text = get_field("footer_col_3_button_text","option");
					$footer_col_3_button_link = get_field("footer_col_3_button_link","option");
					if($footer_col_3_title):?>
						<header><h2><?php echo $footer_col_3_title;?></h2></header>
					<?php endif;
					if($footer_col_3_copy):?>
						<div class="copy">
							<?php echo $footer_col_3_copy;?>
						</div><!--.copy-->
					<?php endif;
					if($footer_col_3_button_link&&$footer_col_3_button_text):?>
						<a class="button" href="<?php echo $footer_col_3_button_link;?>">
							<?php echo $footer_col_3_button_text;?>
						</a>
					<?php endif;?>
				</div><!--.col-3-->
			</div><!--.wrapper-->
		</div><!--.row-2-->
		<div class="row-3">
			<div class="wrapper cap copy">
				<?php $copyright = get_field("copyright","option");
				if($copyright) echo $copyright;?>
			</div><!--.wrapper-->
		</div><!--.row-3-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-118098484-1', 'auto');
      ga('send', 'pageview');
    </script>
  
</body>
</html>
