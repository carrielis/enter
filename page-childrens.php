<?php
/**
 * Template Name: 子页面列表
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package enter
 */

get_header(); ?>

	<header class="page-header">
		<div class="wrap">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');
			}
			?>
			<?php
			the_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</div>
	</header>

	<?php

	global $post;
	if ( $post->post_parent ) {
		$children = wp_list_pages( "title_li=&child_of=" . $post->post_parent . "&echo=0" );
	} else {
		$children = wp_list_pages( "title_li=&child_of=" . $post->ID . "&echo=0" );
	}
	if ( $children ) {
		?>
		<div class="page-subtitle">
			<div class="wrap">
				<ul><?php echo $children; ?></ul>
			</div>
		</div>

	<?php } ?>

	<div class="wrap">
		<div class="pure-g row">

			<div id="primary" class="pure-u-1">
				<main id="main" class="col site-main" role="main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'wizhi/content', 'page' );

						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile;
					?>

				</main>
			</div>

		</div>
	</div>

<?php get_footer(); ?>