<?php
/**
 * Created by JetBrains PhpStorm.
 * User: andris
 * Date: 13.13.3
 * Time: 07:46
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="searchbar">
    <form name="search" method="get" action="<?php bloginfo('url'); ?>">
        <input placeholder="Search..." class="searchInput" type="text" name="s" />
        <button class="searchSubmit" title="Search" type="submit">Search</button>
    </form>
</div>