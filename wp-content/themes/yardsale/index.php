<?php get_header() ?>

<?php if(have_posts()) { ?>
    <?php while(have_posts()) { ?>
        <?php the_post() ?>
        <?php the_content() ?>
    <?php } ?>
<?php } ?>

<?php get_template_part('template-parts/content','listar-productos') ?>


<?php get_footer() ?>