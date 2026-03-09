<?php

/**
 * The Front Page File
 *
 * @package Usi No Sima
 */

get_header();

$post_id = get_the_ID();
$post_date = get_the_date('Y.m.d', $post_id);
$post_title = get_the_title($post_id);
$post_content = get_field('news_content', $post_id);

$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<main id="main" class="pt-10 lg:pt-12 xl:pt-18 2xl:pt-20 xl:pb-9">
  <h1 class="text-white text-[20px] lg:text-[24px] xl:text-[28px] font-bold mb-1">This is Single Products</h1>
</main>

<?php
get_footer();
