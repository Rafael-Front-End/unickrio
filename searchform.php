<?php
/**
Template Name: Search Form
**/
?>

<form accept-charset="utf-8" role="search" method="GET" id="pesquisa_topo" name="form_search" role="form" action="<?php echo get_site_url();?>">
	<div class="search-option">
		<input class="" type="text" value="<?php the_search_query(); ?>" autocomplete="on" id="" name="s" placeholder="Pesquisar neste site">
		<button class="button" id="" type="submit" value="submit"><i class="fa fa-search"></i></button>
	</div>
</form>
