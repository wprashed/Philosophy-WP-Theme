
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="header__search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="hide-content"><?php echo _x( 'Search for:', 'label', 'philosophy' ); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'philosophy' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" class="search-submit" value="<?php echo _x( 'Search', 'submit button', 'philosophy' ); ?>">
</form>