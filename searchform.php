<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <label class="screen-reader-text" for="search"></label>
    <input type="text" value="<?php echo get_search_query() ?>" placeholder="SEARCH POSTS" name="s" id="search" /><button type="submit" id="searchsubmit">
        <i class="fa fa-search"></i>
    </button>
</form>