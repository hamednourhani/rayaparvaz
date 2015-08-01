<?php
/*
 * CUSTOM POST TYPE TAXONOMY TEMPLATE
 *
 * This is the custom post type taxonomy template. If you edit the custom taxonomy name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom taxonomy is called "register_taxonomy('shoes')",
 * then your template name should be taxonomy-shoes.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates#Displaying_Custom_Taxonomies
*/
?>

<?php get_header(); 
	
?>
			<main class="site-main">

				<section class="layout">
						<h1 class="section-title noback"><?php echo single_cat_title(); ?></h1>
				</section>

				<section class="layout ">

					<div class="hotel-list">
					
						<?php if (have_posts()) : while (have_posts()) : the_post(); 
								$hotel_degree = get_post_meta( get_the_ID(), '_rayaparvaz_hotel_degree', true );
							?>
								<a href="<?php the_permalink() ?>" class="hotel-link" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<h3 class="hotel-name"><?php the_title(); ?></h3>
									<span class="hotel-rate">
										<?php 
											echo '<img src="'.get_template_directory_uri().'/images/star'.$hotel_degree.'.png" alt="star'.$hotel_degree.'"/>'; ?>
									</span>
								</a>
							
							
						

						<?php endwhile; ?>
					</div>

								<?php rayaparvaz_page_navi(); ?>

						<?php else : ?>

								<article id="archive-hotel" class="archive-hotel cf">
									<header class="article-header">
										<h1><?php _e( ' hala hoola Oops, Post Not Found!', 'rayaparvaz' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'rayaparvaz' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the taxonomy-custom_cat.php template.', 'rayaparvaz' ); ?></p>
									</footer>
								</article>

						<?php endif; ?>

					</section>			

			</main>

<?php get_footer(); ?>
