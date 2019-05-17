<?php
	$html = '<h2>Serviços</h2>';
	//Carrega os dados do servicos
	$tema_zflag_servicos = array();
	if(get_option('tema_zflag_servicos')){
		$tema_zflag_servicos = json_decode(get_option('tema_zflag_servicos'));
		$tema_zflag_servicos = (array) $tema_zflag_servicos;
	}

	//Edita os dados
	if(!empty($_POST['titulo']) && !empty($_POST['texto'])){
		if(!empty($_POST['id'])){
			$new_key = $_POST['id'];
		}else{
			$new_key = end(array_keys($tema_zflag_servicos));
			$new_key = $new_key == 0 || $new_key == NULL ? 1 : $new_key+1;
		}

		$tema_zflag_servicos[$new_key] = ['titulo' => $_POST['titulo'], 'link' => $_POST['link'], 'texto' => $_POST['texto'], 'icone' => $_POST['icone']];

		delete_option('tema_zflag_servicos');
		if(add_option('tema_zflag_servicos', json_encode($tema_zflag_servicos))){
			$html .= "Item Salvo";
		}
	}



	if(!empty($_GET['acao'])){
		if($_GET['acao'] == 'cadastro' || $_GET['acao'] == 'editar'){
			
			$id = NULL;
			if(!empty($_GET['id'])){
				$id = $_GET['id'];
				foreach ($tema_zflag_servicos as $key => $value) {
					if($key == $_GET['id']){
						$value = (array) $value;
						$titulo = $value['titulo'];
						$link = $value['link'];
						$texto = $value['texto'];
						$icone = $value['icone'];
					}
				}
			}
			


			$tabela_cadastro = 
			'
				<form id="salva_slide_thema_zflag" name="salvar" method="post" enctype="multipart/form-data">
				            <input type="hidden" id="id" class="form-control" required name="id" value="'.$id.'">
						<div class="form-group">
				            <label for="icone">icone</label>
				            <p>Os icones estão listados abaixo deste formulario, copie e cole o código correspondente aqui.</p>
				            <input type="text" id="icone" class="form-control" required name="icone" value="'.$icone.'">
				        </div>
						<div class="form-group">
				            <label for="titulo">Titulo</label>
				            <input type="text" id="titulo" class="form-control"  name="titulo" value="'.$titulo.'">
				        </div>						
				        <div class="form-group">
				        	<label for="link">Link</label>
				        	<p>Caso não tenha link deixe em branco.</p>
				            	<input type="text" id="link" class="form-control" name="link" value="'.$link.'">
				        </div>
				        <div class="form-group">
				            <label class="texto">Texto</label>
				            <textarea id="texto" class="form-control" rows="2" name="texto">'.stripslashes($texto).'</textarea>
				        </div>

				        <div class="form-group">
				            <button name="salvar" class="salva btn btn-primary" />
				                Salvar
				            </button>
				        </div>
					</form>

<div class="icones_fontawesome"><i class="fa fa-500px"></i><span>fa-500px</span></div>
<div class="icones_fontawesome"><i class="fa fa-address-book"></i><span>fa-address-book</span></div>
<div class="icones_fontawesome"><i class="fa fa-address-book-o"></i><span>fa-address-book-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-address-card"></i><span>fa-address-card</span></div>
<div class="icones_fontawesome"><i class="fa fa-address-card-o"></i><span>fa-address-card-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-adjust"></i><span>fa-adjust</span></div>
<div class="icones_fontawesome"><i class="fa fa-adn"></i><span>fa-adn</span></div>
<div class="icones_fontawesome"><i class="fa fa-align-center"></i><span>fa-align-center</span></div>
<div class="icones_fontawesome"><i class="fa fa-align-justify"></i><span>fa-align-justify</span></div>
<div class="icones_fontawesome"><i class="fa fa-align-left"></i><span>fa-align-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-align-right"></i><span>fa-align-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-amazon"></i><span>fa-amazon</span></div>
<div class="icones_fontawesome"><i class="fa fa-ambulance"></i><span>fa-ambulance</span></div>
<div class="icones_fontawesome"><i class="fa fa-american-sign-language-interpreting"></i><span>fa-american-sign-language-interpreting</span></div>
<div class="icones_fontawesome"><i class="fa fa-anchor"></i><span>fa-anchor</span></div>
<div class="icones_fontawesome"><i class="fa fa-android"></i><span>fa-android</span></div>
<div class="icones_fontawesome"><i class="fa fa-angellist"></i><span>fa-angellist</span></div>
<div class="icones_fontawesome"><i class="fa fa-angle-double-down"></i><span>fa-angle-double-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-angle-double-left"></i><span>fa-angle-double-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-angle-double-right"></i><span>fa-angle-double-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-angle-double-up"></i><span>fa-angle-double-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-angle-down"></i><span>fa-angle-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-angle-left"></i><span>fa-angle-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-angle-right"></i><span>fa-angle-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-angle-up"></i><span>fa-angle-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-apple"></i><span>fa-apple</span></div>
<div class="icones_fontawesome"><i class="fa fa-archive"></i><span>fa-archive</span></div>
<div class="icones_fontawesome"><i class="fa fa-area-chart"></i><span>fa-area-chart</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-circle-down"></i><span>fa-arrow-circle-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-circle-left"></i><span>fa-arrow-circle-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-circle-o-down"></i><span>fa-arrow-circle-o-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-circle-o-left"></i><span>fa-arrow-circle-o-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-circle-o-right"></i><span>fa-arrow-circle-o-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-circle-o-up"></i><span>fa-arrow-circle-o-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-circle-right"></i><span>fa-arrow-circle-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-circle-up"></i><span>fa-arrow-circle-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-down"></i><span>fa-arrow-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-left"></i><span>fa-arrow-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-right"></i><span>fa-arrow-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrow-up"></i><span>fa-arrow-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrows"></i><span>fa-arrows</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrows-alt"></i><span>fa-arrows-alt</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrows-h"></i><span>fa-arrows-h</span></div>
<div class="icones_fontawesome"><i class="fa fa-arrows-v"></i><span>fa-arrows-v</span></div>
<div class="icones_fontawesome"><i class="fa fa-asl-interpreting"></i><span>fa-asl-interpreting</span></div>
<div class="icones_fontawesome"><i class="fa fa-assistive-listening-systems"></i><span>fa-assistive-listening-systems</span></div>
<div class="icones_fontawesome"><i class="fa fa-asterisk"></i><span>fa-asterisk</span></div>
<div class="icones_fontawesome"><i class="fa fa-at"></i><span>fa-at</span></div>
<div class="icones_fontawesome"><i class="fa fa-audio-description"></i><span>fa-audio-description</span></div>
<div class="icones_fontawesome"><i class="fa fa-automobile"></i><span>fa-automobile</span></div>
<div class="icones_fontawesome"><i class="fa fa-backward"></i><span>fa-backward</span></div>
<div class="icones_fontawesome"><i class="fa fa-balance-scale"></i><span>fa-balance-scale</span></div>
<div class="icones_fontawesome"><i class="fa fa-ban"></i><span>fa-ban</span></div>
<div class="icones_fontawesome"><i class="fa fa-bandcamp"></i><span>fa-bandcamp</span></div>
<div class="icones_fontawesome"><i class="fa fa-bank"></i><span>fa-bank</span></div>
<div class="icones_fontawesome"><i class="fa fa-bar-chart"></i><span>fa-bar-chart</span></div>
<div class="icones_fontawesome"><i class="fa fa-bar-chart-o"></i><span>fa-bar-chart-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-barcode"></i><span>fa-barcode</span></div>
<div class="icones_fontawesome"><i class="fa fa-bars"></i><span>fa-bars</span></div>
<div class="icones_fontawesome"><i class="fa fa-bath"></i><span>fa-bath</span></div>
<div class="icones_fontawesome"><i class="fa fa-bathtub"></i><span>fa-bathtub</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery"></i><span>fa-battery</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-0"></i><span>fa-battery-0</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-1"></i><span>fa-battery-1</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-2"></i><span>fa-battery-2</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-3"></i><span>fa-battery-3</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-4"></i><span>fa-battery-4</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-empty"></i><span>fa-battery-empty</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-full"></i><span>fa-battery-full</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-half"></i><span>fa-battery-half</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-quarter"></i><span>fa-battery-quarter</span></div>
<div class="icones_fontawesome"><i class="fa fa-battery-three-quarters"></i><span>fa-battery-three-quarters</span></div>
<div class="icones_fontawesome"><i class="fa fa-bed"></i><span>fa-bed</span></div>
<div class="icones_fontawesome"><i class="fa fa-beer"></i><span>fa-beer</span></div>
<div class="icones_fontawesome"><i class="fa fa-behance"></i><span>fa-behance</span></div>
<div class="icones_fontawesome"><i class="fa fa-behance-square"></i><span>fa-behance-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-bell"></i><span>fa-bell</span></div>
<div class="icones_fontawesome"><i class="fa fa-bell-o"></i><span>fa-bell-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-bell-slash"></i><span>fa-bell-slash</span></div>
<div class="icones_fontawesome"><i class="fa fa-bell-slash-o"></i><span>fa-bell-slash-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-bicycle"></i><span>fa-bicycle</span></div>
<div class="icones_fontawesome"><i class="fa fa-binoculars"></i><span>fa-binoculars</span></div>
<div class="icones_fontawesome"><i class="fa fa-birthday-cake"></i><span>fa-birthday-cake</span></div>
<div class="icones_fontawesome"><i class="fa fa-bitbucket"></i><span>fa-bitbucket</span></div>
<div class="icones_fontawesome"><i class="fa fa-bitbucket-square"></i><span>fa-bitbucket-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-bitcoin"></i><span>fa-bitcoin</span></div>
<div class="icones_fontawesome"><i class="fa fa-black-tie"></i><span>fa-black-tie</span></div>
<div class="icones_fontawesome"><i class="fa fa-blind"></i><span>fa-blind</span></div>
<div class="icones_fontawesome"><i class="fa fa-bluetooth"></i><span>fa-bluetooth</span></div>
<div class="icones_fontawesome"><i class="fa fa-bluetooth-b"></i><span>fa-bluetooth-b</span></div>
<div class="icones_fontawesome"><i class="fa fa-bold"></i><span>fa-bold</span></div>
<div class="icones_fontawesome"><i class="fa fa-bolt"></i><span>fa-bolt</span></div>
<div class="icones_fontawesome"><i class="fa fa-bomb"></i><span>fa-bomb</span></div>
<div class="icones_fontawesome"><i class="fa fa-book"></i><span>fa-book</span></div>
<div class="icones_fontawesome"><i class="fa fa-bookmark"></i><span>fa-bookmark</span></div>
<div class="icones_fontawesome"><i class="fa fa-bookmark-o"></i><span>fa-bookmark-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-braille"></i><span>fa-braille</span></div>
<div class="icones_fontawesome"><i class="fa fa-briefcase"></i><span>fa-briefcase</span></div>
<div class="icones_fontawesome"><i class="fa fa-btc"></i><span>fa-btc</span></div>
<div class="icones_fontawesome"><i class="fa fa-bug"></i><span>fa-bug</span></div>
<div class="icones_fontawesome"><i class="fa fa-building"></i><span>fa-building</span></div>
<div class="icones_fontawesome"><i class="fa fa-building-o"></i><span>fa-building-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-bullhorn"></i><span>fa-bullhorn</span></div>
<div class="icones_fontawesome"><i class="fa fa-bullseye"></i><span>fa-bullseye</span></div>
<div class="icones_fontawesome"><i class="fa fa-bus"></i><span>fa-bus</span></div>
<div class="icones_fontawesome"><i class="fa fa-buysellads"></i><span>fa-buysellads</span></div>
<div class="icones_fontawesome"><i class="fa fa-cab"></i><span>fa-cab</span></div>
<div class="icones_fontawesome"><i class="fa fa-calculator"></i><span>fa-calculator</span></div>
<div class="icones_fontawesome"><i class="fa fa-calendar"></i><span>fa-calendar</span></div>
<div class="icones_fontawesome"><i class="fa fa-calendar-check-o"></i><span>fa-calendar-check-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-calendar-minus-o"></i><span>fa-calendar-minus-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-calendar-o"></i><span>fa-calendar-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-calendar-plus-o"></i><span>fa-calendar-plus-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-calendar-times-o"></i><span>fa-calendar-times-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-camera"></i><span>fa-camera</span></div>
<div class="icones_fontawesome"><i class="fa fa-camera-retro"></i><span>fa-camera-retro</span></div>
<div class="icones_fontawesome"><i class="fa fa-car"></i><span>fa-car</span></div>
<div class="icones_fontawesome"><i class="fa fa-caret-down"></i><span>fa-caret-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-caret-left"></i><span>fa-caret-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-caret-right"></i><span>fa-caret-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-caret-square-o-down"></i><span>fa-caret-square-o-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-caret-square-o-left"></i><span>fa-caret-square-o-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-caret-square-o-right"></i><span>fa-caret-square-o-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-caret-square-o-up"></i><span>fa-caret-square-o-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-caret-up"></i><span>fa-caret-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-cart-arrow-down"></i><span>fa-cart-arrow-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-cart-plus"></i><span>fa-cart-plus</span></div>
<div class="icones_fontawesome"><i class="fa fa-cc"></i><span>fa-cc</span></div>
<div class="icones_fontawesome"><i class="fa fa-cc-amex"></i><span>fa-cc-amex</span></div>
<div class="icones_fontawesome"><i class="fa fa-cc-diners-club"></i><span>fa-cc-diners-club</span></div>
<div class="icones_fontawesome"><i class="fa fa-cc-discover"></i><span>fa-cc-discover</span></div>
<div class="icones_fontawesome"><i class="fa fa-cc-jcb"></i><span>fa-cc-jcb</span></div>
<div class="icones_fontawesome"><i class="fa fa-cc-mastercard"></i><span>fa-cc-mastercard</span></div>
<div class="icones_fontawesome"><i class="fa fa-cc-paypal"></i><span>fa-cc-paypal</span></div>
<div class="icones_fontawesome"><i class="fa fa-cc-stripe"></i><span>fa-cc-stripe</span></div>
<div class="icones_fontawesome"><i class="fa fa-cc-visa"></i><span>fa-cc-visa</span></div>
<div class="icones_fontawesome"><i class="fa fa-certificate"></i><span>fa-certificate</span></div>
<div class="icones_fontawesome"><i class="fa fa-chain"></i><span>fa-chain</span></div>
<div class="icones_fontawesome"><i class="fa fa-chain-broken"></i><span>fa-chain-broken</span></div>
<div class="icones_fontawesome"><i class="fa fa-check"></i><span>fa-check</span></div>
<div class="icones_fontawesome"><i class="fa fa-check-circle"></i><span>fa-check-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-check-circle-o"></i><span>fa-check-circle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-check-square"></i><span>fa-check-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-check-square-o"></i><span>fa-check-square-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-chevron-circle-down"></i><span>fa-chevron-circle-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-chevron-circle-left"></i><span>fa-chevron-circle-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-chevron-circle-right"></i><span>fa-chevron-circle-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-chevron-circle-up"></i><span>fa-chevron-circle-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-chevron-down"></i><span>fa-chevron-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-chevron-left"></i><span>fa-chevron-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-chevron-right"></i><span>fa-chevron-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-chevron-up"></i><span>fa-chevron-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-child"></i><span>fa-child</span></div>
<div class="icones_fontawesome"><i class="fa fa-chrome"></i><span>fa-chrome</span></div>
<div class="icones_fontawesome"><i class="fa fa-circle"></i><span>fa-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-circle-o"></i><span>fa-circle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-circle-o-notch"></i><span>fa-circle-o-notch</span></div>
<div class="icones_fontawesome"><i class="fa fa-circle-thin"></i><span>fa-circle-thin</span></div>
<div class="icones_fontawesome"><i class="fa fa-clipboard"></i><span>fa-clipboard</span></div>
<div class="icones_fontawesome"><i class="fa fa-clock-o"></i><span>fa-clock-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-clone"></i><span>fa-clone</span></div>
<div class="icones_fontawesome"><i class="fa fa-close"></i><span>fa-close</span></div>
<div class="icones_fontawesome"><i class="fa fa-cloud"></i><span>fa-cloud</span></div>
<div class="icones_fontawesome"><i class="fa fa-cloud-download"></i><span>fa-cloud-download</span></div>
<div class="icones_fontawesome"><i class="fa fa-cloud-upload"></i><span>fa-cloud-upload</span></div>
<div class="icones_fontawesome"><i class="fa fa-cny"></i><span>fa-cny</span></div>
<div class="icones_fontawesome"><i class="fa fa-code"></i><span>fa-code</span></div>
<div class="icones_fontawesome"><i class="fa fa-code-fork"></i><span>fa-code-fork</span></div>
<div class="icones_fontawesome"><i class="fa fa-codepen"></i><span>fa-codepen</span></div>
<div class="icones_fontawesome"><i class="fa fa-codiepie"></i><span>fa-codiepie</span></div>
<div class="icones_fontawesome"><i class="fa fa-coffee"></i><span>fa-coffee</span></div>
<div class="icones_fontawesome"><i class="fa fa-cog"></i><span>fa-cog</span></div>
<div class="icones_fontawesome"><i class="fa fa-cogs"></i><span>fa-cogs</span></div>
<div class="icones_fontawesome"><i class="fa fa-columns"></i><span>fa-columns</span></div>
<div class="icones_fontawesome"><i class="fa fa-comment"></i><span>fa-comment</span></div>
<div class="icones_fontawesome"><i class="fa fa-comment-o"></i><span>fa-comment-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-commenting"></i><span>fa-commenting</span></div>
<div class="icones_fontawesome"><i class="fa fa-commenting-o"></i><span>fa-commenting-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-comments"></i><span>fa-comments</span></div>
<div class="icones_fontawesome"><i class="fa fa-comments-o"></i><span>fa-comments-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-compass"></i><span>fa-compass</span></div>
<div class="icones_fontawesome"><i class="fa fa-compress"></i><span>fa-compress</span></div>
<div class="icones_fontawesome"><i class="fa fa-connectdevelop"></i><span>fa-connectdevelop</span></div>
<div class="icones_fontawesome"><i class="fa fa-contao"></i><span>fa-contao</span></div>
<div class="icones_fontawesome"><i class="fa fa-copy"></i><span>fa-copy</span></div>
<div class="icones_fontawesome"><i class="fa fa-copyright"></i><span>fa-copyright</span></div>
<div class="icones_fontawesome"><i class="fa fa-creative-commons"></i><span>fa-creative-commons</span></div>
<div class="icones_fontawesome"><i class="fa fa-credit-card"></i><span>fa-credit-card</span></div>
<div class="icones_fontawesome"><i class="fa fa-credit-card-alt"></i><span>fa-credit-card-alt</span></div>
<div class="icones_fontawesome"><i class="fa fa-crop"></i><span>fa-crop</span></div>
<div class="icones_fontawesome"><i class="fa fa-crosshairs"></i><span>fa-crosshairs</span></div>
<div class="icones_fontawesome"><i class="fa fa-css3"></i><span>fa-css3</span></div>
<div class="icones_fontawesome"><i class="fa fa-cube"></i><span>fa-cube</span></div>
<div class="icones_fontawesome"><i class="fa fa-cubes"></i><span>fa-cubes</span></div>
<div class="icones_fontawesome"><i class="fa fa-cut"></i><span>fa-cut</span></div>
<div class="icones_fontawesome"><i class="fa fa-cutlery"></i><span>fa-cutlery</span></div>
<div class="icones_fontawesome"><i class="fa fa-dashboard"></i><span>fa-dashboard</span></div>
<div class="icones_fontawesome"><i class="fa fa-dashcube"></i><span>fa-dashcube</span></div>
<div class="icones_fontawesome"><i class="fa fa-database"></i><span>fa-database</span></div>
<div class="icones_fontawesome"><i class="fa fa-deaf"></i><span>fa-deaf</span></div>
<div class="icones_fontawesome"><i class="fa fa-deafness"></i><span>fa-deafness</span></div>
<div class="icones_fontawesome"><i class="fa fa-dedent"></i><span>fa-dedent</span></div>
<div class="icones_fontawesome"><i class="fa fa-delicious"></i><span>fa-delicious</span></div>
<div class="icones_fontawesome"><i class="fa fa-desktop"></i><span>fa-desktop</span></div>
<div class="icones_fontawesome"><i class="fa fa-deviantart"></i><span>fa-deviantart</span></div>
<div class="icones_fontawesome"><i class="fa fa-diamond"></i><span>fa-diamond</span></div>
<div class="icones_fontawesome"><i class="fa fa-digg"></i><span>fa-digg</span></div>
<div class="icones_fontawesome"><i class="fa fa-dollar"></i><span>fa-dollar</span></div>
<div class="icones_fontawesome"><i class="fa fa-dot-circle-o"></i><span>fa-dot-circle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-download"></i><span>fa-download</span></div>
<div class="icones_fontawesome"><i class="fa fa-dribbble"></i><span>fa-dribbble</span></div>
<div class="icones_fontawesome"><i class="fa fa-drivers-license"></i><span>fa-drivers-license</span></div>
<div class="icones_fontawesome"><i class="fa fa-drivers-license-o"></i><span>fa-drivers-license-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-dropbox"></i><span>fa-dropbox</span></div>
<div class="icones_fontawesome"><i class="fa fa-drupal"></i><span>fa-drupal</span></div>
<div class="icones_fontawesome"><i class="fa fa-edge"></i><span>fa-edge</span></div>
<div class="icones_fontawesome"><i class="fa fa-edit"></i><span>fa-edit</span></div>
<div class="icones_fontawesome"><i class="fa fa-eercast"></i><span>fa-eercast</span></div>
<div class="icones_fontawesome"><i class="fa fa-eject"></i><span>fa-eject</span></div>
<div class="icones_fontawesome"><i class="fa fa-ellipsis-h"></i><span>fa-ellipsis-h</span></div>
<div class="icones_fontawesome"><i class="fa fa-ellipsis-v"></i><span>fa-ellipsis-v</span></div>
<div class="icones_fontawesome"><i class="fa fa-empire"></i><span>fa-empire</span></div>
<div class="icones_fontawesome"><i class="fa fa-envelope"></i><span>fa-envelope</span></div>
<div class="icones_fontawesome"><i class="fa fa-envelope-o"></i><span>fa-envelope-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-envelope-open"></i><span>fa-envelope-open</span></div>
<div class="icones_fontawesome"><i class="fa fa-envelope-open-o"></i><span>fa-envelope-open-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-envelope-square"></i><span>fa-envelope-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-envira"></i><span>fa-envira</span></div>
<div class="icones_fontawesome"><i class="fa fa-eraser"></i><span>fa-eraser</span></div>
<div class="icones_fontawesome"><i class="fa fa-etsy"></i><span>fa-etsy</span></div>
<div class="icones_fontawesome"><i class="fa fa-eur"></i><span>fa-eur</span></div>
<div class="icones_fontawesome"><i class="fa fa-euro"></i><span>fa-euro</span></div>
<div class="icones_fontawesome"><i class="fa fa-exchange"></i><span>fa-exchange</span></div>
<div class="icones_fontawesome"><i class="fa fa-exclamation"></i><span>fa-exclamation</span></div>
<div class="icones_fontawesome"><i class="fa fa-exclamation-circle"></i><span>fa-exclamation-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-exclamation-triangle"></i><span>fa-exclamation-triangle</span></div>
<div class="icones_fontawesome"><i class="fa fa-expand"></i><span>fa-expand</span></div>
<div class="icones_fontawesome"><i class="fa fa-expeditedssl"></i><span>fa-expeditedssl</span></div>
<div class="icones_fontawesome"><i class="fa fa-external-link"></i><span>fa-external-link</span></div>
<div class="icones_fontawesome"><i class="fa fa-external-link-square"></i><span>fa-external-link-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-eye"></i><span>fa-eye</span></div>
<div class="icones_fontawesome"><i class="fa fa-eye-slash"></i><span>fa-eye-slash</span></div>
<div class="icones_fontawesome"><i class="fa fa-eyedropper"></i><span>fa-eyedropper</span></div>
<div class="icones_fontawesome"><i class="fa fa-"></i><span>fa-</span></div>
<div class="icones_fontawesome"><i class="fa fa"></i><span>fa</span></div>
<div class="icones_fontawesome"><i class="fa fa-"></i><span>fa-</span></div>
<div class="icones_fontawesome"><i class="fa facebook"></i><span>facebook</pan></div>
<div class="icones_fontawesome"><i class="fa fa-"></i><span>fa-</span></div>
<div class="icones_fontawesome"><i class="fa facebook-f"></i><span>facebookf</span></div>
<div class="icones_fontawesome"><i class="fa fa-"></i><span>fa-</span></div>
<div class="icones_fontawesome"><i class="fa facebook-official"></i><span>fcebook-official</span></div>
<div class="icones_fontawesome"><i class="fa fa-"></i><span>fa-</span></div>
<div class="icones_fontawesome"><i class="fa facebook-square"></i><span>facbook-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-"></i><span>fa-</span></div>
<div class="icones_fontawesome"><i class="fa fast-backward"></i><span>fast-ackward</span></div>
<div class="icones_fontawesome"><i class="fa fa-"></i><span>fa-</span></div>
<div class="icones_fontawesome"><i class="fa fast-forward"></i><span>fast-frward</span></div>
<div class="icones_fontawesome"><i class="fa fa-"></i><span>fa-</span></div>
<div class="icones_fontawesome"><i class="fa fax"></i><span>fax</span></div>
<div class="icones_fontawesome"><i class="fa fa-feed"></i><span>fa-feed</span></div>
<div class="icones_fontawesome"><i class="fa fa-female"></i><span>fa-female</span></div>
<div class="icones_fontawesome"><i class="fa fa-fighter-jet"></i><span>fa-fighter-jet</span></div>
<div class="icones_fontawesome"><i class="fa fa-file"></i><span>fa-file</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-archive-o"></i><span>fa-file-archive-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-audio-o"></i><span>fa-file-audio-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-code-o"></i><span>fa-file-code-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-excel-o"></i><span>fa-file-excel-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-image-o"></i><span>fa-file-image-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-movie-o"></i><span>fa-file-movie-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-o"></i><span>fa-file-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-pdf-o"></i><span>fa-file-pdf-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-photo-o"></i><span>fa-file-photo-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-picture-o"></i><span>fa-file-picture-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-powerpoint-o"></i><span>fa-file-powerpoint-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-sound-o"></i><span>fa-file-sound-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-text"></i><span>fa-file-text</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-text-o"></i><span>fa-file-text-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-video-o"></i><span>fa-file-video-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-word-o"></i><span>fa-file-word-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-file-zip-o"></i><span>fa-file-zip-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-files-o"></i><span>fa-files-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-film"></i><span>fa-film</span></div>
<div class="icones_fontawesome"><i class="fa fa-filter"></i><span>fa-filter</span></div>
<div class="icones_fontawesome"><i class="fa fa-fire"></i><span>fa-fire</span></div>
<div class="icones_fontawesome"><i class="fa fa-fire-extinguisher"></i><span>fa-fire-extinguisher</span></div>
<div class="icones_fontawesome"><i class="fa fa-firefox"></i><span>fa-firefox</span></div>
<div class="icones_fontawesome"><i class="fa fa-first-order"></i><span>fa-first-order</span></div>
<div class="icones_fontawesome"><i class="fa fa-flag"></i><span>fa-flag</span></div>
<div class="icones_fontawesome"><i class="fa fa-flag-checkered"></i><span>fa-flag-checkered</span></div>
<div class="icones_fontawesome"><i class="fa fa-flag-o"></i><span>fa-flag-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-flash"></i><span>fa-flash</span></div>
<div class="icones_fontawesome"><i class="fa fa-flask"></i><span>fa-flask</span></div>
<div class="icones_fontawesome"><i class="fa fa-flickr"></i><span>fa-flickr</span></div>
<div class="icones_fontawesome"><i class="fa fa-floppy-o"></i><span>fa-floppy-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-folder"></i><span>fa-folder</span></div>
<div class="icones_fontawesome"><i class="fa fa-folder-o"></i><span>fa-folder-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-folder-open"></i><span>fa-folder-open</span></div>
<div class="icones_fontawesome"><i class="fa fa-folder-open-o"></i><span>fa-folder-open-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-font"></i><span>fa-font</span></div>
<div class="icones_fontawesome"><i class="fa fa-font-awesome"></i><span>fa-font-awesome</span></div>
<div class="icones_fontawesome"><i class="fa fa-fonticons"></i><span>fa-fonticons</span></div>
<div class="icones_fontawesome"><i class="fa fa-fort-awesome"></i><span>fa-fort-awesome</span></div>
<div class="icones_fontawesome"><i class="fa fa-forumbee"></i><span>fa-forumbee</span></div>
<div class="icones_fontawesome"><i class="fa fa-forward"></i><span>fa-forward</span></div>
<div class="icones_fontawesome"><i class="fa fa-foursquare"></i><span>fa-foursquare</span></div>
<div class="icones_fontawesome"><i class="fa fa-free-code-camp"></i><span>fa-free-code-camp</span></div>
<div class="icones_fontawesome"><i class="fa fa-frown-o"></i><span>fa-frown-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-futbol-o"></i><span>fa-futbol-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-gamepad"></i><span>fa-gamepad</span></div>
<div class="icones_fontawesome"><i class="fa fa-gavel"></i><span>fa-gavel</span></div>
<div class="icones_fontawesome"><i class="fa fa-gbp"></i><span>fa-gbp</span></div>
<div class="icones_fontawesome"><i class="fa fa-ge"></i><span>fa-ge</span></div>
<div class="icones_fontawesome"><i class="fa fa-gear"></i><span>fa-gear</span></div>
<div class="icones_fontawesome"><i class="fa fa-gears"></i><span>fa-gears</span></div>
<div class="icones_fontawesome"><i class="fa fa-genderless"></i><span>fa-genderless</span></div>
<div class="icones_fontawesome"><i class="fa fa-get-pocket"></i><span>fa-get-pocket</span></div>
<div class="icones_fontawesome"><i class="fa fa-gg"></i><span>fa-gg</span></div>
<div class="icones_fontawesome"><i class="fa fa-gg-circle"></i><span>fa-gg-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-gift"></i><span>fa-gift</span></div>
<div class="icones_fontawesome"><i class="fa fa-git"></i><span>fa-git</span></div>
<div class="icones_fontawesome"><i class="fa fa-git-square"></i><span>fa-git-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-github"></i><span>fa-github</span></div>
<div class="icones_fontawesome"><i class="fa fa-github-alt"></i><span>fa-github-alt</span></div>
<div class="icones_fontawesome"><i class="fa fa-github-square"></i><span>fa-github-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-gitlab"></i><span>fa-gitlab</span></div>
<div class="icones_fontawesome"><i class="fa fa-gittip"></i><span>fa-gittip</span></div>
<div class="icones_fontawesome"><i class="fa fa-glass"></i><span>fa-glass</span></div>
<div class="icones_fontawesome"><i class="fa fa-glide"></i><span>fa-glide</span></div>
<div class="icones_fontawesome"><i class="fa fa-glide-g"></i><span>fa-glide-g</span></div>
<div class="icones_fontawesome"><i class="fa fa-globe"></i><span>fa-globe</span></div>
<div class="icones_fontawesome"><i class="fa fa-google"></i><span>fa-google</span></div>
<div class="icones_fontawesome"><i class="fa fa-google-plus"></i><span>fa-google-plus</span></div>
<div class="icones_fontawesome"><i class="fa fa-google-plus-circle"></i><span>fa-google-plus-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-google-plus-official"></i><span>fa-google-plus-official</span></div>
<div class="icones_fontawesome"><i class="fa fa-google-plus-square"></i><span>fa-google-plus-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-google-wallet"></i><span>fa-google-wallet</span></div>
<div class="icones_fontawesome"><i class="fa fa-graduation-cap"></i><span>fa-graduation-cap</span></div>
<div class="icones_fontawesome"><i class="fa fa-gratipay"></i><span>fa-gratipay</span></div>
<div class="icones_fontawesome"><i class="fa fa-grav"></i><span>fa-grav</span></div>
<div class="icones_fontawesome"><i class="fa fa-group"></i><span>fa-group</span></div>
<div class="icones_fontawesome"><i class="fa fa-h-square"></i><span>fa-h-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-hacker-news"></i><span>fa-hacker-news</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-grab-o"></i><span>fa-hand-grab-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-lizard-o"></i><span>fa-hand-lizard-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-o-down"></i><span>fa-hand-o-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-o-left"></i><span>fa-hand-o-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-o-right"></i><span>fa-hand-o-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-o-up"></i><span>fa-hand-o-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-paper-o"></i><span>fa-hand-paper-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-peace-o"></i><span>fa-hand-peace-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-pointer-o"></i><span>fa-hand-pointer-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-rock-o"></i><span>fa-hand-rock-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-scissors-o"></i><span>fa-hand-scissors-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-spock-o"></i><span>fa-hand-spock-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hand-stop-o"></i><span>fa-hand-stop-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-handshake-o"></i><span>fa-handshake-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hard-of-hearing"></i><span>fa-hard-of-hearing</span></div>
<div class="icones_fontawesome"><i class="fa fa-hashtag"></i><span>fa-hashtag</span></div>
<div class="icones_fontawesome"><i class="fa fa-hdd-o"></i><span>fa-hdd-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-header"></i><span>fa-header</span></div>
<div class="icones_fontawesome"><i class="fa fa-headphones"></i><span>fa-headphones</span></div>
<div class="icones_fontawesome"><i class="fa fa-heart"></i><span>fa-heart</span></div>
<div class="icones_fontawesome"><i class="fa fa-heart-o"></i><span>fa-heart-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-heartbeat"></i><span>fa-heartbeat</span></div>
<div class="icones_fontawesome"><i class="fa fa-history"></i><span>fa-history</span></div>
<div class="icones_fontawesome"><i class="fa fa-home"></i><span>fa-home</span></div>
<div class="icones_fontawesome"><i class="fa fa-hospital-o"></i><span>fa-hospital-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hotel"></i><span>fa-hotel</span></div>
<div class="icones_fontawesome"><i class="fa fa-hourglass"></i><span>fa-hourglass</span></div>
<div class="icones_fontawesome"><i class="fa fa-hourglass-1"></i><span>fa-hourglass-1</span></div>
<div class="icones_fontawesome"><i class="fa fa-hourglass-2"></i><span>fa-hourglass-2</span></div>
<div class="icones_fontawesome"><i class="fa fa-hourglass-3"></i><span>fa-hourglass-3</span></div>
<div class="icones_fontawesome"><i class="fa fa-hourglass-end"></i><span>fa-hourglass-end</span></div>
<div class="icones_fontawesome"><i class="fa fa-hourglass-half"></i><span>fa-hourglass-half</span></div>
<div class="icones_fontawesome"><i class="fa fa-hourglass-o"></i><span>fa-hourglass-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-hourglass-start"></i><span>fa-hourglass-start</span></div>
<div class="icones_fontawesome"><i class="fa fa-houzz"></i><span>fa-houzz</span></div>
<div class="icones_fontawesome"><i class="fa fa-html5"></i><span>fa-html5</span></div>
<div class="icones_fontawesome"><i class="fa fa-i-cursor"></i><span>fa-i-cursor</span></div>
<div class="icones_fontawesome"><i class="fa fa-id-badge"></i><span>fa-id-badge</span></div>
<div class="icones_fontawesome"><i class="fa fa-id-card"></i><span>fa-id-card</span></div>
<div class="icones_fontawesome"><i class="fa fa-id-card-o"></i><span>fa-id-card-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-ils"></i><span>fa-ils</span></div>
<div class="icones_fontawesome"><i class="fa fa-image"></i><span>fa-image</span></div>
<div class="icones_fontawesome"><i class="fa fa-imdb"></i><span>fa-imdb</span></div>
<div class="icones_fontawesome"><i class="fa fa-inbox"></i><span>fa-inbox</span></div>
<div class="icones_fontawesome"><i class="fa fa-indent"></i><span>fa-indent</span></div>
<div class="icones_fontawesome"><i class="fa fa-industry"></i><span>fa-industry</span></div>
<div class="icones_fontawesome"><i class="fa fa-info"></i><span>fa-info</span></div>
<div class="icones_fontawesome"><i class="fa fa-info-circle"></i><span>fa-info-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-inr"></i><span>fa-inr</span></div>
<div class="icones_fontawesome"><i class="fa fa-instagram"></i><span>fa-instagram</span></div>
<div class="icones_fontawesome"><i class="fa fa-institution"></i><span>fa-institution</span></div>
<div class="icones_fontawesome"><i class="fa fa-internet-explorer"></i><span>fa-internet-explorer</span></div>
<div class="icones_fontawesome"><i class="fa fa-intersex"></i><span>fa-intersex</span></div>
<div class="icones_fontawesome"><i class="fa fa-ioxhost"></i><span>fa-ioxhost</span></div>
<div class="icones_fontawesome"><i class="fa fa-italic"></i><span>fa-italic</span></div>
<div class="icones_fontawesome"><i class="fa fa-joomla"></i><span>fa-joomla</span></div>
<div class="icones_fontawesome"><i class="fa fa-jpy"></i><span>fa-jpy</span></div>
<div class="icones_fontawesome"><i class="fa fa-jsfiddle"></i><span>fa-jsfiddle</span></div>
<div class="icones_fontawesome"><i class="fa fa-key"></i><span>fa-key</span></div>
<div class="icones_fontawesome"><i class="fa fa-keyboard-o"></i><span>fa-keyboard-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-krw"></i><span>fa-krw</span></div>
<div class="icones_fontawesome"><i class="fa fa-language"></i><span>fa-language</span></div>
<div class="icones_fontawesome"><i class="fa fa-laptop"></i><span>fa-laptop</span></div>
<div class="icones_fontawesome"><i class="fa fa-lastfm"></i><span>fa-lastfm</span></div>
<div class="icones_fontawesome"><i class="fa fa-lastfm-square"></i><span>fa-lastfm-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-leaf"></i><span>fa-leaf</span></div>
<div class="icones_fontawesome"><i class="fa fa-leanpub"></i><span>fa-leanpub</span></div>
<div class="icones_fontawesome"><i class="fa fa-legal"></i><span>fa-legal</span></div>
<div class="icones_fontawesome"><i class="fa fa-lemon-o"></i><span>fa-lemon-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-level-down"></i><span>fa-level-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-level-up"></i><span>fa-level-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-life-bouy"></i><span>fa-life-bouy</span></div>
<div class="icones_fontawesome"><i class="fa fa-life-buoy"></i><span>fa-life-buoy</span></div>
<div class="icones_fontawesome"><i class="fa fa-life-ring"></i><span>fa-life-ring</span></div>
<div class="icones_fontawesome"><i class="fa fa-life-saver"></i><span>fa-life-saver</span></div>
<div class="icones_fontawesome"><i class="fa fa-lightbulb-o"></i><span>fa-lightbulb-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-line-chart"></i><span>fa-line-chart</span></div>
<div class="icones_fontawesome"><i class="fa fa-link"></i><span>fa-link</span></div>
<div class="icones_fontawesome"><i class="fa fa-linkedin"></i><span>fa-linkedin</span></div>
<div class="icones_fontawesome"><i class="fa fa-linkedin-square"></i><span>fa-linkedin-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-linode"></i><span>fa-linode</span></div>
<div class="icones_fontawesome"><i class="fa fa-linux"></i><span>fa-linux</span></div>
<div class="icones_fontawesome"><i class="fa fa-list"></i><span>fa-list</span></div>
<div class="icones_fontawesome"><i class="fa fa-list-alt"></i><span>fa-list-alt</span></div>
<div class="icones_fontawesome"><i class="fa fa-list-ol"></i><span>fa-list-ol</span></div>
<div class="icones_fontawesome"><i class="fa fa-list-ul"></i><span>fa-list-ul</span></div>
<div class="icones_fontawesome"><i class="fa fa-location-arrow"></i><span>fa-location-arrow</span></div>
<div class="icones_fontawesome"><i class="fa fa-lock"></i><span>fa-lock</span></div>
<div class="icones_fontawesome"><i class="fa fa-long-arrow-down"></i><span>fa-long-arrow-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-long-arrow-left"></i><span>fa-long-arrow-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-long-arrow-right"></i><span>fa-long-arrow-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-long-arrow-up"></i><span>fa-long-arrow-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-low-vision"></i><span>fa-low-vision</span></div>
<div class="icones_fontawesome"><i class="fa fa-magic"></i><span>fa-magic</span></div>
<div class="icones_fontawesome"><i class="fa fa-magnet"></i><span>fa-magnet</span></div>
<div class="icones_fontawesome"><i class="fa fa-mail-forward"></i><span>fa-mail-forward</span></div>
<div class="icones_fontawesome"><i class="fa fa-mail-reply"></i><span>fa-mail-reply</span></div>
<div class="icones_fontawesome"><i class="fa fa-mail-reply-all"></i><span>fa-mail-reply-all</span></div>
<div class="icones_fontawesome"><i class="fa fa-male"></i><span>fa-male</span></div>
<div class="icones_fontawesome"><i class="fa fa-map"></i><span>fa-map</span></div>
<div class="icones_fontawesome"><i class="fa fa-map-marker"></i><span>fa-map-marker</span></div>
<div class="icones_fontawesome"><i class="fa fa-map-o"></i><span>fa-map-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-map-pin"></i><span>fa-map-pin</span></div>
<div class="icones_fontawesome"><i class="fa fa-map-signs"></i><span>fa-map-signs</span></div>
<div class="icones_fontawesome"><i class="fa fa-mars"></i><span>fa-mars</span></div>
<div class="icones_fontawesome"><i class="fa fa-mars-double"></i><span>fa-mars-double</span></div>
<div class="icones_fontawesome"><i class="fa fa-mars-stroke"></i><span>fa-mars-stroke</span></div>
<div class="icones_fontawesome"><i class="fa fa-mars-stroke-h"></i><span>fa-mars-stroke-h</span></div>
<div class="icones_fontawesome"><i class="fa fa-mars-stroke-v"></i><span>fa-mars-stroke-v</span></div>
<div class="icones_fontawesome"><i class="fa fa-maxcdn"></i><span>fa-maxcdn</span></div>
<div class="icones_fontawesome"><i class="fa fa-meanpath"></i><span>fa-meanpath</span></div>
<div class="icones_fontawesome"><i class="fa fa-medium"></i><span>fa-medium</span></div>
<div class="icones_fontawesome"><i class="fa fa-medkit"></i><span>fa-medkit</span></div>
<div class="icones_fontawesome"><i class="fa fa-meetup"></i><span>fa-meetup</span></div>
<div class="icones_fontawesome"><i class="fa fa-meh-o"></i><span>fa-meh-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-mercury"></i><span>fa-mercury</span></div>
<div class="icones_fontawesome"><i class="fa fa-microchip"></i><span>fa-microchip</span></div>
<div class="icones_fontawesome"><i class="fa fa-microphone"></i><span>fa-microphone</span></div>
<div class="icones_fontawesome"><i class="fa fa-microphone-slash"></i><span>fa-microphone-slash</span></div>
<div class="icones_fontawesome"><i class="fa fa-minus"></i><span>fa-minus</span></div>
<div class="icones_fontawesome"><i class="fa fa-minus-circle"></i><span>fa-minus-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-minus-square"></i><span>fa-minus-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-minus-square-o"></i><span>fa-minus-square-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-mixcloud"></i><span>fa-mixcloud</span></div>
<div class="icones_fontawesome"><i class="fa fa-mobile"></i><span>fa-mobile</span></div>
<div class="icones_fontawesome"><i class="fa fa-mobile-phone"></i><span>fa-mobile-phone</span></div>
<div class="icones_fontawesome"><i class="fa fa-modx"></i><span>fa-modx</span></div>
<div class="icones_fontawesome"><i class="fa fa-money"></i><span>fa-money</span></div>
<div class="icones_fontawesome"><i class="fa fa-moon-o"></i><span>fa-moon-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-mortar-board"></i><span>fa-mortar-board</span></div>
<div class="icones_fontawesome"><i class="fa fa-motorcycle"></i><span>fa-motorcycle</span></div>
<div class="icones_fontawesome"><i class="fa fa-mouse-pointer"></i><span>fa-mouse-pointer</span></div>
<div class="icones_fontawesome"><i class="fa fa-music"></i><span>fa-music</span></div>
<div class="icones_fontawesome"><i class="fa fa-navicon"></i><span>fa-navicon</span></div>
<div class="icones_fontawesome"><i class="fa fa-neuter"></i><span>fa-neuter</span></div>
<div class="icones_fontawesome"><i class="fa fa-newspaper-o"></i><span>fa-newspaper-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-object-group"></i><span>fa-object-group</span></div>
<div class="icones_fontawesome"><i class="fa fa-object-ungroup"></i><span>fa-object-ungroup</span></div>
<div class="icones_fontawesome"><i class="fa fa-odnoklassniki"></i><span>fa-odnoklassniki</span></div>
<div class="icones_fontawesome"><i class="fa fa-odnoklassniki-square"></i><span>fa-odnoklassniki-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-opencart"></i><span>fa-opencart</span></div>
<div class="icones_fontawesome"><i class="fa fa-openid"></i><span>fa-openid</span></div>
<div class="icones_fontawesome"><i class="fa fa-opera"></i><span>fa-opera</span></div>
<div class="icones_fontawesome"><i class="fa fa-optin-monster"></i><span>fa-optin-monster</span></div>
<div class="icones_fontawesome"><i class="fa fa-outdent"></i><span>fa-outdent</span></div>
<div class="icones_fontawesome"><i class="fa fa-pagelines"></i><span>fa-pagelines</span></div>
<div class="icones_fontawesome"><i class="fa fa-paint-brush"></i><span>fa-paint-brush</span></div>
<div class="icones_fontawesome"><i class="fa fa-paper-plane"></i><span>fa-paper-plane</span></div>
<div class="icones_fontawesome"><i class="fa fa-paper-plane-o"></i><span>fa-paper-plane-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-paperclip"></i><span>fa-paperclip</span></div>
<div class="icones_fontawesome"><i class="fa fa-paragraph"></i><span>fa-paragraph</span></div>
<div class="icones_fontawesome"><i class="fa fa-paste"></i><span>fa-paste</span></div>
<div class="icones_fontawesome"><i class="fa fa-pause"></i><span>fa-pause</span></div>
<div class="icones_fontawesome"><i class="fa fa-pause-circle"></i><span>fa-pause-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-pause-circle-o"></i><span>fa-pause-circle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-paw"></i><span>fa-paw</span></div>
<div class="icones_fontawesome"><i class="fa fa-paypal"></i><span>fa-paypal</span></div>
<div class="icones_fontawesome"><i class="fa fa-pencil"></i><span>fa-pencil</span></div>
<div class="icones_fontawesome"><i class="fa fa-pencil-square"></i><span>fa-pencil-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-pencil-square-o"></i><span>fa-pencil-square-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-percent"></i><span>fa-percent</span></div>
<div class="icones_fontawesome"><i class="fa fa-phone"></i><span>fa-phone</span></div>
<div class="icones_fontawesome"><i class="fa fa-phone-square"></i><span>fa-phone-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-photo"></i><span>fa-photo</span></div>
<div class="icones_fontawesome"><i class="fa fa-picture-o"></i><span>fa-picture-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-pie-chart"></i><span>fa-pie-chart</span></div>
<div class="icones_fontawesome"><i class="fa fa-pied-piper"></i><span>fa-pied-piper</span></div>
<div class="icones_fontawesome"><i class="fa fa-pied-piper-alt"></i><span>fa-pied-piper-alt</span></div>
<div class="icones_fontawesome"><i class="fa fa-pied-piper-pp"></i><span>fa-pied-piper-pp</span></div>
<div class="icones_fontawesome"><i class="fa fa-pinterest"></i><span>fa-pinterest</span></div>
<div class="icones_fontawesome"><i class="fa fa-pinterest-p"></i><span>fa-pinterest-p</span></div>
<div class="icones_fontawesome"><i class="fa fa-pinterest-square"></i><span>fa-pinterest-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-plane"></i><span>fa-plane</span></div>
<div class="icones_fontawesome"><i class="fa fa-play"></i><span>fa-play</span></div>
<div class="icones_fontawesome"><i class="fa fa-play-circle"></i><span>fa-play-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-play-circle-o"></i><span>fa-play-circle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-plug"></i><span>fa-plug</span></div>
<div class="icones_fontawesome"><i class="fa fa-plus"></i><span>fa-plus</span></div>
<div class="icones_fontawesome"><i class="fa fa-plus-circle"></i><span>fa-plus-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-plus-square"></i><span>fa-plus-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-plus-square-o"></i><span>fa-plus-square-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-podcast"></i><span>fa-podcast</span></div>
<div class="icones_fontawesome"><i class="fa fa-power-off"></i><span>fa-power-off</span></div>
<div class="icones_fontawesome"><i class="fa fa-print"></i><span>fa-print</span></div>
<div class="icones_fontawesome"><i class="fa fa-product-hunt"></i><span>fa-product-hunt</span></div>
<div class="icones_fontawesome"><i class="fa fa-puzzle-piece"></i><span>fa-puzzle-piece</span></div>
<div class="icones_fontawesome"><i class="fa fa-qq"></i><span>fa-qq</span></div>
<div class="icones_fontawesome"><i class="fa fa-qrcode"></i><span>fa-qrcode</span></div>
<div class="icones_fontawesome"><i class="fa fa-question"></i><span>fa-question</span></div>
<div class="icones_fontawesome"><i class="fa fa-question-circle"></i><span>fa-question-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-question-circle-o"></i><span>fa-question-circle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-quora"></i><span>fa-quora</span></div>
<div class="icones_fontawesome"><i class="fa fa-quote-left"></i><span>fa-quote-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-quote-right"></i><span>fa-quote-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-ra"></i><span>fa-ra</span></div>
<div class="icones_fontawesome"><i class="fa fa-random"></i><span>fa-random</span></div>
<div class="icones_fontawesome"><i class="fa fa-ravelry"></i><span>fa-ravelry</span></div>
<div class="icones_fontawesome"><i class="fa fa-rebel"></i><span>fa-rebel</span></div>
<div class="icones_fontawesome"><i class="fa fa-recycle"></i><span>fa-recycle</span></div>
<div class="icones_fontawesome"><i class="fa fa-reddit"></i><span>fa-reddit</span></div>
<div class="icones_fontawesome"><i class="fa fa-reddit-alien"></i><span>fa-reddit-alien</span></div>
<div class="icones_fontawesome"><i class="fa fa-reddit-square"></i><span>fa-reddit-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-refresh"></i><span>fa-refresh</span></div>
<div class="icones_fontawesome"><i class="fa fa-registered"></i><span>fa-registered</span></div>
<div class="icones_fontawesome"><i class="fa fa-remove"></i><span>fa-remove</span></div>
<div class="icones_fontawesome"><i class="fa fa-renren"></i><span>fa-renren</span></div>
<div class="icones_fontawesome"><i class="fa fa-reorder"></i><span>fa-reorder</span></div>
<div class="icones_fontawesome"><i class="fa fa-repeat"></i><span>fa-repeat</span></div>
<div class="icones_fontawesome"><i class="fa fa-reply"></i><span>fa-reply</span></div>
<div class="icones_fontawesome"><i class="fa fa-reply-all"></i><span>fa-reply-all</span></div>
<div class="icones_fontawesome"><i class="fa fa-resistance"></i><span>fa-resistance</span></div>
<div class="icones_fontawesome"><i class="fa fa-retweet"></i><span>fa-retweet</span></div>
<div class="icones_fontawesome"><i class="fa fa-rmb"></i><span>fa-rmb</span></div>
<div class="icones_fontawesome"><i class="fa fa-road"></i><span>fa-road</span></div>
<div class="icones_fontawesome"><i class="fa fa-rocket"></i><span>fa-rocket</span></div>
<div class="icones_fontawesome"><i class="fa fa-rotate-left"></i><span>fa-rotate-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-rotate-right"></i><span>fa-rotate-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-rouble"></i><span>fa-rouble</span></div>
<div class="icones_fontawesome"><i class="fa fa-rss"></i><span>fa-rss</span></div>
<div class="icones_fontawesome"><i class="fa fa-rss-square"></i><span>fa-rss-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-rub"></i><span>fa-rub</span></div>
<div class="icones_fontawesome"><i class="fa fa-ruble"></i><span>fa-ruble</span></div>
<div class="icones_fontawesome"><i class="fa fa-rupee"></i><span>fa-rupee</span></div>
<div class="icones_fontawesome"><i class="fa fa-s15"></i><span>fa-s15</span></div>
<div class="icones_fontawesome"><i class="fa fa-sa"></i><span>fa-sa</span></div>
<div class="icones_fontawesome"><i class="fa fari"></i><span>fari</span></div>
<div class="icones_fontawesome"><i class="fa fa-save"></i><span>fa-save</span></div>
<div class="icones_fontawesome"><i class="fa fa-scissors"></i><span>fa-scissors</span></div>
<div class="icones_fontawesome"><i class="fa fa-scribd"></i><span>fa-scribd</span></div>
<div class="icones_fontawesome"><i class="fa fa-search"></i><span>fa-search</span></div>
<div class="icones_fontawesome"><i class="fa fa-search-minus"></i><span>fa-search-minus</span></div>
<div class="icones_fontawesome"><i class="fa fa-search-plus"></i><span>fa-search-plus</span></div>
<div class="icones_fontawesome"><i class="fa fa-sellsy"></i><span>fa-sellsy</span></div>
<div class="icones_fontawesome"><i class="fa fa-send"></i><span>fa-send</span></div>
<div class="icones_fontawesome"><i class="fa fa-send-o"></i><span>fa-send-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-server"></i><span>fa-server</span></div>
<div class="icones_fontawesome"><i class="fa fa-share"></i><span>fa-share</span></div>
<div class="icones_fontawesome"><i class="fa fa-share-alt"></i><span>fa-share-alt</span></div>
<div class="icones_fontawesome"><i class="fa fa-share-alt-square"></i><span>fa-share-alt-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-share-square"></i><span>fa-share-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-share-square-o"></i><span>fa-share-square-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-shekel"></i><span>fa-shekel</span></div>
<div class="icones_fontawesome"><i class="fa fa-sheqel"></i><span>fa-sheqel</span></div>
<div class="icones_fontawesome"><i class="fa fa-shield"></i><span>fa-shield</span></div>
<div class="icones_fontawesome"><i class="fa fa-ship"></i><span>fa-ship</span></div>
<div class="icones_fontawesome"><i class="fa fa-shirtsinbulk"></i><span>fa-shirtsinbulk</span></div>
<div class="icones_fontawesome"><i class="fa fa-shopping-bag"></i><span>fa-shopping-bag</span></div>
<div class="icones_fontawesome"><i class="fa fa-shopping-basket"></i><span>fa-shopping-basket</span></div>
<div class="icones_fontawesome"><i class="fa fa-shopping-cart"></i><span>fa-shopping-cart</span></div>
<div class="icones_fontawesome"><i class="fa fa-shower"></i><span>fa-shower</span></div>
<div class="icones_fontawesome"><i class="fa fa-sign-in"></i><span>fa-sign-in</span></div>
<div class="icones_fontawesome"><i class="fa fa-sign-language"></i><span>fa-sign-language</span></div>
<div class="icones_fontawesome"><i class="fa fa-sign-out"></i><span>fa-sign-out</span></div>
<div class="icones_fontawesome"><i class="fa fa-signal"></i><span>fa-signal</span></div>
<div class="icones_fontawesome"><i class="fa fa-signing"></i><span>fa-signing</span></div>
<div class="icones_fontawesome"><i class="fa fa-simplybuilt"></i><span>fa-simplybuilt</span></div>
<div class="icones_fontawesome"><i class="fa fa-sitemap"></i><span>fa-sitemap</span></div>
<div class="icones_fontawesome"><i class="fa fa-skyatlas"></i><span>fa-skyatlas</span></div>
<div class="icones_fontawesome"><i class="fa fa-skype"></i><span>fa-skype</span></div>
<div class="icones_fontawesome"><i class="fa fa-slack"></i><span>fa-slack</span></div>
<div class="icones_fontawesome"><i class="fa fa-sliders"></i><span>fa-sliders</span></div>
<div class="icones_fontawesome"><i class="fa fa-slideshare"></i><span>fa-slideshare</span></div>
<div class="icones_fontawesome"><i class="fa fa-smile-o"></i><span>fa-smile-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-snapchat"></i><span>fa-snapchat</span></div>
<div class="icones_fontawesome"><i class="fa fa-snapchat-ghost"></i><span>fa-snapchat-ghost</span></div>
<div class="icones_fontawesome"><i class="fa fa-snapchat-square"></i><span>fa-snapchat-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-snowflake-o"></i><span>fa-snowflake-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-soccer-ball-o"></i><span>fa-soccer-ball-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort"></i><span>fa-sort</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-alpha-asc"></i><span>fa-sort-alpha-asc</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-alpha-desc"></i><span>fa-sort-alpha-desc</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-amount-asc"></i><span>fa-sort-amount-asc</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-amount-desc"></i><span>fa-sort-amount-desc</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-asc"></i><span>fa-sort-asc</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-desc"></i><span>fa-sort-desc</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-down"></i><span>fa-sort-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-numeric-asc"></i><span>fa-sort-numeric-asc</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-numeric-desc"></i><span>fa-sort-numeric-desc</span></div>
<div class="icones_fontawesome"><i class="fa fa-sort-up"></i><span>fa-sort-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-soundcloud"></i><span>fa-soundcloud</span></div>
<div class="icones_fontawesome"><i class="fa fa-space-shuttle"></i><span>fa-space-shuttle</span></div>
<div class="icones_fontawesome"><i class="fa fa-spinner"></i><span>fa-spinner</span></div>
<div class="icones_fontawesome"><i class="fa fa-spoon"></i><span>fa-spoon</span></div>
<div class="icones_fontawesome"><i class="fa fa-spotify"></i><span>fa-spotify</span></div>
<div class="icones_fontawesome"><i class="fa fa-square"></i><span>fa-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-square-o"></i><span>fa-square-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-stack-exchange"></i><span>fa-stack-exchange</span></div>
<div class="icones_fontawesome"><i class="fa fa-stack-overflow"></i><span>fa-stack-overflow</span></div>
<div class="icones_fontawesome"><i class="fa fa-star"></i><span>fa-star</span></div>
<div class="icones_fontawesome"><i class="fa fa-star-half"></i><span>fa-star-half</span></div>
<div class="icones_fontawesome"><i class="fa fa-star-half-empty"></i><span>fa-star-half-empty</span></div>
<div class="icones_fontawesome"><i class="fa fa-star-half-full"></i><span>fa-star-half-full</span></div>
<div class="icones_fontawesome"><i class="fa fa-star-half-o"></i><span>fa-star-half-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-star-o"></i><span>fa-star-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-steam"></i><span>fa-steam</span></div>
<div class="icones_fontawesome"><i class="fa fa-steam-square"></i><span>fa-steam-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-step-backward"></i><span>fa-step-backward</span></div>
<div class="icones_fontawesome"><i class="fa fa-step-forward"></i><span>fa-step-forward</span></div>
<div class="icones_fontawesome"><i class="fa fa-stethoscope"></i><span>fa-stethoscope</span></div>
<div class="icones_fontawesome"><i class="fa fa-sticky-note"></i><span>fa-sticky-note</span></div>
<div class="icones_fontawesome"><i class="fa fa-sticky-note-o"></i><span>fa-sticky-note-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-stop"></i><span>fa-stop</span></div>
<div class="icones_fontawesome"><i class="fa fa-stop-circle"></i><span>fa-stop-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-stop-circle-o"></i><span>fa-stop-circle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-street-view"></i><span>fa-street-view</span></div>
<div class="icones_fontawesome"><i class="fa fa-strikethrough"></i><span>fa-strikethrough</span></div>
<div class="icones_fontawesome"><i class="fa fa-stumbleupon"></i><span>fa-stumbleupon</span></div>
<div class="icones_fontawesome"><i class="fa fa-stumbleupon-circle"></i><span>fa-stumbleupon-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-subscript"></i><span>fa-subscript</span></div>
<div class="icones_fontawesome"><i class="fa fa-subway"></i><span>fa-subway</span></div>
<div class="icones_fontawesome"><i class="fa fa-suitcase"></i><span>fa-suitcase</span></div>
<div class="icones_fontawesome"><i class="fa fa-sun-o"></i><span>fa-sun-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-superpowers"></i><span>fa-superpowers</span></div>
<div class="icones_fontawesome"><i class="fa fa-superscript"></i><span>fa-superscript</span></div>
<div class="icones_fontawesome"><i class="fa fa-support"></i><span>fa-support</span></div>
<div class="icones_fontawesome"><i class="fa fa-table"></i><span>fa-table</span></div>
<div class="icones_fontawesome"><i class="fa fa-tablet"></i><span>fa-tablet</span></div>
<div class="icones_fontawesome"><i class="fa fa-tachometer"></i><span>fa-tachometer</span></div>
<div class="icones_fontawesome"><i class="fa fa-tag"></i><span>fa-tag</span></div>
<div class="icones_fontawesome"><i class="fa fa-tags"></i><span>fa-tags</span></div>
<div class="icones_fontawesome"><i class="fa fa-tasks"></i><span>fa-tasks</span></div>
<div class="icones_fontawesome"><i class="fa fa-taxi"></i><span>fa-taxi</span></div>
<div class="icones_fontawesome"><i class="fa fa-telegram"></i><span>fa-telegram</span></div>
<div class="icones_fontawesome"><i class="fa fa-television"></i><span>fa-television</span></div>
<div class="icones_fontawesome"><i class="fa fa-tencent-weibo"></i><span>fa-tencent-weibo</span></div>
<div class="icones_fontawesome"><i class="fa fa-terminal"></i><span>fa-terminal</span></div>
<div class="icones_fontawesome"><i class="fa fa-text-height"></i><span>fa-text-height</span></div>
<div class="icones_fontawesome"><i class="fa fa-text-width"></i><span>fa-text-width</span></div>
<div class="icones_fontawesome"><i class="fa fa-th"></i><span>fa-th</span></div>
<div class="icones_fontawesome"><i class="fa fa-th-large"></i><span>fa-th-large</span></div>
<div class="icones_fontawesome"><i class="fa fa-th-list"></i><span>fa-th-list</span></div>
<div class="icones_fontawesome"><i class="fa fa-themeisle"></i><span>fa-themeisle</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer"></i><span>fa-thermometer</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-0"></i><span>fa-thermometer-0</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-1"></i><span>fa-thermometer-1</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-2"></i><span>fa-thermometer-2</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-3"></i><span>fa-thermometer-3</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-4"></i><span>fa-thermometer-4</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-empty"></i><span>fa-thermometer-empty</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-full"></i><span>fa-thermometer-full</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-half"></i><span>fa-thermometer-half</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-quarter"></i><span>fa-thermometer-quarter</span></div>
<div class="icones_fontawesome"><i class="fa fa-thermometer-three-quarters"></i><span>fa-thermometer-three-quarters</span></div>
<div class="icones_fontawesome"><i class="fa fa-thumb-tack"></i><span>fa-thumb-tack</span></div>
<div class="icones_fontawesome"><i class="fa fa-thumbs-down"></i><span>fa-thumbs-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-thumbs-o-down"></i><span>fa-thumbs-o-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-thumbs-o-up"></i><span>fa-thumbs-o-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-thumbs-up"></i><span>fa-thumbs-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-ticket"></i><span>fa-ticket</span></div>
<div class="icones_fontawesome"><i class="fa fa-times"></i><span>fa-times</span></div>
<div class="icones_fontawesome"><i class="fa fa-times-circle"></i><span>fa-times-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-times-circle-o"></i><span>fa-times-circle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-times-rectangle"></i><span>fa-times-rectangle</span></div>
<div class="icones_fontawesome"><i class="fa fa-times-rectangle-o"></i><span>fa-times-rectangle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-tint"></i><span>fa-tint</span></div>
<div class="icones_fontawesome"><i class="fa fa-toggle-down"></i><span>fa-toggle-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-toggle-left"></i><span>fa-toggle-left</span></div>
<div class="icones_fontawesome"><i class="fa fa-toggle-off"></i><span>fa-toggle-off</span></div>
<div class="icones_fontawesome"><i class="fa fa-toggle-on"></i><span>fa-toggle-on</span></div>
<div class="icones_fontawesome"><i class="fa fa-toggle-right"></i><span>fa-toggle-right</span></div>
<div class="icones_fontawesome"><i class="fa fa-toggle-up"></i><span>fa-toggle-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-trademark"></i><span>fa-trademark</span></div>
<div class="icones_fontawesome"><i class="fa fa-train"></i><span>fa-train</span></div>
<div class="icones_fontawesome"><i class="fa fa-transgender"></i><span>fa-transgender</span></div>
<div class="icones_fontawesome"><i class="fa fa-transgender-alt"></i><span>fa-transgender-alt</span></div>
<div class="icones_fontawesome"><i class="fa fa-trash"></i><span>fa-trash</span></div>
<div class="icones_fontawesome"><i class="fa fa-trash-o"></i><span>fa-trash-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-tree"></i><span>fa-tree</span></div>
<div class="icones_fontawesome"><i class="fa fa-trello"></i><span>fa-trello</span></div>
<div class="icones_fontawesome"><i class="fa fa-tripadvisor"></i><span>fa-tripadvisor</span></div>
<div class="icones_fontawesome"><i class="fa fa-trophy"></i><span>fa-trophy</span></div>
<div class="icones_fontawesome"><i class="fa fa-truck"></i><span>fa-truck</span></div>
<div class="icones_fontawesome"><i class="fa fa-try"></i><span>fa-try</span></div>
<div class="icones_fontawesome"><i class="fa fa-tty"></i><span>fa-tty</span></div>
<div class="icones_fontawesome"><i class="fa fa-tumblr"></i><span>fa-tumblr</span></div>
<div class="icones_fontawesome"><i class="fa fa-tumblr-square"></i><span>fa-tumblr-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-turkish-lira"></i><span>fa-turkish-lira</span></div>
<div class="icones_fontawesome"><i class="fa fa-tv"></i><span>fa-tv</span></div>
<div class="icones_fontawesome"><i class="fa fa-twitch"></i><span>fa-twitch</span></div>
<div class="icones_fontawesome"><i class="fa fa-twitter"></i><span>fa-twitter</span></div>
<div class="icones_fontawesome"><i class="fa fa-twitter-square"></i><span>fa-twitter-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-umbrella"></i><span>fa-umbrella</span></div>
<div class="icones_fontawesome"><i class="fa fa-underline"></i><span>fa-underline</span></div>
<div class="icones_fontawesome"><i class="fa fa-undo"></i><span>fa-undo</span></div>
<div class="icones_fontawesome"><i class="fa fa-universal-access"></i><span>fa-universal-access</span></div>
<div class="icones_fontawesome"><i class="fa fa-university"></i><span>fa-university</span></div>
<div class="icones_fontawesome"><i class="fa fa-unlink"></i><span>fa-unlink</span></div>
<div class="icones_fontawesome"><i class="fa fa-unlock"></i><span>fa-unlock</span></div>
<div class="icones_fontawesome"><i class="fa fa-unlock-alt"></i><span>fa-unlock-alt</span></div>
<div class="icones_fontawesome"><i class="fa fa-unsorted"></i><span>fa-unsorted</span></div>
<div class="icones_fontawesome"><i class="fa fa-upload"></i><span>fa-upload</span></div>
<div class="icones_fontawesome"><i class="fa fa-usb"></i><span>fa-usb</span></div>
<div class="icones_fontawesome"><i class="fa fa-usd"></i><span>fa-usd</span></div>
<div class="icones_fontawesome"><i class="fa fa-user"></i><span>fa-user</span></div>
<div class="icones_fontawesome"><i class="fa fa-user-circle"></i><span>fa-user-circle</span></div>
<div class="icones_fontawesome"><i class="fa fa-user-circle-o"></i><span>fa-user-circle-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-user-md"></i><span>fa-user-md</span></div>
<div class="icones_fontawesome"><i class="fa fa-user-o"></i><span>fa-user-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-user-plus"></i><span>fa-user-plus</span></div>
<div class="icones_fontawesome"><i class="fa fa-user-secret"></i><span>fa-user-secret</span></div>
<div class="icones_fontawesome"><i class="fa fa-user-times"></i><span>fa-user-times</span></div>
<div class="icones_fontawesome"><i class="fa fa-users"></i><span>fa-users</span></div>
<div class="icones_fontawesome"><i class="fa fa-vcard"></i><span>fa-vcard</span></div>
<div class="icones_fontawesome"><i class="fa fa-vcard-o"></i><span>fa-vcard-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-venus"></i><span>fa-venus</span></div>
<div class="icones_fontawesome"><i class="fa fa-venus-double"></i><span>fa-venus-double</span></div>
<div class="icones_fontawesome"><i class="fa fa-venus-mars"></i><span>fa-venus-mars</span></div>
<div class="icones_fontawesome"><i class="fa fa-viacoin"></i><span>fa-viacoin</span></div>
<div class="icones_fontawesome"><i class="fa fa-viadeo"></i><span>fa-viadeo</span></div>
<div class="icones_fontawesome"><i class="fa fa-viadeo-square"></i><span>fa-viadeo-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-video-camera"></i><span>fa-video-camera</span></div>
<div class="icones_fontawesome"><i class="fa fa-vimeo"></i><span>fa-vimeo</span></div>
<div class="icones_fontawesome"><i class="fa fa-vimeo-square"></i><span>fa-vimeo-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-vine"></i><span>fa-vine</span></div>
<div class="icones_fontawesome"><i class="fa fa-vk"></i><span>fa-vk</span></div>
<div class="icones_fontawesome"><i class="fa fa-volume-control-phone"></i><span>fa-volume-control-phone</span></div>
<div class="icones_fontawesome"><i class="fa fa-volume-down"></i><span>fa-volume-down</span></div>
<div class="icones_fontawesome"><i class="fa fa-volume-off"></i><span>fa-volume-off</span></div>
<div class="icones_fontawesome"><i class="fa fa-volume-up"></i><span>fa-volume-up</span></div>
<div class="icones_fontawesome"><i class="fa fa-warning"></i><span>fa-warning</span></div>
<div class="icones_fontawesome"><i class="fa fa-wechat"></i><span>fa-wechat</span></div>
<div class="icones_fontawesome"><i class="fa fa-weibo"></i><span>fa-weibo</span></div>
<div class="icones_fontawesome"><i class="fa fa-weixin"></i><span>fa-weixin</span></div>
<div class="icones_fontawesome"><i class="fa fa-whatsapp"></i><span>fa-whatsapp</span></div>
<div class="icones_fontawesome"><i class="fa fa-wheelchair"></i><span>fa-wheelchair</span></div>
<div class="icones_fontawesome"><i class="fa fa-wheelchair-alt"></i><span>fa-wheelchair-alt</span></div>
<div class="icones_fontawesome"><i class="fa fa-wifi"></i><span>fa-wifi</span></div>
<div class="icones_fontawesome"><i class="fa fa-wikipedia-w"></i><span>fa-wikipedia-w</span></div>
<div class="icones_fontawesome"><i class="fa fa-window-close"></i><span>fa-window-close</span></div>
<div class="icones_fontawesome"><i class="fa fa-window-close-o"></i><span>fa-window-close-o</span></div>
<div class="icones_fontawesome"><i class="fa fa-window-maximize"></i><span>fa-window-maximize</span></div>
<div class="icones_fontawesome"><i class="fa fa-window-minimize"></i><span>fa-window-minimize</span></div>
<div class="icones_fontawesome"><i class="fa fa-window-restore"></i><span>fa-window-restore</span></div>
<div class="icones_fontawesome"><i class="fa fa-windows"></i><span>fa-windows</span></div>
<div class="icones_fontawesome"><i class="fa fa-won"></i><span>fa-won</span></div>
<div class="icones_fontawesome"><i class="fa fa-wordpress"></i><span>fa-wordpress</span></div>
<div class="icones_fontawesome"><i class="fa fa-wpbeginner"></i><span>fa-wpbeginner</span></div>
<div class="icones_fontawesome"><i class="fa fa-wpexplorer"></i><span>fa-wpexplorer</span></div>
<div class="icones_fontawesome"><i class="fa fa-wpforms"></i><span>fa-wpforms</span></div>
<div class="icones_fontawesome"><i class="fa fa-wrench"></i><span>fa-wrench</span></div>
<div class="icones_fontawesome"><i class="fa fa-xing"></i><span>fa-xing</span></div>
<div class="icones_fontawesome"><i class="fa fa-xing-square"></i><span>fa-xing-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-y-combinator"></i><span>fa-y-combinator</span></div>
<div class="icones_fontawesome"><i class="fa fa-y-combinator-square"></i><span>fa-y-combinator-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-yahoo"></i><span>fa-yahoo</span></div>
<div class="icones_fontawesome"><i class="fa fa-yc"></i><span>fa-yc</span></div>
<div class="icones_fontawesome"><i class="fa fa-yc-square"></i><span>fa-yc-square</span></div>
<div class="icones_fontawesome"><i class="fa fa-yelp"></i><span>fa-yelp</span></div>
<div class="icones_fontawesome"><i class="fa fa-yen"></i><span>fa-yen</span></div>
<div class="icones_fontawesome"><i class="fa fa-yoast"></i><span>fa-yoast</span></div>
<div class="icones_fontawesome"><i class="fa fa-youtube"></i><span>fa-youtube</span></div>
<div class="icones_fontawesome"><i class="fa fa-youtube-play"></i><span>fa-youtube-play</span></div>
<div class="icones_fontawesome"><i class="fa fa-youtube-square"></i><span>fa-youtube-square</span></div>
			';

			$html .= $tabela_cadastro;
		}else if($_GET['acao'] == 'listar'){

			//Lista os sliders
			$li = '';
			if(is_array($tema_zflag_servicos)){
				$tema_zflag_servicos = (array) $tema_zflag_servicos;
				$i = 0;
				foreach ($tema_zflag_servicos  as $key => $value) {
					$value = (array) $value;

						$li .= '
							<tr role="row" class="'.(($i%2 == 0) ? 'odd' : 'even').'">
								<td>
									<strong>
										<a class="row-title" href="?page=zflag_theme_admin_geral&id='.$key.'&subpage=servicos&acao=editar" aria-label="“'.$value['titulo'].'” (Editar)">'.$key.'</a>
									</strong>
								</td>
								<td>
									<strong>
										<a class="row-title" href="?page=zflag_theme_admin_geral&id='.$key.'&subpage=servicos&acao=editar" aria-label="“'.$value['titulo'].'” (Editar)">'.$value['titulo'].'</a>
									</strong>
								</td>
								<td>
									<strong>
										<a class="row-title delete_row" href="?page=zflag_theme_admin_geral&id='.$key.'&subpage=servicos&acao=excluir" aria-label="“'.$value['titulo'].'”"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
									</strong>
								</td>
							</tr>
						';
					
					$i++;

				}

				$html .= '
				<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
					<thead>
						<tr role="row">
							<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 244px;">ID</th>
							<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 244px;">Titulo</th>
						</tr>
					</thead>
					<tbody>
						'.$li.'
				 	</tbody>
		        </table>';
			}
		}else if($_GET['acao'] == 'excluir'){
			if(!empty($_GET['id'])){
				if(get_option('tema_zflag_servicos')){
					$tema_zflag_servicos = json_decode(get_option('tema_zflag_servicos'));
					$tema_zflag_servicos = (array) $tema_zflag_servicos;
				}
				
				$new_tema_zflag_servicos = array();
				foreach ($tema_zflag_servicos as $key => $value) {

					if($key != $_GET['id']){
						$value = (array) $value;
						$titulo = $value['titulo'];
						$link = $value['link'];
						$texto = $value['texto'];
						$icone = $value['icone'];

						$new_tema_zflag_servicos[$key] = ['titulo' => $titulo, 'link' => $link, 'texto' => $texto, 'icone' => $icone];
					}
				}

				delete_option('tema_zflag_servicos');
				if(add_option('tema_zflag_servicos', json_encode($new_tema_zflag_servicos))){
					$html .= "Item Excluido";
				}
				
			}
		}

	}
