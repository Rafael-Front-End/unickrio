         <?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */ 

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
                $html_link_cat = "<a class='titlecat' href='{$cat_link}'>{$cat_name}</a>";


    
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



  	echo $html_categoria_cultura;
?>






	


