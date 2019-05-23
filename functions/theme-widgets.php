<?php



// http://g1.globo.com/sao-paulo/sao-jose-do-rio-preto-aracatuba/noticia/2016/11/equipe-da-tv-tem-sofre-ameaca-em-reportagem-sobre-morte-em-motel.html
function remove_text_widget() {//remove o widget padrão text para ser adicionar o novo
  unregister_widget('WP_Widget_Text');
  unregister_widget('WP_Widget_Tag_Cloud'); 
}  
    
add_action( 'widgets_init', 'remove_text_widget' );


/* Widgetable Functions  */
 
function under_widgets_init() {

  register_sidebar(array(
    'id' => 'pagina_inicial',
    'name'=>_('Página Inicial'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => ''
  ));

  register_sidebar(array(
    'name' => _('Barra lateral'),
    'id' => 'barra_lateral',
    'before_widget' => '<div class="single-blog-page"><div class="left-blog">',
    'after_widget' => '</div></div>',
    'before_title' => '', 
    'after_title' => ''
  ));   
  register_sidebar(array(
    'id' => 'rodape',
    'name'=>'Rodapé',
    'before_widget' => '<li id="%1$s" class="%2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
  ));

}
add_action( 'widgets_init', 'under_widgets_init' );

require('category_widget.php');


/* More About Us Widget */
class banner extends WP_Widget
{
    function __construct()
    {
        parent::__construct("banner", "Zflag Banner/Imagem", array('description' => "Adicione uma imagem ou um texto com link",'customize_selective_refresh' => true));
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }

    /**
    * Upload the Javascripts for the media uploader
    */
    public function upload_scripts()
    {
      wp_enqueue_script('media-new');
      wp_enqueue_script('thickbox');
      wp_enqueue_script('upload_media_widget',get_template_directory_uri().'/js/upload-media.js',array('jquery'));
      wp_enqueue_style('thickbox');
      wp_enqueue_script( 'media-upload' );
      wp_enqueue_media();

    }


  public function widget($args, $instance)
  {
    echo $args["before_widget"];

    if(isset($instance['title'])){
        $title = apply_filters('widget_title', $instance["title"]);
    }
        if(!empty($instance['link']))
        {
            echo '<a href="'.$instance['link'].'" target="_blank" class="banner imagem">';
        }
        else if(!empty($instance['image'])) 
        {
            echo '<a href="'.$instance['image'].'" rel="lightbox-0" class="banner imagem">';
        }
        if(!empty($instance['title'])){
            echo "<h3>".$args['before_title'] . $title . $args["after_title"]."</h3>";
        } 

        if(!empty($instance['image'])){
            $largura  = ((!empty($instance['largura'])) ? "width:{$instance['largura']};" : "");
            $altura   = ((!empty($instance['altura'])) ? "height:{$instance['altura']};" : "");
            echo '<img style="'.$largura.' '.$altura.'" class="img-responsive" src="'.$instance['image'].'" />';
        }
        if(!empty($instance['link']) || !empty($instance['image']))
        {
            echo '</a>';
        }
      
      echo $args["after_widget"];
  }
 
  public function form($instance)
  {
    if(isset($instance['link']))
    {
      $link = $instance['link'];
    }

    if(isset($instance['largura']))
    {
      $largura = $instance['largura'];
    }

    if(isset($instance['altura']))
    {
      $altura = $instance['altura'];
    }

    if(isset($instance['title']))
    {
      $title = $instance['title'];
    }

    $image = '';
    if(isset($instance['image']))
    {
        $image = $instance['image'];
    }

    ?>

        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>" ><b> <?php _e("Link:"); ?></b></label>
            <input type='text' class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo esc_attr($link); ?>">
            <div style="font:12px; color:#666;"> Caso não tenha um link deixe em branco </div>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>" ><b> <?php _e("Titulo:"); ?></b></label>
            <input type='text' id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat" value="<?php echo esc_attr($title); ?>">
            <div style="font:12px; color:#666;"> Este título será exibido no banner!<br/>Caso não queira exibir o título deixo o campo em branco.</div>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><b><?php _e( 'Imagem:' ); ?></b></label>
            <input name="<?php echo $this->get_field_name('image'); ?>" id="<?php echo $this->get_field_id('image'); ?>" class="widefat image-uploaded-x" type="text" size="36"  value="<?php echo esc_url($image); ?>" placeholder="" />
            <!--input class="upload_image_button widefat button button-primary" type="button" value="Adicionar imagem" /-->
            <div style="font:12px; color:#666;"> Adicione a url da imagem ou faça o upload da imagem no botão abaixo.</div>
        </p>
        <p>
            <label style='width:50%; float:left;' for="<?php echo $this->get_field_id('largura'); ?>"><b><?php _e( 'Largura:' ); ?></b></label>
            <label style='width:50%; float:left;' for="<?php echo $this->get_field_id('altura'); ?>"><b><?php _e( 'Altura:' ); ?></b></label>
            <input style='width:48%; float:left;' name="<?php echo $this->get_field_name('largura'); ?>" id="<?php echo $this->get_field_id('largura'); ?>" type="text" size="36"  value="<?php echo esc_attr($largura); ?>" placeholder="" />
            <input style='width:48%; float:left;'name="<?php echo $this->get_field_name('altura'); ?>" id="<?php echo $this->get_field_id('altura'); ?>" type="text" size="36"  value="<?php echo esc_attr($altura); ?>" placeholder="" />
        </p>
        <p style="font:12px; color:#666;">Deixe o campo vazio para manter a altura ou largura real da imagem.<br> Para definir o tamanho use pixels exemplo '250px' com 'px' no final ou porcentagem '100%' com % no final do valor.</p>
    <?php

  }

  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['link']     = (!empty($new_instance['link'])    ?   strip_tags($new_instance['link'])  : '');
    $instance['title']    = (!empty($new_instance['title'])   ?   strip_tags($new_instance['title']) : '');
    $instance['image']    = (!empty($new_instance['image'])   ?   strip_tags($new_instance['image']) : '');
    $instance['largura']  = (!empty($new_instance['largura'])   ?   strip_tags($new_instance['largura']) : '');
    $instance['altura']   = (!empty($new_instance['altura'])   ?   strip_tags($new_instance['altura']) : '');
    return $instance;
  }

}

add_action("widgets_init",function(){register_widget("banner"); });




require('widget_about_area.php');
require('widget_parallaxy.php');
require('widget_parallaxy_reviews.php');
require('widget_slide_pagina_inicial.php');
require('widget_servicos.php');
require('widget_planos.php');
require('widget_texto.php');
require('widget_galeria.php');
require('widget_posts_recentes.php');




