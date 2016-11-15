<?php /* Template Name: Portfolio */ ?>

<?php get_header(); ?>

<?php get_template_part('header','custom'); ?>


<div class="portfolio-wrap col-xs-12 col-sm-12">

	<?php if(have_posts()): ?>

		<?php $portfolio=new WP_Query(array(
			'post_type' => 'portfolio',
			'posts_per_page' => -1
		)); ?>
			
			<div class="portfolio-loop clearfix">	

				<?php while($portfolio->have_posts()):$portfolio->the_post(); ?>		                      

				<div class="h-product col-sm-3">						

					<div class="product-wrap">

						<div class="product-media">

							<a href="<?php the_permalink(); ?>">	

								<?php the_post_thumbnail(); ?>

							</a>								
													
						</div> <!-- product-media -->

						<header class="product-header">

							<h4 class="p-name">

								<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a>

							</h4>
														
						</header> <!-- end product-header -->

					</div> <!-- end product-wrap -->
										
				</div> <!-- end h-product -->				

				<?php endwhile; ?>

			</div> <!-- end portfolio-loop -->

			<?php wp_reset_postdata(); ?>						


	<?php endif; ?>

</div> <!-- end portfolio-wrap -->

<?php get_template_part('footer','blog'); ?>

<?php get_footer(); ?>