<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<main class="site-main">

				<section class="layout">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" class="single-tour" role="article">

								<header class="tour-header">

									<h1 class="tour-title "><?php the_title(); ?></h1>
								</header>

								<section class="tour-slide">
									<?php the_post_thumbnail(); ?>
								</section>

								<section class="tour-content cf">
									<?php the_content(); ?>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, vel, unde? Commodi dolorum cupiditate quos rerum quod voluptas ut esse ratione necessitatibus ad libero, laboriosam rem optio voluptatum alias, dolore saepe hic reiciendis fugit adipisci. Quaerat enim nobis, provident alias!</p>
								</section> <!-- end article section -->

								<footer class="tour-footer">
									<div class="tour-detail">
										<h3 class="tour-detail-title">title of x</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, vel, unde? Commodi dolorum cupiditate quos rerum quod voluptas ut esse ratione necessitatibus ad libero, laboriosam rem optio voluptatum alias, dolore saepe hic reiciendis fugit adipisci. Quaerat enim nobis, provident alias!</p>
									</div>
									<div class="weather-detail">
										<h3 class="weather-detail-title">title of o</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, vel, unde? Commodi dolorum cupiditate quos rerum quod voluptas ut esse ratione necessitatibus ad libero, laboriosam rem optio voluptatum alias, dolore saepe hic reiciendis fugit adipisci. Quaerat enim nobis, provident alias!</p>
									</div>

								</footer>

								

							</article>

							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="single-tour cf">
										<header class="tour-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'rayaparvaz' ); ?></h1>
										</header>
										<section class="tour-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'rayaparvaz' ); ?></p>
										</section>
										<footer class="tour-footer">
											<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'rayaparvaz' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				
<?php get_footer(); ?>
