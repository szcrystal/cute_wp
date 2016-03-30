<?php ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr( 'SEARCH..' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="検索:" />
</form>

