<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

 if ( has_post_thumbnail() ) {
        $the_post_thumbnail = "background-image: url(".get_the_post_thumbnail_url()."); ";
    } else { 
        $the_post_thumbnail = "";
    } 

?>
 <!-- Start Bottom Header -->
  <div class="header-bg page-area" style="<?php echo $the_post_thumbnail; ?>">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
               <?php the_title( '<h1 id="titulo_pagina">', '</h1>' ); ?>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3"></h2>
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
                <?php  the_content(); ?>
        </div>
    </div>