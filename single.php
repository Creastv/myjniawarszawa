<?php get_header(); ?>
<div class="page-content page-content-single">
    <div class="page-main-content">
    <article id="page-<?php the_ID(); ?>" class="hentry">
        <?php if (have_posts()) :
            while ( have_posts() ) : the_post(); ?>
              
                <div class="entry-post-categories">
					<?php the_category( ', ' ); ?>
                </div>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-post-meta">
                    <div class="entry-author-meta">
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                            <?php the_author(); ?>
                        </a>
                    </div>
                    <div class="post-date">
                        <span class="far fa-calendar meta-icon"></span>
                        <?php echo get_the_date(); ?>
                    </div>
                    <div class="post-comments-number">
                        <span class="far fa-comment-alt meta-icon"></span>
                        <?php
                        $comment_count = get_comments_number();
                        $comment_count .= $comment_count > 1 ? esc_html__( ' Comments', 'aeroland' ) : esc_html__( ' Comment', 'aeroland' );
                        ?>
                        <a href="#comments" class="smooth-scroll-link"><?php echo esc_html( $comment_count ); ?></a>
                    </div>
                </div>
                <div class="entry-post-feature ">
                    <?php the_post_thumbnail('medium_large'); ?>
                </div>
                <?php the_content(); ?>
                <div class="entry-footer">
                    <?php if(!empty(the_tags())):?>
                    <div class="entry-post-tags">
							<div class="tagcloud-icon">
								<span class="fa fa-tags"></span>
							</div>
							<div class="tagcloud">
								<?php the_tags( '', ', ', '' ); ?>
							</div>
                        </div>
                    <?php endif;?>
                </div>
                

               <div id="author-bio">
                <?php 
                    $av_id = get_the_author_meta('ID');
                    $im = get_field('avatar_', 'user_'. $av_id); ?>
                    <?php  if (!empty( $im )) { ?>
                        <div id="author-avatar"><img style="max-width:60px; height:auto;" src="<?php echo esc_url($im['url']); ?>" alt="<?php echo esc_attr($im['alt']); ?>" /></div>
                    <?php } elseif (get_avatar( get_the_author_meta( 'ID' ), 60 )) { ?>
                        <div id="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?></div>
                    <?php } ?>
                    <div id="author-details">
                        <div class="author-head">
                            <div class="title">
                            <h2><?php the_author_posts_link(); ?></h2>
                            <i><?php $author_id = get_the_author_meta('ID'); the_field('pozycja', 'user_'. $author_id); ?></i>
                            </div>
                            
                            <div class="links">
                            <?php  if (get_the_author_meta('user_url') ) { ?>
                            <a href="<?php the_author_meta('user_url'); ?>" class="author-website" target="_blank">
                            <i class="fas fa-link"></i>
                            </a>
                            <?php } ?>
                            <?php  if (get_the_author_meta('linkedin') ) { ?>
                            <a href="<?php the_author_meta('linkedin'); ?>" class="author-linkedin" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                            </a>
                            <?php } ?>
                            <?php  if (get_the_author_meta('facebook') ) { ?>
                            <a href="<?php the_author_meta('facebook'); ?>" class="author-facebook" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                            </a>
                            <?php } ?>
                            <?php  if (get_the_author_meta('twitter') ) { ?>
                            <a href="<?php the_author_meta('twitter'); ?>" class="author-twitter" target="_blank">
                            <i class="fab fa-twitter"></i>
                            </a>
                            <?php }?>
                            <?php  if (get_the_author_meta('instagram') ) { ?>
                            <a href="<?php the_author_meta('instagram'); ?>" class="author-instagram" target="_blank">
                            <i class="fab fa-instagram"></i>
                            </a>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="author-footer">
                           <p> <?php the_author_description(); ?></p>
                        </div>
                    </div><!-- #author-details -->
                 
                </div><!-- #author-bio -->
                
                <?php comments_template( '/comments.php' ); ?> 
            <?php endwhile; ?>
        <?php endif; ?>
    </article>
    </div>
    <div class="page-sidebar" data-aos="fade-up" data-aos-duration="1000">
    	<?php if( is_single( 5860 ) ) { ?>
        <div class="wraper-sticky">
        <?php } else { ?>
        <div class="wraper-sticky ws-n">
        <?php } ?>
        <?php do_action( 'before_sidebar' ); ?>
        <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?><?php endif; ?>
        </div>
        <?php if( is_single( 5860 ) ) { ?>
         <div class="news-blog">
        	<h2>Dołącz do newslettera</h2>
        	<p>Newsletter Gamfi to merytoryczne treści na temat grywalizacji w Twojej skrzynce. <br><b>Max 4 razy w miesiącu.</b> <br><b>Bez spamu. Bez reklam.</b></p>
         <?php echo do_shortcode('[contact-form-7 id="5955" title="Newsletter z bloga"]'); ?>
        </div>
    <?php } ?>
    </div>
</div>
<?php get_footer(); ?>