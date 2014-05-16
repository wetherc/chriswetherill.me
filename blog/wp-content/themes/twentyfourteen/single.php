<?php
require_once('header.php');
?>

            <div class="item" id="light">
                <div class="entry">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						print("<hr style=\"margin: 0;min-width: 600px;width:675px;padding: 0;\">");
						comments_template();
					}
					
					// Previous/next post navigation.
					twentyfourteen_post_nav();
				endwhile;
			?>
				</div>
			</div>

<?php
require_once('footer.php');
?>