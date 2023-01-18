<?php get_header(); ?>

    <!-- <div class=" row page-content " data-aos="fade-up" data-aos-duration="1200"> -->
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php if ($post->post_type == 'nasza-flota') { ?>
                <div class="col-md-3">
                <?php get_template_part( 'templates/content-car', get_post_format() ); ?>
                </div>
            <?php } else { ?>
                <?php get_template_part( 'templates/content-post', get_post_format() ); ?>
            <?php } ?>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <h1 class="text-center">Nic nie znaleziono</h1>
                    <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
           
        <?php endif; ?>
    <!-- </div> -->

<?php get_footer(); ?>
