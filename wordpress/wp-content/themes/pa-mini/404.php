
<?php get_header(); ?>
<?php /*<div id="whichTemplate">This is PAGE TEMPLATE</div>*/ ?>

<div id="main" class="group">
    <div id="posts" class="left-col">

        <div class="post group">
            <h1>404 page</h1>
            <p>Something went wrong, maybe wrong url or something..</p>
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
<?php get_footer();?>