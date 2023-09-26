<?php
get_header();
$current_taxonomy = get_queried_object();
if ($current_taxonomy) {
    $taxonomy_name = $current_taxonomy->taxonomy;
}
$custom_query = new WP_Query (
    array(
        'post_type' => 'video',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy_name,
                'field'    => 'slug',
                'terms'    => get_query_var('term'),
            ),
        ),
    )
);
?>
<section class="video-padding">
    <div class="row mx-0">
        <div class="col-md-6 col-xs-12">
            <?php if(get_query_var('term') == 'films'){ ?> 
                <h1 class="text-red post__title">Filmes</h1>
                <p class="text-white post__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque sed felis eu commodo. Duis dapibus eu arcu varius ornare. 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames 
                    ac turpis egestas. Proin vel lorem malesuada, pellentesque purus eget, porttitor purus. Etiam eleifend facilisis lobortis. 
                    Curabitur erat lacus, ullamcorper ut magna a, maximus pellentesque dolor.
                </p>
            <?php } ?>
            <?php if(get_query_var('term') == 'documentaries'){ ?> 
                <h1 class="text-red post__title">Documentários</h1>
                <p class="text-white post__text">
                    In augue augue, sollicitudin nec laoreet non, gravida ac nulla. Vivamus at accumsan arcu. Donec finibus, enim quis pellentesque tincidunt, 
                    sapien metus interdum eros, sit amet tristique libero nulla sit amet nulla. Fusce egestas, libero sit amet lobortis mollis, ipsum est pellentesque nisi, 
                    non rutrum erat tortor ac mi. In nec felis erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum tristique gravida volutpat.
                </p>
            <?php } ?>
            <?php if(get_query_var('term') == 'series'){ ?> 
                <h1 class="text-red post__title">Séries</h1>
                <p class="text-white post__text">
                    Praesent et risus est. Nullam nec euismod arcu. Integer massa sem, iaculis sit amet ante et, fermentum sollicitudin est. Proin egestas felis arcu, 
                    eget egestas nisi accumsan non. Donec tincidunt et ipsum nec consectetur. Fusce dapibus, urna id cursus accumsan, lacus diam sagittis enim, in facilisis 
                    lorem purus in magna. Aenean sed augue commodo, auctor purus ac, varius purus. Etiam vel congue ligula, id porttitor dui. Aenean interdum mi ante, in volutpat 
                    quam laoreet quis. Donec aliquam convallis tempus.
                </p>
            <?php } ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="row mx-0">
                <?php if ($custom_query->have_posts()) {
                    while ($custom_query->have_posts()) {
                        $custom_query->the_post(); ?>
                            <div class="col-md-4 col-xs-6 col-sm-6 mb-3 post-tablet">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="slider__post--image"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
                                    <div class="pill__outline d-inline-block my-2"><?php the_field('bx_play_video_duration'); ?>m</div>
                                    <div class="text-white slider__post--title">
                                        <?php the_title(); ?>
                                    </div>
                                </a> 
                            </div>
                            <?php }
                    wp_reset_postdata(); 
                } else {
                    echo '<h4 class="text-white">Não foram encontradas entradas para esta taxonomia.</h4>';
                }
                ?>
            </div>    
        </div>
    </div>
</section>
<?php get_footer(); ?>