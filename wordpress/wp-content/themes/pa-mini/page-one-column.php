<?php
/*
 * Template Name: One Column
 */
?>
<?php get_header(); ?>
    <?php //<div id="whichTemplate">This is PAGE-ONE-COLUMN TEMPLATE</div> ?>

    <div id="main" class="group">
<!--        <div id="posts" class="left-col">-->
        <div id="posts" class="full-col">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="post group">
                    <h1><?php the_title(); ?></h1>
                    <div class="postImage">
                        <?php if( has_post_thumbnail() ) { the_post_thumbnail('promotional'); } ?>
                    </div>
                    <?php the_content('Read More...'); ?>
                </div>

            <?php endwhile; else: ?>
                <p><?php _e('No posts were found. Sorry!'); ?></p>
            <?php endif; ?>

        </div>



    </div>

<?php get_footer(); ?>