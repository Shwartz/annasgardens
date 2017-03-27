<?php get_header(); ?>
<?php // <div id="whichTemplate">This is PAGE TEMPLATE</div> ?>

    <div id="main" class="group">
        <div id="posts" class="left-col">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="post group">
                    <h1><?php the_title(); ?></h1>

                    <?php if( has_post_thumbnail() ) { ?>
                    <div class="postImage">
                        <?php the_post_thumbnail('promotional'); ?>
                    </div>
                    <?php } ?>
                    <?php the_content('Read More...'); ?>
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