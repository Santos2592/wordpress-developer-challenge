<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Play</title>
    <?php  wp_head(); ?>
</head>
<body class="bg-black">
    <?php 
    $taxonomy_name = 'video_type';


    $term_films = 'films';
    $term_documentaries = 'documentaries';
    $term_series = 'series';
    

    $films = get_term_by('name', $term_films, $taxonomy_name);
    $films_link = get_term_link($films, $taxonomy_name);

    $documentaries = get_term_by('name', $term_documentaries, $taxonomy_name);
    $documentaries_link = get_term_link($documentaries, $taxonomy_name);

    $series = get_term_by('name', $term_series, $taxonomy_name);
    $series_link = get_term_link($series, $taxonomy_name);

    ?>
    <nav class=" row mx-0 align-items-center justify-content-between">
        <div>
            <a href="<?php  echo site_url(); ?>">
                <img src="<?php echo get_theme_file_uri('/assets/mainLogo.png') ?>">
            </a>
        </div>
        <div class="d-xs-none">
            <ul class="row mx-0">
                <li><a class="<?php if(get_query_var('term') == 'films'){ echo 'active'; } ?>" href="<?php echo $films_link ?>">Filmes</a></li>
                <li><a class="<?php if(get_query_var('term') == 'documentaries'){ echo 'active'; } ?>" href="<?php echo $documentaries_link ?>">Documentários</a></li>
                <li><a class="<?php if(get_query_var('term') == 'series'){ echo 'active'; } ?>" href="<?php echo $series_link ?>">Séries</a></li>
            </ul>
        </div>
    </nav>
    <div class="menu__mobile">
        <ul>
            <li><a class="<?php if(get_query_var('term') == 'films'){ echo 'active'; } ?>" href="<?php echo $films_link ?>">Filmes</a></li>
            <li><a class="<?php if(get_query_var('term') == 'documentaries'){ echo 'active'; } ?>" href="<?php echo $documentaries_link ?>">Documentários</a></li>
            <li><a class="<?php if(get_query_var('term') == 'series'){ echo 'active'; } ?>" href="<?php echo $series_link ?>">Séries</a></li>
        </ul>
    </div>