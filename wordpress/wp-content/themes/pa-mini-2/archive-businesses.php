<?php
/**
 * Created by JetBrains PhpStorm.
 * User: andris
 * Date: 13.2.4
 * Time: 07:41
 * To change this template use File | Settings | File Templates.
 */
?>

<?php get_header(); ?>

<div id="main" class="group">
    <?php echo( 'Business Template' ); ?>
    <div id="directory" class="left-col">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php endwhile; else: ?>

        <?php endif; ?>
        <div class="business group">
            <div class="info">
                <h2>Morbi leo risus, porta ac consectetur</h2>
                <p>Ac, vestibulum at eros. Praesent commodo cursus
                    magna, vel scelerisque nisl consectetur et. Maecenas
                    faucibus mollis interdum. Lorem ipsum dolor sit
                    amet, consectetur adipiscing elit.</p>
                <p class="contact"><a href="#">Site</a> / <a href="#">
                        Contact</a></p>
            </div>
            <img src="images/biz.jpg" />
        </div>
    </div>
</div>

<?php get_footer(); ?>


