<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dellow
 */

get_header(); ?>

    <div id="primary-mono" class="content-area  <?php do_action('dellow_primary-width') ?>">
		<main id="main" class="site-main" role="main">

            <header class="page-header">
                <?php
                the_archive_title( '<h2 class="page-title">', '</h2>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    /* Include the Post-Format-specific template for the content.
                     */
                    do_action('dellow_blog_layout');
                    ?>

                <?php endwhile; ?>

                <?php //the_posts_pagination( array( 'mid_size' => 2 ));; ?>

            <?php else : ?>

                <?php get_template_part( 'modules/content/content', 'none' ); ?>

            <?php endif; ?>

		</main><!-- #main -->

        <?php dellow_content_nav( 'nav-below' ); ?>

    </div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
