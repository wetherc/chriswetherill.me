<?php
require_once('header.php');
?>
		<?php
			if ( have_posts() ) :
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
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

<?php
require_once('footer.php');
?>