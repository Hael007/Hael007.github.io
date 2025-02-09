<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsis
 */
use Newsis\CustomizerDefault as NI;
get_header();
?>
<div id="theme-content">
	<?php
		/**
		 * hook - newsis_before_main_content
		 * 
		 */
		do_action( 'newsis_before_main_content' );
	?>
	<main id="primary" class="site-main <?php echo esc_attr( 'width-' . newsis_get_section_width_layout_val() ); ?>">
		<div class="newsis-container">
           	<div class="row">
			   <div class="secondary-left-sidebar">
					<?php
						get_sidebar('left');
					?>
				</div>
           		<div class="primary-content">
					<?php
						/**
						 * hook - newsis_before_inner_content
						 * 
						 */
						do_action( 'newsis_before_inner_content' );
						
						if ( have_posts() ) : ?>
						<header class="page-header">
							<?php
								if( ! is_author() ) :
									the_archive_title( '<h1 class="page-title newsis-block-title">', '</h1>' );
									the_archive_description( '<div class="archive-description">', '</div>' );
								endif;
							?>
						</header><!-- .page-header -->
						<div class="post-inner-wrapper news-list-wrap">
							<?php
								$args['archive_post_element_order'] = NI\newsis_get_customizer_option( 'archive_post_element_order' );
								$args['archive_post_meta_order'] = NI\newsis_get_customizer_option( 'archive_post_meta_order' );
								$args['archive_page_category_option'] = NI\newsis_get_customizer_option( 'archive_page_category_option' );
								add_filter( 'excerpt_length', 'newsis_archive_excerpt_length', 999 );
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();
										/*
										* Include the Post-Type-specific template for the content.
										* If you want to override this in a child theme, then include a file
										* called content-___.php (where ___ is the Post Type name) and that will be used instead.
										*/
										get_template_part( 'template-parts/content', get_post_type(), $args );
									endwhile;
								remove_filter( 'excerpt_length', 'newsis_archive_excerpt_length', 999 );
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;
							?>
						</div>
						<?php
							if( have_posts() ) :
								/**
								 * hook - newsis_pagination_link_hook
								 * 
								 * @package Newsis
								 * @since 1.0.0
								 */
								do_action( 'newsis_pagination_link_hook' );
							endif;
						?>
				</div>
				<div class="secondary-sidebar">
					<?php
						get_sidebar();
					?>
				</div>
			</div>
		</div>

	</main><!-- #main -->
</div><!-- #theme-content -->
<?php
get_footer();
