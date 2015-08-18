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

<?php get_header();
			
			$hotel_region = get_post_meta( get_the_ID(), '_naiau_hotel_region', true );
			$hotel_degree = get_post_meta( get_the_ID(), '_naiau_hotel_degree', true );
			$hotel_slides = get_post_meta( get_the_ID(), '_naiau_file_list', true );

			?>

			<main class="site-main">

				

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" class="single-hotel" role="article">

							<section class="layout">
								
								<ul class="hotel-detail">
									<li class="hotel-title "><?php the_title(); ?></li>
									<li class="hotel-region">
										<?php echo __('Hotel Region : ','naiau').$hotel_region; ?>
									</li>
									
									<li class="hotel-degree">
										<?php echo __('Hotel Degree : ','naiau');?>
										<img class="hotel-single-rate" src='<?php echo get_stylesheet_directory_uri()."/images/star".$hotel_degree.".png"; ?>'/>
									</li>
								</ul>
							
							</section>
						<section class="layout">
							
							<div class="hotel-content">
							
						
							<div id="slider_container" style="position: relative; top: 0px; left: 0px; width: 800px;
						        height: 556px; background: #191919; overflow: hidden;">

						        <!-- Loading Screen -->
						        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
						            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
						                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
						            </div>
						            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
						                top: 0px; left: 0px;width: 100%;height:100%;">
						            </div>
						        </div>

						        <!-- Slides Container -->
						        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 800px; height: 456px; overflow: hidden;">
						            
						            	<?php 
						            		$files = get_post_meta( get_the_ID(), '_naiau_image_list', 1 );
										    //var_dump($file);
										    
										    // Loop through them and output an image
										    foreach ( (array) $files as $attachment_id => $attachment_url ) {
										       echo '<div>' ;
										        $thumb_url = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
										        $image_url = wp_get_attachment_image_src( $attachment_id, 'full' );
										        echo '<img u="image" src="'.$image_url[0].'" />';
										        echo '<img u="thumb" src="'.$thumb_url[0].'" />';
										        echo '</div>';
										    }
										    
						            	?>
						                
						           
						            
						        </div>

						        <span u="arrowleft" class="jssora05l" style="top: 158px; left: 8px;">
						        </span>
						        <!-- Arrow Right -->
						        <span u="arrowright" class="jssora05r" style="top: 158px; right: 8px">
						        </span>
						                
						        <!--#region Thumbnail Navigator Skin Begin -->
						        <!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-jquery.html -->
						        
						        <!-- thumbnail navigator container -->
						        <div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
							            <!-- Thumbnail Item Skin Begin -->
							            <div u="slides" style="cursor: default;">
							                <div u="prototype" class="p">
							                    <div class=w><div u="thumbnailtemplate" class="t"></div></div>
							                    <div class=c></div>
							                </div>
							            </div>
							            <!-- Thumbnail Item Skin End -->
							        </div>
								</div> <!-- slider_container -->
						
							<section class="hotel-information cf">
								<?php the_content(); ?>
								
							</section> <!-- end article section -->
						</div> <!-- hotel-content -->	
					</section> <!-- layout -->
				</article>

							<?php endwhile; ?>

							<?php else : ?>
								<section class="layout">
									<article id="post-not-found" class="hotel-slideshow cf">
										<header class="tour-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'naiau' ); ?></h1>
										</header>
										<section class="tour-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'naiau' ); ?></p>
										</section>
										<footer class="tour-footer">
											<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'naiau' ); ?></p>
										</footer>
									</article>
								</section>	
							<?php endif; ?>

						</main>

				
<?php get_footer(); ?>
