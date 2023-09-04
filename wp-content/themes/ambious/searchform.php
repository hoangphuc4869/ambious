<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <input type="search" class="search-field form-control" value="<?php echo get_search_query(); ?>" name="s"
        placeholder="Search for..." />
    <span class="input-group-btn">

        <button type="submit" class="search-submit btn btn-secondary">
            <span class="reader-text">GO!</span>
        </button>
    </span>
    <input type="hidden" value="product" name="post_type" id="post_type" />

</form>