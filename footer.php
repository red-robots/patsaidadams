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
		<div class="social row-1">
			<?php $facebook = get_field("facebook","option");
			$youtube = get_field("youtube","option");
			if($facebook):?>
				<a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a>
			<?php endif;
			if($youtube):?>
				<a href="<?php echo $youtube;?>"><i class="fa fa-youtube"></i></a>
			<?php endif;?>
		</div><!--.social-->
		<div class="row-2">
			<div class="col-1">
				<?php $footer_col_1_title = get_field("footer_col_1_title","option");
				if($footer_col_1_title):?>
					<h2><?php $footer_col_1_title;?></h2>
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
				<?php endif;
				$footer_col_1_title_2 = get_field("footer_col_1_title_2","option");
				if($footer_col_1_title_2):?>
					<h2 class="two"><?php $footer_col_1_title_2;?></h2>
				<?php endif;?>
			</div><!--.col-1-->
			<div class="col-2">
				<?php $footer_col_2_title = get_field("footer_col_2_title","option");
				if($footer_col_2_title):?>
					<h2><?php $footer_col_2_title;?></h2>
				<?php endif;?>
				<?php $args = array(
					"post_type"=>'post',
					'posts_per_page'=>3,
					'orderby'=>'date',
					'order'=>'ASC'
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
			<div class="col-3">
			</div><!--.col-3-->
		</div><!--.row-2-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
