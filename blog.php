<?php
/**
Template Name: Blog
*/
 
get_header(); 

?> 

<!-- Start Bottom Header -->
  <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2"><?php  the_title( '<h1 id="titulo_pagina">', '</h1>' ); ?></h1>
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
      <div class="row">

        <!-- Start single blog -->
        <div class="<?php echo (( is_active_sidebar( 'barra_lateral' ) ) ? 'col-md-8 col-sm-8' : 'col-md-12'); ?> col-xs-12">
          <div class="row">



             <?php 
            // Check if there are any posts to display
            $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1));
            
            if ( $wpb_all_query->have_posts() ) : 
      
            $contador = 0;
            // The Loop
            while ($wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); 
                $contador++;

                if ( has_post_thumbnail() ) {
                    $the_post_thumbnail = get_the_post_thumbnail_url();
                } else { 
                    $the_post_thumbnail = get_bloginfo('template_directory')."/imagens/default-image.png";
                } 

                
                $cat_inf    = get_the_category();
                $cat_inf    = $cat_inf[0];
                $url        = get_permalink();
                $img        = $the_post_thumbnail;
                $cat_name   = get_cat_name($cat_inf->cat_ID);
                $cat_link   = get_category_link($cat_inf->cat_ID);
                $titulo     = resumo_txt(get_the_title(),45,0);
                $resumo     = resumo_txt(get_the_excerpt(),70,0);
                $data_post  = get_the_date('d M Y');
                $autor      = get_the_author();
                $autor_link      = get_site_url()."/author/".$autor;
                $id_post    = $post->ID;

                $html_categoria_cultura .='
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-blog">
                          <div class="single-blog-img">
                            <a href="blog-details.html">
                                <img src="'.$img.'" alt="">
                              </a>
                          </div>
                          <div class="blog-meta">
                            <span class="date-type">
                                <i class="fa fa-calendar"></i>'.$data_post.'
                              </span>
                          </div>
                          <div class="blog-text">
                            <h4>
                                <a href="#">'.$titulo.'</a>
                              </h4>
                            <p>
                             '.$resumo.'
                            </p>
                          </div>
                          <span>
                              <a href="'.$url.'" class="ready-btn">Leia mais</a>
                            </span>
                        </div>
                      </div>
                      <!-- End single blog -->
                  ';

                wp_reset_postdata();
             endwhile; 
             echo $html_categoria_cultura;

                if (function_exists("wp_bs_pagination")):
                    //wp_bs_pagination($the_query->max_num_pages);
                    echo "<!-- End single blog -->
                        <div class=\"blog-pagination\">";
                         wp_bs_pagination();
                    echo "</div>";
                endif;
     

            else: ?>
                <p>Não existem posts para esta categoria!</p>
            <?php endif; ?>


           
          </div>
        </div>

         <?php get_sidebar(); ?>
        <!-- End left sidebar -->

      </div>
    </div>
  </div>



<?php get_footer(); ?>
