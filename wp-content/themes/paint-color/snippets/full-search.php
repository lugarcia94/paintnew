<div id="full-search">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text"  name="s" id="s" placeholder="<?php esc_attr_e( 'Busca', 'codesigner' ); ?>" />
		<button type="submit" class="btn hidden" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'OK', 'codesigner' ); ?>"><span class="icon-search"></span></button>
	</form>
</div>
<div class="search-overlay"></div>