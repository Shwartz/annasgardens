<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<?php // <div id="whichTemplate">This is ARCHIVE TEMPLATE</div> ?>

    <div id="main" class="group">
        <div id="posts" class="left-col">
            <div class="archives post">
                <h3 class="page-title archiveTitle">
                    <?php if ( is_day() ) : ?>
                        <?php printf( __( 'Dienas arhīvs: <span>%s</span>', 'pa-mini' ), get_the_date() ); ?>
                    <?php elseif ( is_month() ) : ?>
                        <?php printf( __( 'Mēneša arhīvs: <span>%s</span>', 'pa-mini' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'pa-mini' ) ) ); ?>
                    <?php elseif ( is_year() ) : ?>
                        <?php printf( __( 'Gada arhīvs: <span>%s</span>', 'pa-mini' ), get_the_date( _x( 'Y', 'yearly archives date format', 'pa-mini' ) ) ); ?>
                    <?php else : ?>
                        <?php _e( 'Blog Archives', 'pa-mini' ); ?>
                    <?php endif; ?>
                </h3>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <div id="post-<?php the_ID(); ?>" class="archivePosts">
                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <div class="byline">
                            <span class="date"><?php the_time('l F d, Y'); ?></span>
                        </div>
                        <div class="postImage">
                            <?php if( has_post_thumbnail() ) { the_post_thumbnail('medium'); } ?>
                        </div>
                        <?php the_content('Lasīt vairāk...'); ?>
                    </div>

                <?php endwhile; else: ?>
                    <p><?php _e('No posts were found. Sorry!'); ?></p>
                <?php endif; ?>

            </div>

        </div>

        <aside class="right-col">

            <div class="grid-1-1 last">
                <?php get_sidebar('top'); ?>
            </div>

            <div class="grid-1-2">
                <?php get_sidebar(); ?>
            </div>

            <div class="grid-1-2 last">
                <?php get_sidebar('right'); ?>
            </div>

        </aside>

    </div>



<?php get_footer(); ?>