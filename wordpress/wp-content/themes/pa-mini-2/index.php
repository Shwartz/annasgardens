<?php get_header(); ?>
<?php $latestPostID = 0; ?>
    <?php // <div id="whichTemplate">This is INDEX TEMPLATE</div> ?>

    <div id="main" class="group indexTemplate">
        <div id="posts" class="left-col">
            <?php
                //creating 10 page pagination
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array('post_type' => 'post', 'posts_per_page' => 10, 'paged' => $paged);
                $wp_query = new WP_Query($args);
            ?>
            <div class="firstPost">
                <?php //On home page showing latest article full size but only if not paged (prev 10 articles)
                if ($paged == 1) {
                    global $post, $more; //$more is for the_content() to override default and show full post
                    $args = array('numberposts' => 1);
                    $latestPost = get_posts($args);
                    foreach ($latestPost as $post) : setup_postdata($post); ?>
                        <?php $latestPostID = get_the_ID(); ?>
                        <div id="post-<?php the_ID(); ?>" class="post">
                            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

                            <div class="postImage">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('promotional');
                                } ?>
                            </div>
                            <?php
                            $more = 1;
                            the_content(); ?>
                        </div>
                    <?php endforeach; ?>
                <?php } ?>
            </div>
            <?php
                //get post count and first loop count. Based on that we make two loops for two columns
                if (have_posts()) :  while (have_posts()) : the_post();
                    $postCount = $wp_query->post_count;
                endwhile;
                endif;
                $firstLoop = round($postCount / 2);
            ?>
            <?php //LOOP FIRST COLUMN
                $i = 0;
                $more = 0; //rest of articles we want to use Read More feature, so we get back to default behaviour
            ?>
            <div class="grid-1-2">
                <?php if (have_posts()) : while (have_posts()) : $i++;
                    if ($i > $firstLoop) : $wp_query->next_post(); else : the_post(); ?>
                        <?php //Latest post as promotion
                        if ($latestPostID != get_the_ID()) {
                            ?>
                            <div id="post-<?php the_ID(); ?>" class="post">
                                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

                                <div class="postImage">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium');
                                    } ?>
                                </div>
                                <?php the_excerpt(); ?>
                            </div>
                        <?php } ?>
                    <?php endif; endwhile; else: ?>
                    <p><?php _e('No posts were found. Sorry!'); ?></p>
                <?php endif; ?>
            </div>
            <div class="grid-1-2 last">
                <?php //LOOP SECOND COLUMN
                rewind_posts();
                $i = 0;
                ?>
                <?php if (have_posts()) : while (have_posts()) : $i++;
                    if ($i < $firstLoop + 1) : $wp_query->next_post(); else : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" class="post">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                            <div class="postImage">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                } ?>
                            </div>
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; endwhile; else: ?>
                    <p><?php _e('No posts were found. Sorry!'); ?></p>
                <?php endif; ?>

            </div>
            <div class="navi">
                <div class="right">
                    <?php next_posts_link('&larr; Older posts'); ?>
                    <?php previous_posts_link('Newer posts &rarr;'); ?>
                </div>
            </div>
        </div>
        <aside class="right-col">
            <?php //TODO make if has sidebar top show this tag, all pages ?>
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