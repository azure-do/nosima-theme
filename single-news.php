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

<?php get_template_part('templates/fv-all'); ?>
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
                  前の記事
                </button>
              </a>
            </div>
            <div class="inline-block">
              <a href="<?php echo esc_url(get_permalink($next_post)); ?>" <?php echo !$next_post ? 'disabled' : ''; ?>>
                <button type="button" <?php echo !$next_post ? 'disabled' : ''; ?>
                  class="btn-line flex items-center gap-2 hover:text-white/70 duration-200 <?php echo !$next_post ? 'cursor-not-allowed text-white/60' : 'text-white'; ?>">
                  次の記事
                  <i class="fa-solid fa-chevron-right text-sm lg:text-lg"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
        <section class="w-full mt-6 lg:mt-8 xl:mt-10">
          <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex-1 pt-4 lg:pt-0 flex flex-col gap-4">
              <h2 class="text-white text-[20px] lg:text-[24px] xl:text-[28px] font-bold mb-1"><?php echo $post_title; ?></h2>
              <div class="nosima-wysiwyg text-white text-[14px] lg:text-[16px] xl:text-[18px] leading-relaxed space-y-2">
                <?php echo wp_kses_post($post_content); ?>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</main>

<?php
get_footer();
