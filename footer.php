      </div>
      </div>
      </main>
      <footer id="footer" itemscope="" itemtype="http://schema.org/WPFooter">
          <div id="go-to-top" title="Idź do góry"></div>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                      <?php do_action( 'before_sidebar' ); ?>
                      <?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?><?php endif; ?>

                      <?php if( have_rows('kanaly_spolecznosciowe', 'options') ): ?>
                      <ul class="socialmedia">
                          <?php while( have_rows('kanaly_spolecznosciowe', 'options') ): the_row(); 
                          $ikona = get_sub_field('ikona');
                          $link = get_sub_field('link');
                          ?>
                          <li>
                              <a href="<?php echo $link; ?>" target="_blank"><?php echo $ikona; ?></a>
                          </li>
                          <?php endwhile; ?>
                      </ul>
                      <?php endif; ?>

                  </div>
                  <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                      <?php do_action( 'before_sidebar' ); ?>
                      <?php if ( ! dynamic_sidebar( 'sidebar-6' ) ) : ?><?php endif; ?>

                  </div>
                  <div class="col-6 col-sm-6 col-md-6 col-lg-2 ">
                      <?php do_action( 'before_sidebar' ); ?>
                      <?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?><?php endif; ?>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6 col-lg-2">
                      <?php do_action( 'before_sidebar' ); ?>
                      <?php if ( ! dynamic_sidebar( 'sidebar-4' ) ) : ?><?php endif; ?>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6 col-lg-2">
                      <?php do_action( 'before_sidebar' ); ?>
                      <?php if ( ! dynamic_sidebar( 'sidebar-7' ) ) : ?><?php endif; ?>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6 col-lg-2">
                      <?php do_action( 'before_sidebar' ); ?>
                      <?php if ( ! dynamic_sidebar( 'sidebar-5' ) ) : ?><?php endif; ?>
                  </div>
              </div>
              <div class="row">
                  <?php if( get_field('wlacz_banner', 'options') == true) { ?>
                  <div class="col-md-12">
                      <div class="cta-footer">
                          <div class="des">
                              <h5><?php the_field('paragraf', 'options') ?> </h5>
                          </div>
                          <a href="<?php the_field('button_url', 'options') ?>" class="btn btn-main btn-ico-left"><i class="fas fa-phone-alt"></i><?php the_field('button_tekst', 'options') ?> </a>
                      </div>
                  </div>
                  <?php } ?>
                  <div class="col-md-12 text-center inf">
                      <hr>
                      <p><?php the_field('info_footer', 'options')?></p>
                  </div>
              </div>
          </div>
      </footer>

      <script async defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDly-SBtTw7KJVvlOPKlwtdARjiU-I95u4&callback=Function.googlePlaces"></script>
      <?php wp_footer(); ?>
      <!-- <script>
jQuery("#oogle-reviews").googlePlaces({
    placeId: "ChIJ_3v0NdEzGUcRL4ZJ0ezCkDc",
    render: ["reviews"],
    maxRows: 5,
    minRating: 2,
    textBreakLength: "1"
    // moreReviewsButtonLabel: 'Pokaż więcej opinini',
    // writeReviewButtonUrl: 'https://www.google.com/search?client=opera&q=Global+Elite+Car+⭐+Wypożyczalnia+samochodów+sportowych+i+luksusowych&sourceid=opera&ie=UTF-8&oe=UTF-8#lrd=0x471ecb77b415cef1:0x64b9af3d7a745962,1,,,',
    // writeReviewButtonLabel: 'Napisz opinię',
    // moreReviewsButtonUrl:"https://www.google.com/search?client=opera&q=Global+Elite+Car+⭐+Wypożyczalnia+samochodów+sportowych+i+luksusowych&sourceid=opera&ie=UTF-8&oe=UTF-8#lrd=0x471ecb77b415cef1:0x64b9af3d7a745962,3,,,"
});
      </script> -->
      </body>


      </html>
