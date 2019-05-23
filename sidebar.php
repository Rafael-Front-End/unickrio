<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen 
 * @since Twenty Fifteen 1.0
 */ 

	if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'barra_lateral' )  ) : ?>




			<?php if ( is_active_sidebar( 'barra_lateral' ) ) : ?>
				
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          			<div class="page-head-blog">
           				<?php dynamic_sidebar( 'barra_lateral' ); ?>
          			</div>
        		</div>
			<?php endif; ?>


<?php endif; ?>


	
