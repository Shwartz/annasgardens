<?php
/*
* Template Name: Single Post
*/
?>
<?php get_header(); ?>
<?php // <div id="whichTemplate">This is SINGLE POST TEMPLATE</div> ?>

    <div id="main" class="group">
        <div id="posts" class="left-col">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="post">
                    <h1><?php the_title(); ?></h1>
                    <div class="byline">
                        <span class="date"><?php the_time('l F d, Y'); ?></span>
                    </div>
                    <div class="postImage">
                        <?php if( has_post_thumbnail() ) { the_post_thumbnail('medium'); } ?>
                    </div>
                    <?php the_content('Read More...'); ?>
                    <div class="naviBreadcrumb">
                        <?php previous_post_link(); ?> / <?php next_post_link(); ?>
                    </div>
                </div>

            <?php endwhile; else: ?>
                <p><?php _e('No posts were found. Sorry!'); ?></p>
            <?php endif; ?>

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