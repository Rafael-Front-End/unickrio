<?php
/**
Template Name: Blog
*/
 
get_header(); 

    echo '<header id="pagina_cabecalho"><div class="container"><div class="col-md-12">';
        the_title( '<h1 id="titulo_pagina">', '</h1>' );
    echo '</div></div></header>';
?> 
<main id="pagina_categoria" class="site-main container" role="main">
    <div class="col-md-8">
        <div class="tipo_3 destaque_categorias">
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
                $html_link_cat = "<a class='titlecat' href='{$cat_link}'>{$cat_name}</a>";

                $html_categoria_cultura .='
                    <div class="bloco_post esquerda col-md-6">
                      '.$html_link_cat.'
                      <a href="'.$url.'" class="thumbnail_post" style="background-image:url('.$img.');"></a>
                      <span style="'.$cor_txt.$fontes.'">'.$titulo.'</span>
                      <p>Por <a href="'.$autor_link.'" class="author">'.$autor.'</a> | '.$data_post.'</p>
                    </div>
                  ';

                wp_reset_postdata();
             endwhile; 
             echo $html_categoria_cultura;

                if (function_exists("wp_bs_pagination")):
                
                         //wp_bs_pagination($the_query->max_num_pages);
                    echo "<div class='clearfix'></div><div class='col-md-12'>";
                         wp_bs_pagination();
                    echo "</div>";
                endif;
     

            else: ?>
                <p>Não existem posts para esta categoria!</p>
            <?php endif; ?>

        </div>
    </div>
    <?php get_sidebar(); ?>
</main>
 <div class="col-md-12 social_footer">
    <h3>Também estamos aqui</h3>
    <p>Acompanhe nosso trabalho em outras plataformas</p>
    <div id="rodape_social_icons" class="social-links">
      <a target="_blank" href="https://www.facebook.com/designeficaz/"><img class="img-responsive" src="http://localhost/wordpress/wp-content/themes/designeficaz/imagens/espera/redes-sociais-facebook.jpg"></a>
      
      <a target="_blank" href="https://www.instagram.com/designeficaz/"><img class="img-responsive" src="http://localhost/wordpress/wp-content/themes/designeficaz/imagens/espera/redes-sociais-instagram.jpg"></a>
      
      <a target="_blank" href="https://www.behance.net/danieldesouz4"><img class="img-responsive" src="http://localhost/wordpress/wp-content/themes/designeficaz/imagens/espera/redes-sociais-behance.jpg"></a>
      <a target="_blank" href="https://www.colab55.com/@danieldesouz4"><img class="img-responsive" src="http://localhost/wordpress/wp-content/themes/designeficaz/imagens/espera/redes-sociais-colab55.jpg"></a>
      
      
    </div>
<?php get_footer(); ?>
