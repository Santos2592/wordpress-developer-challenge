<?php get_header(); ?>
<section class="p-relative h-100 video-padding">
        <?php 
            $lastVideo = new WP_Query(
                array(
                    'post_type' => 'video',
                    'orderby' => 'posts_date',
                    'posts_per_page' => 1,
                    'order' => 'DESC')
            ); ?>
        <?php
            while($lastVideo -> have_posts()){
                $lastVideo -> the_post(); 
                $termsArray = get_the_terms($post->ID, 'video_type'); 
                $termsSlug = ""; 
                $termsName = ""; 
                foreach ($termsArray as $term) {
                    $termsSlug.= $term->slug;
                    $termsName .= $term->name .' ';
                }?>
                <div class="p-absolute z-index--1 home__image">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Main Image">
                </div>
                <div class="row align-items-center h-100 mx-0">
                    <div class="col-xs-12 col-sm-8 col-md-6">
                        <div>
                            <span class="pill d-inline-block"><?php echo $termsName; ?></span>
                            <span class="pill__outline d-inline-block"><?php the_field('bx_play_video_duration'); ?>m</span>
                        </div>
                        <h1 class="home__tile text-white"><?php the_title(); ?></h1>
                        <div>
                            <a class="home__link text-white d-inline-block" href="<?php the_permalink(); ?>">Mais informações</a>
                        </div>
                    </div>
                </div>
    
           <?php } wp_reset_postdata(); ?>    
</section>
<?php
$films_query = new WP_Query(
    array(
        'post_type' => 'video',
        'tax_query' => array(
            array(
                'taxonomy' => 'video_type',
                'field' => 'slug',
                'terms' => 'films'
            ),
        ),
)); 
$documentaries_query = new WP_Query(
    array(
        'post_type' => 'video',
        'tax_query' => array(
            array(
                'taxonomy' => 'video_type',
                'field' => 'slug',
                'terms' => 'documentaries'
            ),
        ),
)); 
$series_query = new WP_Query(
    array(
        'post_type' => 'video',
        'tax_query' => array(
            array(
                'taxonomy' => 'video_type',
                'field' => 'slug',
                'terms' => 'series'
            ),
        ),
)); 
?>
<section>
    <div class="slider-section">
        <h3 class="text-red slider__title mb-4">Filmes</h3>
        <div class="slider__post">
            <?php if ($films_query->have_posts()) {
                while ($films_query->have_posts()) {
                    $films_query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="slider__post--image"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
                                    <div class="pill__outline d-inline-block my-2"><?php the_field('bx_play_video_duration'); ?>m</div>
                                    <div class="text-white slider__post--title">
                                        <?php the_title(); ?>
                                    </div>
                                </a>
                            <?php }
                wp_reset_postdata();
            } else {
                echo '<h4 class="text-white">Não foram encontradas entradas para esta taxonomia.</h4>';
            } ?>
        </div>
    </div>
</section>


<section>
    <div class="slider-section">
        <h3 class="text-red slider__title mb-4">Documentários</h3>
        <div class="slider__post">
            <?php if ($documentaries_query->have_posts()) {
                while ($documentaries_query->have_posts()) {
                    $documentaries_query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="slider__post--image"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
                                    <div class="pill__outline d-inline-block my-2"><?php the_field('bx_play_video_duration'); ?>m</div>
                                    <div class="text-white slider__post--title">
                                        <?php the_title(); ?>
                                    </div>
                                </a>
                            <?php }
                wp_reset_postdata();
            } else {
                echo '<h4 class="text-white">Não foram encontradas entradas para esta taxonomia.</h4>';
            } ?>
        </div>
    </div>
</section>

<section>
    <div class="slider-section">
        <h3 class="text-red slider__title mb-4">Séries</h3>
        <div class="slider__post">
            <?php if ($series_query->have_posts()) {
                while ($series_query->have_posts()) {
                    $series_query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="slider__post--image"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
                                    <div class="pill__outline d-inline-block my-2"><?php the_field('bx_play_video_duration'); ?>m</div>
                                    <div class="text-white slider__post--title">
                                        <?php the_title(); ?>
                                    </div>
                                </a>
                            <?php }
                wp_reset_postdata();
            } else {
                echo '<h4 class="text-white">Não foram encontradas entradas para esta taxonomia.</h4>';
            } ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>