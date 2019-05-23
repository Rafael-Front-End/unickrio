<?php
/**
 * @package Under
 */   


 if ( has_post_thumbnail() ) {
        $the_post_thumbnail = "background-image: url(".get_the_post_thumbnail_url()."); ";
    } else { 
        $the_post_thumbnail = "";
    } 
    setPostViews(get_the_ID());
    $Categoria = get_the_category(); 
    $Nome_categoria = $Categoria[0] -> cat_name;
    $Id_categoria = $Categoria[0] -> cat_ID;
    $Id_categoria1 = $Categoria[1] -> cat_ID;
    $link_categoria = get_category_link($Id_categoria);
    $autor   = get_the_author();
    $autor_link = get_author_posts_url(get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ));
    $contador_img_galeria = 0;
    $id_post = get_the_ID();
    $views = getPostViews($id_post);
    $img   = $the_post_thumbnail; 
    $tipo_media = get_post_meta($id_post, "meta-box-tipo-featured_media", true);
    $url_media = get_post_meta($id_post, "meta-box-url-featured_media", true);
    

  
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
               <?php  the_title( '<h1>', '</h1>' ); ?>
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
            <div class="<?php echo (( is_active_sidebar( 'barra_lateral' ) ) ? 'col-md-8 col-sm-8' : 'col-md-12'); ?>  col-xs-12">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <?php  the_content(); ?>


                </div>
              </div>
            </div>

                        <?php get_sidebar(); ?>
            <!-- End left sidebar -->
          </div>
        </div>
    </div>
