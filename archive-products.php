<?php

/**
 * The News Archive File
 *
 * @package Usi No Sima News Archive
 */

get_header();

$products_view = isset($_GET['view']) && $_GET['view'] === 'list' ? 'list' : 'grid';
$products_sort = isset($_GET['sort']) ? sanitize_text_field(wp_unslash($_GET['sort'])) : '';
$products_find = isset($_GET['find']) ? sanitize_text_field(wp_unslash($_GET['find'])) : '';

$products_args = array(
    'post_type'      => 'products',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
);
if ($products_find !== '') {
    $products_args['s'] = $products_find;
}
switch ($products_sort) {
    case 'new':
        $products_args['orderby'] = 'date';
        $products_args['order'] = 'DESC';
        break;
    case 'popular':
        $products_args['orderby'] = 'comment_count';
        $products_args['order'] = 'DESC';
        break;
    case 'price_asc':
        $products_args['orderby'] = 'meta_value_num';
        $products_args['meta_key'] = 'product_price';
        $products_args['order'] = 'ASC';
        $products_args['meta_type'] = 'NUMERIC';
        break;
    case 'price_desc':
        $products_args['orderby'] = 'meta_value_num';
        $products_args['meta_key'] = 'product_price';
        $products_args['order'] = 'DESC';
        $products_args['meta_type'] = 'NUMERIC';
        break;
    default:
        break;
}
$products = get_posts($products_args);
?>

<?php get_template_part('templates/fv-all'); ?>
<main id="main" class="pt-10 lg:pt-12 xl:pt-18 2xl:pt-20 xl:pb-9">
    <div
        class="lg:max-w-[920px] xl:max-w-[1200px] 2xl:max-w-[1400px] mx-auto flex gap-6 lg:gap-8 xl:gap-10 2xl:gap-[52px]">
        <div id="overlay"
            class="hidden w-[100vw] h-[100vh] fixed inset-0 z-30 bg-[#00000075] cursor-pointer transition-opacity duration-300 ease-out">
        </div>
        <?php get_template_part('templates/sidebar'); ?>
        <div id="content" class="flex-1 md:max-w-[680px] lg:max-w-full mx-auto">
            <div class="w-full px-7 md:px-0">
                <?php get_template_part('templates/product-header'); ?>
                <!-- おすすめ商品 - List view -->
                <div id="products-list-view"
                    class="products-view-list w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-x-4 md:gap-x-6 lg:gap-x-8 gap-y-5 lg:gap-y-10 xl:gap-y-12 mt-6 lg:mt-8 xl:mt-10<?php echo $products_view !== 'list' ? ' hidden' : ''; ?>">
                    <?php foreach ($products as $product) : ?>
                        <?php get_template_part('templates/product-list-card', null, array('product' => $product)); ?>
                    <?php endforeach; ?>
                </div>
                <!-- Grid view -->
                <div id="products-grid-view"
                    class="products-view-grid w-full grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 lg:gap-x-8 gap-y-5 lg:gap-y-10 xl:gap-y-12 mt-6 lg:mt-8 xl:mt-10<?php echo $products_view !== 'grid' ? ' hidden' : ''; ?>">
                    <?php foreach ($products as $product) : ?>
                        <?php get_template_part('templates/product-grid-card', null, array('product' => $product)); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
