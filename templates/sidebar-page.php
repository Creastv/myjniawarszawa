<?php
/**
*
* Template name: Prawa lewa
*/
 get_header(); ?>

<article id="page-<?php the_ID(); ?>" class="page-content col-sm-12 col-md-8 col-xl-8 hentry order-md-1 ">
    <?php if (have_posts()) :
        while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; ?>
    <?php endif; ?>
</article>
<aside class="col-sm-4 col-md-4 col-xl-4">
    <div class="page-sidebar">
        <?php do_action( 'before_sidebar' ); ?>
        <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?><?php endif; ?>
    </div>
</aside>



<?php get_footer(); ?>
