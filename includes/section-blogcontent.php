<?php if(have_posts() ): while (have_posts()): the_post(); ?>

    <p><?php echo get_the_date('M/d/Y h:i:s '); ?></p>

    <?php the_content(); ?>

    <?php 
        $nname = get_the_author_meta('nickname');
    ?>
    <p>Posted by: <?php echo $nname; ?></p>

    <?php 
        $tags = get_the_tags();
        if($tags):
        foreach($tags as $tag):?>
            <a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge bg-success">
                <?php echo $tag->name; ?>
            </a>
        <?php endforeach;?>


        <?php
            $categories = get_the_category();
            foreach($categories as $cat): ?>

                <a href="<?php echo get_category_link($cat->term_id); ?>" class="badge bg-info">
                    <?php echo $cat->name; ?>
                </a>

            <?php endforeach; endif;?>



        <?php //comments_template();?>


<?php endwhile; else: endif;?>