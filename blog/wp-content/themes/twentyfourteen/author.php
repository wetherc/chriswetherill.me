<?php
require_once('header.php');
?>

            <div class="entry" id="light">
				<?php if ( have_posts() ) : ?>
					<header class="archive-header" style="width: 65%;min-width: 900px;margin-left:5%;padding:10px 0px 0px 10px;">
						<h1 class="archive-title">
							<?php
								the_post();
								printf( __( 'All posts by %s', 'twentyfourteen' ), get_the_author() );
							?>
						</h1>
						<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<div class="author-description">
							<?php the_author_meta( 'description' ); ?>
						</div>
					</header>
				<?php endif; ?>
			</div>

			<?php
					/*
					 * Since we called the_post() above, we need to rewind
					 * the loop back to the beginning that way we can run
					 * the loop properly, in full.
					 */
					rewind_posts();

					$count = 0;
					// Start the Loop.
					while ( have_posts() ) :
						if($count % 2 == 0) {
							print("<div class=\"item\" id=\"light\"><div class=\"entry\">");
							the_post();
							
							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
							print("</div></div>");
						} else {
							print("<div class=\"item\" id=\"dark\"><div class=\"entry\">");
							the_post();
							get_template_part( 'content', get_post_format() );
							print("</div></div>");
						}
						
						$count++;
					endwhile;
					// Previous/next post navigation.
					twentyfourteen_paging_nav();
	
				else :
					print("<div class=\"item\" id=\"light\"><div class=\"entry\">");
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );
					print("</div></div>");
				endif;
			?>
			
<?php
require_once('footer.php');
?>