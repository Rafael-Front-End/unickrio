<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
global $wp_query;
get_header(); ?> 





<?php if ( have_posts() ) : ?>
<!-- Start Bottom Header -->
  <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Página de busca</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3"><?php printf( 'Resultados para: %s', get_search_query() ); ?></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Header -->


 <div class="blog-page area-padding">
    <div class="container">
      <div class="row">

        <!-- Start single blog -->
        <div class="<?php echo (( is_active_sidebar( 'barra_lateral' ) ) ? 'col-md-8 col-sm-8' : 'col-md-12'); ?> col-xs-12">
          <div class="row">


				<?php
				// Start the loop.
				while ( have_posts() ) : the_post(); ?>

					<?php
					/*
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );

				// End the loop.
				endwhile;

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );

			endif;
			?>

			<?php 
				if (function_exists("wp_bs_pagination"))
				    {
				         //wp_bs_pagination($the_query->max_num_pages);
				         wp_bs_pagination();
				}
			?> 

           
          </div>
        </div>

         <?php get_sidebar(); ?>
        <!-- End left sidebar -->

      </div>
    </div>
  </div>



<?php get_footer(); ?>
