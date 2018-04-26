<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="template-category">
				<div class="wrapper cap clear-bottom">
					<div class="col-1">
						<?php if ( have_posts() ) : 
							$read_more_text = get_field("read_more_text","option");?>
							<div class="wrapper">
								<?php /* Start the Loop */
								while ( have_posts() ) : the_post();?>
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
															<?php $terms = get_the_terms(get_the_ID(),'main');
															if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):
																$found = false;
																foreach($terms as $term):
																	if($term->term_id==340)://video from main tax
																		echo "View";
																		$found = true;
																		break;
																	elseif($term->term_id==341)://audio from main tax
																		echo "Listen";
																		$found = true;
																		break;
																	endif;
																endforeach;
																if(!$found):
																	echo $read_more_text;
																endif;
															else:
																echo $read_more_text;
															endif;?>
														</a><!--.button-->
													</div><!--.wrapper-->
												<?php endif;?>
											</div><!--.col-2-->
										</div><!--.wrapper-->
									</article><!--.post-->
								<?php endwhile;?>
							</div><!--.wrapper-->
							<?php pagi_posts_nav();
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
							$terms = get_terms(array(
								'taxonomy' => 'main',
								'hide_empty' => true,
							));
							if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
								<ul>
									<?php foreach($terms as $term):?>
										<li>
											<a href="<?php echo get_term_link($term->term_id);?>"><?php echo $term->name;?></a>
										</li>
									<?php endforeach;?>
								</ul>
							<?php endif;
							if($categories_title):?>
								<header>
									<h2><?php echo $categories_title;?></h2>
								</header>
							<?php endif;?>
							<?php wp_dropdown_categories();?>
							<script type="text/javascript">
								var dropdown = document.getElementById("cat");
								if(dropdown){
									function onCatChange() {
										if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
											location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
										}
									}
									dropdown.onchange = onCatChange;
								}
							</script>
							<?php if($archives_title):?>
								<header>
									<h2><?php echo $archives_title;?></h2>
								</header>
							<?php endif;?>
							<ul>
								<?php wp_get_archives(array('limit'=>12));?>
							</ul>
							<?php $limit = 0;
							$current_year = date('Y');
							$rows = $wpdb->get_results("SELECT DISTINCT YEAR( post_date ) AS year FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' ORDER BY post_date DESC");
							if($rows):?>
								<ul>
									<?php foreach($rows as $row) :
										if(strcmp($row->year,$current_year)===0) continue;?>
										<li class="archive-year"><a href="<?php bloginfo('url') ?>/<?php echo $row->year; ?>/"><?php echo $row->year;?></a></li>
									<?php endforeach;?>
								</ul> 
							<?php endif;?>
						</div><!--.row-2-->
					</aside><!--.col-2-->
				</div><!--.wrapper-->
			</div><!--.template-category-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
