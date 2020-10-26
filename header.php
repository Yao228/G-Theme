<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Required meta tags -->
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    </head>
    <boby id="home-version-1" class="home-version-4" data-style="default">
    	<a href="#main_content" data-type="section-switch" class="return-to-top">
    		<i class="fa fa-chevron-up"></i>
    	</a>
    	<div class="page-loader" style="display: none;">
    		<div class="loader">
    			<div class="blobs">
    				<div class="blob-center"></div>
    				<div class="blob"></div>
    				<div class="blob"></div>
    				<div class="blob"></div>
    				<div class="blob"></div>
    				<div class="blob"></div>
    				<div class="blob"></div>
    			</div>
    			<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
    				<defs>
    					<filter id="goo">
	    					<feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
	    					<feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"></feColorMatrix>
	    					<feBlend in="SourceGraphic" in2="goo"></feBlend>
	    				</filter>
	    			</defs>
	    		</svg>
	    	</div>
	    </div>
	    <div id="main_content">
	    	<header class="site-header header_trans-fixed" data-top="992">
	    		<div class="container">
	    			<div class="header-inner">
	    				<div class="toggle-menu">
	    					<span class="bar"></span> 
	    					<span class="bar"></span> 
	    					<span class="bar"></span>
	    				</div>
	    					<div class="site-mobile-logo">
	    						<?php 
                            	if ( function_exists( 'the_custom_logo' ) ) {
		                                the_custom_logo();
		                            }
		                        ?>
	    					</div>
	    					<nav class="site-nav nav-dark">
	    						<div class="close-menu">
	    							<span>Close</span> <i class="ei ei-icon_close"></i>
	    						</div>
	    						<div class="site-logo">
	    							<?php 
			                            if ( function_exists( 'the_custom_logo' ) ) {
			                                the_custom_logo();
			                            }
			                        ?>
	    						</div>
	    						<div class="menu-wrapper" data-top="992" style="padding-top: 0px;">
	    							<?php 
		                                wp_nav_menu( 
		                                    array( 
		                                        'theme_location' => 'primary',
		                                        'menu_class' => 'site-main-menu', // ul class
		                                        'container' => 'ul'
		                                        ) 
		                                ); 
		                            ?>

	    							<div class="nav-right">
	    								<a href="#" class="nav-btn"><?php echo esc_html__( 'Demander une démo', 'gavicole' ); ?></a>
	    							</div>
	    						</div>
	    					</nav>
	    			</div>
	    		</div>
	    	</header>
	    