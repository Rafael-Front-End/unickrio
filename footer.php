 <?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Under
 */
?> 



<!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <?php dynamic_sidebar('rodape');?>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <a class="navbar-brand page-scroll sticky-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>/" class='logo_site'>
                    <img class="img-responsive" alt="<?php echo( get_bloginfo( 'title' ) ); ?>"src="http://dev.zflag.net/wp-content/uploads/2019/05/logo_rodape.png">
                  </a>
                </div>

                <p>Nós vivemos em um mundo digital com milhões de possibilidades.
Estar por dentro do que acontece no mundo, das novas tecnologias te fará estar um passo a frente dos outros.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="https://www.facebook.com/jose.linhares.338"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="https://www.iclick.site/PROJECT-8Qte1ADf/jose.linhares@gmail.com"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="https://www.iclick.site/PROJECT-8Qte1ADf/apresentacao#link"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="https://office.unick.forex/cadastre-se/jose0463"><i class="fa fa-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12">
          </div>

          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>FALE COM O CONSULTOR JOSÉ LINHARES VIA WHATSAPP</h4>
                <p>
                  O propósito da unické ensinar o maior número de pessoas a investir cada vez melhor. 
                </p>
                <div class="footer-contacts">
                  <p><span><i class="fa fa-whatsapp"></i>Tel:</span> +55 (21) 99468-5416</p>
                  <p><span><i class="fa fa-envelope-o"></i>Email:</span> jose.linhares@gmail.com </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>UnickRio</strong>. Todos os direitos reservados
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Desenvolvido por <a href="https://zflag.net/">Rafael Guimarães Barbosa</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>



	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
 
	<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7&appId=1155300647892369";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    </script>


    <!-- Scrits do site -->    
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/jquery/jquery.min.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/venobox/venobox.min.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/knob/jquery.knob.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/wow/wow.min.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/parallax/parallax.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/easing/easing.min.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/appear/jquery.appear.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/lib/isotope/isotope.pkgd.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <script src="<?php bloginfo( 'template_directory' ); ?>/contactform/contactform.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/js/main.js"></script>
    <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/script.js" language="javascript"></script>

    

</body>
</html>
  