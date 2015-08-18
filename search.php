<?php get_header(); ?>

			<main id="main" class="site-main cf" role="main">
				<section class="layout">
						<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'naiau' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="entry-header article-header">

									<h3 class="search-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                  						<p class="byline entry-meta vcard">
                    							<?php printf( __( 'Posted %1$s by %2$s', 'naiau' ),
                   							    /* the time the post was published */
                   							    '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                      							    /* the author of the post */
                       							    '<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
                  						</p>

								</header>

								<section class="entry-content">
										<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'naiau' ) . '</span>' ); ?>

								</section>

								<footer class="article-footer">

									<?php if(get_the_category_list(', ') != ''): ?>
                  					<?php printf( __( 'Filed under: %1$s', 'naiau' ), get_the_category_list(', ') ); ?>
                  					<?php endif; ?>

                 					<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'naiau' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> <!-- end article footer -->

							</article>

						<?php endwhile; ?>

								<?php naiau_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'naiau' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Try your search again.', 'naiau' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the search.php template.', 'naiau' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
						</section>
					</main>

							
					

<?php get_footer(); ?>
