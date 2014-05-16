<?php
require_once('header.php');
?>
			<div class="entry" id="light">
				<?php if ( have_posts() ) : ?>
					<header class="page-header" style="width: 65%;min-width: 900px;margin-left:5%;padding:10px 0px 0px 10px;">
						<h1 class="page-title">
							<?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?>
						</h1>
					</header><!-- .page-header -->
			</div>
			
			<?php
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