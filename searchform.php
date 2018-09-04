<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
	<input type="submit"  value=""/>
</form>
