<?php get_header(); ?>
    <?php // <div id="whichTemplate">This is SEARCH PAGE TEMPLATE</div> ?>

    <div id="main" class="group">
        <div id="posts" class="left-col">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="post group">
                    <h3>
                        <a href="<?php the_permalink() ?>"
                           title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <?php the_excerpt(); ?>
                </div>

            <?php endwhile; ?>
                <div class="nav-previous alignleft"><?php next_posts_link('<<<<<'); ?></div>
                <div class="nav-next alignright"><?php previous_posts_link('>>>>>'); ?></div>

            <?php else: ?>
                <div class="post group">
                    <h3><?php _e('No posts were found. Sorry!'); ?></h3>
                </div>
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