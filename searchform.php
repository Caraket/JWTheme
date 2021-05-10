<form action="/" method="GET">
    <label for="search">Search</label>
    <input type="text" name="s" id="search" value="<?php the_search_query();?> " required>
    <button type="submit">Submit</button>
</form>