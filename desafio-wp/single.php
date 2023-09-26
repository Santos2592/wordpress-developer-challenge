<?php get_header(); ?>

<div class="container">
    <?php 
        $termsArray = get_the_terms($post->ID, 'video_type'); 
        $termsSlug = ""; 
        $termsName = ""; 
        foreach ($termsArray as $term) {
            $termsSlug.= $term->slug;
            $termsName .= $term->name .' ';
        }
    ?>
    <div class="col-xs-12">
        <div>
            <span class="pill d-inline-block"><?php echo $termsName; ?></span>
            <span class="pill__outline d-inline-block"><?php the_field('bx_play_video_duration'); ?>m</span>
        </div>
        <h1 class="text-white">
        <?php the_title(); ?>
        </h1>
    </div>
</div>


<?php
    $youtube_url = get_field('bx_play_video_ID');
    $video_id = '';
    $iframe_url = '';
    if (preg_match('/[?&]v=([^&]+)/', $youtube_url, $matches)) {
        $video_id = $matches[1];
    }
    if (!empty($video_id)) {
        $iframe_url = "https://www.youtube.com/embed/$video_id";
    } else {
        echo "URL de YouTube no válida.";
    }
?>

<div class="video-container">
    <div class="cover-image" onclick="toggleVideo()">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Portada del video">
        <button class="play-button"><img src="<?php echo get_theme_file_uri('/assets/play-light.png') ?>"></button>
    </div>
    <iframe id="video-iframe" src="<?php echo $iframe_url  ?>" frameborder="0" allowfullscreen></iframe>
</div>
<div class="container">
    <div class="col-xs-12">
        <p class="text-white post__text">
            <?php the_field('sinopse'); ?>
        </p>
    </div>
</div>

<?php get_footer(); ?>