<?php
/**
*
* Template name: Home
*/
get_header(); ?>
<article id="page-<?php the_ID(); ?>" class="col-md-12 hentry">
    <?php if (have_posts()) :
        while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</article>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyD1cY3t0qS0AlAcYRqMXl_B7prMDjj1rwI"></script> -->
<?php get_footer(); ?>
