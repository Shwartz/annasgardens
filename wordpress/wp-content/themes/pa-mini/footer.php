<?php
/* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package WordPress
* @subpackage PA-mini-01
*/
?>
</div>    <!-- End Main Area -->
<!--end container-->
</div>


</div>
<!--Footer Information-->
<footer class="group">
    <div class="_footer-inner">
        <?php pa_media_hook(); ?>
        <?php get_sidebar('footer'); ?>
    </div>
</footer>
<!-- End Footer Information -->
<?php wp_footer(); ?>
</body>
</html>

