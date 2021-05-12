<?php get_header(); ?>

<section class="page-wrap">
    <div class="wrapper">
        <?php if(has_post_thumbnail()):?>
            <img class="featured-image" src="<?php the_post_thumbnail_url('featured-large'); ?>" alt="<?php the_title(); ?>" class="img-fluid img-thumbnail">
        <?php endif;?>
        

        <div class="content">
            <?php get_template_part('includes/section', 'content'); ?>
        </div>


    </div>
</section>



<?php get_footer(); ?>