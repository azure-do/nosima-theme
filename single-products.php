<?php

/**
 * The Front Page File
 *
 * @package Usi No Sima
 */

get_header();

$product_id = get_the_ID();
$product_title = get_the_title($product_id);
$product_content = get_post_field('post_content', $product_id);
$product_content = apply_filters('the_content', $product_content);

$product_img = get_field('product_img', $product_id);
$product_sub_img = get_field('product_sub_img', $product_id);
$product_sub_img_urls = nosima_get_image_urls_from_html($product_sub_img);

$product_date = get_the_date('Y.m.d', $product_id);
$product_price = get_field('product_price_label', $product_id);

$prev_product = get_previous_post();
$next_product = get_next_post();

$related_products = array();
$related_term_ids = wp_get_post_terms($product_id, 'product_category', array('fields' => 'ids'));
if (!is_wp_error($related_term_ids) && !empty($related_term_ids)) {
  $related_products = get_posts(array(
    'post_type'      => 'products',
    'posts_per_page' => 20,
    'post__not_in'   => array($product_id),
    'tax_query'      => array(
      array(
        'taxonomy' => 'product_category',
        'field'    => 'term_id',
        'terms'    => $related_term_ids,
      ),
    ),
  ));
}

?>

<?php get_template_part('templates/fv-all'); ?>
<?php get_template_part('templates/breadcrumb'); ?>
<main
  id="main" class="w-full xl:pb-9">
  <div
    class="lg:max-w-[920px] xl:max-w-[1200px] 2xl:max-w-[1400px] mx-auto flex gap-6 lg:gap-8 xl:gap-10 2xl:gap-[52px]">
    <div id="overlay"
      class="hidden w-[100vw] h-[100vh] fixed inset-0 z-30 bg-[#00000075] cursor-pointer transition-opacity duration-300 ease-out">
    </div>
    <?php get_template_part('templates/sidebar'); ?>
    <div id="content" class="w-full flex-1 md:max-w-[680px] lg:max-[545px] xl:max-w-[900px] 2xl:max-w-[1068px] mx-auto">
      <div class="w-full px-7 md:px-0">
        <div id="product-detail-header" class="w-full pb-4 border-b border-[#333]">
          <div class="flex justify-between">
            <div>
              <a href="<?php echo get_permalink($prev_product); ?>">
                <button type="button"
                  class="btn-line text-white flex items-center gap-2 hover:text-white/70 duration-200">
                  <i class="fa-solid fa-chevron-left text-lg"></i>
                  前の商品
                </button>
              </a>
            </div>
            <div class="flex items-center gap-4">

            </div>
            <div>
              <a href="<?php echo get_permalink($next_product); ?>">
                <button type="button"
                  class="btn-line text-white flex items-center gap-2 hover:text-white/70 duration-200">
                  次の商品
                  <i class="fa-solid fa-chevron-right text-lg"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
        <!-- おすすめ商品 -->
        <section class="w-full mt-6 lg:mt-8 xl:mt-10">
          <div class="flex flex-col flex-col xl:flex-row gap-8">
            <div class="flex flex-row w-full xl:w-1/2 gap-6">
              <div class="w-full flex-shrink-0 max-w-full lg:max-w-[900px] xl:max-w-[540px] 2xl:max-w-[600px]">
                <div class="w-full">
                  <!-- Main Image Swiper -->
                  <div
                    class="w-full swiper mainImageSwiper aspect-w-1 aspect-h-1 rounded-lg overflow-hidden border border-[#ccc] bg-black shadow mb-4">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <img src="<?php echo $product_img; ?>" alt="商品画像1"
                          class="zoomable aspect-square object-contain w-full h-full transition-all duration-300" />
                      </div>
                      <?php
                      if (!empty($product_sub_img_urls)) {
                        foreach ($product_sub_img_urls as $sub_img_url) : ?>
                          <div class="swiper-slide">
                            <img src="<?php echo $sub_img_url; ?>" alt="商品画像"
                              class="zoomable aspect-square object-contain w-full h-full transition-all duration-300" />
                          </div>
                        <?php endforeach; ?>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- Thumb List Swiper -->
                  <div class="swiper thumbImageSwiper mt-2">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide cursor-pointer border border-[#eee] rounded overflow-hidden">
                        <img src="<?php echo $product_img; ?>" alt="商品画像1サムネイル"
                          class="aspect-square object-contain w-full h-auto transition-all duration-300 filter-[black]" />
                      </div>
                      <?php
                      if (!empty($product_sub_img_urls)) {
                        foreach ($product_sub_img_urls as $sub_img_url) : ?>
                          <div class="swiper-slide cursor-pointer border border-[#eee] rounded overflow-hidden">
                            <img src="<?php echo $sub_img_url; ?>" alt="商品画像サムネイル"
                              class="aspect-square object-contain w-full h-auto transition-all duration-300" />
                          </div>
                        <?php endforeach; ?>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex-1 pt-4 lg:pt-0 flex flex-col aspect-square gap-4 overflow-y-scroll product-detail-scroll">
              <h2 class="text-white text-[20px] lg:text-[24px] xl:text-[28px] font-bold mb-1"><?php echo $product_title; ?></h2>
              <span class="text-[#b40000] text-[18px] lg:text-[22px] xl:text-[24px] font-semibold"><?php echo $product_price; ?></span>
              <div class="nosima-wysiwyg text-white text-[14px] lg:text-[16px] xl:text-[18px] leading-relaxed space-y-2">
                <?php echo $product_content; ?>
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-4 mt-6 lg:mt-8 xl:mt-10">
            <div id="related-products" class="w-full border-b border-[#333]">
              <h3 class="text-white text-[18px] lg:text-[22px] xl:text-[24px] font-bold mb-1">関連商品</h3>
            </div>
            <div class="w-full overflow-hidden">
              <div id="productImageSlider" class="swiper-container">
                <div class="swiper-wrapper">
                  <?php if (!empty($related_products)) : ?>
                    <?php foreach ($related_products as $related) : ?>
                      <?php
                      $related_img = get_field('product_img', $related->ID);
                      $related_img_url = '';
                      if (is_array($related_img) && !empty($related_img['url'])) {
                        $related_img_url = $related_img['url'];
                      } elseif (is_string($related_img)) {
                        $related_img_url = $related_img;
                      }
                      if (!$related_img_url) {
                        $related_img_url = get_the_post_thumbnail_url($related->ID, 'medium');
                      }
                      if (!$related_img_url) {
                        $related_img_url = T_DIRE_URI . '/assets/images/recommended01.webp';
                      }
                      ?>
                      <div class="swiper-slide">
                        <a href="<?php echo esc_url(get_permalink($related->ID)); ?>">
                          <img src="<?php echo esc_url($related_img_url); ?>"
                            alt="<?php echo esc_attr(get_the_title($related->ID)); ?>"
                            class="w-full object-cover aspect-square rounded-md transition-transform duration-300" />
                        </a>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </section>
        <script>
          function changeMainImage(src) {
            document.getElementById('mainProductImage').src = src;
          }
        </script>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>