<?php

/**
 * The History Single File
 *
 * @package Usi No Sima
 */

get_header();

$post_id = get_the_ID();
$post_date = get_the_date('Y.m.d', $post_id);
$post_title = get_the_title($post_id);
$post_content = get_the_content($post_id);

$history_description = get_field('history_description', $post_id);
$history_title = get_field('history_title', $post_id);

$all_brand_urls = nosima_get_image_urls_from_html($post_content);

$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<?php get_template_part('templates/fv-all'); ?>
<?php get_template_part('templates/page-info', null, array('title' => $history_title, 'description' => $history_description)); ?>
<?php get_template_part('templates/breadcrumb'); ?>

<main
  id="main" class="pt-0 xl:pb-9">
  <div
    class="lg:max-w-[920px] xl:max-w-[1200px] 2xl:max-w-[1400px] mx-auto flex gap-6 lg:gap-8 xl:gap-10 2xl:gap-[52px]">
    <div id="overlay"
      class="hidden w-[100vw] h-[100vh] fixed inset-0 z-30 bg-[#00000075] cursor-pointer transition-opacity duration-300 ease-out">
    </div>
    <?php get_template_part('templates/sidebar'); ?>
    <div id="content" class="flex-1 md:max-w-[680px] lg:max-[545px] xl:max-w-[900px] 2xl:max-w-[1068px] mx-auto">
      <div class="w-full px-7 md:px-0">
        <div id="product-detail-header" class="w-full pb-4 border-b border-[#333]">
          <div class="flex justify-between">
            <div class="inline-block">
              <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" <?php echo !$prev_post ? 'disabled' : ''; ?>>
                <button type="button" <?php echo !$prev_post ? 'disabled' : ''; ?>
                  class="btn-line flex items-center gap-2 hover:text-white/70 duration-200 <?php echo !$prev_post ? 'cursor-not-allowed text-white/60' : 'text-white'; ?>">
                  <i class="fa-solid fa-chevron-left text-sm lg:text-lg"></i>
                  前の製作
                </button>
              </a>
            </div>
            <div class="inline-block">
              <a href="<?php echo esc_url(get_permalink($next_post)); ?>" <?php echo !$next_post ? 'disabled' : ''; ?>>
                <button type="button" <?php echo !$next_post ? 'disabled' : ''; ?>
                  class="btn-line flex items-center gap-2 hover:text-white/70 duration-200 <?php echo !$next_post ? 'cursor-not-allowed text-white/60' : 'text-white'; ?>">
                  次の製作
                  <i class="fa-solid fa-chevron-right text-sm lg:text-lg"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
        <section class="w-full mt-6 lg:mt-8 xl:mt-10">
          <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex-1 pt-4 lg:pt-0 flex flex-col gap-4">
              <div id="history-image-grid" class="w-full grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2"
                data-image-urls="<?php echo esc_attr(wp_json_encode(array_values($all_brand_urls))); ?>">
                <?php foreach ($all_brand_urls as $i => $brand_url) : ?>
                  <button type="button" class="history-image-trigger w-full flex flex-col gap-1 p-0 border-0 bg-transparent cursor-pointer text-left"
                    data-index="<?php echo (int) $i; ?>" aria-label="画像を拡大">
                    <img src="<?php echo esc_url($brand_url); ?>" alt="ブランド画像" class="w-full h-auto object-cover">
                  </button>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </section>

        <!-- Image modal -->
        <div id="history-image-modal"
          class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/90 transition-opacity duration-300"
          role="dialog" aria-modal="true" aria-label="画像ビューア">
          <button type="button" id="history-modal-close"
            class="absolute top-24 right-4 z-10 w-8 md:w-10 aspect-[1] flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition"
            aria-label="閉じる">
            <i class="fa-solid fa-xmark text-md md:text-xl"></i>
          </button>
          <button type="button" id="history-modal-prev"
            class="absolute left-2 md:left-4 top-1/2 -translate-y-1/2 z-10 w-8 md:w-14 aspect-[1] flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition disabled:opacity-40 disabled:pointer-events-none"
            aria-label="前の画像">
            <i class="fa-solid fa-chevron-left text-md md:text-2xl"></i>
          </button>
          <div class="flex-1 flex items-center justify-center max-w-[90vw] max-h-[90vh] p-8 xl:p-12 md:p-16">
            <img id="history-modal-image" src="" alt="ブランド画像（拡大）" class="max-w-full max-h-[85vh] w-[80vw] h-auto object-contain">
          </div>
          <button type="button" id="history-modal-next"
            class="absolute right-2 md:right-4 top-1/2 -translate-y-1/2 z-10 w-8 md:w-14 aspect-[1] flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition disabled:opacity-40 disabled:pointer-events-none"
            aria-label="次の画像">
            <i class="fa-solid fa-chevron-right text-md md:text-2xl"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
get_footer();
