	<footer id="footer">
		<div class="container">
			<div class="footer-inner wow pixFadeUp">
				<?php
	                /* The footer widget area is triggered if any of the areas
	                * have widgets. So let's check that first.
	                *
	                * If none of the sidebars have widgets, then let's bail early.
	                */
	                if (   ! is_active_sidebar( 'first-footer-widget-area'  )
	                    && ! is_active_sidebar( 'second-footer-widget-area' )
	                    && ! is_active_sidebar( 'third-footer-widget-area'  )
	                    && ! is_active_sidebar( 'fourth-footer-widget-area' )
	                )
	                return;


	                if (   is_active_sidebar( 'first-footer-widget-area'  )
	                    && is_active_sidebar( 'second-footer-widget-area' )
	                    && is_active_sidebar( 'third-footer-widget-area'  )
	                    && is_active_sidebar( 'fourth-footer-widget-area' )
	                    ) : ?>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						  <?php dynamic_sidebar('first-footer-widget-area');?> 
					</div>
					<div class="col-lg-3 col-md-6">
						<?php dynamic_sidebar('second-footer-widget-area');?> 
					</div>
					<div class="col-lg-3 col-md-6">
						<?php dynamic_sidebar('third-footer-widget-area');?> 
					</div>
					<div class="col-lg-3 col-md-6">
						<?php dynamic_sidebar('fourth-footer-widget-area');?> 
					</div>
				</div>
				 <?php 
	                elseif ( is_active_sidebar( 'first-footer-widget-area'  )
	                    && is_active_sidebar( 'second-footer-widget-area' )
	                    && is_active_sidebar( 'third-footer-widget-area'  )
	                    && ! is_active_sidebar( 'fourth-footer-widget-area' )
	                ) : ?>
	                <div class="row">
					<div class="col-lg-4 col-md-4">
						  <?php dynamic_sidebar('first-footer-widget-area');?> 
					</div>
					<div class="col-lg-4 col-md-4">
						<?php dynamic_sidebar('second-footer-widget-area');?> 
					</div>
					<div class="col-lg-4 col-md-4">
						<?php dynamic_sidebar('third-footer-widget-area');?> 
					</div>
				</div>
				 <?php
	                elseif ( is_active_sidebar( 'first-footer-widget-area'  )
	                    && is_active_sidebar( 'second-footer-widget-area' )
	                    && ! is_active_sidebar( 'third-footer-widget-area'  )
	                    && ! is_active_sidebar( 'fourth-footer-widget-area' )
	            ) : ?>
	            <div class="row">
	                <div class="col-lg-6 col-md-6 col-sm-6">
	                    <?php dynamic_sidebar('first-footer-widget-area');?>  
	                </div>

	                <div class="col-lg-6 col-md-6 col-sm-6">
	                    <?php dynamic_sidebar('second-footer-widget-area');?> 
	                </div>
	            </div>

	             <?php
	                elseif ( is_active_sidebar( 'first-footer-widget-area'  )
	                    && ! is_active_sidebar( 'second-footer-widget-area' )
	                    && ! is_active_sidebar( 'third-footer-widget-area'  )
	                    && ! is_active_sidebar( 'fourth-footer-widget-area' )
	                ) :
	                ?>
	                <div class="row">
	                    <div class="col-lg-12 col-md-12 col-sm-12">
	                       <?php dynamic_sidebar('first-footer-widget-area');?>  
	                	</div>
	                <?php 
	                //end of all sidebar checks.
	                endif;?>
	                </div>
	                
			<div class="site-info">
				<div class="copyright">
					<p><?php echo esc_html__( '© 2020 Tous droits récervés | Conçu par ', 'gavicole' ); ?><a href="#" target="_blank">ENYO#WEB</a></p>
				</div>
			</div>
		</div>
	</footer>

   </div>
    <?php wp_footer(); ?>	
    </boby>
</html>