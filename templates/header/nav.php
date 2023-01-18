<div id="navbar" class="navigacja">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav  id="nav" class="navbar navbar-expand-xl "  itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php if(get_field('logo_header', 'options')): $logoHeader = get_field('logo_header', 'options'); ?>
						<a class="navbar-brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
								<img src="<?php echo esc_url($logoHeader['url']); ?>" alt="<?php echo esc_attr($logoHeader['alt']); ?>" title="<?php echo esc_attr($logoHeader['title']); ?>" />
							</a>
						<?php else :?>
							<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel="home">
							<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
							<p class="site-title"><?php bloginfo( 'description' ); ?></p>
							</a>
					<?php endif; ?>
					
					<div class="hamburger hidden hamburger--spin js-hamburger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</div>
					
					<?php wp_nav_menu( array(
						'walker' => new WP_Bootstrap_Navwalker(),
						'theme_location'	=> 'primary',
						'depth'				=> 2, // 1 = with dropdowns, 0 = no dropdowns.
						'container'			=> 'div',
						'container_class'	=> 'collapse navbar-collapse justify-content-end',
						'container_id'		=> 'bs-example-navbar-collapse-1',
						'menu_class'		=> 'navbar-nav',
					) ); ?>
					<?php if(get_field('wlacz_nav_btn', 'options') == true) { ?>
					<div class="wr-cta d-none d-md-flex"><a href="<?php the_field('link_btn', 'options'); ?>" class="map-nav btn btn-main btn-ico-right" target="_blank"><?php the_field('tekst_btn', 'options'); ?> <i class="fas fa-map-marker-alt"></i></a></div>
				    <?php } ?>
				</nav>
			
			</div>
		</div>
	</div>
</div>	
