<?php get_header() ?>

<?php if(have_posts()) { ?>
    <?php while(have_posts()) { ?>
        <?php the_post() ?>
        <?php the_content() ?>
    <?php } ?>
<?php } ?>

<?php

        $args = array(
            'post_type' => 'producto',
            'posts_per_page' => -1,
        );

        $productos = new WP_Query($args);

?>

<div class="productos__container">

    <?php if($productos->have_posts()) { ?>
        <?php while ($productos->have_posts()) { $productos->the_post(); ?>
            <div class="productos__card">
                <figure>
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/prod_1.png" alt="producto 1">
                </figure>
                <div class="producto__caption">
                    <div class="productos__desc">
                        <a class="producto__link" href="#">
                            <h4 class="productos__titulo">Retro refrigerato</h4>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

</div>


<?php get_footer() ?>