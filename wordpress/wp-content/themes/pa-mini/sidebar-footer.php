<?php
/**
 * Created by JetBrains PhpStorm.
 * User: andris
 * Date: 13.20.3
 * Time: 07:25
 * To change this template use File | Settings | File Templates.
 */

?>
<div class="widget-wrap">
    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Sidebar' ) ) : ?>
        <!-- THIS IS EMPTY RIGHT WIDGET -->
        <p>Add necessary footer content through widget area. Admin > Appearance > Widgets > Footer Sidebar</p>
    <?php endif; ?>
</div>