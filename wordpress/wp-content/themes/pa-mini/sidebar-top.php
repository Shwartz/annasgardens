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
    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Top Advert Sidebar' ) ) : ?>
    <!-- THIS IS EMPTY TOP WIDGET -->
    <?php endif; ?>
</div>