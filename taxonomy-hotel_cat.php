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
				$term = get_queried_object();

				$children = get_terms( $term->taxonomy, array(
				'parent'    => $term->term_id,
				'hide_empty' => false
				) );
				//var_dump($children);
				

// print_r($children); // uncomment to examine for debugging
				


?>
			<main class="site-main">

				<section class="layout">
						<h1 class="hotel-cat-title"><?php echo single_cat_title(); ?></h1>
						<h3 class="hotel-cat-description"><?php echo category_description(); ?></h3>
				</section>

				<section class="layout ">

					<?php if (have_posts()) { ?>
						<?php if(!$children) { ?>
							<div class="hotel-list">
								 <?php while (have_posts()) : the_post(); 
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
						<?php } else { ?>

								<ul class="hotel-subclass">
								<?php foreach( (array) $children as $term ) {
									$image_params = array(
									  'term_id' => $term->term_id,
									  'size' => 'full'
									);
									$category_image_url = category_image_src( $image_params , false );
									$category_image_url = ($category_image_url)?($category_image_url):"";
									$category_url = esc_url( get_term_link( $term, $term->taxonomy ) );
									$category_url = ($category_url)?($category_url):""; ?>

									<li class="hotel-subcat-list">
										<a href="<?php echo $category_url; ?>">
											<img src="<?php echo $category_image_url; ?>" alt="<?php echo $term->name; ?>" class="subcat-img" />
										</a>
										<h4 class="hotel-subcat-title">
											<?php echo $term->name; ?>
										</h4>
									</li>


								    
									<?php } //foreach ?>
						   		</ul>
						 	<?php } //else

								rayaparvaz_page_navi(); 

					 } else { ?>

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

					<?php } ?>

					</section>			

			</main>

<?php get_footer(); ?>
