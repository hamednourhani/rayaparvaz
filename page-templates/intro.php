<?php 
/**
 * Template Name: Intro Page
 * @package WordPress
 * @subpackage Rayaparvaz
 * @since Rayaparvaz 1.0
 */
get_header(); ?>
			<main class="site-main">
				<div class="logo-area">
					<section class="layout">
						<div class="logo-wrapper">
							<a href="#">
								<?php echo '<img src="'.get_stylesheet_directory_uri().'/images/RayaSite-120.png" alt="Rayasite" class="site-logo"/>'; ?>
							</a>
						</div>
					</section>
				</div> <!-- logo-area -->
				
				<div class="tours-area">
					<section class="layout">
						<div class="tour-buttons">
							<a href="#">
								<?php echo '<img src="'.get_stylesheet_directory_uri().'/images/external-tour.png" alt="external tour" class="tour-button"/>'; ?>
							</a>
						</div>
						<div class="tour-buttons">
							<a href="#">
								<?php echo '<img src="'.get_stylesheet_directory_uri().'/images/internal-tour.png" alt="internal tour" class="tour-button">' ; ?>
							</a>
						</div>
					</section>
				</div> <!-- tours-area -->

			</main> <!-- site-main -->
<?php get_footer(); ?>