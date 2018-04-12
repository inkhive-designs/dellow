<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Dellow
 */

get_header(); ?>

    <div id="primary-mono" class="content-area  <?php do_action('dellow_primary-width') ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'dellow' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                /* Include the Post-Format-specific template for the content.
                 */
                do_action('dellow_blog_layout');
                ?>

            <?php endwhile; ?>

			<?php dellow_content_nav( 'nav-below' ); ?>

		<?php else : ?>

            <?php get_template_part( 'modules/content/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>